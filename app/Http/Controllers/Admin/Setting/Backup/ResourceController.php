<?php

namespace App\Http\Controllers\Admin\Setting\Backup;

use App\Http\Controllers\Controller;
use Artisan;
use Auth;
use Illuminate\Http\Request;
use Storage;

class ResourceController extends Controller
{
    private $disk_name;

    private $backup_name;

    public function __construct()
    {
        $this->disk_name = config('backup.backup.destination.disks')[0];
        $this->backup_name = config('backup.backup.name');
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

        $meta = [
            'title' => 'Manage Backups',
            'link_route' => '/setting/backup/list/create',
            'link_name' => 'Create New Backup',
        ];

        return view('admin.setting.backup.index', compact('backups', 'meta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        Artisan::call('backup:run');
        activity('Backup')
            ->causedBy(Auth::user())
            ->log('Backup Created');

        $request->session()->flash('alert-success', 'Backup Created');

        return redirect()->route('admin.setting.backup.list.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
                'Content-disposition' => 'attachment; filename=\"' . basename($file) . '\"',
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
    public function edit($backup_item_name, Request $request)
    {
        $disk_name = config('backup.backup.destination.disks')[0];
        $backup_name = config('backup.backup.name');

        $disk = Storage::disk($disk_name);
        $file = $backup_name . '/' . $backup_item_name;

        if ($disk->exists($file)) {
            $disk->delete($file);
        }

        $request->session()->flash('alert-success', 'Backup Deleted');

        return redirect()->route('admin.setting.backup.list.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
