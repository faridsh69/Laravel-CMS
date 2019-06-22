<?php

namespace App\Enums;

use App\Base\BaseEnum;

final class BlockType extends BaseEnum
{
    const data = [
		'menu' => 'menu',
		'header' => 'header',
		'slider' => 'slider',
		'featurs' => 'featurs',
		'counting' => 'counting',
		'products' => 'products',
		'content' => 'content',
		'video' => 'video',
		'pricing' => 'pricing',
		'feedback' => 'feedback',
		'team' => 'team',
		'partners' => 'partners',
		'subscribe' => 'subscribe',
		'map' => 'map',
		'contact' => 'contact',
		'footer' => 'footer',
	];
}
