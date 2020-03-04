<?php
	$sidebar = [
		[
			'order' => 0,
			'title' => 'Dashboard',
			'permission' => '*',
			'type' => 'submenu',
			'icon' => 'flaticon-line-graph',
			'badge' => [
				'count' => 0,
				'type' => 'danger',
			],
		],
		[
			'order' => 1,
			'title' => 'management',
			'type' => 'section',
			'permission' => 'User',
		],
		[
			'order' => 3,
			'title' => 'Setting',
			'route' => 'setting',
			'permission' => 'SettingGeneral',
			'type' => 'tree',
			'icon' => 'flaticon-cogwheel',
			'children' => [	
				[
					'order' => 7-1,
					'title' => 'General',
					'route' => 'admin.setting.general',
				],
				[
					'order' => 7-2,
					'title' => 'Developer',
					'route' => 'admin.setting.developer',
				],
				[
					'order' => 7-3,
					'title' => 'Contact Info',
					'route' => 'admin.setting.contact',
				],
				[
					'order' => 7-4,
					'title' => 'Advance',
					'route' => 'admin.setting.advance',
				],
				[
					'order' => 7-7,
					'title' => 'Backup',
					'route' => 'admin.setting.backup.index',
				],
				[
					'order' => 7-6,
					'title' => 'Logs',
					'route' => 'admin.setting.log',
				],
				[
					'order' => 7-5,
					'title' => 'API',
					'route' => 'admin.setting.api',
				],
				[
					'order' => 7-6,
					'title' => 'Seo Content Rules',
					'route' => 'admin.setting.seo.content-rules',
				],
				[
					'order' => 7-7,
					'title' => 'Seo Crowl Site',
					'route' => 'admin.setting.seo.crowl',
				],
			],
		],
		[
			'order' => 6,
			'title' => 'User',
			'type' => 'submenu',
			'icon' => 'flaticon-users',
		],
		[
			'order' => 9,
			'title' => 'Role',
			'type' => 'submenu',
			'icon' => 'flaticon-user',
		],
		[
			'order' => 12,
			'title' => 'Permission',
			'type' => 'submenu',
			'icon' => 'flaticon-interface-9',
		],
		[
			'order' => 15,
			'title' => 'Notification',
			'type' => 'submenu',
			'icon' => 'flaticon-notes',
		],
		[
			'order' => 18,
			'title' => 'Report',
			'permission' => 'Activity',
			'type' => 'submenu',
			'icon' => 'flaticon-graphic-2',
		],
		[
			'order' => 21,
			'title' => 'Activity',
			'permission' => 'Activity',
			'type' => 'submenu',
			'icon' => 'flaticon-share',
		],
		[
			'order' => 24,
			'title' => 'theme',
			'type' => 'section',
			'permission' => 'Block',
		],
		[
			'order' => 27,
			'title' => 'Block',
			'type' => 'submenu',
			'icon' => 'flaticon-app',
		],
		[
			'order' => 27,
			'title' => 'Module',
			'type' => 'submenu',
			'icon' => 'flaticon-layers',
		],
		
		[
			'order' => 55,
			'title' => 'business',
			'type' => 'section',
			'permission' => 'Product',
		],
		[
			'order' => 56,
			'title' => 'Factor',
			'type' => 'submenu',
			'icon' => 'flaticon-business',
		],
		[
			'order' => 57,
			'title' => 'Product',
			'type' => 'submenu',
			'icon' => 'flaticon-business',
		],
		[
			'order' => 58,
			'title' => 'Tagend',
			'type' => 'submenu',
			'icon' => 'flaticon-business',
		],
		[
			'order' => 60,
			'title' => 'content',
			'type' => 'section',
			'permission' => 'Blog',
		],
		[
			'order' => 63,
			'title' => 'Blog',
			'type' => 'submenu',
			'icon' => 'flaticon-list-3',
		],
		[
			'order' => 66,
			'title' => 'Page',
			'type' => 'submenu',
			'icon' => 'flaticon-web',
		],
		[
			'order' => 69,
			'title' => 'Category',
			'type' => 'submenu',
			'icon' => 'flaticon-map',
		],
		[
			'order' => 72,
			'title' => 'Tag',
			'type' => 'submenu',
			'icon' => 'flaticon-interface-9',
		],
		[
			'order' => 75,
			'title' => 'Media',
			'permission' => 'Image',
			'type' => 'submenu',
			'icon' => 'flaticon-open-box',
		],
				[
			'order' => 78,
			'title' => 'Comment',
			'type' => 'submenu',
			'icon' => 'flaticon-comment',
		],
		[
			'order' => 81,
			'title' => 'Form',
			'type' => 'submenu',
			'icon' => 'flaticon-edit',
		],
		[
			'order' => 84,
			'title' => 'Field',
			'type' => 'submenu',
			'icon' => 'flaticon-comment',
		],
		[
			'order' => 87,
			'title' => 'Answer',
			'type' => 'submenu',
			'icon' => 'flaticon-comment',
		],
	];

	return $sidebar;

	$deleted_menu_items = [
		[
			'order' => 30,
			'title' => 'Menu',
			'type' => 'submenu',
			'icon' => 'flaticon-more',
		],
		[
			'order' => 33,
			'title' => 'Slider',
			'type' => 'submenu',
			'icon' => 'flaticon-layers',
		],
		[
			'order' => 36,
			'title' => 'Feature',
			'type' => 'submenu',
			'icon' => 'flaticon-technology-1',
		],
		[
			'order' => 39,
			'title' => 'Counting',
			'type' => 'submenu',
			'icon' => 'flaticon-diagram',
		],
		[
			'order' => 42,
			'title' => 'Feedback',
			'type' => 'submenu',
			'icon' => 'flaticon-comment',
		],
		[
			'order' => 45,
			'title' => 'Service',
			'type' => 'submenu',
			'icon' => 'flaticon-open-box',
		],
		[
			'order' => 48,
			'title' => 'Team',
			'type' => 'submenu',
			'icon' => 'flaticon-users',
		],
		[
			'order' => 51,
			'title' => 'Partner',
			'type' => 'submenu',
			'icon' => 'flaticon-network',
		],
		[
			'order' => 54,
			'title' => 'Pricing',
			'type' => 'submenu',
			'icon' => 'flaticon-coins',
		],
	];
