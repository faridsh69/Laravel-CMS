<?php

namespace App\Enums;

use App\Services\BaseEnum;

final class BlockType extends BaseEnum
{
    const data = [
		'menu' => 'Menu',
		'header' => 'Header',
		'breadcrumb' => 'Breadcrumb',
		'main_feature' => 'Main Features',
		'feature' => 'Features',
		'introduce' => 'Introduce',
		'counting' => 'Counting',
		'testimonial' => 'Testimonial',
		'faq' => 'Frequenty Asked Questions',
		'video' => 'Video',
		'content' => 'Content',
		'product' => 'Products',
		'service' => 'Services',
		'partner' => 'Partners',
		'blog' => 'Blogs',
		'team' => 'Team',
		'pricing' => 'Pricing',
		'map' => 'Map',
		'subscribe' => 'Subscribe',
		'contact' => 'Contact',
		'form' => 'Form',
		'footer' => 'Footer',
		'loading' => 'Loading',
	];
}
