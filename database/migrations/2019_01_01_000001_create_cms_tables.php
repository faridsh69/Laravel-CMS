<?php

use App\Services\BaseMigration;

class CreateCmsTables extends BaseMigration
{
	// Select which models table should update based on config cms.migration
	public $modelNameSlugs = [];

	// Define tables should rebuild or should update based on changes in models.
	public $update = true;
}
