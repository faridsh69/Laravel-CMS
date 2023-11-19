<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin\Setting;

use App\Cms\Controllers\Admin\AdminController;
use Artisan;
use Illuminate\Http\Request;
use Response;
use Storage;

final class BackupController extends AdminController
{
	public $disk_name;

	public $backup_name;

	public function __construct(Request $request)
	{
		$this->httpRequest = $request;
		$this->disk_name = config('backup.backup.destination.disks')[0];
		$this->backup_name = config('backup.backup.name');
		$this->meta['title'] = __('backup_manager');
		$this->meta['link_route'] = route('admin.setting.backup.create');
		$this->meta['link_name'] = __('backup_create');
	}

	public function index()
	{
		$this->authorize('manage', 'backup');
		$disk = Storage::disk($this->disk_name);
		$files = $disk->allFiles($this->backup_name);

		$backups = [];
		// make an array of backup files, with their filesize and creation date
		foreach ($files as $f) {
			// only take the zip files into account
			if (mb_substr($f, -4) === '.zip' && $disk->exists($f)) {
				$backups[] = [
					'file_path' => $f,
					'file_name' => str_replace($this->backup_name . '/', '', $f),
					'file_size' => $disk->size($f),
					'last_modified' => $disk->lastModified($f),
				];
			}
		}
		// reverse the backups, so the newest one would be on top
		$backups = array_reverse($backups);

		return view('admin.page.setting.backup', [
			'backups' => $backups, 'meta' => $this->meta,
		]);
	}

	public function create()
	{
		$this->authorize('manage', 'backup');
		Artisan::call('backup:run');

		$this->httpRequest->session()->flash('alert-success', 'Backup Created');

		return redirect()->route('admin.setting.backup.index');
	}

	public function show($backup_item_name)
	{
		$this->authorize('manage', 'backup');
		$file = $this->backup_name . '/' . $backup_item_name;
		$disk = Storage::disk($this->disk_name);
		if ($disk->exists($file)) {
			$file_storage = Storage::disk($this->disk_name)->getDriver();
			$stream = $file_storage->readStream($file);

			return Response::stream(function () use ($stream): void {
				fpassthru($stream);
			}, 200, [
				'Content-Type' => 'zip',
				// 'Content-Length' => $stream->getSize($file),
			]);
		} else {
			abort(404, "The backup file doesn't exist.");
		}
	}

	public function edit($backup_item_name)
	{
		$this->authorize('manage', 'backup');
		$disk = Storage::disk($this->disk_name);
		$file = $this->backup_name . '/' . $backup_item_name;

		if ($disk->exists($file)) {
			$disk->delete($file);
		}

		$this->httpRequest->session()->flash('alert-success', 'Backup Deleted');

		return redirect()->route('admin.setting.backup.index');
	}
}
