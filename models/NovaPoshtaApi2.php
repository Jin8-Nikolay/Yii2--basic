<?php


namespace app\models;
use yii;

class NovaPoshtaApi2
{
    public $key;
    public $language = 'ru';
    public $model='Common';
    public $method;
    public $params;
    public $areas;

    public function __construct($key,$language='ru')
    {
        return $this
            ->setKey($key)
            ->setLanguage($language)
            ->model('Common');
    }

    public function setKey($key){
        $this->key = $key;
        return $this;
    }

    public function getKey(){
        return $this->key;
    }

    public function setLanguage($language){
        $this->language = $language;
        return $this;
    }
    public function getLanguage(){
        return $this->language;
    }

    public function model($model=''){
        if (!$model){
            return $this->model;
        }
        $this->model = $model;
        return $this;
    }

    public function method($method = ''){
        if (!$method){
            return $this->method;
        }
        $this->method = $method;
        return $this;
    }

    public function request($model, $method, $params = [])
    {
        $url = 'https://api.novaposhta.ua/v2.0/json/';
        $data = [
            'apiKey' => $this->key,
            'modelName' => $model,
            'calledMethod' => $method,
            'language' => $this->language,
            'methodProperties' => $params,
        ];
        $post = json_encode($data);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, ['Content Type: application/json']);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        $result = curl_exec($ch);
        curl_close($ch);
        return $this->prepare($result);
    }

    public function prepare($data){
        $result = is_array($data) ? $data : json_decode($data,1);
        if ($result['errors']){
            throw new \Exception(is_array($result['errors']) ? implode('\n',$result['errors']) : $result['errors']);
        }
        return $result;
    }

    public function getCities($page = 0,$findByString = '',$ref='')
    {
        return $this->request('Address','getCities',[
          'Page'=>$page,
          'FindByString'=>$findByString,
          'Ref'=>$ref,
        ]);
    }

    public function getCity($cityName, $areaName = '')
    {
        $cities = $this->getCities(0, $cityName);
        $error = [];
        if (is_array($cities['data'])) {
            $data = (count($cities['data'])>1)
            ? $this->findCityByRegion($cities,$areaName)
            : $cities['data'][0];
        }
        (!$data) and $error = 'City was not found';
        return $this->prepare([
            'success' => empty($error),
            'data' => [$data],
            'errors' => (array)$error,
            'warnings' => [],
            'info' => [],
        ]);
    }

    public function getWarehouses($cityRef,$page = 10){
        return $this->request('Address','getWarehouses',[
            'CityRef'=>$cityRef,
            'Page'=>$page,
        ]);
    }

    public function getWarehouse($cityRef,$description = ''){
        $warehouses = $this->getWarehouses($cityRef);
        $data = [];
        if (is_array($warehouses['data'])){
            if (count($warehouses['data']===1) or !$description){
                $data = $warehouses['data'][0];
            }elseif (count($warehouses['data'])>1){
                foreach ($warehouses['data'] as $warehouse){
                    $data = $warehouse;
                    break;
                }
            }
        }
        (!$data) and $error = 'Warehouse was not found';
        return $this->prepare([
            'success' => empty($error),
            'data' => array($data),
            'errors' => (array)$error,
            'warning' => [],
            'info'=>[],
        ]);
    }

    public function getStreet($cityRef,$findByString = '',$page = 0){
        return $this->request('Address','getStreet',[
           'FindByString'=>$findByString,
           'CityRef'=>$cityRef,
           'Page'=>$page,
        ]);
    }

    public function getAreas($ref = '',$page=0){
        return $this->request('Address','getAddress',[
            'Ref'=>$ref,
            'Page'=>$page,
        ]);
    }

    public function findArea(array $areas,$findByString='',$ref = ''){
        $data = [];
        if (!$findByString and ! $ref){
            return $data;
        }

        foreach ($areas as $key=>$area){
            $found = $findByString ? (mb_stripos($area['Description'],$findByString) !== false)
                or (mb_stripos($area['DescriptionRu'],$findByString) !== false)
                or (mb_stripos($area['Area'],$findByString) !== false)
                or (mb_stripos($area['AreaRu'],$findByString) !== false)
                : ($key == $ref);
            if ($found){
                $area['Ref'] = $key;
                $data[]=$area;
                break;
            }
        }
        return $data;
    }

    public function getArea($findByString='',$ref = ''){
        $error = [];
        $this->areas = include Yii::getAlias('@app/models/').'NovaPoshtaApi2Areas.php';
        $data = $this->findArea($this->areas,$findByString,$ref);
        empty($data) and $error = 'Area was not found';
        return $this->prepare([
            'success' => empty($error),
            'data' => $data,
            'errors' => (array)$error,
            'warning' => [],
            'info' => [],
        ]);
    }

    public function findCityByRegion($cities,$areaName){
        $data=[];
        $area = $this->getArea($areaName);
        $area['success'] and $areaRef = $area['data'][0]['Ref'];
        if ($areaRef and is_array($cities['data'])){
            foreach ($cities['data'] as $city){
                if ($city['Area']===$areaRef){
                    $data[]=$city;
                }
            }
        }
        return $data;
    }







}