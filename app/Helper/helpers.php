<?php

use App\Models\User;
use App\Models\Purchase;

if (!function_exists('main_root')) {
    function main_root()
    {
        return "public";
    }
}

if (!function_exists('admin_file_root')) {
    function admin_file_root()
    {
        return "public/admin";
    }
}

if (!function_exists('frontend_file_root')) {
    function frontend_file_root()
    {
        return "public/frontend";
    }
}


if (!function_exists('reason')) {
    function reason($data)
    {
        if($data == 'withdraw_approved'){
            $rd = 'Penarikan';
        }elseif($data == 'payment_approved'){
            $rd = 'Top up';
        }elseif($data == 'my_commission'){
            $rd = 'Profit harian';
        }elseif($data == 'Deposit'){
            $rd = 'Topup';
        }elseif($data == 'commission'){
            $rd = 'Bonus cashback';
        }elseif($data == 'Withdraw Berhasil'){
            $rd = 'Penarikan';
        }elseif($data == 'Deposit Berhasil'){
            $rd = 'Top up';
        }elseif($data == 'task_income'){
            $rd = 'Pendapatan Tugas';
        }elseif($data == 'purchase_package'){
            $rd = 'Paket Pembelian';
        }else{
            $rd = $data;
        }
        
        return $rd;
    }
}

if (!function_exists('admin')) {
    function admin()
    {
        return \Illuminate\Support\Facades\Auth::guard('admin');
    }
}

if (!function_exists('price')) {
    function price($price)
    {
        return str_replace("," , "" , setting('currency') . number_format($price, 2));
        $currency = 'Rp';
        return $currency . number_format($price, 2);
    }
}

if (!function_exists('user')) {
    function user()
    {
        return \Illuminate\Support\Facades\Auth::user();
    }
}

if (!function_exists('not_found_img')) {
    function not_found_img()
    {
        return 'public/common/img/404.png';
    }
}

if (!function_exists('success_redirect')) {
    function success_redirect($route, $type)
    {
        return redirect()->route($route)->with('success', "Item $type Successfully.");
    }
}

if (!function_exists('error_redirect')) {
    function error_redirect($route, $type, $message)
    {
        return redirect()->route($route)->with($type, $message);
    }
}


if (!function_exists('uploadImage')) {
    function uploadImage($true_II_false_normal, $request, $input, $dir, $w = null, $h = null, $oldInput = null)
    {
        $path = public_path(str_replace('/public/', '', $oldInput));
        if ($request->hasFile($input)) {
            if (File::exists($path)) {
                File::delete($path);
            }
        }

        if ($request->hasFile($input)) {
            $file = $request->file($input);
            $namewithextension = $file->getClientOriginalName(); //Name with extension 'filename.jpg'
            $name = explode('.', $namewithextension)[0]; // Filename 'filename'
            $extension = $file->getClientOriginalExtension();
            $file_name = time() . Str::random(3) . '.' . $extension;

            if ($true_II_false_normal) {
                $destinationPath = public_path($dir);
                $imgFile = Image::make($request->file($input)->getRealPath());
                $imgFile->resize($w, $h, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . '/' . $file_name);
            } else {
                $request->file($input)->move(public_path($dir), $file_name);
            }

            \Artisan::call('view:clear');
            \Artisan::call('cache:clear');
            $path = '/public/' . $dir . $file_name;
            return $path;
        }
        return null;
    }
}

if (!function_exists('deleteImage')) {
    function deleteImage($oldInput)
    {
        $path = public_path(str_replace('/public/', '', $oldInput));
        if (File::exists($path)) {
            File::delete($path);
        }
        return true;
    }
}

if (!function_exists('view_image')) {
    function view_image($imageName)
    {
        $mainUrl = env('IMAGE_VIEW_SET');
        if ($mainUrl == null) {
            $mainUrl = url('');
        }
        return $mainUrl . $imageName;
    }
}


if (!function_exists('createSlug')) {
    function createSlug($table_model, $title, $id = 0)
    {
        $slug = Str::slug($title);
        $allSlugs = getRelatedSlugs($table_model, $slug, $id);
        if (!$allSlugs->contains('slug', $slug)) {
            return $slug;
        }
        // Just append numbers like a savage until we find not used.
        for ($i = 1; $i <= 10; $i++) {
            $newSlug = $slug . '-' . $i;
            if (!$allSlugs->contains('slug', $newSlug)) {
                return $newSlug;
            }
        }
        throw new \Exception('Can not create a unique slug');
    }
}
//$object->slug = Helper::createSlug('\Category',$request->name);

if (!function_exists('getRelatedSlugs')) {
    function getRelatedSlugs($table_model, $slug, $id = 0)
    {
        $model_name = "App\Models" . $table_model;


        $data = $model_name::where('slug', 'like', $slug . '%')
            ->where('id', '<>', $id)
            ->get();
        return $data;
    }
}


if (!function_exists('setting')) {
    function setting($column)
    {
        $setting = \App\Models\Setting::select('id', "$column")->first();
        if ($setting) {
            $column = $setting->{$column};
        } else {
            $column = "Data Is Empty";
        }
        return $column;
    }
}


if (!function_exists('check_invested')) {
    function check_invested($id)
    {
        $invested = Purchase::where('user_id', $id)->where('status', 'active')->count();
        if($invested > 0){
            return "<span style='color:Green;'>Berhasil</span>";
        }else{
            return "<span style='color:red;'>Belum</span>";
        }
    }
}

if (!function_exists('total_investment')) {
    function total_investment($id)
    {
        $invested = Purchase::where('user_id', $id)->where('status', 'active')->sum('amount');
        return $invested;
    }
}


if (!function_exists('get_total_user_invest')) {
    function get_total_user_invest($id)
    {
        //First Level
        $first_level_users = User::where('ref_by', $id)->get();

        //Get Second Level
        $second_level_users_ids = [];
        foreach ($first_level_users as $element) {
            $users = User::where('ref_by', $element->id)->get();
            foreach ($users as $user){
                array_push($second_level_users_ids, $user->id);
            }
        }
        $second_level_users = User::whereIn('id', $second_level_users_ids)->get();

        //Get Third Level
        $third_level_users_ids = [];
        foreach ($second_level_users as $element) {
            $users = User::where('ref_by', $element->id)->get();
            foreach ($users as $user){
                array_push($third_level_users_ids, $user->id);
            }
        }
        $third_level_users = User::whereIn('id', $third_level_users_ids)->get();

        $first_ids = $first_level_users->pluck('id'); //first
        $second_ids = $second_level_users->pluck('id'); //Second
        $third_ids = $third_level_users->pluck('id'); //Third
        
        $totalDeposit1 = Purchase::whereIn('user_id', $first_ids->toArray())->whereIn('status', ['active', 'inactive'])->sum('amount');
        $totalDeposit2 = Purchase::whereIn('user_id', $second_ids->toArray())->whereIn('status', ['active', 'inactive'])->sum('amount');
        $totalDeposit3 = Purchase::whereIn('user_id', $third_ids->toArray())->whereIn('status', ['active', 'inactive'])->sum('amount');

        $totalDeposit = $totalDeposit1 ;
        return $totalDeposit;
    }
}


if (!function_exists('my_vips')) {
    function my_vips()
    {
        $purchaseVips = Purchase::where('user_id', \auth()->id())->where('status', 'active')->orderByDesc('id')->get();
        $vids = [];
        foreach ($purchaseVips as $el) {
            array_push($vids, $el->package_id);
        }
        return $vids;
    }
}

function translator($text)
{
    return $text;
}

function hourlyamount($validity, $amount)
{
    $calculate_amount = 0;
    if ($amount != 0){
        $calculate_amount = ($amount / $validity) / 24; //24=hour
    }

    return $calculate_amount;
}

function minimum_withdraw()
{
    return 100;
}

function maximum_withdraw()
{
    return 100000;
}

function withdraw_charge()
{
    return 10;
}

function usdt_rate()
{
    return 110;
}

function usdt_charge()
{
    return 2;
}


// Payment Gateway 

function fetch_page_json ($url, $params = null)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type:application/json;charset=UTF-8"]); 
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
    curl_setopt($ch, CURLOPT_URL, $url);

    $result = curl_exec($ch);
    $errno = curl_errno($ch);
    $errmsg = curl_error($ch);
    if ($errno != 0)
    {
        throw new Exception($errmsg, $errno);
    }
    curl_close($ch);
    return $result;
}

function sign($param,$salt){
    $data = $param;
    ksort($data);

    $str="";
    foreach ($data as $key => $value)
    {
        $str=$str.$value;
    }
    $str = $str.$salt;
    return md5($str);
}
?>
