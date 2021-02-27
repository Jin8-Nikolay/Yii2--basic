<?php

namespace app\models;

use creocoder\translateable\TranslateableBehavior;
use Yii;

/**
 * This is the model class for table "product_params_value".
 *
 * @property int $id
 * @property int|null $product_id
 * @property int|null $params_id
 */
class ProductParamsValue extends \yii\db\ActiveRecord
{

    public static $statusActive = 1;

public function behaviors()
{
    return [
        'translateable' => [
            'class' => TranslateableBehavior::className(),
            'translationAttributes' => ['value'],
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
        return 'product_params_value';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'params_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('admin', 'ID'),
            'product_id' => Yii::t('admin', 'Product ID'),
            'params_id' => Yii::t('admin', 'Params ID'),
        ];
    }

    public function getTranslations()
    {
        return $this->hasMany(ProductParamsValueTranslate::className(), ['product_params_value_id' => 'id']);
    }


    public static function findActive(){
        return self::find()->where(['status'=>1])->all();
    }

    public static function findByParams($id){
        return self::find()
            ->innerJoin('product_params_value_translate', 'product_params_value.id = product_params_value_translate.product_params_value_id')
            ->where(['product_params_value.params_id' => $id])
//
            //    ->groupBy('product_params_value_translate.value')
            ->all();
    }

}
