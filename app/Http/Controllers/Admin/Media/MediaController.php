<?php

namespace App\Http\Controllers\Admin\Media;

use App\Services\BaseAdminController;

class MediaController extends BaseAdminController
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

    public function redirect()
    {
        return redirect()->route('admin.media.list.index');
    }
}
