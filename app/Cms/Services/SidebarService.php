<?php

declare(strict_types=1);

namespace App\Cms\Services;

use Auth;
use Cache;
use Route;
use Str;

final class SidebarService
{
	private static $sidebarMenuItems = [
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

	public static function getItems(): array
	{
		$sidebarMenuItems = self::$sidebarMenuItems;

		return Cache::remember('sidebar', config('cms.config.cache_time'), function () use ($sidebarMenuItems) {
			$list = [];
			foreach (collect($sidebarMenuItems)->sortBy('order') as $menuItems) {
				$authUser = Auth::user();
				if (!isset($menuItems['type'])) {
					$menuItems['type'] = 'submenu';
				}

				$menuItems['route'] = 'admin.' . $menuItems['title'] . '.list.index';
				if (!Route::has($menuItems['route'])) {
					$menuItems['route'] = 'admin.' . $menuItems['title'] . '.index';
				}

				$menuItems['model_name'] = Str::studly($menuItems['title']);
				$menuItems['model_namespace'] = config('cms.config.models_namespace') . $menuItems['model_name'];
				$menuItems['permission'] = $authUser->can('index', $menuItems['model_namespace'])
					|| $authUser->can('manage', $menuItems['title']);

				if (
					$menuItems['type'] === 'submenu' && $menuItems['title'] !== 'dashboard'
					&& (!$menuItems['permission'] || !Route::has($menuItems['route']))
				) {
					continue;
				}

				$list[] = $menuItems;
			}

			return $list;
		});
	}
}
