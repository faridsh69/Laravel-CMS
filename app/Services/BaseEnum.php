<?php

namespace App\Services;

class BaseEnum
{
	public static function getInstance($value)
	{
        $enumClass = static::class;
        $enumRepository = new $enumClass();

		return $enumRepository::data[$value];
	}
}
