<?php

declare(strict_types=1);

return [
	'secret' => env('NOCAPTCHA_SECRET', 'secret'),
	'sitekey' => env('NOCAPTCHA_SITEKEY', 'sitekey'),
	'options' => [
		'timeout' => 30,
	],
];
