<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class BlogForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('title', 'text', [
                'rules' => 'required|min:5'
            ])
            ->add('url', 'text')
            ->add('short_content', 'textarea')
            ->add('content', 'textarea')
            ->add('status', 'checkbox')
            ->add('submit', 'submit', ['label' => 'Save form'])
            ;

	        'title' => 'required|max:190',
	        'content' => 'required',
	        'meta_title' => 'max:190',
	        'meta_description' => 'max:190',
	        'category_id' => 'nullable|exists:categories,id',
	    ];

    }
}
