<?php

Yii::setAlias('@tests', dirname(__DIR__) . '/tests');

$params = require(__DIR__ . '/params.php');

if(file_exists(__DIR__.'/db.php')){
    $db = require(__DIR__ . '/db.php');
    $config['db'] = $db;
}

return [
    'id' => 'basic-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'app\commands',
    'language' => 'ru',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => (isset($db)) ? $db : null,
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'sourceLanguage' => 'ru-RU',
                    'fileMap' => [
                        'app' => 'app.php',
                        'app/error' => 'error.php',
                        'app.console' => 'console.php'
                    ],
                ],
            ],
        ],
        'authManager' => [
            'class' => \yii\rbac\DbManager::className()
        ]
    ],
    'params' => $params,
];
