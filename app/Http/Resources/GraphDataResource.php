<?php

namespace App\Http\Resources;

use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class GraphDataResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
                explode(" ", $this->created_at)[0],
                $this->get_24_open($this->pair,$this->created_at),
                $this->get_24_high($this->pair,$this->created_at),
                $this->get_24_low($this->pair,$this->created_at),
                $this->get_24_close($this->pair,$this->created_at),
                $this->get_24_volume($this->pair,$this->created_at),
                $this->get_24_close($this->pair,$this->created_at)

        ];

        // Date,Open,High,Low,Close,Volume,Adj Close
    }

    private function get_graph_24_open($pair,$created_at)
    {
        $log =  Order::wherePair($pair)
                        ->whereCreatedAt($created_at)
                        ->first('price');
        return $log['price'] ? sprintf("%0.4f",$log['price']): '0.0000';
    }

    private function get_graph_24_close($pair,$created_at)
    {
        $log =  Order::wherePair($pair)
                        ->whereCreatedAt($created_at)
                        ->latest()
                        ->first('price');
        return $log['price'] ? sprintf("%0.4f",$log['price']): '0.0000';
    }

    private function get_graph_24_volume($pair,$created_at)
    {
        $log =  Order::wherePair($pair)
                        ->whereCreatedAt($created_at)
                        ->sum('amount');
        return $log ? sprintf("%0.4f",$log): '0.0000';
    }

    private  function get_graph_24_high($pair,$created_at)
    {
        $log = Order::wherePair($pair)
                        ->whereCreatedAt($created_at)
                        ->max('price');
        return $log ? sprintf("%0.4f",$log): '0.0000';
    }
 
    private function get_graph_24_low($pair,$created_at)
    {
        $log = Order::wherePair($pair)
                         ->whereCreatedAt($created_at)
                        ->min('price');
        return $log ? sprintf("%0.4f",$log): '0.0000';
    }

}
