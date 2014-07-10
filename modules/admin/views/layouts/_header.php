<?php
/**
 * @var \yii\web\View $this
 */

use yii\helpers\Html;
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;
?>

<!--suppress ALL -->
<header class="header">

    <?= Html::a(Yii::$app->name, ['/admin'], ['class' => 'logo']) ?>

    <?php NavBar::begin(['options' => ['class' => 'navbar-static-top'], 'renderInnerContainer' => false]); ?>


    <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only"><?= Yii::t('app', 'Переключить навигацию')?></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </a>

    <div class="navbar-right">
        <?=
        /** @noinspection PhpUndefinedFieldInspection */
        Nav::widget([
            'options' => ['class' => 'navbar-nav'],
            'items' => [
                ['label' => 'Пользователь', 'options' => ['class' => 'dropdown user user-menu'], 'items' => [
                    Html::tag('li',Html::img('img/avatar3.png', ['class' => 'img-circle']).'<p>'.Yii::$app->user->identity->login.'</p>',['class' => 'user-header bg-light-blue']),
                    Html::tag('li', Html::tag('div', Html::a(Yii::t('app', 'Выйти'), ['/site/logout'], ['class' => 'btn btn-default btn-flat']), ['class' => 'pull-right']),['class' => 'user-footer']),
                ]]
            ],
        ]);  ?>
    </div>

    <?php NavBar::end(); ?>


</header>