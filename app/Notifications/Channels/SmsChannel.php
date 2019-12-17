<?php

namespace App\Notifications\Channels;

use App\Base\BaseChannel;
use Log;
use SoapClient;

class SmsChannel extends BaseChannel
{
	public function send($notifiable, $notification)
	{
        // ini_set("soap.wsdl_cache_enabled", "0");
        // $sms_client = new SoapClient('http://payamak-service.ir/SendService.svc?wsdl', array('encoding'=>'UTF-8'));

        // try {
        //     $parameters['userName'] = "mp.09120568203";
        //     $parameters['password'] = "262551";
        //     $parameters['fromNumber'] = "50001457619553";
        //     $parameters['toNumbers'] = array("09120568203");
        //     $parameters['messageContent'] = "سلا";
        //     $parameters['isFlash'] = false;
        //     $recId = array(0);
        //     $status = 0x0;
        //     $parameters['recId'] = &$recId ;
        //     $parameters['status'] = &$status ;
        //     echo $sms_client->SendSMS($parameters)->SendSMSResult;
        // } 
        // catch (Exception $e) 
        // {
        //     echo 'Caught exception: ',  $e->getMessage(), "\n";
        // }

        try{
            $message = $notification->sms_message;
            $phone = $notifiable->phone;
            $api_key = config('sms.api_key');
            $sender = config('sms.sender');
            $kavenegar_api = new \Kavenegar\KavenegarApi($api_key);
            $kavenegar_api->Send($sender, $phone, $message);
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
