<?php

namespace app\models;

use yii\base\Model;
use Yii;
use yii\data\ActiveDataProvider;

class ProductFilter extends Model
{
    public $price_min;
    public $price_max;
    public $statusActive = 1;
    public $params_value;

    public function rules()
    {
        return [
            [['price_min','price_max'],'string'],
            [['params_value'],'safe'],
        ];
    }


    public function scenarios()
    {
        return Model::scenarios();
    }


    public function search($params,$category_id)
    {
        $query = Product::find();
        $query->innerJoin('product_params_value', 'product.id = product_params_value.product_id');
        $query->innerJoin('product_params_value_translate', 'product_params_value.id = product_params_value_translate.product_params_value_id');
        $query->andWhere(['category_id'=>$category_id]);
        $query->andWhere(['status'=>$this->statusActive]);
        $dataProvider = new ActiveDataProvider([
           'query'=>$query,
        ]);
        $this->load($params);
        if (!$this->validate()){
            return $dataProvider;
        }
        if (count($params)>1){
        $query->andWhere(['>=','price',$this->price_min]);
        $query->andWhere(['<=','price',$this->price_max]);
        }
        if (isset($params['ProductFilter']['params_value'])){
            $paramsValue = $params['ProductFilter']['params_value'];
            foreach ($paramsValue as $value){
                foreach ($value as $val){
                    $query->andWhere(['product_params_value_translate.value'=>$val]);
                }
            }
        }
        return $dataProvider;
    }
}

?>