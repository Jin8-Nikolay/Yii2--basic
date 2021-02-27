<?php


namespace app\controllers;

use app\models\Page;
use Yii;
use yii\web\Controller;
use yii\web\HttpException;

class PageController extends Controller
{
    public $statusActive = 1;
    public function actionView($id){
        $model=$this->findModel($id);
        return $this->render('view',['model'=>$model]);
    }

    public function findModel($id){
        $result = Page::findOne(['id'=>$id,'status'=>$this->statusActive]);
        if ($result !== null){
            return $result;
        }
        throw new HttpException(404,'Page not Found');
    }
}