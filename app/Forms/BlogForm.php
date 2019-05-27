<?php

namespace App\Forms;

use App\Forms\Base\BaseForm;

class BlogForm extends BaseForm
{
    public $model_name = 'Blog';

    public function addTop()
    {
		// $this->add('title', 'text-m', [
  //           'rules' => 'required|max:60|min:10|unique:blogs,title,' . $id,
  //           'help_block' => [
		//         'text' => 'Title should be unique, minimum 10 and maximum 60 characters.',
		//     ],
  //       ]);    
	}

    public function addBottom()
    {
        $this->add('tags', 'entity', [
            'class' => 'Conner\Tagging\Model\Tag',
            'property' => 'name',
            'property_key' => 'id',
            'attr' => ['multiple' => 'true', 'class' => 'form-control m-bootstrap-select m-bootstrap-select--pill m-bootstrap-select--air m_selectpicker', 'data-live-search' => 'true'],
        ]);
    }
}
