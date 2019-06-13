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

    public function create(){return $this->getRedirect();}
    public function show($id){return $this->getRedirect();}
    public function edit($id){return $this->getRedirect();}
    public function update($id){return $this->getRedirect();}
    public function destroy($id){return $this->getRedirect();}

    public function getRedirect()
    {
        return redirect()->route('admin.media.list.index');
    }
}
