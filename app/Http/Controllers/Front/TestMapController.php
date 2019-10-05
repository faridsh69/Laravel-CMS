<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use Str;

class TestMapController extends Controller
{
	// public function __construct()
 //    {
 //        if(config('app.name') !== 'map'){
 //            return 1;
 //        }
 //    }

	public function getOffline()
	{
		return view('front.test.map.offline');
	}

	public function getOfflineCity()
	{
		return view('front.test.map.offline-city');
	}

	public function getTitlesImages($zoom, $x, $y)
	{
		// return 1;
		// return \Redirect::to('/cdn/images/front/themes/4-windy/map/tiles/' . $zoom . '_' . $x . '_' . $y);
		return \Redirect::to('/cdn/images/front/themes/4-windy/map/tiles-windy/' . $zoom . '_' . $x . '_' . $y);
	}

	public function getTitlesLabels($zoom, $x, $y)
	{
		return \Redirect::to('/cdn/images/front/themes/4-windy/map/labels-windy/' . $zoom . '_' . $x . '_' . $y);
	}

	public function getUsersInfo()
	{
		return null;
	}

	public function getSedlinaGa($id)
	{
		return 'getSedlinaGa' . $id;
	}

	public function getNodeForecast($lat, $lng)
	{
		return null;
		return 'getNodeForecast' . $lat . $lng;
	}

	public function getForecastCitytile()
	{
		return null;
	}

	public function getNodeCapalerts($lat, $lng)
	{
		return 'getNodeCapalerts' . $lat . $lng;
	}

	public function getNodeGeoip()
	{
		return null;
	}

	public function getWindSurface()
	{
		return \Redirect::to('img/wind/wind-surface.jpg');
		// return "<img src ='http://www.eric.com/img/wind-surface.jpg'>";
		// return \File::get(storage_path() . '/app/public/wind-surface.jpg');
	}
}
