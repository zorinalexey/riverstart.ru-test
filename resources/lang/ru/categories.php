<?php

return [
    'view' => [
        'not_found' => 'Запрашиваемая вами категория не существует',
        'empty_list' => 'Список категорий пуст',
    ],
    'delete' => [
        'success' => 'Категория id=:id успешно удалена',
        'error' => 'Не удалось удалить категорию id=:id',
        'error_not_empty' => 'Не возможно удалить категорию с продуктами',
    ],
    'create' => [
        'success' => 'Новая категория успешно создана',
        'error' => 'Не удалось создать новую категорию',
        'uniq_error' => 'Категория с таким названием уже существует',
    ],
    'update' => [
        'success' => 'Категория id=:id успешно обновлена',
        'error' => 'Не удалось обновить категорию id=:id',
    ],
];
