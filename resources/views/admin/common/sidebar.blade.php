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
	],
	[
		'order' => 1,
		'title' => 'post',
		'icon' => 'flaticon-file',
	],
	[
		'order' => 2,
		'title' => 'story',
		'icon' => 'flaticon-profile',
	],
	[
		'order' => 3,
		'title' => 'advertise',
		'icon' => 'flaticon-alert-1',
	],
	[
		'order' => 4,
		'title' => 'like',
		'icon' => 'flaticon-interface-5',
	],
	[
		'order' => 5,
		'title' => 'follow',
		'icon' => 'flaticon-visible',
	],
	[
		'order' => 6,
		'title' => 'rate',
		'icon' => 'flaticon-interface-3',
	],
	[
		'order' => 7,
		'title' => 'factor',
		'icon' => 'flaticon-business',
	],
	[
		'order' => 8,
		'title' => 'management',
		'type' => 'section',
	],
	[
		'order' => 9,
		'title' => 'setting',
		'type' => 'tree',
		'icon' => 'flaticon-cogwheel',
		'children' => [
			[
				'title' => 'setting_general',
				'route' => 'admin.setting.general',
				'permission' => 'setting_general',
			],
			[
				'title' => 'setting_developer',
				'route' => 'admin.setting.developer',
				'permission' => 'setting_developer',
			],
			[
				'title' => 'setting_contact',
				'route' => 'admin.setting.contact',
				'permission' => 'setting_contact',
			],
			[
				'title' => 'setting_advance',
				'route' => 'admin.setting.advance',
				'permission' => 'setting_advance',
			],
			[
				'title' => 'backup',
				'route' => 'admin.setting.backup.index',
				'permission' => 'backup',
			],
			[
				'title' => 'log',
				'route' => 'admin.setting.log',
				'permission' => 'log',
			],
			[
				'title' => 'api',
				'route' => 'admin.setting.api',
				'permission' => 'api',
			],
			[
				'title' => 'seo_content_rules',
				'route' => 'admin.setting.seo.content-rules',
				'permission' => 'seo',
			],
			[
				'title' => 'seo_crowl_site',
				'route' => 'admin.setting.seo.crowl',
				'permission' => 'seo',
			],
		],
	],
	[
		'order' => 10,
		'title' => 'user',
		'icon' => 'flaticon-user-ok',
	],
	[
		'order' => 11,
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
		'order' => 23,
		'title' => 'business',
		'type' => 'section',
	],
	[
		'order' => 24,
		'title' => 'product',
		'icon' => 'flaticon-tool',
	],
	[
		'order' => 26,
		'title' => 'address',
		'icon' => 'flaticon-placeholder-2',
	],
	[
		'order' => 27,
		'title' => 'car',
		'icon' => 'flaticon-truck',
	],
	[
		'order' => 28,
		'title' => 'cinema',
		'icon' => 'flaticon-technology',
	],
	[
		'order' => 30,
		'title' => 'food',
		'icon' => 'flaticon-tea-cup',
	],
	[
		'order' => 31,
		'title' => 'food-program',
		'icon' => 'flaticon-time-3',
	],
	[
		'order' => 32,
		'title' => 'gym',
		'icon' => 'flaticon-time-1',
	],
	[
		'order' => 33,
		'title' => 'gym-action',
		'icon' => 'flaticon-user-settings',
	],
	[
		'order' => 34,
		'title' => 'gym-program',
		'icon' => 'flaticon-list-3',
	],
	[
		'order' => 35,
		'title' => 'home',
		'icon' => 'flaticon-map-location',
	],
	[
		'order' => 35,
		'title' => 'hotel',
		'icon' => 'flaticon-rocket',
	],
	[
		'order' => 36,
		'title' => 'movie',
		'icon' => 'flaticon-browser',
	],
	[
		'order' => 36,
		'title' => 'music',
		'icon' => 'flaticon-music',
	],
	[
		'order' => 38,
		'title' => 'restaurant',
		'icon' => 'flaticon-alert',
	],
	[
		'order' => 39,
		'title' => 'shop',
		'icon' => 'flaticon-gift',
	],
	[
		'order' => 40,
		'title' => 'showtime',
		'icon' => 'flaticon-time-2',
	],
	[
		'order' => 40,
		'title' => 'tour',
		'icon' => 'flaticon-map-location',
	],
	[
		'order' => 41,
		'title' => 'travel',
		'icon' => 'flaticon-route',
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
	],
	[
		'order' => 61,
		'title' => 'block',
		'icon' => 'flaticon-app',
	],
	[
		'order' => 62,
		'title' => 'module',
		'icon' => 'flaticon-layers',
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

$sidebar_items = Cache::remember('sidebar', 3, function () use($sidebar_menu_items) {
	$list = [];
	foreach(collect($sidebar_menu_items)->sortBy('order') as $menu_items)
	{
		if(!isset($menu_items['type'])){
			$menu_items['type'] = 'submenu';
		}
		$menu_items['route'] = 'admin.'. $menu_items['title']. '.list.index';
		if(!Route::has($menu_items['route'])){
			$menu_items['route'] = 'admin.' . $menu_items['title']. '.index';
		}
		$menu_items['model_name'] = Str::studly($menu_items['title']);
		$menu_items['model_namespace'] = config('cms.config.models_namespace'). $menu_items['model_name'];
		$menu_items['permission'] = Auth::user()->can('index', $menu_items['model_namespace']) 
			|| Auth::user()->can('manage', $menu_items['title']);
		if($menu_items['type'] === 'submenu' && $menu_items['title'] !== 'dashboard' && (!$menu_items['permission'] || !Route::has($menu_items['route'])) ){
			continue;
		}
		$list[] = $menu_items;
	}
	return $list;
});
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
		@foreach($sidebar_items as $item)
			@if($item['type'] === 'section')
				<li class="m-menu__section">
					<h4 class="m-menu__section-text">
						{{ __($item['title']) }}
					</h4>
					<i class="m-menu__section-icon flaticon-more-v3"></i>
				</li>
			@elseif($item['type'] === 'submenu')
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
			@elseif($item['type'] === 'tree')
			<li class="m-menu__item m-menu__item--submenu  
				@if(Request::segment(2) == $item['title']) m-menu__item--open m-menu__item--expanded @endif" aria-haspopup="true" data-menu-submenu-toggle="hover">
				<a href="javascript:void(0)" class="m-menu__link m-menu__toggle">
					<i class="m-menu__link-icon {{ $item['icon'] }}"></i>
					<span class="m-menu__link-title">
						<span class="m-menu__link-wrap">
							<span class="m-menu__link-text">
								{{ __($item['title']) }}
							</span>
							<i class="m-menu__ver-arrow la la-angle-right"></i>
						</span>
					</span>
				</a>
				<div class="m-menu__submenu">
					<span class="m-menu__arrow"></span>
					<ul class="m-menu__subnav">
						@foreach($item['children'] as $submenu_item)
						@can('manage', $submenu_item['permission'])
						<li aria-haspopup="true" class="m-menu__item @if(Route::currentRouteName() == $submenu_item['route'] ) m-menu__item--active @endif">
							<a  href="{{ route($submenu_item['route']) }}" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
									{{ __($submenu_item['title']) }}
								</span>
							</a>
						</li>
						@endcan
						@endforeach
					</ul>
				</div>
			</li>
			@endif
		@endforeach
		</ul>
	</div>
</div>
@push('script')
<script>
	$('.m-menu__section').each(function(){
		if($(this).next().hasClass('m-menu__section')) { 
			$(this).remove(); 
		}
	});
</script>
@endpush