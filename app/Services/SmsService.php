<?php

namespace App\Services;

use App\Base\BaseService;

class ImageService extends BaseService
{
    // public $
    private function sendActivationCode($phone, $password)
    {
        $user = User::where('mobile', $phone)->first();
        $message = config('sms.activation_code_message') . $password;

        $this->getSendSms($phone, $message);
    }

    public function send($phone, $message)
    {
        $api_key = config('sms.api_key');
        $sender = config('sms.sender');
        $api = new \Kavenegar\KavenegarApi($api_key);
        // dd($sender, $phone, $message);
        // $api->Send($sender,$phone,$message);

        // catch(\Kavenegar\Exceptions\ApiException $e){
        //     // در صورتی که خروجی وب سرویس 200 نباشد این خطا رخ می دهد
        //     echo 'در صورتی که خروجی وب سرویس 200 نباشد این خطا رخ می دهد';
        //     echo $e->errorMessage();
        // }
        // catch(\Kavenegar\Exceptions\HttpException $e){
        //     // در زمانی که مشکلی در برقرای ارتباط با وب سرویس وجود داشته باشد این خطا رخ می دهد
        //     echo 'در زمانی که مشکلی در برقرای ارتباط با وب سرویس وجود داشته باشد این خطا رخ می دهد';
        //     echo $e->errorMessage();
        // }
    }