<?php

namespace app\modules\admin\assets;

use app\assets\AppAsset;

/**
 * Class AdminAsset
 * Базовый класс для ассетов, применяющихся в админке
 *
 * @package app\modules\admin\assets
 */
class AdminAsset extends AppAsset{

    public $basePath = null;
    public $baseUrl = null;


    public $sourcePath = '@app/modules/admin/assets/resources';
    public $css = ['css/AdminLTE.css', 'css/font-awesome.css', 'css/ionicons.css'];
    public $js = [
        'js/AdminLTE/app.js'
    ];

}