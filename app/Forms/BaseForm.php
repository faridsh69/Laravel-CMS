<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class BaseForm extends Form
{
    public function buildForm()
    {
    	$id = $this->model ? $this->model->id : 0;

        $columns = [
            [
                'name' => 'title', 
                'type' => 'string',
                'rule' => 'unique',
                'validation' => 'required|max:60|min:10|unique:blogs,title,',
                'help' => 'Title should be unique, minimum 10 and maximum 60 characters.',
            ],
            [
                'name' => 'url', 
                'type' => 'string',
                'rule' => 'unique',
                'validation' => 'required|max:80|regex:/^[a-z0-9-_]+$/|unique:blogs,url,',
                'help' => 'Url should be unique, contain lowercase characters and numbers and -',
            ],
            [
                'name' => 'short_content', 
                'type' => 'string',
                'rule' => 'nullable',
                'validation' => 'nullable|max:191',
                'help' => 'Short content will show in lists instead of content.',
            ],
            [
                'name' => 'content', 
                'type' => 'text',
                'validation' => 'required|seo_header',
            ],
            [
                'name' => 'meta_description', 
                'type' => 'string',
                'validation' => 'required|max:191|min:70',
                'help' => 'Meta description should have minimum 70 and maximum 191 characters.',
            ],
            [
                'name' => 'keywords', 
                'type' => 'string',
                'rule' => 'nullable',
                'validation' => 'nullable|max:191',
                'help' => 'Its not important for google anymore'
            ],
            [
                'name' => 'meta_image', 
                'type' => 'string',
                'rule' => 'nullable',
                'validation' => 'nullable|max:191|url',
                'help' => 'Meta image shows when this page is shared in social networks.',
            ],
            [
                'name' => 'published', 
                'type' => 'boolean',
                'rule' => 'default',
            ],
            [
                'name' => 'google_index', 
                'type' => 'boolean',
                'rule' => 'default',
                'help' => 'Google will index this page.',
            ],
            [
                'name' => 'canonical_url', 
                'type' => 'string',
                'rule' => 'nullable',
                'rule' => 'nullable|max:191|url',
                'help' => 'Canonical url just used for seo redirect duplicate contents.',
            ],
            [
                'name' => 'creator_id', 
                'relation' => 'users',
            ],
            [
                'name' => 'editor_id', 
                'relation' => 'users',
            ],
        ];

        foreach($columns as $column)
        {
            $name = $column['name'];
            $type = isset($column['type']) ? $column['type'] : '';
            $rule = isset($column['rule']) ? $column['rule'] : '';
            $relation = isset($column['relation']) ? $column['relation'] : '';
            $validation = isset($column['validation']) ? $column['validation'] : '';
            $help = isset($column['help']) ? $column['help'] : null;

            if($relation){
                continue;
            }
            $input_type = 'text-m';
            if($name == 'short_content'){
                $input_type = 'textarea';
            }
            elseif($type == 'text'){
                $input_type = 'ckeditor';
            }
            elseif($type == 'boolean'){
                $input_type = 'switch-m';
            }

            if($rule == 'unique'){
                $validation = $validation . $id;
            }
            $this->add($column['name'], $input_type, [
            	'rules' => $validation,
            	'help_block' => [
			        'text' => $help,
			    ],
            ]);
        }

        $this->add('tags', 'entity', [
            'class' => 'Conner\Tagging\Model\Tag',
            'property' => 'name',
            'property_key' => 'id',
            'attr' => ['multiple' => 'true', 'class' => 'form-control m-bootstrap-select m-bootstrap-select--pill m-bootstrap-select--air m_selectpicker', 'data-live-search' => 'true'],
        ]);
        $this->add('submit', 'submit');
    }
}
