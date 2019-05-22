<?php

namespace App\Services;

use Config;

class CdnService
{
	public static function asset($url)
	{
		return rtrim(Config::get('app.cdn.url'), '/') . '/' . ltrim($url, '/');
	}
}