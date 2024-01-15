<?php

return [
    'alias_separator' => env('CRUD_SERVICE_ALIAS_SEPARATOR', '_'),
    'per_page_name' => env('CRUD_SERVICE_PER_PAGE_NAME', 'per_page'),
    'count_page_elements' => env('CRUD_SERVICE_COUNT_PAGE_ELEMENTS', 20),
    'current_page_name' => env('CRUD_SERVICE_CURRENT_PAGE_NAME', 'page'),
    'get_all_elements_var_value' => env('CRUD_SERVICE_ALL_ELEMENTS_VAR_VALUE', 'all'),
];
