<?php 

namespace App\Base;

class BaseEnum 
{
	public static function getInstance($value)
	{
        $called_class = get_called_class();
        $enum_class = new $called_class;

		return $enum_class::data[$value];
	}
}
