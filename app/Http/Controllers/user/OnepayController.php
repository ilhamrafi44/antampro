<?php

namespace App\Http\Controllers\user;

use App\Models\Usdt;
use App\Models\User;
use App\Models\Deposit;
use App\Models\UserLedger;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class OnepayController extends Controller
{
    public function index()
    {
        return view('app.main.recharge.index');
    }
    public function recharge_record()
    {
        $category = 'https://nicepay.fun';
        $pending_funds = UserLedger::where('reason', 'Deposit')->where('user_id', Auth::id())->where('status','pending')->where('url', 'LIKE', '%' . $category . '%')->get();

        if($pending_funds){
            foreach($pending_funds as $data){

                // payment check 

                $api_server = 'http://merchant.nicepay.pro';
                $app = "MCH11779";
                $key = "d7a3559bf7b8ee57dab365be49b23872";

                $param = array(
                    'app_key'=>$app,
                    'ord_id'=>$data->ord_id,
                );
                $param["sign"] = sign($param,$key);
                $ret_code = fetch_page_json($api_server."/api/recharge_query",$param);
                $payment_data = json_decode($ret_code,true);
                $ord_id = $data->ord_id;
                
                if($payment_data['err'] == 0 && $payment_data && $payment_data['status'] === 1){
                    if ($data->status == "pending") {

                        $user = User::find($data->user_id);
                        $user->balance += $data->amount;
                        $user->save();
            
                        $data->perticulation = 'Deposit anda berhasil disetujui.';
                        $data->status = 'approved';
                        $data->save();
        
                        $Deposit = Deposit::find($data->deposit_id);
                        $Deposit->status = 'approved';
                        $Deposit->save();
        
                    }
        
                }else if($payment_data['err'] == 0 && $payment_data && $payment_data['status']  == 0){
                    
                }else{
                    DB::table('nicepay_deposits')->where('ord_id', $ord_id)->update(['status' => 'CANCELED']);
                }
            }
        }

        return view('app.main.recharge.recharge_record');
    }

    public function paymentMethod($amount)
    {
        return view('app.main.recharge.payment-method', compact('amount'));
    }

    public function payment_confirm($amount, $payment_method)
    {
        $payment_method = PaymentMethod::where('name', $payment_method)->inRandomOrder()->first();
        if (!$payment_method){
            return back()->with('success', 'Method not available.');
        }

        return view('app.main.recharge.payment-confirm', compact('amount', 'payment_method'));
    }

    public function depositSubmit(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'amount' => 'required|numeric',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors());
        }

        $custom_token = $request->custom_token;
        if (Session::has('custom_token') && Session::get('custom_token') == $request->custom_token) {
           return redirect()->back()->with('error', 'Permintaan deposit sedang diproses');
        }
        
         if ((int)$request->amount < setting('minimum_deposit')) {
        return redirect()->back()->with('error', 'Minimal deposit Rp ' . number_format(setting('minimum_deposit')));
        }
        
         if ((int)$request->amount > setting('maximum_deposit')) {
        return redirect()->back()->with('error', 'Maksimum deposit Rp ' . number_format(setting('maximum_deposit')));
        }

        if(setting('nicepay')  == '1'){
            $method_name = 'NicePay';
        }else{
            $method_name = 'JayaPay';
        }

        $model = new Deposit();
        $model->user_id = Auth::id();

        $orderNum  = mt_rand(1000000000000, 9999999999999);
        $model->method_name = $method_name;
        $model->order_id = $orderNum;
        $model->transaction_id = $request->transaction_id;
        $model->amount = $request->amount;
        $model->final_amount = $request->amount;
        $model->date = date('d-m-Y H:i:s');
        $model->status = 'pending';
        $model->save();

        $deposit_id = $model->id;


        if($method_name == 'JayaPay'){
            // JayaPay Getway 
            $merchantCode  = "S820240605190855000014";
            $payMoney = (int)$request->amount;
            $method  = "";
            $orderType   = '0';
            $productDetail = 'Test Pay';
            $dateTime = date("YmdHis",time());
            $email = auth()->user()->email?auth()->user()->email:'test@test.com';
            $phone = auth()->user()->phone;
            $name = auth()->user()->phone?auth()->user()->phone:'Test';
            $notifyUrl  = route('deposit.jayapay.webhook');
            $expiryPeriod = 1440;
            $sign = '';

            $params = array(
                'merchantCode' => $merchantCode,
                'orderType' => $orderType,
                'method' => $method,
                'orderNum' => $orderNum,
                'payMoney' => $payMoney,
                'name' => "ADI INVEST",
                'email' => $email,
                'phone' => $phone,
                'notifyUrl' => $notifyUrl,
                'dateTime' => $dateTime,
                'expiryPeriod' => $expiryPeriod,
                'productDetail' => $productDetail
            );

            ksort($params);
            $params_str = '';
            foreach ($params as $key => $val) {
                $params_str = $params_str . $val;
            }

            $sign = $this->pivate_key_encrypt($params_str);

            $params['sign'] = $sign;

            $params_string = json_encode($params);
            $url = 'https://openapi.jayapayment.com/gateway/prepaidOrder';
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

            if ($httpCode == 200) {

                try {
                    session()->put('ord_id', $orderNum);
                    Session::put('custom_token', $custom_token);

                    $ledger = new UserLedger();
                    $ledger->user_id = Auth::id();
                    $ledger->reason = 'Deposit';
                    $ledger->perticulation = 'Percobaan deposit';
                    $ledger->amount = $payMoney;
                    $ledger->deposit_id = $deposit_id;
                    $ledger->debit = $payMoney;
                    $ledger->deduct_amount = Auth::user()->balance;
                    $ledger->url = $result['url'];
                    $ledger->ord_id = $orderNum;
                    $ledger->status = 'pending';
                    $ledger->date = date('y-m-d');
                    $ledger->save();

                } catch (\Exception $e) {
                    return back()->with('error', 'Kesalahan sistem, Silahkan segarkan halaman.');
                }

                return redirect()->intended($result['url']);
            } else {
                return back()->with('error', 'Tidak dapat memproses dibawah Rp 10,000');
            }
        }else if($method_name == 'NicePay'){
            // Nicepay Gateway
            $appKey = "MCH11779";
            $balance = (int)$request->amount;
            $orderId = $orderNum;
            $pMethod = "";
            $notifyUrl = route('deposit.nicepay.webhook');
            $redirectUrl = route('recharge.history.preview');
            $sign = '';

            $params = array(
                'app_key' => $appKey,
                'balance' => $balance,
                'ord_id' => $orderId,
                'p_method' => $pMethod,
                'notify_url' =>  $notifyUrl,
                'redirect' => $redirectUrl
            );

            $sign = $this->sign($params, 'd7a3559bf7b8ee57dab365be49b23872');

            $params['sign'] = $sign;

            $response = Http::withoutVerifying()
                ->withOptions(["verify" => false])
                ->withHeaders(['Content-Type' => 'application/json'])
                ->post("http://merchant.nicepay.pro/api/recharge", $params);

            if ($response->status() == 200 && $response->object()->err == 0) {

                try {

                    session()->put('ord_id', $orderNum);
                    Session::put('custom_token', $custom_token);

                    $ledger = new UserLedger();
                    $ledger->user_id = Auth::id();
                    $ledger->reason = 'Deposit';
                    $ledger->perticulation = 'Percobaan deposit';
                    $ledger->amount = $balance;
                    $ledger->deposit_id = $deposit_id;
                    $ledger->debit = $balance;
                    $ledger->deduct_amount = Auth::user()->balance;
                    $ledger->url = $response->object()->url;
                    $ledger->ord_id = $orderNum;
                    $ledger->status = 'pending';
                    $ledger->date = date('y-m-d');
                    $ledger->save();

                } catch (\Exception $e) {
                    return back()->with('error', 'Kesalahan sistem, Silahkan coba segarkan halaman kembali');
                }

                return redirect()->intended($response->object()->url);
            } else {
                return back()->with('error', 'Tidak dapat memproses transaksi dibawah Rp 10,000');
            }
        }
        
        return redirect()->route('user.recharge')->with('success', 'Deposit Success');
    }

    public function return_number($type)
    {
        $number = DB::table('payment_methods')->where('type', $type)->where('status', 'active')->inRandomOrder()->first();
        if ($number){
            $number = $number->number;
            return response()->json(['status'=> true, 'number'=> $number, 'message'=> $type. 'Available']);
        }else{
            return response()->json(['status'=> false, 'message'=> $type. 'Not processable']);
        }
    }

    public function amounviewer($amount)
    {
        $methods = PaymentMethod::where('status', 'active')->get()->unique('type');
        return view('app.main.recharge.onepay-method', compact('amount', 'methods'));
    }

    public function onepaytimeout()
    {
        return view('app.main.recharge.timeout');
    }

    public function onepaydetails()
    {
        $data = session()->get('onepay');
        if ($data['pay_method'] == 4){
            return view('app.main.recharge.order_cencle');
        }
        $method = PaymentMethod::where('id', $data['pay_method'])->first();

        $numbers = PaymentMethod::where('type', $method->type)->get()->pluck('number')->toArray();

        return view('app.main.recharge.onepaydetail', compact('data', 'numbers', 'method'));
    }

    public function onepaysubmit(Request $request)
    {
        $data = $request->all();
        session()->put('onepay', $data);
        return response()->json(['status'=> true]);
    }

    public function onePaydepositSubmit(Request $request)
    {
        $validate = Validator::make($request->all(), [
           'acc_acount' => 'required|numeric',
           'amount' => 'required|numeric',
            'oid' => 'required',
            'pay_method'=> 'required',
            'transaction_id'=> 'required'
        ], [
            'acc_acount.required'=> 'Account number mismatch',
            'oid.required'=> 'Order Id mismatch',
            'pay_method.required'=> "you can't select Payment method",
        ]);
        if ($validate->fails()){
            return back()->withErrors($validate->errors());
        }

        $method = PaymentMethod::find($request->pay_method);
        if ($method->minimum_recharge > 0 && $request->amount < $method->minimum_recharge){
            return "Recharge amount must be greater then ".$method->minimum_recharge;
        }
        if ($method->maximum_recharge > 0 && $request->amount > $method->maximum_recharge){
            return "Recharge amount must be less then ".$method->maximum_recharge;
        }

        $final_amount = 0;
        if ($method->recharge_charge > 0){
            $final_amount = ($method->recharge_charge * $request->amount) / 100;
        }

        $model = new Deposit();
        $model->user_id = Auth::id();
        $model->method_name = $method->name;
        $model->method_number = $method->number;
        $model->order_id = $request->oid;
        $model->transaction_id = $request->transaction_id;
        $model->number = $request->acc_acount;
        $model->amount = $request->amount;
        $model->charge_amount = $final_amount;
        $model->final_amount = $request->amount - $final_amount;
        $model->date = date('d-m-Y H:i:s');
        $model->status = 'pending';

        if ($model->save())
        {
            if (session()->has('onepay')){
                $data = [
                    'user_id'=> $model->user_id,
                    'order_id'=> $model->order_id,
                    'transaction_id'=> $model->transaction_id,
                    'number'=> $model->number,
                    'amount'=> $model->amount,
                    'charge_amount'=> $final_amount,
                    'final_amount'=> $request->amount - $final_amount,
                    'status'=> $model->status,
                ];
                session()->put('onepay', $data);
            }
            return response()->json(['status'=> true]);
        }
    }

    public function onepayDepositSuccess()
    {
        if (session()->has('onepay')){
            $data = session()->get('onepay');
        }else{
            $data = [];
        }
        return view('app.main.recharge.success', compact('data'));
    }

    public function usdt_deposit_submit(Request $request)
    {
        $model = new Usdt();
        $model->user_id = Auth::id();
        $model->amount = $request->usdt_amount;
        $model->save();
        return redirect()->route('user.onepay')->with('success', 'Success.');
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

    //private key by Bigboss99
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
