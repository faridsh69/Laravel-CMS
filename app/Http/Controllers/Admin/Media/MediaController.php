<?php

namespace App\Http\Controllers\Admin\Media;

use App\Services\BaseAdminController;

class MediaController extends BaseAdminController
{
    public function __construct() {}

    public function index()
    {
    	$this->authorize('manage', 'media');
        $this->meta['title'] = __('media_manager');

        return view('admin.page.media.index', ['meta' => $this->meta]);
    }

    public function redirect()
    {
        return redirect()->route('admin.media.list.index');
    }
}
