<?php

namespace app\models;

use app\helpers\StatusHelper;
use creocoder\translateable\TranslateableBehavior;
use Yii;


class Payment extends \yii\db\ActiveRecord
{

    public function behaviors()
    {
        return [
            'translateable' => [
                'class' => TranslateableBehavior::className(),
                'translationAttributes' => ['name', 'description', 'price'],
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
        return 'payment';
    }


    public function rules()
    {
        return [
            [['status', 'pos'], 'integer'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => Yii::t('admin', 'ID'),
            'status' => Yii::t('admin', 'Status'),
            'pos' => Yii::t('admin', 'Pos'),
        ];
    }


    public function getTranslations()
    {
        return $this->hasMany(PaymentTranslate::className(), ['payment_id' => 'id']);
    }

    public static function getActive()
    {
        return self::find()->where(['status' => StatusHelper::$active])->all();
    }
}