<?php
namespace app\commands;


use yii\console\Controller;
use yii\console\Exception;
use yii\helpers\Console;
use yii\helpers\FileHelper;

/**
 * Class EnvironmentController
 * Класс, который переключает окружение(копирует файлы в зависимости от того, какое имя задано в параметре)
 * Все файлы конфигурации находятся в папке "environments"
 *
 * @package app\commands
 */
class EnvironmentController extends Controller{

    public function actionIndex($environment)
    {
        $directory = \Yii::$app->basePath.'/environments/'.$environment;
        if(file_exists($directory)){
            FileHelper::copyDirectory($directory, \Yii::$app->basePath);
            echo Console::renderColoredString(
                '%g'.\Yii::t('app.console', 'Окружение успешно сменено на {env}', ['env'=>$environment]), true
            );
            echo Console::renderColoredString("%n\n");
        }else{
            throw new Exception(\Yii::t('app.console', 'Указанного окружения не существует'));
        }
    }

}