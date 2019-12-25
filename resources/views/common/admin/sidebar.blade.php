@php
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
		[
			'order' => 55,
			'title' => 'business',
			'type' => 'section',
			'permission' => 'Product',
		],
		[
			'order' => 57,
			'title' => 'Product',
			'type' => 'submenu',
			'icon' => 'flaticon-business',
		],
		[
			'order' => 60,
			'title' => 'Comment',
			'type' => 'submenu',
			'icon' => 'flaticon-comment',
		],
		[
			'order' => 63,
			'title' => 'Form',
			'type' => 'submenu',
			'icon' => 'flaticon-edit',
		],
		[
			'order' => 66,
			'title' => 'Field',
			'type' => 'submenu',
			'icon' => 'flaticon-comment',
		],
		[
			'order' => 69,
			'title' => 'content',
			'type' => 'section',
			'permission' => 'Blog',
		],
		[
			'order' => 72,
			'title' => 'Blog',
			'type' => 'submenu',
			'icon' => 'flaticon-list-3',
		],
		[
			'order' => 75,
			'title' => 'Page',
			'type' => 'submenu',
			'icon' => 'flaticon-web',
		],
		[
			'order' => 78,
			'title' => 'Category',
			'type' => 'submenu',
			'icon' => 'flaticon-map',
		],
		[
			'order' => 81,
			'title' => 'Tag',
			'type' => 'submenu',
			'icon' => 'flaticon-interface-9',
		],
		[
			'order' => 84,
			'title' => 'Media',
			'permission' => 'Image',
			'type' => 'submenu',
			'icon' => 'flaticon-open-box',
		],
	];
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
		@foreach(collect($sidebar)->sortBy('order') as $item)
			@if($item['type'] == 'section')
				@can('index', 'App\\Models\\' . $item['permission'])
				<li class="m-menu__section">
					<h4 class="m-menu__section-text">
						{{ __($item['title']) }}
					</h4>
					<i class="m-menu__section-icon flaticon-more-v3"></i>
				</li>
				@endcan
			@elseif($item['type'] === 'submenu')
			@php
				$item['route'] = 'admin.' . strtolower($item['title']) . '.list.index';
				if(!isset($item['permission']) ){
					$item['permission'] = $item['title'];
				}
				$permission = false;
				if($item['permission'] === '*'){
					$permission = true;
				}
			@endphp
			@can('index', 'App\\Models\\' . $item['permission'])
			@php $permission = true @endphp
			@endcan
				@if($permission)
				<li aria-haspopup="true" class="m-menu__item 
					@if(Route::currentRouteName() == $item['route']) m-menu__item--active @endif" >
					<a href="{{ route($item['route']) }}" class="m-menu__link ">
						<i class="m-menu__link-icon {{ $item['icon'] }}"></i>
						<span class="m-menu__link-title">
							<span class="m-menu__link-wrap">
								<span class="m-menu__link-text">
									{{ __(strtolower($item['title'])) }}
								</span>
							</span>
						</span>
					</a>
				</li>
				@endif
			@elseif($item['type'] === 'tree')
			@can('index', 'App\\Models\\' . $item['permission'])
			<li class="m-menu__item m-menu__item--submenu  
				@if(Request::segment(2) == $item['route']) m-menu__item--open m-menu__item--expanded @endif" aria-haspopup="true" data-menu-submenu-toggle="hover">
				<a href="javascript:void(0)" class="m-menu__link m-menu__toggle">
					<i class="m-menu__link-icon {{ $item['icon'] }}"></i>
					<span class="m-menu__link-title">
						<span class="m-menu__link-wrap">
							<span class="m-menu__link-text">
								{{ __(strtolower($item['title'])) }}
							</span>
							<i class="m-menu__ver-arrow la la-angle-right"></i>
						</span>
					</span>
				</a>
				<div class="m-menu__submenu">
					<span class="m-menu__arrow"></span>
					<ul class="m-menu__subnav">
						@foreach($item['children'] as $submenu_item)
						<li aria-haspopup="true" class="m-menu__item @if(Route::currentRouteName() == $submenu_item['route'] ) m-menu__item--active @endif">
							<a  href="{{ route($submenu_item['route']) }}" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
									{{ __(strtolower($submenu_item['title'])) }}
								</span>
							</a>
						</li>
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
