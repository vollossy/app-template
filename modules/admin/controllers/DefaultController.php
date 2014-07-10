<?php

namespace app\modules\admin\controllers;


/**
 * Class DefaultController
 * Контроллер по-умолчанию для админки.
 * @package app\modules\admin\controllers
 */
class DefaultController extends AdminController
{
    /**
     * Отображает приветственную страницу
     * @return mixed|string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Получает полное имя класса, crud для которого нужно реализовать
     *
     * @return string Полное имя класса модели, работа над которым осуществляется в данном контроллере
     */
    public function getModelClass()
    {
        return '';
    }
}
