<?php

namespace App\Notifications\Channels;

use App\Services\BaseChannel;
use Log;
use SoapClient;

class SmsChannel extends BaseChannel
{
	public function send($notifiable, $notification)
	{
        $phone = $notifiable->phone;
        $message = $notification->sms_message;
        $sender = config('sms.sender');
        $api_key = config('sms.api_key');
        $driver = config('sms.driver');

        if($driver === 'kavenegar'){
            try{
                $kavenegar_api = new \Kavenegar\KavenegarApi($api_key);
                $kavenegar_api->Send($sender, $phone, $message);
            }catch(\Kavenegar\Exceptions\ApiException $e){
                Log::error([
                    'error' => $e->errorMessage(),
                    'phone' => $phone,
                    'message' => $message,
                    'sender' => $sender,
                    'api_key' => $api_key,
                    'driver' => $driver,
                ]);
            }
            catch(\Kavenegar\Exceptions\HttpException $e){
                Log::error([
                    'error' => $e->errorMessage(),
                    'info' => 'در زمانی که مشکلی در برقرای ارتباط با وب سرویس وجود داشته باشد این خطا رخ می دهد',
                    'phone' => $phone,
                    'message' => $message,
                    'sender' => $sender,
                    'api_key' => $api_key,
                    'driver' => $driver,
                ]);
            }
        }
        elseif($driver === 'raygansms')
        {
            $url = "http://smspanel.trez.ir/api/smsAPI/SendMessage";
            $post_data = json_encode(array(
                'PhoneNumber' => $sender,
                'Message' => $message,
                'Mobiles' => [$phone],
                'UserGroupID' => uniqid(),
                'SendDateInTimeStamp' => time(),
            ));

            $curl_service = new \App\Services\CurlService();
            $raygansms_api = $curl_service->call_curl($url, 'POST', $post_data, null, $api_key);
            $result = json_decode($raygansms_api, true);
            if(is_null($result) || $result['Code'] != 0){
                Log::error([
                    'error' => $raygansms_api,
                    'info' => 'نام کاربری یا کلمه عبور صحیح نمی باشد',
                    'phone' => $phone,
                    'message' => $message,
                    'sender' => $sender,
                    'api_key' => $api_key,
                    'driver' => $driver,
                ]);
            }
        }
    }
}
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

