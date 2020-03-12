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
		'content' => 'Content',
		'introduce' => 'Introduce',
		'video' => 'Video',
		'counting' => 'Counting',
		'product' => 'Products',
		'service' => 'Services',
		'pricing' => 'Pricing',
		'testimonial' => 'Testimonial',
		'faq' => 'Frequenty Asked Questions',
		'partner' => 'Partners',
		'team' => 'Team',
		'blog' => 'Blogs',
		'subscribe' => 'Subscribe',
		'map' => 'Map',
		'contact' => 'Contact',
		'footer' => 'Footer',
		'loading' => 'Loading',
		'form' => 'Form',
	];
}
