@php
	$sidebar = [
		[
			'id' => 0,
			'title' => 'Dashboard',
			'type' => 'item',
			'route' => 'admin.dashboard.index',
			'icon' => 'flaticon-line-graph',
			'badge' => [
				'count' => 0,
				'type' => 'danger',
			],
		],
		[
			'title' => 'Content',
			'type' => 'section',
		],
		[
			'id' => 1,
			'title' => 'Blog',
			'route' => 'blog',
			'type' => 'submenu',
			'icon' => 'flaticon-list-3',
			'children' => [	
				[
					'title' => 'Blog list',
					'route' => 'admin.blog.list.index',
				],
				[
					'title' => 'Create New Blog',
					'route' => 'admin.blog.list.create',
				],
			],
		],
		[
			'id' => 2,
			'title' => 'Page',
			'route' => 'page',
			'type' => 'submenu',
			'icon' => 'flaticon-web',
			'children' => [	
				[
					'title' => 'Page list',
					'route' => 'admin.page.list.index',
				],
				[
					'title' => 'Create New Page',
					'route' => 'admin.page.list.create',
				],
			],
		],
		[
			'id' => 3,
			'title' => 'Category',
			'route' => 'category',
			'type' => 'submenu',
			'icon' => 'flaticon-map',
			'children' => [	
				[
					'title' => 'Category list',
					'route' => 'admin.category.list.index',
				],
			],
		],
		[
			'id' => 4,
			'title' => 'Tag',
			'route' => 'tag',
			'type' => 'submenu',
			'icon' => 'flaticon-interface-9',
			'children' => [	
				[
					'title' => 'Tags list',
					'route' => 'admin.tag.list.index',
				],
			],
		],
		[
			'id' => 5,
			'title' => 'Image',
			'route' => 'media',
			'type' => 'submenu',
			'icon' => 'flaticon-open-box',
			'children' => [	
				[
					'title' => 'Media list',
					'route' => 'admin.media.list.index',
				],
			],
		],
		[
			'title' => 'Business',
			'type' => 'section',
		],
		[
			'id' => 24,
			'title' => 'Product',
			'route' => 'product',
			'type' => 'submenu',
			'icon' => 'flaticon-business',
			'children' => [	
				[
					'title' => 'Product list',
					'route' => 'admin.product.list.index',
				],
				[
					'title' => 'Create New Product',
					'route' => 'admin.product.list.create',
				],
			],
		],
		[
			'id' => 6,
			'title' => 'Comment',
			'route' => 'comment',
			'type' => 'submenu',
			'icon' => 'flaticon-comment',
			'children' => [	
				[
					'title' => 'Comment list',
					'route' => 'admin.comment.list.index',
				],
			],
		],
		[
			'id' => 15,
			'title' => 'Form',
			'route' => 'form',
			'type' => 'submenu',
			'icon' => 'flaticon-edit',
			'children' => [	
				[
					'title' => 'Form list',
					'route' => 'admin.form.list.index',
				],
			],
		],
		[
			'id' => 15,
			'title' => 'Field',
			'route' => 'field',
			'type' => 'submenu',
			'icon' => 'flaticon-comment',
			'children' => [	
				[
					'title' => 'Field list',
					'route' => 'admin.field.list.index',
				],
			],
		],
		[
			'title' => 'Management',
			'type' => 'section',
		],
		[
			'id' => 7,
			'title' => 'Setting',
			'route' => 'setting',
			'type' => 'submenu',
			'icon' => 'flaticon-cogwheel',
			'children' => [	
				[
					'id' => 7-1,
					'title' => 'General',
					'route' => 'admin.setting.general',
				],
				[
					'id' => 7-2,
					'title' => 'Contact Info',
					'route' => 'admin.setting.contact',
				],
				[
					'id' => 7-3,
					'title' => 'Developer',
					'route' => 'admin.setting.developer',
				],
				[
					'id' => 7-4,
					'title' => 'Advance',
					'route' => 'admin.setting.advance',
				],
				[
					'id' => 7-7,
					'title' => 'Backup',
					'route' => 'admin.setting.backup.index',
				],
				[
					'id' => 7-6,
					'title' => 'Logs',
					'route' => 'admin.setting.log',
				],
				[
					'id' => 7-5,
					'title' => 'API',
					'route' => 'admin.setting.api',
				],
				[
					'id' => 7-8,
					'title' => 'Seo',
					'route' => 'seo',
					'type' => 'submenu',
					'icon' => 'flaticon-multimedia-1',
					'children' => [	
						[
							'title' => 'Content Rules',
							'route' => 'admin.setting.seo.content-rules',
						],
						[
							'title' => 'Crowl Site',
							'route' => 'admin.setting.seo.crowl',
						],
					],
				],
			],
		],
		[
			'id' => 8,
			'title' => 'User',
			'route' => 'user',
			'type' => 'submenu',
			'icon' => 'flaticon-users',
			'children' => [	
				[
					'title' => 'User List',
					'route' => 'admin.user.list.index',
				],
			],
		],
		[
			'id' => 8,
			'title' => 'Role',
			'route' => 'role',
			'type' => 'submenu',
			'icon' => 'flaticon-user',
			'children' => [	
				[
					'title' => 'Role list',
					'route' => 'admin.role.list.index',
				],
			],
		],
		[
			'id' => 8,
			'title' => 'Permission',
			'route' => 'permission',
			'type' => 'submenu',
			'icon' => 'flaticon-interface-9',
			'children' => [	
				[
					'title' => 'Permission list',
					'route' => 'admin.permission.list.index',
				],
			],
		],
		[
			'id' => 9,
			'title' => 'Notification',
			'route' => 'notification',
			'type' => 'submenu',
			'icon' => 'flaticon-notes',
			'children' => [	
				[
					'title' => 'Notification list',
					'route' => 'admin.notification.list.index',
				],
			],
		],
		[
			'id' => 10,
			'title' => 'Report',
			'route' => 'report',
			'type' => 'submenu',
			'icon' => 'flaticon-graphic-2',
			'children' => [	
				[
					'title' => 'Report list',
					'route' => 'admin.report.index',
				],
			],
		],
		[
			'id' => 10,
			'title' => 'User Activity',
			'route' => 'activity',
			'type' => 'submenu',
			'icon' => 'flaticon-share',
			'children' => [	
				[
					'title' => 'User Activity list',
					'route' => 'admin.activity.list.index',
				],
			],
		],
		[
			'title' => 'THEME',
			'type' => 'section',
		],
		[
			'id' => 11,
			'title' => 'Block',
			'route' => 'block',
			'type' => 'submenu',
			'icon' => 'flaticon-app',
			'children' => [	
				[
					'title' => 'Block list',
					'route' => 'admin.block.list.index',
				],
			],
		],
		[
			'id' => 21,
			'title' => 'Slider',
			'route' => 'slider',
			'type' => 'submenu',
			'icon' => 'flaticon-layers',
			'children' => [
				[
					'title' => 'Slider list',
					'route' => 'admin.slider.list.index',
				],
			],
		],
		[
			'id' => 18,
			'title' => 'Feature',
			'route' => 'feature',
			'type' => 'submenu',
			'icon' => 'flaticon-technology-1',
			'children' => [
				[
					'title' => 'Feature list',
					'route' => 'admin.feature.list.index',
				],
			],
		],
		[
			'id' => 17,
			'title' => 'Counting',
			'route' => 'counting',
			'type' => 'submenu',
			'icon' => 'flaticon-diagram',
			'children' => [
				[
					'title' => 'Counting list',
					'route' => 'admin.counting.list.index',
				],
			],
		],
		[
			'id' => 16,
			'title' => 'Feedback',
			'route' => 'feedback',
			'type' => 'submenu',
			'icon' => 'flaticon-comment',
			'children' => [
				[
					'title' => 'Feedback list',
					'route' => 'admin.feedback.list.index',
				],
			],
		],
		[
			'id' => 23,
			'title' => 'Service',
			'route' => 'service',
			'type' => 'submenu',
			'icon' => 'flaticon-open-box',
			'children' => [
				[
					'title' => 'Service list',
					'route' => 'admin.service.list.index',
				],
			],
		],
		[
			'id' => 14,
			'title' => 'Menu',
			'route' => 'menu',
			'type' => 'submenu',
			'icon' => 'flaticon-more',
			'children' => [	
				[
					'title' => 'Menu list',
					'route' => 'admin.menu.list.index',
				],
			],
		],
		[
			'id' => 19,
			'title' => 'Team',
			'route' => 'team',
			'type' => 'submenu',
			'icon' => 'flaticon-users',
			'children' => [
				[
					'title' => 'Team list',
					'route' => 'admin.team.list.index',
				],
			],
		],
		[
			'id' => 20,
			'title' => 'Partner',
			'route' => 'partner',
			'type' => 'submenu',
			'icon' => 'flaticon-network',
			'children' => [
				[
					'title' => 'Partner list',
					'route' => 'admin.partner.list.index',
				],
			],
		],
		
		[
			'id' => 22,
			'title' => 'Pricing',
			'route' => 'pricing',
			'type' => 'submenu',
			'icon' => 'flaticon-coins',
			'children' => [
				[
					'title' => 'Pricing list',
					'route' => 'admin.pricing.list.index',
				],
			],
		],
	];

    $auth_user = Auth::user();
    $new_sidebar = [];
    foreach($sidebar as $item)
    {
    	if($item['title'] === 'Dashboard'){
    		$new_sidebar[] = $item;
    	}
    	elseif($auth_user->hasAnyPermission(['index_' . strtolower($item['title'])])){ 
    		$new_sidebar[] = $item;
    	}
    }
@endphp

<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
	<i class="la la-close"></i>
</button>
<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
	<div id="m_ver_menu" 
		class="m-aside-menu m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark" 
		data-menu-vertical="true"
			data-menu-scrollable="false" data-menu-dropdown-timeout="500">
		<ul class="m-menu__nav m-menu__nav--dropdown-submenu-arrow">
		@foreach($sidebar as $item)
			@if($item['title'] === 'Dashboard')) 
			<li aria-haspopup="true" class="m-menu__item 
				@if(Route::currentRouteName() == $item['route']) m-menu__item--active @endif" >
				<a href="{{ route($item['route']) }}" class="m-menu__link ">
					<i class="m-menu__link-icon {{ $item['icon'] }}"></i>
					<span class="m-menu__link-title">
						<span class="m-menu__link-wrap">
							<span class="m-menu__link-text">
								{{ $item['title'] }}
							</span>
						</span>
					</span>
				</a>
			</li>
			@elseif($item['type'] == 'section')
			<li class="m-menu__section">
				<h4 class="m-menu__section-text">
					{{ $item['title'] }}
				</h4>
				<i class="m-menu__section-icon flaticon-more-v3"></i>
			</li>
			@else
			@can('index', 'App\\Models\\' . $item['title'])
			<li class="m-menu__item m-menu__item--submenu  
				@if(Request::segment(2) == $item['route']) m-menu__item--open m-menu__item--expanded @endif" aria-haspopup="true" data-menu-submenu-toggle="hover">
				<a href="javascript:void(0)" class="m-menu__link m-menu__toggle">
					<i class="m-menu__link-icon {{ $item['icon'] }}"></i>
					<span class="m-menu__link-title">
						<span class="m-menu__link-wrap">
							<span class="m-menu__link-text">
								{{ $item['title'] }}
							</span>
							<i class="m-menu__ver-arrow la la-angle-right"></i>
						</span>
					</span>
				</a>
				<div class="m-menu__submenu">
					<span class="m-menu__arrow"></span>
					<ul class="m-menu__subnav">
						@foreach($item['children'] as $submenu_item)
						@if(Route::has($submenu_item['route']))
						<li aria-haspopup="true" class="m-menu__item @if(Route::currentRouteName() == $submenu_item['route'] ) m-menu__item--active @endif">
							<a  href="{{ route($submenu_item['route']) }}" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
									{{ $submenu_item['title'] }}
								</span>
							</a>
						</li>
						@endif
						@endforeach
					</ul>
				</div>
			</li>
			@endcan
			@endif
		@endforeach
		</ul>
	</div>
</div>
