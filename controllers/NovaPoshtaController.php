<?php


namespace app\controllers;


use app\models\NovaPoshtaApi2;
use Yii;
use yii\web\Controller;

class NovaPoshtaController extends Controller
{

    public function actionGetCities(){
        $np = new NovaPoshtaApi2('645aacd31d4b859a0da573502ce35183');
        if (Yii::$app->request->post()) {
            $searchTerm = Yii::$app->request->post('searchTerm');
            $cities = $np->getCities(0, $searchTerm);
        } else {
            $cities = $np->getCities();
        }
        $citiesArr = [];
        if (is_array($cities['data'])) {
            foreach ($cities['data'] as $key => $city) {
                $citiesArr[] = ['id' => $key, 'text' => $city['DescriptionRu']];
            }
        }
        return json_encode($citiesArr, JSON_UNESCAPED_UNICODE);
    }

}