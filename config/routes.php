<?php

return [
    '/?' => 'task/index',
    'page/([0-9]+)' => 'task/index/page:$1',
    'create' => 'task/create',
    'preview' => 'task/preview',
    'admin/enter' => 'admin/enter',
    'admin/authentication' => 'admin/authentication',
    'admin/exit' => 'admin/exit',
    'admin/edit-render' => 'admin/edit-render',
    'admin/edit' => 'admin/edit',
];