<?php

declare(strict_types=1);

namespace App\Forms;

use App\Cms\Services\FormService;

final class SettingGeneralForm extends FormService
{
	public string $modelName = 'SettingGeneral';
}
