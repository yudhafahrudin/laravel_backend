<?php

/*
  |--------------------------------------------------------------------------
  | Array for admin navigation
  |--------------------------------------------------------------------------
  |
  | This array for make automaticaly navigation list in backend
  |
 */
return [
    'navigation' => [
        'category' => [
            'name' => 'Category',
            'icon' => 'fa-tags',
            'url' => 'categories',
        ],
        'user' => [
            'name' => 'User',
            'icon' => 'fa-user',
            'subnav' => [
                'add_user' => [
                    'name' => 'User',
                    'icon' => '',
                    'url' => 'user',
                ],
            ],
        ],
    ],
];
