<?php

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

if (!function_exists('findUser')) {
    function findUser($info = true, $id = null, $parameter = 'id')
    {
        if($id == null){
            $id = Auth::id();
        }
        if (empty($id)) {
            $output = 'تعریف نشده است';
        } else {
            $user = User::where('id', $id)->first();
            if ($user != null) {
                if ($info) {
                    $output = $user->name . ' ' . $user->family;
                } else {
                    $output = $user->$parameter;
                }
            } else {
                $output = 'تعریف نشده است';
            }
        }
        return $output;
    }
}

if (!function_exists('UploadImg')) {
    function UploadImg($file , $name)
    {
        if ($file) {
            $filename = time() . $file->getClientOriginalName();
            $year = Carbon::now()->year;
            $month = Carbon::now()->month;
            $path = "uploads/{$name}/{$year}/{$month}/";
            $file->move($path, $filename);
            $img = "/uploads/{$name}/{$year}/{$month}/" . $filename;
            return $img;
        }
    }
}

if (!function_exists('generateRandom')) {
    function generateRandom($len=10)
    {
        $number = range("0" , "9");
        $password = "";
        for($i = 0; $i <= $len; $i++)
        {
            $password .= $number[rand(0 , count($number) -1)];
        }
        return $password;
    }
}