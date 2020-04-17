<?php

namespace App\Http\Controllers\Admin\Media;

use App\Services\BaseAdminController;

class ResourceController extends BaseAdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->meta['title'] = __('media_manager');

        return view('admin.page.media.index', ['meta' => $this->meta]);
    }

    public function create(){return $this->getRedirect(); }

    public function show($id){return $this->getRedirect(); }

    public function edit($id){return $this->getRedirect(); }

    public function update($id){return $this->getRedirect(); }

    public function destroy($id){return $this->getRedirect(); }

    public function getRedirect()
    {
        return redirect()->route('admin.media.list.index');
    }
}
