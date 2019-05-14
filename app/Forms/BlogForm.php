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
            ->add('roles', 'choice', [
                'choices' => ['admin' => 'Admin', 'manager' => 'Manager']
            ])
            ->add('submit', 'submit', ['label' => 'Save form'])
            ;
    }
}
