<?php

namespace App\Jobs;

use App\WalletHistory;
use App\WithdrawRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessConfirmationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //Get all from withdraw request where status 3

        //check if confirmation complete

         // update walletRequest with transaction ID and status of 3
        //  $this->updateRequest($id, $status, $transID);

         // update wallet history and status of 3 via trackID
         // $this->updateWalletHistory($trackID, $status, $transID);
     }
 
     private function updateRequest($id, $status, $transID)
     {
         $data = WithdrawRequest::find($id);
         $data->update([
             'status' => $status,
             'transID' => $transID
         ]);
     } 
     
     private function updateWalletHistory($trackID, $status, $transID)
     {
         $data = WalletHistory::where('trackID',$trackID)->first();
         $data->update([
             'status' => $status,
             'transID' => $transID
         ]);
     }
}
