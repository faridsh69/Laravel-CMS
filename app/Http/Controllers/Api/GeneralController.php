<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function getVersion()
    {
        return '1.4.1';
    }

    public function getCountries()
    {
    	// $countries = Countries::where('name.common', '!=', '')
     //        ->pluck('name.common')
     //        ->toArray();

    	// $output = [
    	//     'data' => $countries,
    	// ];

    	return response()->json($output);
    }

    public function getCities($country_name)
    {
        // $dataa = \Config::get('constants.countries');

        // $country = Countries::where('name.common', ucfirst($country_name))
        //     ->first()
        //     ->toArray();

        // $output = [
        //     'data' => '',
        // ];
        // if($country){
        //     $cities  = $country->hydrate('cities')
        //         ->cities
        //         ->pluck('name');
        //     $output = [
        //         'data' => $cities,
        //     ];
        // }

        // return response()->json($output);
    }

    public function getUser(Request $request)
    {
    	return $request->user();
    }
}
