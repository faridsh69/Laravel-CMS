@php
	$sidebar_menu_items = [
	[
		'order' => 0,
		'title' => 'dashboard',
		'icon' => 'flaticon-line-graph',
		'badge' => [
			'count' => 1,
			'type' => 'danger',
		],
		// 'permission' => '*',
	],
	[
		'order' => 1,
		'title' => 'management',
		'type' => 'section',
		// 'permission' => 'User',
	],
	[
		'order' => 2,
		'title' => 'setting',
		'type' => 'tree',
		'icon' => 'flaticon-cogwheel',
		// 'route' => 'setting',
		// 'permission' => 'SettingGeneral',
		'children' => [
			[
				'title' => 'setting-general',
				// 'route' => 'admin.setting.general',
			],
			[
				'title' => 'setting-developer',
				// 'route' => 'admin.setting.developer',
			],
			[
				'title' => 'setting-contact',
				// 'route' => 'admin.setting.contact',
			],
			[
				'title' => 'setting-advance',
				// 'route' => 'admin.setting.advance',
			],
			[
				'title' => 'backup',
				// 'route' => 'admin.setting.backup.index',
			],
			[
				'title' => 'log',
				// 'route' => 'admin.setting.log',
			],
			[
				'title' => 'api',
				// 'route' => 'admin.setting.api',
			],
			[
				'title' => 'seo-content-rules',
				// 'route' => 'admin.setting.seo.content-rules',
			],
			[
				'order' => 7-7,
				'title' => 'seo-crowl',
				// 'route' => 'admin.setting.seo.crowl',
			],
		],
	],
	[
		'order' => 6,
		'title' => 'user',
		'icon' => 'flaticon-users',
	],
	[
		'order' => 9,
		'title' => 'role',
		'icon' => 'flaticon-user',
	],
	[
		'order' => 12,
		'title' => 'permission',
		'icon' => 'flaticon-interface-9',
	],
	[
		'order' => 15,
		'title' => 'notification',
		'icon' => 'flaticon-notes',
	],
	[
		'order' => 18,
		'title' => 'report',
		'icon' => 'flaticon-graphic-2',
	],
	[
		'order' => 21,
		'title' => 'activity',
		'icon' => 'flaticon-share',
	],
	[
		'order' => 24,
		'title' => 'theme',
		'type' => 'section',
		// 'permission' => 'Block',
	],
	[
		'order' => 27,
		'title' => 'block',
		'icon' => 'flaticon-app',
	],
	[
		'order' => 27,
		'title' => 'module',
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
		'title' => 'factor',
		'icon' => 'flaticon-business',
	],
	[
		'order' => 57,
		'title' => 'product',
		'icon' => 'flaticon-tool',
	],
	[
		'order' => 58,
		'title' => 'tagend',
		'icon' => 'flaticon-piggy-bank',
	],
	[
		'order' => 60,
		'title' => 'content',
		'type' => 'section',
		// 'permission' => 'Blog',
	],
	[
		'order' => 63,
		'title' => 'blog',
		'icon' => 'flaticon-list-3',
	],
	[
		'order' => 66,
		'title' => 'page',
		'icon' => 'flaticon-web',
	],
	[
		'order' => 69,
		'title' => 'category',
		'icon' => 'flaticon-map',
	],
	[
		'order' => 72,
		'title' => 'tag',
		'icon' => 'flaticon-interface-9',
	],
	[
		'order' => 75,
		'title' => 'media',
		'icon' => 'flaticon-open-box',
	],
	[
		'order' => 76,
		'title' => 'file',
		'icon' => 'flaticon-attachment',
	],
	[
		'order' => 78,
		'title' => 'comment',
		'icon' => 'flaticon-chat-1',
	],
	[
		'order' => 81,
		'title' => 'form',
		'icon' => 'flaticon-edit',
	],
	[
		'order' => 84,
		'title' => 'field',
		'icon' => 'flaticon-list',
	],
	[
		'order' => 87,
		'title' => 'answer',
		'icon' => 'flaticon-comment',
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
		@foreach(collect($sidebar_menu_items)->sortByDesc('order') as $menu_item)
			@php
				if(!isset($menu_item['type'])){
					$menu_item['type'] = 'submenu';
				}
			@endphp
			@if($menu_item['type'] === 'section')

				@if(false)
				@can('index', 'App\\Models\\' . $item['permission'])
				@endcan
				@endif

				<li class="m-menu__section">
					<h4 class="m-menu__section-text">
						{{ __($menu_item['title']) }}
					</h4>
					<i class="m-menu__section-icon flaticon-more-v3"></i>
				</li>

			@elseif($menu_item['type'] === 'submenu')
			@php
				$menu_item['route'] = 'admin.'. $menu_item['title']. '.list.index';
				if(!Route::has($menu_item['route'])){
					$menu_item['route'] = 'admin.' . $menu_item['title']. '.index';
				}
				if(!isset($menu_item['permission']) ){
					$menu_item['permission'] = $menu_item['title'];
				}
				$permission = false;
			@endphp
			@can('index', 'App\Models\Blog')
			123123
			@php $permission = true; dd(1) @endphp
			@endcan
				@if($permission)
				<li aria-haspopup="true" class="m-menu__item 
					@if(Request::segment(2) == $item['title']) m-menu__item--active @endif" >
					<a href="{{ route($item['route']) }}" class="m-menu__link ">
						<i class="m-menu__link-icon {{ $item['icon'] }}"></i>
						<span class="m-menu__link-title">
							<span class="m-menu__link-wrap">
								<span class="m-menu__link-text">
									{{ __($item['title']) }}
								</span>
							</span>
						</span>
					</a>
				</li>
				@endif
			@elseif($menu_item['type'] === 'tree-xxxxx')
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
@push('script')
<script>
	$(document).ready(function(){
		// $('.m-menu__section').each(function(){
		// 	if($(this).next().hasClass('m-menu__section')) { 
		// 		$(this).remove(); 
		// 	}
		// });
	});
</script>
@endpush