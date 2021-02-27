<?php

namespace app\models;

use creocoder\translateable\TranslateableBehavior;
use Yii;


class ProductParams extends \yii\db\ActiveRecord
{
    public static $statusActive = 1;

    public function behaviors()
    {
        return [
            'translateable' => [
                'class' => TranslateableBehavior::className(),
                'translationAttributes' => ['name'],
            ],
        ];
    }

    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_INSERT | self::OP_UPDATE,
        ];
    }

    public static function tableName()
    {
        return 'product_params';
    }


    public function rules()
    {
        return [
            [['category_id'], 'required'],
            [['category_id', 'status', 'pos'], 'integer'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => Yii::t('admin', 'ID'),
            'category_id' => Yii::t('admin', 'Category ID'),
            'status' => Yii::t('admin', 'Status'),
            'pos' => Yii::t('admin', 'Pos'),
        ];
    }

    public function getTranslations()
    {
        return $this->hasMany(ProductParamsTranslate::className(), ['product_params_id' => 'id']);
    }

    public static function findActive()
    {
        return self::find()->where(['status' => self::$statusActive])->all();
    }

    public static function findActiveByCategory($id)
    {
        return self::find()
            ->where(['status' => self::$statusActive])
            ->andWhere(['category_id'=>$id])
            ->all();
    }

}
