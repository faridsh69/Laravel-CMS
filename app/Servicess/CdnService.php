<?php

namespace App\Services;

use Illuminate\Support\ServiceProvider;
use App\Models\Blog;
use Config;

class CdnService
{
	public static function asset($url)
	{
		return rtrim(Config::get('app.cdn.url'), "/") . "/" . ltrim( $url, "/");
	}

	// public function cdnUrl()
	// {
	// 	// @TODO put it in settings
	//	return Config::get('app.cdn.url');
	// 	return 'cdn-eric.com';
	// }

	// public static function asset( $asset ){

	//     // Verify if KeyCDN URLs are present in the config file
	//     if( !Config::get('app.cdn') )
	//         return asset( $asset );

	//     // Get file name incl extension and CDN URLs
	//     $cdns = Config::get('app.cdn');
	//     $assetName = basename( $asset );

	//     // Remove query string
	//     $assetName = explode("?", $assetName);
	//     $assetName = $assetName[0];

	//     // Select the CDN URL based on the extension
	//     foreach( $cdns as $cdn => $types ) {
	//         if( preg_match('/^.*\.(' . $types . ')$/i', $assetName) )
	//             return "//" . rtrim($cdn, "/") . "/" . ltrim( $asset, "/");
	//     }

	//     // In case of no match use the last in the array

	//     end($cdns);
	//     return cdnPath( key( $cdns ) , $asset);

	// }

	// public function cdnPath($cdn, $asset) {
	//     return  "//" . rtrim($cdn, "/") . "/" . ltrim( $asset, "/");
	// }
}