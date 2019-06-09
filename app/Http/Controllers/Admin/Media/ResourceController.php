<?php

namespace App\Http\Controllers\Admin\Media;

use App\Base\BaseAdminController;

class ResourceController extends BaseAdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->meta['title'] = __('Media Manager');
        $this->meta['alert'] = 'File manager for move, copy, resize, crop and delete file and images.';

        return view('admin.media.index', ['meta' => $this->meta]);
    }

    public function create(){abort(404);}
    public function show($id){abort(404);}
    public function edit($id){abort(404);}
    public function update($id){abort(404);}
    public function destroy($id){abort(404);}
}
