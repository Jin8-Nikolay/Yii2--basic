<?php


namespace app\controllers;
use Yii;
use yii\web\Controller;
use app\models\Product;
use yii\web\HttpException;

class ProductController extends Controller
{
    public $statusActive = 1;

    public function actionView($id){
        $model = $this->findModel($id);
        $this->registerMeta($model);
        return $this->render('view',compact('model'));
    }

    public function findModel($id){
        $model = Product::findOne(['id'=>$id,'status'=>$this->statusActive]);
        if ($model!==null){
            return $model;
        }
        throw new HttpException('404','Product not found');
    }

    protected function registerMeta($model){
        if ($model) {
            $view = Yii::$app->view;
            $view->title = $model->meta_title;
            $view->registerMetaTag(['name' => 'description', 'content' => $model->meta_description]);
        }
    }

}