<?php

namespace App\Http\Controllers;

use App\Models\htransTopup;
use App\Models\user;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function notif(Request $request)
    {
        $payload = $request->getContent();
        $notification = json_decode($payload);
        // dd('testing');
        $validateSignatureKey = hash('sha512', $notification->order_id,$notification->status_code, $notification->gross_amount, env('MIDTRANS_SERVER_KEY'));

        if($notification->signature_key != $validateSignatureKey){
            return response(['message' =>'Invalid signature'],403);
        }
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $statusCode = null;
        $paymentNotification = new \Midtrans\Notification();
        $transaction = $paymentNotification->transaction_status;
        $type = $paymentNotification->payment_type;
        $order_id = $paymentNotification->order_id;
        $fraud = $paymentNotification->fraud_status;
        $paymentStatus = null;
        $order = htransTopup::where('htranstpwd_id',$paymentNotification->order_id)->first();

        if ($transaction == 'capture') {
            // For credit card transaction, we need to check whether transaction is challenge by FDS or not
            if ($type == 'credit_card') {
                if ($fraud == 'challenge') {
                    // TODO set payment status in merchant's database to 'Challenge by FDS'
                    // TODO merchant should decide whether this transaction is authorized or not in MAP
                    $paymentStatus = htransTopup::CHALLENGE;
                } else {
                    // TODO set payment status in merchant's database to 'Success'
                    $paymentStatus = htransTopup::SUCCESS;
                }
            }
        } else if ($transaction == 'settlement') {
            // TODO set payment status in merchant's database to 'Settlement'
            $paymentStatus = htransTopup::SETLE;
        } else if ($transaction == 'pending') {
            // TODO set payment status in merchant's database to 'Pending'
            $paymentStatus = htransTopup::PENDING;
        } else if ($transaction == 'deny') {
            // TODO set payment status in merchant's database to 'Denied'
            $paymentStatus = htransTopup::DENY;
        } else if ($transaction == 'expire') {
            // TODO set payment status in merchant's database to 'expire'
            $paymentStatus = htransTopup::EXPIRE;
        } else if ($transaction == 'cancel') {
            // TODO set payment status in merchant's database to 'Denied'
            $paymentStatus = htransTopup::CANCEL;
        }
        if($paymentStatus != null){
            $order->status_payment = $paymentStatus;
            $order->save();
            if($paymentStatus == htransTopup::SUCCESS ||$paymentStatus == htransTopup::SETLE ){
                $cust_id = $order->user_id;
                $user = User::where('id',$cust_id)->first();
                $temp = $user->user_saldo;
                $user->user_saldo = $order->htranstpwd_total + $temp;
                $user->save();
            }
        }
        $responses=[
            'code'=> 200,
            'message'=>"ahay",
        ];
        return response($responses, 200);
    }
    public function sukses(Request $request)
    {
        dd("berhasil boy");
    }
    public function gagal(Request $request)
    {
        # code...
    }
    public function pending(Request $request)
    {
        # code...
    }
}
