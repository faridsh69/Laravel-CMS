@php
	$sidebar = config('sidebar');
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
					@if(Request::segment(2) == strtolower($item['title'])) m-menu__item--active @endif" >
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
