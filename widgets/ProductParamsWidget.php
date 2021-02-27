<?php


namespace app\widgets;

use app\models\ProductParams;
use app\models\ProductParamsValue;
use yii\base\Widget;

class ProductParamsWidget extends Widget
{
    public $category_id;
    public $product_id;
    public function init(){
        $paramsModel = new ProductParams();
        $paramsValueModel = new ProductParamsValue();
        $product_id = $this->product_id;
        $params = ProductParams::findAll(['category_id'=>$this->category_id]);
        echo $this->render('/product-params-value/_form',compact('paramsModel','paramsValueModel','params','product_id'));
    }

}