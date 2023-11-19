<?php

declare(strict_types=1);

use App\Cms\Services\MigrationService;

final class CreateCmsTables extends MigrationService
{
	// model tables list is in config folder cms.migration
	// If you set empty array like this then it will read from cms.migration models
	// public array $modelNameSlugs = [];

	// If $update is true then will update tables based on changes you have made inside models,
	// If $update is false then will rebuild all of changed model tables
	// public bool $update = true;

	// Create backup before update or rebuild
	// public bool $backup = false;
}
