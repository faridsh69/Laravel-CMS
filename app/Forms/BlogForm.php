<?php

namespace App\Forms;

use App\Forms\Base\BaseForm;

class BlogForm extends BaseForm
{
    public $model_name = 'Blog';

    public function addTop()
    {
        $this->add('category_id', 'entity', [
            'label' => 'Category',
            'class' => 'App\Models\Category',
            'property' => 'title',
            'property_key' => 'id',
            'attr' => ['class' => 'form-control m-bootstrap-select m-bootstrap-select--pill m-bootstrap-select--air m_selectpicker', 'data-live-search' => 'true'],
        ]);
	}

    public function addBottom()
    {
        $this->add('tags', 'entity', [
            'class' => 'Conner\Tagging\Model\Tag',
            'property' => 'name',
            'property_key' => 'id',
            'attr' => ['multiple' => 'true', 'class' => 'form-control m-bootstrap-select m-bootstrap-select--pill m-bootstrap-select--air m_selectpicker', 'data-live-search' => 'true'],
        ]);
        $this->add('related_blogs', 'entity', [
            'class' => 'App\Models\Blog',
            'property' => 'title',
            'property_key' => 'id',
            'attr' => ['multiple' => 'true', 'class' => 'form-control m-bootstrap-select m-bootstrap-select--pill m-bootstrap-select--air m_selectpicker', 'data-live-search' => 'true'],
        ]);
    }
}
