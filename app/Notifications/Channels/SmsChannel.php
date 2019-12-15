<?php

namespace App\Notifications\Channels;

use App\Base\BaseChannel;
use Log;

class SmsChannel extends BaseChannel
{
	public function send($notifiable, $notification)
	{
        try{
            $message = $notification->data;
            $phone = $notifiable->phone;
            $api_key = config('sms.api_key');
            $sender = config('sms.sender');
            $kavenegar_api = new \Kavenegar\KavenegarApi($api_key);
            // $kavenegar_api->Send($sender, $phone, $message);
        }catch(\Kavenegar\Exceptions\ApiException $e){
            Log::error([
                'error' => $e->errorMessage(),
                'sender' => $sender,
                'phone' => $phone,
                'message' => $message,
                'api_key' => $api_key,
            ]);
        }
        catch(\Kavenegar\Exceptions\HttpException $e){
            Log::error([
                'error' => $e->errorMessage(),
                'info' => 'در زمانی که مشکلی در برقرای ارتباط با وب سرویس وجود داشته باشد این خطا رخ می دهد',
                'sender' => $sender,
                'phone' => $phone,
                'message' => $message,
                'api_key' => $api_key,
            ]);
        }
    }
}
