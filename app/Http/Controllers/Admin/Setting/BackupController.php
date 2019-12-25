<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Base\BaseAdminController;
use Artisan;
use Auth;
use Illuminate\Http\Request;
use Storage;

class BackupController extends BaseAdminController
{
    public $model = 'Backup';

    public $model_sm = 'backup';

    public $disk_name;

    public $backup_name;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->disk_name = config('backup.backup.destination.disks')[0];
        $this->backup_name = config('backup.backup.name');
        $this->meta['title'] = __(strtolower($this->model . '_manager'));;
        $this->meta['link_route'] = route('admin.setting.backup.create');
        $this->meta['link_name'] = __(strtolower($this->model . '_create'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $disk = Storage::disk($this->disk_name);
        $files = $disk->allFiles($this->backup_name);

        $backups = [];
        // make an array of backup files, with their filesize and creation date
        foreach ($files as $f) {
            // only take the zip files into account
            if (substr($f, -4) === '.zip' && $disk->exists($f)) {
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

        return view('admin.setting.backup', ['backups' => $backups, 'meta' => $this->meta]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Artisan::call('backup:run');
        activity('Backup')
            ->causedBy(Auth::user())
            ->log('Backup Created');

        $this->request->session()->flash('alert-success', 'Backup Created');

        return redirect()->route('admin.setting.backup.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $backup_item_name
     * @return \Illuminate\Http\Response
     */
    public function show($backup_item_name)
    {
        $disk_name = config('backup.backup.destination.disks')[0];
        $backup_name = config('backup.backup.name');

        $file = $backup_name . '/' . $backup_item_name;
        $disk = Storage::disk($disk_name);
        if ($disk->exists($file)) {
            $fs = Storage::disk($disk_name)->getDriver();
            $stream = $fs->readStream($file);
            return \Response::stream(function () use ($stream) {
                fpassthru($stream);
            }, 200, [
                'Content-Type' => $fs->getMimetype($file),
                'Content-Length' => $fs->getSize($file),
                // 'Content-disposition' => 'attachment; filename=\"' . basename($file) . '\"',
            ]);
        } else {
            abort(404, "The backup file doesn't exist.");
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $backup_item_name
     * @return \Illuminate\Http\Response
     */
    public function edit($backup_item_name)
    {
        $disk_name = config('backup.backup.destination.disks')[0];
        $backup_name = config('backup.backup.name');

        $disk = Storage::disk($disk_name);
        $file = $backup_name . '/' . $backup_item_name;

        if ($disk->exists($file)) {
            $disk->delete($file);
        }

        $this->request->session()->flash('alert-success', 'Backup Deleted');

        return redirect()->route('admin.setting.backup.index');
    }

    public function getRedirect()
    {
        return redirect()->route('admin.setting.backup.index');
    }
}
