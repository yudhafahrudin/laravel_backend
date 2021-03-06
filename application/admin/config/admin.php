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
                'addUser' => [
                    'name' => 'User',
                    'icon' => '',
                    'url' => 'users',
                ],
            ],
        ],
        'trash' => [
            'name' => 'Trash',
            'icon' => 'fa-trash-o',
            'subnav' => [
                'userTrash' => [
                    'name' => 'User Trashed',
                    'icon' => '',
                    'url' => 'users/trash/all',
                ],
            ],
        ],
        'logActivity' => [
            'name' => 'Log',
            'icon' => 'fa-history',
            'subnav' => [
                'createdLog' => [
                    'name' => 'Created Loged',
                    'icon' => '',
                    'url' => 'logs/created',
                ],
                'restoredLog' => [
                    'name' => 'Restored Loged',
                    'icon' => '',
                    'url' => 'logs/restored',
                ],
                'updatedLog' => [
                    'name' => 'Updated Loged',
                    'icon' => '',
                    'url' => 'logs/updated',
                ],
                'deletedLog' => [
                    'name' => 'Deleted Loged',
                    'icon' => '',
                    'url' => 'logs/deleted',
                ],
            ],
        ],
    ],
];
