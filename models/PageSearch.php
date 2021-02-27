<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Page;


class PageSearch extends Page
{

    public $header;

    public function rules()
    {
        return [
            [['id', 'status', 'category_id', 'created_at', 'updated_at'], 'integer'],
            [['index', 'alias','header'], 'safe'],
        ];
    }


    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }


    public function search($params)
    {
        $query = Page::find();
        $query->groupBy('id');
        $query->joinWith('translations');
        $dataProvider = new ActiveDataProvider([
            'query' =>$query,
        ]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status,
            'category_id' => $this->category_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'header' => $this->header,
        ]);

        $query->andFilterWhere(['like', 'index', $this->index])
            ->andFilterWhere(['like', 'alias', $this->alias])
            ->andFilterWhere(['like', PageTranslate::tableName().'.header', $this->header]);

        return $dataProvider;
    }
}
