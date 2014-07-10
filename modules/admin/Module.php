<?php

namespace app\modules\admin;

use app\modules\admin\assets\AdminAsset;
use yii\base\Action;
use yii\base\ActionEvent;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\admin\controllers';
    public $layout = 'main';

    public function init()
    {
        parent::init();
        // custom initialization code goes here
    }
}
