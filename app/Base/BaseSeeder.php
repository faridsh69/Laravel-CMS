        $models = [
            'Blog', 'Page',
        ];

        foreach($models as $model) {
            factory('App\\Models\\' . $model, 8)->create();
        }
