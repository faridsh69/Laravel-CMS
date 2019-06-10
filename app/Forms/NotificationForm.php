<?php

namespace App\Forms;

use App\Base\BaseForm;

class NotificationForm extends BaseForm
{
    public $model_name = 'Notification';    

    public function addBottom()
    {
        $this->add('users', 'entity', [
            'class' => 'App\Models\User',
            'property' => 'email',
            'property_key' => 'id',
            'attr' => ['multiple' => 'true', 'class' => 'form-control m-bootstrap-select m-bootstrap-select--pill m-bootstrap-select--air m_selectpicker', 'data-live-search' => 'true'],
        ]);
    }
}
