<?php

namespace App\Enums;

use App\Services\BaseEnum;

final class BlockType extends BaseEnum
{
    const data = [
		'menu' => 'Menu',
		'header' => 'Header',
		'page_header' => 'Page Header',
		'main_featur' => 'Main Featurs',
		'featur' => 'Featurs',
		'introduce' => 'Introduce',
		'counting' => 'Counting',
		'testimonial' => 'Testimonial',
		'faq' => 'Frequenty Asked Questions',
		'video' => 'Video',
		'content' => 'Content',
		'products' => 'Products',
		'products' => 'Services',
		'partners' => 'Partners',
		'team' => 'Team',
		'pricing' => 'Pricing',
		'map' => 'Map',
		'subscribe' => 'Subscribe',
		'contact' => 'Contact',
		'footer' => 'Footer',
	];
}
