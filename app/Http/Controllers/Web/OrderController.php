<?php

namespace App\Http\Controllers\Web;

use App\Chat;
use App\CoinPair;
use App\Http\Controllers\Controller;
use App\Log;
use App\Market;
use App\MarketMaker;
use App\Order;
use App\Token;
use App\TradeSetup;
use App\User;
use App\Wallet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function all_history($pair)
    {
        return Order::wherePair($pair)
                        ->whereStat(1)
                        ->orderBy('id','DESC')
                        ->get();
    }

    public function my_history($pair)
    {

        return Order::wherePair($pair)
                        ->whereUserId(auth()->user()->id)
                        ->whereStat(1)
                        ->orderBy('id','DESC')
                        ->get();
    }
    public function my_trades()
    {
        return Order::whereUserId(auth()->user()->id)
                        ->whereStat(1)
                        ->orderBy('id','DESC')
                        ->get();
    }

    public  function get_last_price($pair)
    {

        $log = Order::wherePair($pair)
                        ->orderBy('id','DESC')
                        ->first();

        return $log ? sprintf("%0.7f",$log->price): '0.000000000';
    }

    public function get_avg_price($pair)
    {
        $log =  Order::wherePair($pair)
                        ->avg('price');
        return $log ? sprintf("%0.7f",$log): '0.000000000';
    }

    public function get_24_Single_volume($pair, $side)
    {
        $log =  Market::wherePair($pair)
                        ->where('created_at', '>=', Carbon::now()->subDay())
                        ->sum($side);
        return $log ? sprintf("%0.4f",$log): '0.0000';
    }

    public function get_24_volume($pair)
    {
        $log =  Order::wherePair($pair)
                        ->where('created_at', '>=', Carbon::now()->subDay())
                        ->sum('amount');
        return $log ? sprintf("%0.7f",$log): '0.000000000';
    }

    public  function get_24_high($pair)
    {
        $log = Order::wherePair($pair)
                        ->where('created_at', '>=', Carbon::now()->subDay())
                        ->max('price');
        return $log ? sprintf("%0.7f",$log): '0.000000000';
    }
 
    public function get_24_low($pair)
    {
        $log = Order::wherePair($pair)
                        ->where('created_at', '>=', Carbon::now()->subDay())
                        ->min('price');
        return $log ? sprintf("%0.7f",$log): '0.000000000';
    }

    public function get_24_percent($pair)
    {
            $high = $this->get_24_high($pair);
            $low = $this->get_24_low($pair);
            if($high > 0 && $low > 0){
                $perc = ($low/$high) * 100;
            }else{
                $perc = 0;
            }
            $float = (float) $perc;
            $data['type'] = $float > 0 ? 'positive' : 'negative';
            $data['rate'] = $float > 0 ? 'up' : 'down';
            $data['operator'] = $float > 0 ? '+' : '-';
            $data['percent'] = sprintf("%0.2f",$perc);
            return $data;
    }

    public function getTokenImage($ticker)
    {
        $log = Token::whereTicker($ticker)->first();
        return $log->image;
    }

    public function sumToken($ticker)
    {

        $log = Wallet::whereUserId(auth()->user()->id)
                ->whereTicker($ticker)
                ->first();
        return $log->amount ?? 0;
    }

    public function sumThirdPartyToken($ticker, $wallet_id)
    {
        $user = User::whereWalletId($wallet_id)->first();

        $log = Wallet::whereUserId($user->id)
                ->whereTicker($ticker)
                ->first();
        return $log->amount ?? 0;
    }


    public function get_token_info($ticker)
    {
        return Token::whereTicker($ticker)->first();
    }

    public function get_zero_trade()
    {
        $user = User::whereId(auth()->user()->id)->first();
        return $user;
    }

    function get_trans_fee()
    {
        $log  = TradeSetup::first();
        return $log->trade_fee ?? 0;
    }

    private function check($price,$pair,$type)
    {
        return Market::wherePrice($price)
                        ->wherePair($pair)
                        ->whereType($type)
                        ->count();
    }

    private function get_latest($price,$pair,$type)
    {
        return Market::wherePrice($price)
                        ->wherePair($pair)
                        ->whereType($type)
                        ->orderBy('id','ASC')
                        ->get();
    }

    private function updateToken($amount,$ticker)
    {
        $wallet = Wallet::whereUserId(auth()->user()->id)
                            ->whereTicker($ticker)
                            ->first();
        return  $wallet->update([
            'amount' => $amount
        ]);
    }

    private function updateThirdPartyToken($amount,$ticker,$wallet_id)
    {
        $user = User::whereWalletId($wallet_id)->first();
        $wallet = Wallet::whereUserId($user->id)
                            ->whereTicker($ticker)
                            ->first();
        return  $wallet->update([
            'amount' => $amount
        ]);
    }

    public function insertOrders($user_id,$pair,$currency,$type,$price,$amount)
    {
        if($type=='buy'){
			$image = env('APP_URL').'/v3/ic_buy.svg';
		}else{
			$image = env('APP_URL').'/v3/ic_sell.svg';
        }

       return $order = Order::create([
            'user_id' => $user_id ,
            'pair' => $pair ,
            'currency' => $currency ,
            'type' => $type,
            'image' => $image,
            'price' => $price ,
            'amount' => $amount,
            'stat' => 1 ,
        ]);

	}

    private function delete_order($id)
    {
        $order = Order::find($id);
        if($order){
            $order->delete();
        }
    }

    private function add_order($pair,$type,$target_coin,$base_coin,$price,$amount,$total)
    {
       return $market = Market::create([
            'tag' => (string) Str::orderedUuid(),
            'wallet_id' => auth()->user()->wallet_id,
            'pair' => $pair,
            'type' => $type,
            'target_coin' => $target_coin,
            'base_coin' => $base_coin,
            'price' => $price,
            'amount' => $amount,
            'total' => $total,
            'stat' => 1
        ]);
	}

    public function buyLogic(Request $request)
    {
        $zero_trade = auth()->user()->tradeStat;
		$trans_fee = $request->trans_fee;
		$trans_total = $request->trans_total;
		$target_balance =  $request->target_balance;
		$base_balance =  $request->base_balance;
		$base_coin =  $request->base_coin;
		$type = $request->type;
		$target_coin = $request->target_coin;
		$pair_coin = $request->pair_coin;
		$target_amount = $request->target_amount;
		$base_mount = $request->base_mount;
        $trade_type = ($type == 'buy') ? 'sell' : 'buy';

        if($trans_total > $base_balance){
            $log['type'] = 'danger';
            $log['msg'] =  "Insufficient ".$base_coin." balance";
            return json_encode($log);
        }
        $status = $this->check($base_mount,$pair_coin,$trade_type);

        $fee = TradeSetup::first()->trade_fee;

        $new_coin_gain = 0;
		// A. Check if other exits
		if($status > 0){
            //Get Buyer target_coin balance
			$buy_target_balance = $this->sumToken($target_coin);
			//Get Buyer base_coin balance
            $buy_base_balance = $this->sumToken($base_coin);

            $available_orders = $this->get_latest($base_mount,$pair_coin,$trade_type);
            // $return_balance = (float) 0;
            $array_length = sizeof($available_orders);
            $db = [];

            //subtract base_coin from buyer
             // //Get transaction fee
             if($zero_trade == 1){
                $totalAmount = (float) $target_amount * $base_mount;
                $perc = (float)(($fee/100)*$totalAmount);
                $newSellTotal = $totalAmount;
             }else{
                $totalAmount = (float) $target_amount * $base_mount;
                $perc = (float)(($fee/100)*$totalAmount);
                $newSellTotal = $totalAmount+$perc;
             }

             $order_back = 0;
             $sellInfo = null;

            $new_buyer_base_balance = (float)($buy_base_balance - $newSellTotal);
            $this->updateToken($new_buyer_base_balance,$base_coin);
            $income = 0;

            for($i= 0; $i<$array_length; $i++){
                if($target_amount > 0){
                    //Get Seller Details
                    $sellMarketID = $available_orders[$i]['id'];
                    $sellID = $available_orders[$i]['wallet_id'];
                    $sellAmount = $available_orders[$i]['amount'];
                    $sellPrice = $available_orders[$i]['price'];
                    // Order_back = differe
                    $order_back = (float) ($target_amount - $sellAmount);
                    $order_balance = (float) ($sellAmount - $target_amount);
                    $sellInfo = $available_orders[$i] ;
                    $income+=$sellAmount;

                    $sellBalance = $this->sumThirdPartyToken($base_coin,$sellID);
                    $sellTotal = (float)($sellPrice * $target_amount);
                    //Calculate New SellBalance
                    $newSellBalance = (float)($sellBalance + $sellTotal);
                    //Update Seller Balance
                    $this->updateThirdPartyToken($newSellBalance,$base_coin,$sellID);

                    //Get Buyer Details
                    $buy_target_balance+=$sellAmount;
                    // $new_total = (float)($order_balance * $base_mount);
                    $this->updateToken($buy_target_balance,$target_coin);

                    // Insert into transaction
                    $this->insertOrders(auth()->user()->id,$pair_coin,$target_coin,$type,$base_mount,$target_amount);

                    // $db[$i] = "Target is ".$target_amount." buy ".$sellAmount." from ".$sellID." balance is ".$order_back." income ".$income." ".$target_coin;

                    //Update target amount
                    $target_amount = $order_back;

                    // Delete Order
                    $this->delete_order($sellMarketID);
                }
            }

            if($order_back < 0){
                $dg[]="fee ".$fee." Update data Market ".$order_back." kk=> ".json_encode($sellInfo);
                $amount =  abs($order_back) * $sellInfo['price'];
                // 3. Post order Info into order table
                    $this-> add_order(
                        $sellInfo['pair'],
                        $sellInfo['type'],
                        $sellInfo['target_coin'],
                        $sellInfo['base_coin'],
                        $sellInfo['price'],
                        abs($order_back),
                        $amount
                    );
                // 4. Return Success Message
                    $this->logEntry('Complete Buy Trade '. $sellInfo['id']);
                    $log['type'] = 'success';
                    $log['msg'] =  "Trade Completed";
            }elseif($order_back > 0){
                $amount =  (float) $target_amount * $base_mount;
                // 3. Post order Info into order table
                    $mk = str_shuffle(rand(50,500) * time());
                    $marketID = "B_O".sprintf("%0.7s",$mk);
                    $this-> add_order(
                        $pair_coin,
                        $type,
                        $target_coin,
                        $base_coin,
                        $base_mount,
                        $target_amount,
                        $amount
                    );
                // 4. Return Success Message
                    $this->logEntry('Complete Buy Trade ');
                    $log['type'] = 'success';
                    $log['msg'] =  "Trade Completed";
            }else{
                $this->logEntry('Complete Buy Trade ');
                $log['type'] = 'success';
                $log['msg'] =  "Trade Completed";
            }

		}else{
            $totalAmount = (float) $target_amount * $base_mount;
            if($zero_trade == 1){
                // $perc = (float)($totalAmount);
                $buyTotal = (float) $totalAmount;
            }else{
                $perc = (float)(($fee/100)*$totalAmount);
                $buyTotal = $totalAmount+$perc;
            }
            // 1. Subtract total from user account


            $buy_base_balance = $this->sumToken($base_coin);


				$new_base_balance = (float) $buy_base_balance - $buyTotal;
				$this->updateToken($new_base_balance,$base_coin);
			// 2. Get actual amount (total - fee)
				$amount =  $totalAmount;
			// 3. Post order Info into order table
				$mk = str_shuffle(rand(50,500) * time());
				$marketID = "B_O".sprintf("%0.7s",$mk);
				$mk = $this-> add_order(
					$pair_coin,
					$type,
					$target_coin,
					$base_coin,
					$base_mount,
					$target_amount,
					$amount
				);
			// 4. Return Success Message
				$this->logEntry('Created new order '.$mk->id);
				$log['type'] = 'success';
				$log['msg'] =  strtoupper($type)." order created ";
        }
        return json_encode($log);
    }

    public function sellLogic(Request $request)
    {
        $zero_trade = auth()->user()->tradeStat;
        $trans_fee= $request->trans_fee;
		$trans_total= $request->trans_total;
		$target_balance=  $request->target_balance;
		$base_balance=  $request->base_balance;
		$base_coin=  $request->base_coin;
		$type= $request->type;
		$target_coin= $request->target_coin;
		$pair_coin = $request->pair_coin;
		$target_amount = $request->target_amount;
		$base_mount = $request->base_mount;
		$trade_type = ($type == 'buy') ? 'sell' : 'buy';
        $status = $this->check($base_mount,$pair_coin,$trade_type);

        if($trans_total > $base_balance){
            $log['type'] = 'danger';
            $log['msg'] =  "Insufficient ".$base_coin." balance";
            return json_encode($log);
        }
        
        if($status > 0){
            //Get Buyer target_coin balance
			$sell_target_balance = $this->sumToken($target_coin);
			//Geseller base_coin balance
            $sell_base_balance = $this->sumToken($base_coin);

            $available_orders = $this->get_latest($base_mount,$pair_coin,$trade_type);
            // $return_balance = (float) 0;
            $array_length = sizeof($available_orders);
            $db = [];

            //subtract base_coin from buyer
             // //Get transaction fee
            $totalAmount = (float) $target_amount * $base_mount;
            $newSellTotal = $target_amount;

            $order_back = 0;
            $buyInfo = null;

            $new_seller_target_balance = (float)($sell_target_balance - $newSellTotal);
            $this->updateToken($new_seller_target_balance,$target_coin);
            $income = 0;

            for($i= 0; $i<$array_length; $i++){
                if($target_amount > 0){
                    //Get Seller Details
                    $buyMarketID = $available_orders[$i]['id'];
                    $buyID = $available_orders[$i]['wallet_id'];
                    $buyAmount = $available_orders[$i]['amount'];
                    $buyPrice = $available_orders[$i]['price'];
                    // Order_back = differe
                    $order_back = (float) ($target_amount - $buyAmount);
                    $order_balance = (float) ($buyAmount - $target_amount);
                    $buyInfo = $available_orders[$i] ;
                    $income+=$buyAmount;

                    $buyBalance = $this->sumThirdPartyToken($target_coin,$buyID);
                    //Calculate New SellBalance
                    $newBuyBalance = (float)($buyBalance + $buyAmount);
                    //Update Seller Balance
                    $this->updateThirdPartyToken($newBuyBalance,$target_coin,$buyID);

                    //Get Buyer Details
                    $buyTotal = (float)($buyPrice * $target_amount);
                    $sell_base_balance+=$buyTotal;
                    // $new_total = (float)($order_balance * $base_mount);
                    $this->updateToken($sell_base_balance,$base_coin);

                    // Insert into transaction
                    $this->insertOrders(auth()->user()->id,$pair_coin,$target_coin,$type,$base_mount,$target_amount);

                    //Update target amount
                    $target_amount = $order_back;

                    // Delete Order
                    $this->delete_order($buyMarketID);
                }
            }

            if($order_back < 0){
                $amount =  abs($order_back) * $buyInfo['price'];
                // 3. Post order Info into order table
                   $bk = $this-> add_order(
                        $buyInfo['pair'],
                        $buyInfo['type'],
                        $buyInfo['target_coin'],
                        $buyInfo['base_coin'],
                        $buyInfo['price'],
                        abs($order_back),
                        $amount
                    );
                // 4. Return Success Message
                    $this->logEntry('Complete Buy Trade '. $bk->id);
                    $log['type'] = 'success';
                    $log['msg'] =  "Trade Completed";
            }else if($order_back > 0){
                $amount =  (float) $target_amount * $base_mount;
                // 3. Post order Info into order table
                    $mk = str_shuffle(rand(50,500) * time());
                    $marketID = "B_O".sprintf("%0.7s",$mk);
                    $bk = $this-> add_order(
                        $pair_coin,
                        $type,
                        $target_coin,
                        $base_coin,
                        $base_mount,
                        $target_amount,
                        $amount
                    );
                // 4. Return Success Message
                    $this->logEntry('Complete Sell Trade '.$bk->id);
                    $log['type'] = 'success';
                    $log['msg'] =  "Trade Completed";

            }else{
                $this->logEntry('Complete Buy Trade ');
                $log['type'] = 'success';
                $log['msg'] =  "Trade Completed";
            }



        }else{
            $totalAmount = (float) $target_amount * $base_mount;
            $buyTotal = (float) $target_amount;

            // 1. Subtract total from user account


            $sell_target_balance = $this->sumToken($target_coin);
				$new_target_balance = (float) $sell_target_balance - $target_amount;
				$this->updateToken($new_target_balance,$target_coin);
			// 2. Get actual amount (total - fee)
				$amount =  $totalAmount;
			// 3. Post order Info into order table
				$mk = str_shuffle(rand(50,500) * time());
				$marketID = "B_O".sprintf("%0.7s",$mk);
				$this-> add_order(
					$pair_coin,
					$type,
					$target_coin,
					$base_coin,
					$base_mount,
					$target_amount,
					$amount
				);
			// 4. Return Success Message
				$this->logEntry('Created new order ');
				$log['type'] = 'success';
				$log['msg'] =  strtoupper($type)." order created ";
        }
        return json_encode($log);
    }


    private function logEntry($log)
    {
        Log::create([
            'user_id' => auth()->user()->id,
            'log' => $log
        ]);
    }

    public function get_search($pair)
	{
        return CoinPair::where('pair', 'like', '%' .$pair . '%')->get();
    }

    public function get_list($pair,$type,$sort)
    {
       return  Market::wherePair($pair)
                ->whereType($type)
                ->orderBy('price',$sort)
                ->distinct()
                ->get('price','type');
    }

    public function get_volume($pair,$type)
    {
        return  Market::wherePair($pair->pair)
                ->whereType($type)
                ->sum('amount');
    }

    public function get_market_total($price,$type,$pair)
    {
        return  Market::wherePrice($price)
                    ->whereType($type)
                    ->wherePair($pair)
                    ->sum('total');
    }

    public function get_total_amount($price,$type,$pair)
    {
        return  Market::wherePrice($price)
                    ->whereType($type)
                    ->wherePair($pair)
                    ->sum('amount');
    }

    public function get_my_orders()
    {
        $id = auth()->user() ? User::find(auth()->user()->id)  : null;
        return Market::whereWalletId($id->wallet_id)
                        ->orderBy('id','DESC')
                        ->get(); 
    }


    public function market_info($id)
    {
        return Market::find($id);
	}

    
    public function deleteOrder()
    {
        $log = $this->market_info(request()->id);
        $type = $log['type'];
		$base_coin = $log['base_coin'];
		$target_coin = $log['target_coin'];
		$base_amount = $log['total'];
        $target_amount = $log['amount'];
        $wallet_id = $log['wallet_id'];
		$base_balance =  $this->sumThirdPartyToken($base_coin,$wallet_id);
        $target_balance =  $this->sumThirdPartyToken($target_coin,$wallet_id);
		if($type == 'buy'){
			$new_base_balance = ($base_balance + $base_amount);
            $this->updateThirdPartyToken($new_base_balance,$base_coin,$wallet_id);

		}else if($type == 'sell'){
            $new_target_balance = ($target_balance + $target_amount);
            $this->updateThirdPartyToken($new_target_balance,$target_coin,$wallet_id);
            
		}
        Market::find(request()->id)->delete();
        $this->logEntry("Deleted ".strtoupper($type)." ".$log['pair']." order");
		$loog['type'] = 'success';
		$loog['msg'] = strtoupper($type)." Order Deleted";
        echo json_encode($loog);
        
    }
    

    public function graphData($pair)
    {  
        $data = Order::wherePair($pair)->select('pair','created_at')->groupBy('created_at','pair')->get();
        $payload = [];
        if($data)
        {
            foreach($data as $datum)
            {
                $payload[] = [
                    "pair" => $datum->pair,
                    "date" => $datum->created_at,
                    "open" => $this->get_graph_24_open($datum->pair,$datum->created_at),
                    "high" =>  $this->get_graph_24_high($datum->pair,$datum->created_at),
                    "low" =>  $this->get_graph_24_low($datum->pair,$datum->created_at),
                    "close" => $this->get_graph_24_close($datum->pair,$datum->created_at)

                ];
            }
        }
        
        return json_encode($payload);
    }

    private function get_graph_24_open($pair,$created_at)
    {
        $log =  Order::wherePair($pair)
                        ->whereCreatedAt($created_at)
                        ->first('price');
        return $log['price'] ? sprintf("%0.7f",$log['price']): '0.0000000';
    }

    private function get_graph_24_close($pair,$created_at)
    {
        $log =  Order::wherePair($pair)
                        ->whereCreatedAt($created_at)
                        ->orderBy('id', 'DESC')
                        ->first();
        return $log['price'] ? sprintf("%0.7f",$log['price']): '0.0000000';
    }

    private function get_graph_24_volume($pair,$created_at)
    {
        $log =  Order::wherePair($pair)
                        ->whereCreatedAt($created_at)
                        ->sum('amount');
        return $log ? sprintf("%0.7f",$log): '0.0000000';
    }

    private  function get_graph_24_high($pair,$created_at)
    {
        $log = Order::wherePair($pair)
                        ->whereCreatedAt($created_at)
                        ->max('price');
        return $log ? sprintf("%0.7f",$log): '0.0000000';
    }
 
    private function get_graph_24_low($pair,$created_at)
    {
        $log = Order::wherePair($pair)
                         ->whereCreatedAt($created_at)
                        ->min('price');
        return $log ? sprintf("%0.7f",$log): '0.0000000';
    }
 

    public function test()
    {
       //1. Get the maximum number
        $market = MarketMaker::inRandomOrder()->first();
        $pair = $market->pair;
        $max = $market->maximum_volume;
        $min = 0;
        $value = ($min + lcg_value()*(abs($max - $min)));
        $currency = explode("_",$pair)[1];
        $price = sprintf("%0.7f",$value);
        $amount = sprintf("%0.7f",(0.0005 + lcg_value()*(abs(4.5000 - 0.0005))));
        $randomType = [
            'buy',
            'sell'
        ];
        $type = $randomType[array_rand($randomType)];
        if($type=='buy'){
			$image = env('APP_URL').'/v3/ic_buy.svg';
		}else{
			$image = env('APP_URL').'/v3/ic_sell.svg';
        }
 
       return $order = Order::create([
            'user_id' => sprintf("%0.3s",rand(1,40) * time()) ,
            'pair' => $pair ,
            'currency' => $currency ,
            'type' => $type,
            'image' => $image,
            'price' => $price ,
            'amount' => $amount,
            'stat' => 1 ,
        ]);

        // return [
        //     'maximum' => sprintf("%0.7f",$max),
        //     'value' => sprintf("%0.7f",$value)
        // ];
    }
  
    


 

}
