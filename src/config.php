<?php

return [
    'age' => [
        'path' => 'data' . DIRECTORY_SEPARATOR . 'DimenLookupAge8277.csv',
        'columns' => ['code', 'description', 'sort_order']
    ],
    'area' => [
        'path' => 'data' . DIRECTORY_SEPARATOR . 'DimenLookupArea8277.csv',
        'columns' => ['code', 'description', 'sort_order']
    ],
    'ethnic' => [
        'path' => 'data' . DIRECTORY_SEPARATOR . 'DimenLookupEthnic8277.csv',
        'columns' => ['code', 'description', 'sort_order']
    ],
    'sex' => [
        'path' => 'data' . DIRECTORY_SEPARATOR . 'DimenLookupSex8277.csv',
        'columns' => ['code', 'description', 'sort_order']
    ],
    'year' => [
        'path' => 'data' . DIRECTORY_SEPARATOR . 'DimenLookupYear8277.csv',
        'columns' => ['code', 'description', 'sort_order']
    ],
    'data' => [
        'path' => 'data' . DIRECTORY_SEPARATOR . 'Data8277.csv',
        'columns' => ['year', 'age', 'ethnic', 'sex', 'area', 'count']
    ],

];