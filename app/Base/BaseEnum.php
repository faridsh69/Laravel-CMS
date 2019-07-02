<?php

namespace App\Base;

class BaseEnum
{
	public static function getInstance($value)
	{
        $called_class = static::class;
        $enum_class = new $called_class();

		return $enum_class::data[$value];
	}
}
