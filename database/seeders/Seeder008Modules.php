<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;

final class Seeder008Modules extends Seeder
{
	public function run(): void
	{
		$laravelCmsFolder = storage_path() . config('cms.config.cms_files');

		$modules = [
			// Breadcrumb
			[
				'type' => 'breadcrumb',
				'image' => 'breadcrumb.png',
			],
			// Menu
			[
				'type' => 'menu',
				'title' => 'Home',
				'url' => '/',
			],
			[
				'type' => 'menu',
				'title' => 'About',
				'url' => 'about',
			],
			[
				'type' => 'menu',
				'title' => 'Products',
				'url' => 'product',
			],
			[
				'type' => 'menu',
				'title' => 'Basket',
				'url' => 'basket',
			],
			[
				'type' => 'menu',
				'title' => 'Job',
				'url' => 'job',
			],
			[
				'type' => 'menu',
				'title' => 'Blog',
				'url' => 'blog',
			],
			[
				'type' => 'menu',
				'title' => 'Contact',
				'url' => 'contact',
			],
			// Header
			[
				'type' => 'header',
				'title' => 'Header Title 1',
				'description' => 'Header Description 1',
				'url' => 'header-url-1',
				'image' => 'header-1.png',
			],
			[
				'type' => 'header',
				'title' => 'Header Title 2',
				'description' => 'Header Description 2',
				'url' => 'header-url-2',
				'image' => 'header-2.png',
			],
			[
				'type' => 'header',
				'title' => 'Header Title 3',
				'description' => 'Header Description 3',
				'url' => 'header-url-3',
				'image' => 'header-3.png',
			],

			// Main Feature
			[
				'type' => 'main_feature',
				'title' => 'Feature Title 1',
				'icon' => 'fa fa-book',
				'description' => 'Feature Description, Feature Description, Feature Description',
			],
			[
				'type' => 'main_feature',
				'title' => 'Feature Title 2',
				'icon' => 'fa fa-users',
				'description' => 'Feature Description, Feature Description, Feature Description',
			],
			[
				'type' => 'main_feature',
				'title' => 'Feature Title 3',
				'icon' => 'fa fa-phone', // ti-settings
				'description' => 'Feature Description, Feature Description, Feature Description',
			],
			// Feature
			[
				'type' => 'feature',
				'title' => 'Feature Title 1',
				'icon' => 'fa fa-cloud-upload',
				'description' => 'Feature Description, Feature Description, Feature Description',
			],
			[
				'type' => 'feature',
				'title' => 'Feature Title 2',
				'icon' => 'fa fa-language',
				'description' => 'Feature Description, Feature Description, Feature Description',
			],
			[
				'type' => 'feature',
				'title' => 'Feature Title 3',
				'icon' => 'fa fa-binoculars',
				'description' => 'Feature Description, Feature Description, Feature Description',
			],
			[
				'type' => 'feature',
				'title' => 'Feature Title 4',
				'icon' => 'fa fa-thumbs-o-up',
				'description' => 'Feature Description, Feature Description, Feature Description',
			],
			[
				'type' => 'feature',
				'title' => 'Feature Title 5',
				'icon' => 'fa fa-desktop',
				'description' => 'Feature Description, Feature Description, Feature Description',
			],
			[
				'type' => 'feature',
				'title' => 'Feature Title 6',
				'icon' => 'fa fa-tachometer',
				'description' => 'Feature Description, Feature Description, Feature Description',
			],
			// Introduce
			[
				'type' => 'introduce',
				'title' => 'Introduce Title',
				'description' => 'Introduce description',
				'content' => 'Introduce Content',
				'url' => 'introduce-url',
				'image' => 'introduce.png',
			],
			// Counting
			[
				'type' => 'counting',
				'title' => 'Courses Available',
				'description' => 130,
				'icon' => 'fa fa-book',
			],
			[
				'type' => 'counting',
				'title' => 'Developers',
				'description' => 339,
				'icon' => 'fa fa-users',
			],
			[
				'type' => 'counting',
				'title' => 'Online Students',
				'description' => 187,
				'icon' => 'fa fa-cloud-upload',
			],
			[
				'type' => 'counting',
				'title' => 'Projects',
				'description' => 37,
				'icon' => 'fa fa-tachometer',
			],
			// Products
			[
				'type' => 'product',
				'product_id' => 1,
			],
			[
				'type' => 'product',
				'product_id' => 2,
			],
			[
				'type' => 'product',
				'product_id' => 3,
			],
			[
				'type' => 'product',
				'product_id' => 4,
			],
			// Services
			[
				'type' => 'service',
				'image' => 'service-1.png',
			],
			[
				'type' => 'service',
				'image' => 'service-2.png',
			],
			[
				'type' => 'service',
				'image' => 'service-3.png',
			],
			[
				'type' => 'service',
				'image' => 'service-4.png',
			],
			[
				'type' => 'service',
				'image' => 'service-5.png',
			],
			// Pricing
			[
				'type' => 'pricing',
				'title' => 'Basic',
				'description' => '3.99$ per month',
				'content' => 'Basic features',
				'order' => 1,
			],
			[
				'type' => 'pricing',
				'title' => 'Standard',
				'description' => '9.99$ per month',
				'content' => 'Standard features',
				'order' => 2,
			],
			[
				'type' => 'pricing',
				'title' => 'Advanced',
				'description' => '19.99$ per month',
				'content' => 'Advanced features',
				'order' => 3,
			],
			// Testimonial
			[
				'type' => 'testimonial',
				'title' => '#13 Customer',
				'full_name' => 'Taylor Otwell',
				'description' => '“ I love this business! ”',
				'image' => 'testimonial-1.png',
			],
			[
				'type' => 'testimonial',
				'title' => 'Manager',
				'full_name' => 'Navid Ma',
				'description' => '“ I love this business! ”',
				'image' => 'testimonial-2.png',
			],
			[
				'type' => 'testimonial',
				'title' => '#4 Customer',
				'full_name' => 'Elizabeth Sm',
				'description' => '“ I love this business! ”',
				'image' => 'testimonial-3.png',
			],
			[
				'type' => 'testimonial',
				'title' => 'Chief Technology Officer',
				'full_name' => 'Farid Sh',
				'description' => '“ I love this business! ”',
				'image' => 'testimonial-4.png',
			],
			// FAQ
			[
				'type' => 'faq',
				'title' => 'What is the best benefit of laravel cms?',
				'description' => 'It is complete and very fast and easy to develop',
			],
			[
				'type' => 'faq',
				'title' => 'What is the best benefit of laravel cms??',
				'description' => 'It is complete and very fast and easy to develop',
			],
			[
				'type' => 'faq',
				'title' => 'What is the best benefit of laravel cms???',
				'description' => 'It is complete and very fast and easy to develop',
			],
			// Partner
			[
				'type' => 'partner',
				'image' => 'partner-1.png',
			],
			[
				'type' => 'partner',
				'image' => 'partner-2.png',
			],
			[
				'type' => 'partner',
				'image' => 'partner-3.png',
			],
			[
				'type' => 'partner',
				'image' => 'partner-4.png',
			],
			[
				'type' => 'partner',
				'image' => 'partner-5.png',
			],
			// Team
			[
				'type' => 'team',
				'title' => '#13 Customer',
				'full_name' => 'Taylor Otwell',
				'image' => 'team-1.png',
			],
			[
				'type' => 'team',
				'title' => 'Manager',
				'full_name' => 'Navid Ma',
				'image' => 'team-2.png',
			],
			[
				'type' => 'team',
				'title' => '#4 Customer',
				'full_name' => 'Elizabeth Sm',
				'image' => 'team-3.png',
			],
			[
				'type' => 'team',
				'title' => 'Chief Technology Officer',
				'full_name' => 'Farid Sh',
				'image' => 'team-4.png',
			],
		];

		$order = 3;
		foreach ($modules as $module) {
			$order += 3;
			if (!isset($module['title'])) {
				$module['title'] = $module['type'];
			}
			$module['order'] = $order;
			$module['language'] = 'en';

			if (isset($module['image'])) {
				$fileName = $module['image'];
				unset($module['image']);
				$uploadFile = $laravelCmsFolder . $fileName;
				$module['image'] = new UploadedFile($uploadFile, $uploadFile);
			}
			$moduleRepository = new Module();
			$moduleRepository->saveWithRelations($module);
		}
	}
}
