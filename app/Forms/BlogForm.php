<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class BlogForm extends Form
{
    public function buildForm()
    {
    	$id = $this->model ? $this->model->id : 0;
        $this
            ->add('url', 'text', [
            	'rules' => 'required|max:80|regex:/[a-z0-9-]/|unique:blogs,url,' . $id,
            	'help_block' => [
			        'text' => 'Url should be unique, contain lowercase characters and numbers and -',
			    ],
            ])
            ->add('title', 'text', [
                'rules' => 'required|min:10|max:70|unique:blogs,title,' . $id,
                'help_block' => [
			        'text' => 'Title should be unique, minimum 10 and maximum 60 characters.',
			    ],
            ])
            ->add('short_content', 'textarea', [
                'rules' => 'nullable|max:191',
                'help_block' => [
			        'text' => 'Short content will show in lists instead of content.',
			    ],
            ])
            ->add('content', 'textarea', [ 
                'rules' => 'required|seo_header',
            ])
            ->add('meta_description', 'text', [
                'rules' => 'required|min:70|max:191',
                'help_block' => [
			        'text' => 'Meta description should have minimum 70 and maximum 191 characters.',
			    ],
            ])
            ->add('keywords', 'text', [
                'rules' => 'nullable|max:191',
            ])
            ->add('meta_image', 'text', [
                'rules' => 'nullable|max:191|url',
            ])
            ->add('published', 'checkbox', [
                'checked' => true,
                'value' => 1,
            ])
            ->add('google_index', 'checkbox', [
                'checked' => true,
                'value' => 1,
                'help_block' => [
			        'text' => 'Google will index this page.',
			    ],
            ])
            ->add('canonical_url', 'text', [
                'rules' => 'nullable|max:191|url',
                'help_block' => [
			        'text' => 'Canonical url just used for seo redirect duplicate contents.',
			    ],
            ])
            ->add('submit', 'submit')
            ;
    }
}
