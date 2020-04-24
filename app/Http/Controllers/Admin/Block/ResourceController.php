<?php

namespace App\Http\Controllers\Admin\Block;

use App\Models\Block;
use App\Services\BaseResourceController;
use Str;

class ResourceController extends BaseResourceController
{
    public $model_slug = 'block';

    public function index()
    {
        $this->authorize('index', $this->model_namespace);
        $this->meta['link_route'] = route('admin.'. $this->model_slug. '.list.create');
        $this->meta['link_name'] = __('create_new'). $this->model_translated;
        $this->meta['title'] = $this->model_translated. __('manager');
        $this->meta['search'] = 1;
        $columns = [];
        foreach(collect($this->model_columns)->where('table', true) as $column)
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
        $this->authorize('index', $this->model_namespace);
    	$block_sort_json = $this->request->blockSort;
    	$block_sort = json_decode($block_sort_json);
    	$this->saveSort($block_sort);
    	$this->request->session()->flash('alert-success', $this->model_name. ' Order Updated Successfully!');

        return redirect()->route('admin.'. $this->model_slug. '.list.index');
    }

    public function saveSort($block_ids)
    {
        $this->authorize('index', $this->model_namespace);
    	foreach($block_ids as $block_order => $block_id)
    	{
    		$block = Block::find($block_id);
    		$block->order = (3 * $block_order) + 1;
    		$block->save();
    	}
    }
}
