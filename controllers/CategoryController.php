<?php


namespace app\controllers;


use app\models\Category;
use app\models\Page;
use app\models\Product;
use app\models\ProductFilter;
use app\models\ProductParams;
use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;

class CategoryController extends Controller
{
    public $statusActive = 1;

    public $pageSize = 10;

    public function actionIndex(){
        $dataProvider = new ActiveDataProvider([
            'query'=>Category::find()->andWhere(['status'=>$this->statusActive]),
            'pagination'=>[
              'pageSize'=>$this->pageSize,
            ],
        ]);
        return $this->render('index',['dataProvider'=>$dataProvider]);
    }

    public function actionView($id)
    {
        $modelFilter = new ProductFilter();

        $dataProvider = $modelFilter->search(Yii::$app->request->queryParams,$id);
        $model = $this->findModel($id);
        $minPrice = Product::minPrice($id);
        $maxPrice = Product::maxPrice($id);
        $params = ProductParams::findActiveByCategory($id);
        return $this->render('view',[
            'model'=>$model,
            'dataProvider'=>$dataProvider,
            'modelFilter'=>$modelFilter,
            'minPrice'=>$minPrice,
            'maxPrice'=>$maxPrice,
            'params'=>$params,
        ]);
    }

    public function findModel($id){

        if(($model = Category::findActive($id)) !== null){
            return $model;
        }
    }

}