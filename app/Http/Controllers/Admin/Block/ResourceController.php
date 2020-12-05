<?php

namespace App\Http\Controllers\Admin\Block;

use App\Models\Block;
use App\Services\BaseResourceController;
use Illuminate\View\View;
use Str;

class ResourceController extends BaseResourceController
{
    public string $modelNameSlug = 'block';

    public function index() : View
    {
        $this->authorize('index', $this->modelNamespace);
        $this->meta['link_route'] = route('admin.' . $this->modelNameSlug . '.list.create');
        $this->meta['link_name'] = __('create_new') . $this->modelNameTranslate;
        $this->meta['title'] = $this->modelNameTranslate . __('manager');
        $this->meta['search'] = 1;
        $columns = [];
        foreach(collect($this->modelColumns)->where('table', true) as $column)
        {
            $columns[] = [
                'field' => $column['name'],
                'title' => preg_replace('/([a-z])([A-Z])/s', '$1 $2', Str::studly($column['name'])),
            ];
        }

        $blocks = Block::orderBy('order', 'asc')
            ->where('type', '!=', 'loading')
            ->get();

        return view('admin.page.block.index', ['meta' => $this->meta, 'columns' => $columns, 'blocks' => $blocks]);
    }

    public function postSort()
    {
        $this->authorize('index', $this->modelNamespace);
    	$block_sort_json = $this->httpRequest->blockSort;
    	$block_sort = json_decode($block_sort_json);
    	$this->_saveSort($block_sort);
    	$this->httpRequest->session()->flash('alert-success', $this->modelName . ' Order Updated Successfully!');

        return redirect()->route('admin.' . $this->modelNameSlug . '.list.index');
    }

    private function _saveSort(array $block_ids) : void
    {
    	foreach($block_ids as $block_order => $block_id)
    	{
    		$block = Block::find($block_id);
    		$block->order = (3 * $block_order) + 1;
    		$block->save();
    	}
    }
}
