<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\ProductParamsValue;
use app\models\ProductParamsValueSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductParamsValueController implements the CRUD actions for ProductParamsValue model.
 */
class ProductParamsValueController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }


    public function actionIndex()
    {
        $searchModel = new ProductParamsValueSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    public function actionCreate()
    {
        $model = new ProductParamsValue();

        if ($model->load(Yii::$app->request->post())) {
            foreach (Yii::$app->request->post('ProductParamsValueTranslate', []) as $language => $data) {
                foreach ($data as $attribute => $translation) {
                    $model->translate($language)->$attribute = $translation;
                }
            }
            $model->save();
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            foreach (Yii::$app->request->post('ProductParamsValueTranslate', []) as $language => $data) {
                foreach ($data as $attribute => $translation) {
                    $model->translate($language)->$attribute = $translation;
                }
            }
            $model->save();
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }


    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    protected function findModel($id)
    {
        if (($model = ProductParamsValue::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('admin', 'The requested page does not exist.'));
    }
}
