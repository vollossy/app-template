<?php
namespace app\modules\admin\controllers;


use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use Yii;
use yii\web\NotFoundHttpException;

/**
 * Базовый класс контроллера для админки
 * @package app\modules\admin\controllers
 */
abstract class AdminController extends Controller{

    /**
     * Получает полное имя класса, crud для которого нужно реализовать
     *
     * @return string Полное имя класса модели, работа над которым осуществляется в данном контроллере
     */
    abstract public function getModelClass();

    /** @inheritdoc */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ]
        ];
    }

    /**
     * Показывает все записи
     * @return mixed
     */
    public function actionIndex()
    {
        $class = $this->getModelClass();
        /** @noinspection PhpUndefinedMethodInspection */
        $dataProvider = $this->getIndexDP();

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Показывает отдельную запись
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Создает новую запись в бд
     * Если создание новой записи прошло успешно, то пользователя перенаправит на страницу просмотра информации
     * @return mixed
     */
    public function actionCreate()
    {
        $class = $this->getModelClass();
        /** @var ActiveRecord $model */
        $model = new $class();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->primaryKey]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Обновляет запись
     * Если обновление успешное, то пользователь перенаправляется на действие view
     * @param integer $id Идентификатор записи
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->primaryKey]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Удаляет запись
     * Если удаление прошло успешно, то пользователь перенаправляется на действие index
     * @param integer $id Идентификатор записи, которую нужно удалить
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Ищет запись в бд и если не находит, выбрасывает исключение
     * @param integer $id
     * @return ActiveRecord the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        $className = $this->getModelClass();
        /** @noinspection PhpUndefinedMethodInspection */
        if (($model = $className::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app.admin', 'Указываемая запись не найдена.'));
        }
    }

    /**
     * Получает провайдер данных для действия index
     */
    protected function getIndexDP()
    {
        $class = $this->getModelClass();
        return new ActiveDataProvider([
            'query' => $class::find(),
        ]);
    }
}