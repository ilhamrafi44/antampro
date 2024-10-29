<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use App\Models\User;
use App\Models\Deposit;
use App\Models\PayoutLog;
use App\Models\Investment;
use App\Models\ManagePlan;
use App\Models\ManageTime;
use App\Models\UserLedger;
use App\Models\Withdrawal;
use App\Http\Traits\Notify;
use App\Http\Traits\Upload;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Facades\App\Services\BasicService;

class NicePayWebhookController extends Controller
{

    public function deposit(Request $request)
    {
        $file = fopen('./req.txt','a');
        fwrite($file, json_encode($request->all())."\n");
        fclose($file);

        if ($request->status == 1) {

            $payment = UserLedger::where('ord_id', $request->order)->first();

            if ($payment->status == "pending") {

                $user = User::find($payment->user_id);
                $user->balance += $payment->amount;
                $user->save();
    
                $payment->perticulation = 'Deposit anda berhasil disetujui.';
                $payment->status = 'approved';
                $payment->save();

                $Deposit = Deposit::find($payment->deposit_id);
                $Deposit->status = 'approved';
                $Deposit->save();

                echo 'success';
                exit;
            }
            
            echo 'success';
            exit;
        }

        echo 'success';
        exit;
    }


    public function payout(Request $request)
    {

        if ($request->status == 1) {
            $withdraw = Withdrawal::where('oid', $request->order)->first();
            if($withdraw){
                if ($withdraw->status == "pending") {

                    $withdraw->status = 'approved';
                    $withdraw->save();

                    $ledger = UserLedger::where('withdraw_id',$withdraw->id)->first();
                    $ledger->reason = 'Withdraw Berhasil';
                    $ledger->perticulation = 'Withdraw anda berhasil disetujui.';
                    $ledger->status = 'approved';
                    $ledger->date = date('d-m-Y H:i');
                    $ledger->save();
                    
                    echo 'success';
                    exit;
                }
            } 
            echo 'success';
            exit;
        }else if ($request->status == 0) {
            echo 'success';
            exit;
        } else {
            $withdraw = Withdrawal::where('oid', $request->order)->first();

            if($withdraw){
                $withdraw->status = 'rejected';
                $withdraw->save();

                $userRe = User::find($withdraw->user_id);
                $userRe->balance = $userRe->balance + $withdraw->amount;
                $userRe->update();

                $ledger = UserLedger::where('withdraw_id',$withdraw->id)->first();
                $ledger->reason = 'Withdraw Gagal';
                $ledger->perticulation = 'Withdraw anda ditolak.';
                $ledger->status = 'Gagal';
                $ledger->date = date('d-m-Y H:i');
                $ledger->save();

                echo 'success';
                exit;
            }
            echo 'success';
            exit;
        }

        echo 'success';
        exit;
    }
}