<?php

namespace App\Services;

class CdnService
{
	public static function asset($url)
	{
		return rtrim(config('0-developer.cdn_url'), '/') . '/' . ltrim($url, '/');
	}
}
