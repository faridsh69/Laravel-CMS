<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public $token_url = 'https://login.microsoftonline.com/common/oauth2/v2.0/token';

    public $job_site_id = 'synergypwr.sharepoint.com,868540ab-27ec-4031-a26e-36622c72c1d5,1c21c8e7-b6ad-4ad4-9a70-db351751f178';

    public $folder_id = '01G2WUFWH43SLT2MFNSJDKSESHA7VXYKWI';

    public $image_coded_full = 'data:image/jpeg;base64,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';

    public function __construct()
    {
        if(config('app.name') !== 'eric'){
            return 1;
        }
    }

    public function getNewJob()
    {
        return view('front.test.new-job');
    }

    public function postNewJob(Request $request)
    {
        // folder ID that needs to upload image into it.
        $folder_id = $request->input('parentId');
        $image_name = $request->image->getClientOriginalName();
        $image_data = base64_encode(file_get_contents($request->file('image')));

        $this->getUploadImage($image_data, $image_name, $folder_id);

        return redirect()->route('front.test.new-job');
    }

    public function call_curl($url, $method, $body, $authorization = null)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);

        if($method === 'POST'){
           curl_setopt($ch, CURLOPT_POST, 1);
        }
        elseif($method === 'PUT'){
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        }
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        if($authorization){
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
                'accept: application/json',
                $authorization,
            ]);
        }

        $output = curl_exec($ch);
        curl_close($ch);

        return $output;
    }

    public function getAccessToken()
    {
        $access_token_body_urlencode =
            'client_id=1c797945-49d2-4959-a874-800e0017f98f&scope=user.read&grant_type=refresh_token&client_secret=0M8GkVZB3j8RrsMcnuTjc7gzFYNWlGMIyZaMxpBeHEQ%3D&redirect_uri=http%3A%2F%2Flocalhost%2F&refresh_token=OAQABAAAAAADCoMpjJXrxTq9VG9te-7FX0Tt-gsgqjHuxmdYM3qT4Vbk3b6nz0Cv6TfC14RJuKQbez6sFfYFEKSBwP2-K9D7n8Dd9FMWggerNtI8i7TAmecSFdo-JxxKZKtqw-vscjl0X_tb3cju8bAHP_EUhEake9BlPpkaIDZJOeomlUltAbFAaZDdcA8wbgWojhAu5YeKplxSV-7RpDUQDQAxz08Ga6JkRYoWsJFn9knIgFlV_bnDmlv7Aq4EKCX8TtQ9tP0aix2afGLb9mA7QrBLngAaJYrQRXDlqNr36yF8QNRYOyeehSIFa23-fx9F-D9y-kASjKDpDdFZAhi0KmMiKLSr2jQ5MGgcRPh0Et891qHGoKJhYZEiV62-jaTfctGHqWxfhw4cRvA-z_rBklhLA0fRn9XRiucz7BsFIKY5wOVxF7uKt93HWmjXh1lQotTlFCXdbdR-cZID9lm6L5O2TD56FPsj0oYTz3MO0LhMNsr8EsGsXgqhp2gkB6wRoOef-EqLa1BCZ9WdTztuRdshYcJg5roJbZqn1gfUB485OPVsabLW1CqaYaBmLHhZyUAqh_sALqkkO3WMVKtcSq4hWSVLsbYD_8h8tnwRnCFdmz77OnmaZV51z5E6zqfzF3vZJvo79f0FzaJuNW0T7zdLnQ6kSgVcikmj5G4U8p6sfoVjehzqmsjwx1_opW9vI0aEa8xt3SF_f6zLC1MUihXfAM75NVFwdqXWMk3B663VVwTg2Ok5wuF7jw866F7FAh7uaq_a6PrziFeDTmkpugsUqw8Q1UcfylhP3yvIwfTKibRH5BSdjItY_uaWihAbvImAHtRqi62AhyKg7Po3lx6wB-ZyaIAA';

        $server_output_token = $this->call_curl(
            $this->token_url,
            'POST',
            $access_token_body_urlencode
        );
        dd($server_output_token);

        return json_decode($server_output_token);
        return json_decode($server_output_token)->access_token;
    }

    public function getUploadImage($image_coded_full, $file_name, $folder_id)
    {
        // get access token for header
        $access_token = $this->getAccessToken();
        $authorization = 'Authorization: Bearer ' . $access_token;

        $url_upload_image_part_1 = 'https://graph.microsoft.com/beta/sites/' .
            $this->job_site_id .
            '/drive/items/';

        $url_upload_image_part_2 = $folder_id .
            ':/' .
            $file_name .
            ':/content';

        $url_upload_image = $url_upload_image_part_1 . $url_upload_image_part_2;

        // list($format, $data_with_base64) = explode(';', $image_coded_full);
        // list(, $base64)      = explode(',', $data_with_base64);

        // convert from base64 to image
        $data_upload_image = base64_decode($image_coded_full, true);

        $server_output_upload = $this->call_curl(
            $url_upload_image,
            'PUT',
            $data_upload_image,
            $authorization
        );

        return json_decode($server_output_upload);
    }

    public function getParameter(Request $request)
    {
        return view('front.test.url-parameter');
    }

    public function getThankYou(Request $request)
    {
        if($request->input('email')){
            return redirect()->route(
                'front.test.thank-you',
                ['client_id'=> rand(10000, 99999)]
            );
        }

        return view('front.test.thank-you');
    }

    public function getRedirected()
    {
        return view('front.test.redirected');
    }

    // public function getTest()
    // {
    //     $data_full = 'data:image/jpeg;base64,/9';

    //     list($format, $data_with_base64) = explode(';', $data_full);
    //     list(, $base64)      = explode(',', $data_with_base64);
    //     $image = base64_decode($base64);

    //     file_put_contents('/xxxxxx.jpg', $image);
    //     return view('front.page.test');
    // }

                // $access_token_body = [
        //     "client_id" => "1c797945-49d2-4959-a874-800e0017f98f",
        //     "scope" => "user.read",
        //     "grant_type" => "refresh_token",
        //     "client_secret" => "0M8GkVZB3j8RrsMcnuTjc7gzFYNWlGMIyZaMxpBeHEQ=",
        //     "redirect_uri" => "http://localhost/",
        //     "refresh_token" => $this->refresh_token,
        // ];

        // $access_token_header = [
        //     'Content-Type' => 'application/x-www-form-urlencoded'
        // ];

        // public $refresh_token =
    // 'OAQABAAAAAADCoMpjJXrxTq9VG9te-7FX0Tt-gsgqjHuxmdYM3qT4Vbk3b6nz0Cv6TfC14RJuKQbez6sFfYFEKSBwP2-K9D7n8Dd9FMWggerNtI8i7TAmecSFdo-JxxKZKtqw-vscjl0X_tb3cju8bAHP_EUhEake9BlPpkaIDZJOeomlUltAbFAaZDdcA8wbgWojhAu5YeKplxSV-7RpDUQDQAxz08Ga6JkRYoWsJFn9knIgFlV_bnDmlv7Aq4EKCX8TtQ9tP0aix2afGLb9mA7QrBLngAaJYrQRXDlqNr36yF8QNRYOyeehSIFa23-fx9F-D9y-kASjKDpDdFZAhi0KmMiKLSr2jQ5MGgcRPh0Et891qHGoKJhYZEiV62-jaTfctGHqWxfhw4cRvA-z_rBklhLA0fRn9XRiucz7BsFIKY5wOVxF7uKt93HWmjXh1lQotTlFCXdbdR-cZID9lm6L5O2TD56FPsj0oYTz3MO0LhMNsr8EsGsXgqhp2gkB6wRoOef-EqLa1BCZ9WdTztuRdshYcJg5roJbZqn1gfUB485OPVsabLW1CqaYaBmLHhZyUAqh_sALqkkO3WMVKtcSq4hWSVLsbYD_8h8tnwRnCFdmz77OnmaZV51z5E6zqfzF3vZJvo79f0FzaJuNW0T7zdLnQ6kSgVcikmj5G4U8p6sfoVjehzqmsjwx1_opW9vI0aEa8xt3SF_f6zLC1MUihXfAM75NVFwdqXWMk3B663VVwTg2Ok5wuF7jw866F7FAh7uaq_a6PrziFeDTmkpugsUqw8Q1UcfylhP3yvIwfTKibRH5BSdjItY_uaWihAbvImAHtRqi62AhyKg7Po3lx6wB-ZyaIAA';

        // $dataUploadImage = json_encode('data:image/jpeg;base64,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');

        //     $dataUploadImage = json_encode('data:image/jpeg;base64,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');

        // $ch_upload = curl_init();
        // curl_setopt($ch_upload, CURLOPT_URL, $url_upload_image);
        // curl_setopt($ch_upload, CURLOPT_CUSTOMREQUEST, "PUT");
        // curl_setopt($ch_upload, CURLOPT_POSTFIELDS, $dataUploadImage);
        // curl_setopt($ch_upload, CURLOPT_HTTPHEADER, [
        //     'Content-Type: application/json',
        //     'accept: application/json',
        //     $authorization
        // ]);

        // $server_output_upload = curl_exec($ch_upload);
        // curl_close ($ch_upload);

        // dd($server_output_upload);

        // $client = new \GuzzleHttp\Client();

        // $response = $client->request(
        //     'POST',
        //     $this->token_url,
        //     ['form_params' => $access_token_body]
        // );
        //  $statusCode = $response->getStatusCode();
        // $content = $response->getBody();

        // dd($client, $content, $statusCode, $response);

        // $client = new \GuzzleHttp\Client([
        //     'base_url' => [$this->token_url, []],
        //     'defaults' => [
        //          // 'auth' => [$publishable_key, ''],
        //          'headers'  => $access_token_header,
        //          'body' => $access_token_body_urlencode,
        //     ],
        // ]);

        // $response = $client->request('POST', $this->token_url);
        // $client = new \GuzzleHttp\Client();
        // $client->setDefaultOption('headers', $access_token_header);
        // $response = $client->post(
        //     $this->token_url,
        //     $access_token_body_urlencode
        // );
}
