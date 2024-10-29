<?php

namespace App\Http\Controllers\user;

use Carbon\Carbon;
use App\Models\Bank;
use App\Models\User;
use App\Models\Deposit;
use App\Models\Purchase;
use App\Models\UserLedger;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Log;
class WithdrawController extends Controller
{
    public function withdraw()
    {
        
        if (Auth::user()->bank_id == null && Auth::user()->gateway_number == null) {
            return redirect()->route('user.card');
        }
        return view('app.main.withdraw.index');
    }

    public function usdt_withdraw()
    {
        return view('app.main.withdraw.usdt');
    }

    public function withdrawConfirmSubmit(Request $request)
    {
    // dd($request->all());
    // dd($request->all());
        $validate = Validator::make($request->all(), [
            'amount' => 'required|numeric'
        ]);
        if ($request->amount == '' || $request->amount < 1) {
            return back()->with('error', 'Masukkan nominal.');
        }

        if (Auth::user()->gateway_name == null && Auth::user()->gateway_number == null) {
            return back()->with('success', 'Setup bank terlebih dahulu');
        }

        $custom_token = $request->custom_token;

        if (Session::has('custom_token') && Session::get('custom_token') == $request->custom_token) {
           return redirect()->back()->with('error', 'Penarikan sedang diproses');
        }
        
        $count1 = Purchase::where('user_id', Auth::user()->id)
                ->count();
                

        if ($count1 == 0) {
            return redirect()->back()->with('error', 'Anda harus membeli minimal 1 produk');
        }
        $account = Bank::where('id',Auth::user()->bank_id)->first();

        $minimum_withdraw = setting('minimum_withdraw');
        $maximum_withdraw = setting('maximum_withdraw');
        $withdraw_charge = setting('withdraw_charge');

        $user = Auth::user();
        $userId = Auth::id();
        if (RateLimiter::tooManyAttempts("withdraw:$userId", 1)) {
            return redirect()->back()->with('error', 'Coba kembali dalam 1 menit kedepan');
        }
        RateLimiter::hit("withdraw:$userId", 60); 

        $charge = 0;
        if ($withdraw_charge > 0) {
            $charge = ($request->amount * $withdraw_charge) / 100;
        }
// $td = Carbon::today();
// $wd = Withdrawal::where('user_id', Auth::id())
// ->whereDate('created_at', $td)
//     ->first();

// if ($wd) {
//     return redirect()->back()->with('error', 'Maksimal penarikan 1x perhari');
// }


//gateway Jayapay by Bigboss99
        if ($request->amount <= $user->balance) {
            if ($request->amount >= $minimum_withdraw) {
                if ($request->amount <= $maximum_withdraw) {
                    
                    $amt = (int)$request->amount;
                    $merchantCode  = "S820240605190855000014";
                    $money = (int)($request->amount - $charge);
                    $orderNum  = "XP".mt_rand(1000000000000, 9999999999999);
                    $method1  = "Transfer";
                    $orderType   = '0';
                    $feeType   = '1';
                    $bankCode   = (string)$account->bankCode;
                    $number   = Auth::user()->gateway_number;
                    $dateTime = date("YmdHis",time());
                    $email = auth()->user()->email?auth()->user()->email:'test@test.com';
                    $phone = auth()->user()->phone;
                    $name = Auth::user()->phone;
                    $notifyUrl  = route('payout.jayapay.webhook');
                    $sign = '';
                    

                    $params = array(
                        'merchantCode' => $merchantCode,
                        'orderType' => $orderType,
                        'method' => $method1,
                        'orderNum' => $orderNum,
                        'money' => $money,
                        'feeType' => $feeType,
                        'bankCode' => $bankCode,
                        'number' => $number,
                        'name' => $name,
                        'email' => $email,
                        'mobile' => $phone,
                        'notifyUrl' => $notifyUrl,
                        'dateTime' => $dateTime,
                        'description' => "test cash",
                    );

                    ksort($params);
                    $params_str = '';
                    foreach ($params as $key => $val) {
                        $params_str = $params_str . $val;
                    }
                    
                    $sign = $this->pivate_key_encrypt($params_str);

                    $params['sign'] = $sign;

                    $params_string = json_encode($params);
                    $url = 'https://openapi.jayapayment.com/gateway/cash';
                    $ch = curl_init();

                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $params_string);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                        'Content-Type: application/json',
                        'Content-Length: ' . strlen($params_string))
                    );
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

                    //execute post
                    $request = curl_exec($ch);
                    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

                    $result = json_decode($request, true);
                      Log::info($result);
                    if ($httpCode == 200 && $result['platRespCode'] != 'FAIL') {

                        //Update User Balance
                        $balance = $user->balance - $amt;
                        User::where('id', $user->id)->update([
                            'balance' => $balance,
                        ]);

                        $balance = (int)($amt - $charge);
                        $name = 'Test';
                        $pBankCode = (string)$account->bankCode;

                        $withdrawal = new Withdrawal();
                        $withdrawal->user_id = $user->id;
                        $withdrawal->number = $user->gateway_number;
                        $withdrawal->amount = $amt;
                        $withdrawal->currency = 'Indonesia';
                        $withdrawal->charge = $charge;
                        $withdrawal->platOrderNum = $result['platOrderNum'];
                        $withdrawal->oid = $orderNum;
                        $withdrawal->final_amount = $amt - $charge;
                        $withdrawal->status = 'pending';

                        //User Ledger
                        if ($withdrawal->save()) {
                            $ledger = new UserLedger();
                            $ledger->user_id = $user->id;
                            $ledger->withdraw_id = $withdrawal->id;
                            $ledger->reason = 'penarikan_permintaan';
                            $ledger->perticulation = 'Withdraw sedang diproses';
                            $ledger->amount = $amt;
                            $ledger->debit = $amt - $charge;
                            $ledger->status = 'pending';
                            $ledger->date = date('d-m-Y H:i');
                            $ledger->save();
                        }
                        Session::put('custom_token', $custom_token);
                        return redirect()->back()->with('success', 'Permintaan penarikan berhasil!');
                    } else {
                        return back()->with('success', 'Server Error');
                    }
                } else {
                    
                        //Update User Balance
                        $balance = $user->balance - $request->amount;
                        User::where('id', $user->id)->update([
                            'balance' => $balance,
                        ]);

                        $balance = (int)($request->amount - $charge);
                        $orderId = "X".mt_rand(1000000000000, 9999999999999);
                        $name = 'Test';
                        $pBankCode = (string)$account->bankCode;

                        $withdrawal = new Withdrawal();
                        $withdrawal->user_id = $user->id;
                        $withdrawal->number = $user->gateway_number;
                        $withdrawal->amount = $request->amount;
                        $withdrawal->currency = 'Indonesia';
                        $withdrawal->charge = $charge;
                        $withdrawal->oid = $orderId;
                        $withdrawal->final_amount = $request->amount - $charge;
                        $withdrawal->status = 'pending';

                        //User Ledger
                        if ($withdrawal->save()) {
                            $ledger = new UserLedger();
                            $ledger->user_id = $user->id;
                            $ledger->withdraw_id = $withdrawal->id;
                            $ledger->reason = 'penarikan_permintaan';
                            $ledger->perticulation = 'Withdraw sedang diproses';
                            $ledger->amount = $request->amount;
                            $ledger->debit = $request->amount - $charge;
                            $ledger->status = 'pending';
                            $ledger->date = date('d-m-Y H:i');
                            $ledger->save();
                        }
                        return redirect()->back()->with('success', 'Permintaan penarikan berhasil!');
                }
            } else {
                return back()->with('error', 'Minimum Withdraw ' . price($minimum_withdraw));
            }
        } else {
            return back()->with('error', 'Saldo tidak cukup.');
        }
    }


    public function withdrawConfirmSubmitUSDT(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'amount' => 'required|numeric'
        ]);
        if ($validate->fails()) {
            return back()->with('error', $validate->errors());
        }

        if (!Auth::user()->usdt_password || !Auth::user()->usdt_number || !Auth::user()->usdt_name) {
            return back()->with('success', 'Please setup your bank');
        }

        if (Auth::user()->usdt_password != $request->password) {
            return back()->with('success', 'This password not match');
        }

        $user = Auth::user();

        if ($request->amount <= $user->balance) {
            if (($request->amount / setting('rate')) >= setting('minimum_withdraw_usdt')) {
                if (($request->amount / setting('rate')) <= setting('maximum_withdraw_usdt')) {
                    $charge = 0;
                    if (setting('withdraw_charge') > 0) {
                        $charge = setting('withdraw_charge_usdt');
                    }

                    //Update User Balance
                    $balance = $user->balance - $request->amount;
                    User::where('id', $user->id)->update([
                        'balance' => $balance
                    ]);

                    //Withdraw
                    $withdrawal = new Withdrawal();
                    $withdrawal->payment_method_id = Auth::user()->gateway_method;
                    $withdrawal->user_id = $user->id;
                    $withdrawal->number = Auth::user()->usdt_number;
                    $withdrawal->amount = $request->amount;
                    $withdrawal->usdt = ($request->amount / setting('rate')) - $charge;
                    $withdrawal->currency = 'Bangladesh';
                    $withdrawal->charge = $charge;
                    $withdrawal->final_amount = 0;
                    $withdrawal->status = 'pending';

                    //User Ledger
                    if ($withdrawal->save()) {
                        $ledger = new UserLedger();
                        $ledger->user_id = $user->id;
                        $ledger->reason = 'withdraw_request';
                        $ledger->perticulation = 'Your withdraw request status is pending please wait for admin approval or communication with us.';
                        $ledger->amount = $request->amount;
                        $ledger->is_usdt = 'yes';
                        $ledger->debit = $request->amount - $charge;
                        $ledger->status = 'pending';
                        $ledger->date = date('d-m-Y H:i');
                        $ledger->save();
                    }
                    return back()->with('success', 'Withdraw request send successfully. Please wait for admin approval.');
                    return response()->json(['status' => true, 'message' => 'Withdraw request send successfully. Please wait for admin approval.']);
                } else {
                    return back()->with('error', 'Withdraw amount must be less then ' . setting('maximum_withdraw'));
                    return response()->json(['status' => false, 'message' => 'Withdraw amount must be less then ' . $payment->maximum_withdraw_usdt]);
                }
            } else {
                return back()->with('error', 'Withdraw amount must be greater then ' . setting('maximum_withdraw'));
                return response()->json(['status' => false, 'message' => 'Withdraw amount must be greater then ' . $payment->minimum_withdraw_usdt]);
            }
        } else {
            return back()->with('error', 'Your sufficient balance is low.');
            return response()->json(['status' => false, 'message' => 'Your sufficient balance is low.']);
        }
    }

    public function withdrawPreview()
    {
        $withdraws = Withdrawal::with('payment_method')->where('user_id', Auth::id())->orderByDesc('id')->get();
        return view('app.main.withdraw.withdraw-preview', compact('withdraws'));
    }


    public function sign($param, $salt)
    {
        $data = $param;
        ksort($data);

        $str = "";
        foreach ($data as $key => $value) {
            $str = $str . $value;
        }
        $str = $str . $salt;
        return md5($str);
    }

   //private Key by Bigboss99 
    public function  pivate_key_encrypt($data)
    {
        $key = 'MIIEvgIBADANBgkqhkiG9w0BAQEFAASCBKgwggSkAgEAAoIBAQDHu0gMz+qDZAoS+7Ud2NWTYwnqXuywYFRONd0rioMnaF1wBz5XY+nE4AV09Alti8I3/NbLPbImlq5AqjkDYttdPid+Q7b9ID6jKGusymitQKXN1EQsQLnWBrRCYwwFiTn4G5Jhdvz6IHPkuEJV79VvS5H3jmJLJzPz88InEsv1IKTIedfilwbLqbT4zW349Bn/ZkvAJNC0nLylHAVh3m4S4NNtu54jJFubsMlRa7bsdrc5yItvaatrSRYCDz9IGmMS6lGPXMUC/ACdZrRbAT5vchvimd7GmnI4Zl3EDRz2aZekOBZvBpksaVyY0AmwfedUU4U+/Cf1YKE9jMrclJxjAgMBAAECggEALCod2vNopEgNMDhnSqPFSjNmoGQAC1opmiev8a5NpPufWaPIZbOKoAV3P26s3QO/3Ph0GHnaeEzuWA8rzzNfVUVmnzVi86LbJuHLuWgCcHjwkMxkjLJ9RTWzS1CyelDnOBUEr7eLZdWiOsuBo5YGSHdZ3fcmhf6zrrhSUKiH3/pE7XSeI6OinosP29pMfifrWcQIaeojgTlXOyKzQi4FUb8Vk5w3I10pwr6ROMvFDx0z78Bikwu63mDPwgTiYFd1iUtvl8Yw6aL8/5Bp9BPqownShYik0lHZJOu4sDnScHji2nqbTIZJ9OdOy/q3CX9M5h7ydNpGWDqKC7rOcqP6kQKBgQDNRuytkosvsg7et+CQTy+GZmtXXfECnnlZkON33ZsJWEFvL7xrPqGYFbnfseRugTibh8sngbhUCmZvO8yCzxiWwHK+M0/wDND+3hwuAFOCMbt94j2fTYz7Yz6ErwIN2E9k+uUaCo314TWIQYjEwV9bpb50rmwrpdddQn8Mqem+cQKBgQD5FZHxL8i98zJfoY/OfUCWpEDBvMpO05GDxPu/+vh93MEOba4Ht3ebFGeaAc1LP1kVIiI8IRgTo1lF6JUReaeb4zpOAoQmf/g+F3zhTio4cry18xcyKZuTPi352kmXlB626rI3QrF1mTVxO3R5niS2dd6s88th57NE8pFo6yQaEwKBgQCvZUODR2xv82crO9e/1jkYUFi1TMpKX5f2RItnds0qneNDGnmW9Ovj4+Ru0zQIi5cPpWabOgaCoGRH9MNYnZU38fXYuEU8KedFbgiL8bFo1A+MjwvyGrQ0c+cOPe62X7Xu5UVuC8iiZ6xy4PP4kfVlfGgQkJxSayBqSg/+hQv4sQKBgQDRaq01FnO0IBAuDuuVNAFlpds8B7of5AjnvGnc0uixCTTXKKe0nS/WFqWz+efcZ/pBpl0aKMjRWfjoqc8Kzjl4+uY+SCdLJzRTH/RCiTE+HFlEsIjEB+9hMFn/QuO0qTfZmiEUDOKeeJ1SAia/SZKcRSVeS+qm+eLjCP3wNCI6OQKBgBICqR0FL3LXRykZ4GSLm6qiWOgH/Engob/ADrZAYlHvRHG9VUKqK78wYJGelFSBtclRXVb0zEtqDZT8U/qwQZM4QAi70YWJQpUqAB+MKysrgZmnklSWipcAdjyX9/jMPDyyORfMSsM5YVEu50woRWXj7e8mkra9LTpJGfoAtmXt';
        $pivate_key = '-----BEGIN PRIVATE KEY-----'."\n".$key."\n".'-----END PRIVATE KEY-----';

        $pi_key = openssl_pkey_get_private($pivate_key);

        $crypto = '';
        foreach (str_split($data, 117) as $chunk) {
            openssl_private_encrypt($chunk, $encryptData, $pi_key);
            $crypto .= $encryptData;
        }

        return base64_encode($crypto);
     }
  

  //public key by Bigboss99
     public function  public_key_decrypt($data)
    {
        $key = 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAx7tIDM/qg2QKEvu1HdjVk2MJ6l7ssGBUTjXdK4qDJ2hdcAc+V2PpxOAFdPQJbYvCN/zWyz2yJpauQKo5A2LbXT4nfkO2/SA+oyhrrMporUClzdRELEC51ga0QmMMBYk5+BuSYXb8+iBz5LhCVe/Vb0uR945iSycz8/PCJxLL9SCkyHnX4pcGy6m0+M1t+PQZ/2ZLwCTQtJy8pRwFYd5uEuDTbbueIyRbm7DJUWu27Ha3OciLb2mra0kWAg8/SBpjEupRj1zFAvwAnWa0WwE+b3Ib4pnexppyOGZdxA0c9mmXpDgWbwaZLGlcmNAJsH3nVFOFPvwn9WChPYzK3JScYwIDAQAB';
        $public_key = '-----BEGIN PUBLIC KEY-----'."\n".$key."\n".'-----END PUBLIC KEY-----';
        $data = base64_decode($data);
        $pu_key =  openssl_pkey_get_public($public_key);
        $crypto = '';
        foreach (str_split($data, 128) as $chunk) {
            openssl_public_decrypt($chunk, $decryptData, $pu_key);
            $crypto .= $decryptData;
        }

        return $crypto;
    }
}
