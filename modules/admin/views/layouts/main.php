<?php
use app\modules\admin\assets\AdminAsset;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this \yii\web\View */
/* @var $content string */

AdminAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="skin-blue">

<?php $this->beginBody() ?>


<?= $this->render('_header') ?>



<div class="wrapper row-offcanvas row-offcanvas-left">

    <aside class="left-side sidebar-offcanvas">

        <section class="sidebar">
            <?=
            \app\modules\admin\widgets\SidebarMenu::widget([
                'items' => [
                    ['label' => 'Главная', 'url' => ['/admin/'], 'icon' => 'dashboard', 'active' => Yii::$app->controller->id === 'default'],
                    ['label' => 'Страницы', 'url' => ['/admin/pages'], 'icon' => 'file-text', 'active'=>Yii::$app->controller->id === 'pages'],
                    ['label' => 'Пользователи', 'url' => ['/admin/users'], 'icon' => 'user', 'active'=>Yii::$app->controller->id==='users'],
                    ['label' => Yii::t('app.admin', 'Категории объявлений'), 'url' => ['/admin/categories'], 'icon' => 'folder', 'active'=>Yii::$app->controller->id==='categories']
                ],
                'options' => [
                    'class' => 'sidebar-menu'
                ],
                'encodeLabels' => false
            ]) ?>
        </section>
    </aside>

    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?= $this->title ?>
                <small><?= Yii::t('app', 'Панель управления')?></small>
            </h1>
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                'homeLink' => ['label' => Yii::t('app', 'Панель управления'), 'url']
            ])?>
<!--            <ol class="breadcrumb">-->
<!--                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>-->
<!--                <li class="active">Dashboard</li>-->
<!--            </ol>-->
        </section>

        <!-- Main content -->
        <section class="content">

            <?= $content ?>

        </section>

    </aside>
    <!-- /.Left col -->
    <!-- right col (We are only adding the ID to make the widgets sortable)-->

    <!-- right col -->
</div>
<!-- /.row (main row) -->

<!-- ./wrapper -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
