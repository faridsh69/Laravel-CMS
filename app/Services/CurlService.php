<?php

namespace App\Services;

class CurlService extends BaseService
{
    public function call_curl($url, $method = 'get', $body = null, $authorization = null, $user_password = null)
    {
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        if($method === 'POST'){
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $body);
        }
        else{
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        }

        if($authorization){
            curl_setopt($curl, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
                'accept: application/json',
                $authorization,
            ]);
        }

        if($user_password){
            curl_setopt($curl, CURLOPT_USERPWD, $user_password);
            curl_setopt($curl, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
            ]);
        }

        $output = curl_exec($curl);
        curl_close($curl);

        return $output;
    }
}
