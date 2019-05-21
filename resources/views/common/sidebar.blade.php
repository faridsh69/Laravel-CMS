@php
	$sidebar = [
		[
			'title' => 'Dashboard',
			'type' => 'item',
			'route' => 'admin.dashboard.index',
			'icon' => 'flaticon-line-graph',
			'badge' => [
				'count' => 2,
				'type' => 'danger',
			],
		],
		[
			'title' => 'Content',
			'type' => 'section',
		],
		[
			'title' => 'Blog',
			'route' => 'blog',
			'type' => 'submenu',
			'icon' => 'flaticon-list-3',
			'children' => [	
				[
					'title' => 'Blog list',
					'route' => 'admin.blog.list.index',
				],
			],
		],
		[
			'title' => 'Page',
			'route' => 'page',
			'type' => 'submenu',
			'icon' => 'flaticon-web',
			'children' => [	
				[
					'title' => 'Page list',
					'route' => 'admin.page.list.index',
				],
			],
		],
		[
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
			'title' => 'Media',
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
			'title' => 'THEME',
			'type' => 'section',
		],
		[
			'title' => 'Theme',
			'route' => 'theme',
			'type' => 'submenu',
			'icon' => 'flaticon-visible',
			'children' => [	
				[
					'title' => 'Theme list',
					'route' => 'admin.theme.list.index',
				],
			],
		],
		[
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
			'title' => 'Widget',
			'route' => 'widget',
			'type' => 'submenu',
			'icon' => 'flaticon-imac',
			'children' => [	
				[
					'title' => 'Widget list',
					'route' => 'admin.widget.list.index',
				],
			],
		],
		[
			'title' => 'Menu',
			'route' => 'menu',
			'type' => 'submenu',
			'icon' => 'flaticon-grid-menu',
			'children' => [	
				[
					'title' => 'Menu list',
					'route' => 'admin.menu.list.index',
				],
			],
		],
		[
			'title' => 'Management',
			'type' => 'section',
		],
		[
			'title' => 'Setting',
			'route' => 'setting',
			'type' => 'submenu',
			'icon' => 'flaticon-cogwheel',
			'children' => [	
				[
					'title' => 'General',
					'route' => 'admin.setting.general',
				],
				[
					'title' => 'Contact Info',
					'route' => 'admin.setting.contact',
				],
				[
					'title' => 'Logs',
					'route' => 'admin.setting.log',
				],
				[
					'title' => 'Backup',
					'route' => 'admin.setting.backup.list.index',
				],
				[
					'title' => 'Developer Options',
					'type' => 'submenu',
					'route' => 'developer-options',
					'children' => [	
						[
							'title' => 'Basic',
							'route' => 'admin.setting.developer-options.basic',
						],
						[
							'title' => 'Advance',
							'route' => 'admin.setting.developer-options.advance',
						],
					],
				],
			],
		],
		[
			'title' => 'User',
			'route' => 'user',
			'type' => 'submenu',
			'icon' => 'flaticon-user',
			'children' => [	
				[
					'title' => 'User List',
					'route' => 'admin.user.list.index',
				],
				[
					'title' => 'Role',
					'route' => 'admin.user.role',
				],
				[
					'title' => 'Permission',
					'route' => 'admin.user.permission',
				],
				[
					'title' => 'Registration Setting',
					'route' => 'admin.user.registration-setting',
				],
			],
		],
		[
			'title' => 'Seo',
			'route' => 'seo',
			'type' => 'submenu',
			'icon' => 'flaticon-multimedia-1',
			'children' => [	
				[
					'title' => 'Setting',
					'route' => 'admin.seo.setting',
				],
				[
					'title' => 'Content Rules',
					'route' => 'admin.seo.content-rules',
				],
				[
					'title' => 'Lazy Loading',
					'route' => 'admin.seo.lazy-loading',
				],
			],
		],
		[
			'title' => 'Form',
			'route' => 'form',
			'type' => 'submenu',
			'icon' => 'flaticon-interface',
			'children' => [	
				[
					'title' => 'Form list',
					'route' => 'admin.form.list.index',
				],
			],
		],
		[
			'title' => 'Report',
			'route' => 'report',
			'type' => 'submenu',
			'icon' => 'flaticon-graphic-2',
			'children' => [	
				[
					'title' => 'Report list',
					'route' => 'admin.report.list.index',
				],
			],
		],
		[
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
	];
@endphp

<div id="m_ver_menu" 
	class="m-aside-menu m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark" 
	data-menu-vertical="true"
		data-menu-scrollable="false" data-menu-dropdown-timeout="500">
	<ul class="m-menu__nav m-menu__nav--dropdown-submenu-arrow">
		@foreach($sidebar as $item)
		@if($item['type'] == 'item')
		<li aria-haspopup="true" class="m-menu__item 
			@if(Route::currentRouteName() == $item['route'] ) m-menu__item--active @endif" >
			<a href="{{ route($item['route']) }}" class="m-menu__link ">
				<i class="m-menu__link-icon {{ $item['icon'] }}"></i>
				<span class="m-menu__link-title">
					<span class="m-menu__link-wrap">
						<span class="m-menu__link-text">
							{{ $item['title'] }}
						</span>
						@if(isset($item['badge']))
						<span class="m-menu__link-badge">
							<span class="m-badge m-badge--{{ $item['badge']['type'] }}">
								{{ $item['badge']['count'] }}
							</span>
						</span>
						@endif
					</span>
				</span>
			</a>
		</li>
		@elseif($item['type'] == 'submenu')
		<li class="m-menu__item m-menu__item--submenu  
			@if(Request::segment(1) == $item['route']) m-menu__item--open m-menu__item--expanded @endif" aria-haspopup="true" data-menu-submenu-toggle="hover">
			<a href="javascript:void(0)" class="m-menu__link m-menu__toggle">
				<i class="m-menu__link-icon {{ $item['icon'] }}"></i>
				<span class="m-menu__link-title">
					<span class="m-menu__link-wrap">
						<span class="m-menu__link-text">
							{{ $item['title'] }}
						</span>
						@if(isset($item['badge']))
						<span class="m-menu__link-badge">
							<span class="m-badge m-badge--{{ $item['badge']['type'] }}">
								{{ $item['badge']['count'] }}
							</span>
						</span>
						@endif
						<i class="m-menu__ver-arrow la la-angle-right"></i>
					</span>
				</span>
			</a>
			<div class="m-menu__submenu">
				<span class="m-menu__arrow"></span>
				<ul class="m-menu__subnav">
					<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
						<a href="javascript:void(0)" class="m-menu__link ">
							<span class="m-menu__link-text">
								{{ $item['title'] }}
							</span>
						</a>
					</li>
					@foreach($item['children'] as $submenu_item)
					@if( isset($submenu_item['type']))
					<li class="m-menu__item  m-menu__item--submenu
					@if(Request::segment(2) == $submenu_item['route']) m-menu__item--open m-menu__item--expanded @endif
					" aria-haspopup="true"  data-menu-submenu-toggle="hover">
						<a href="javascript::void(0)" class="m-menu__link m-menu__toggle">
							<i class="m-menu__link-bullet m-menu__link-bullet--dot">
								<span></span>
							</i>
							<span class="m-menu__link-text">
								{{ $submenu_item['title'] }}
							</span>
							<i class="m-menu__ver-arrow la la-angle-right"></i>
						</a>
						<div class="m-menu__submenu">
							<span class="m-menu__arrow"></span>
							<ul class="m-menu__subnav">
								@foreach($submenu_item['children'] as $submenu_item_subitem)
								<li aria-haspopup="true" class="m-menu__item  
									@if(Route::currentRouteName() == $submenu_item_subitem['route'] ) m-menu__item--active @endif">
									<a  href="{{ route($submenu_item_subitem['route']) }}" class="m-menu__link ">
										<i class="m-menu__link-bullet m-menu__link-bullet--dot">
											<span></span>
										</i>
										<span class="m-menu__link-text">
											{{ $submenu_item_subitem['title'] }}
										</span>
									</a>
								</li>
								@endforeach
							</ul>
						</div>
					</li>
					@else
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
		@else
		<li class="m-menu__section">
			<h4 class="m-menu__section-text">
				{{ $item['title'] }}
			</h4>
			<i class="m-menu__section-icon flaticon-more-v3"></i>
		</li>
		@endif
		@endforeach
	</ul>
</div>
