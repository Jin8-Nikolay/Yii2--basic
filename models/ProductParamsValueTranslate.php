<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_params_value_translate".
 *
 * @property int $id
 * @property int|null $product_params_value_id
 * @property string|null $language
 * @property string $value
 */
class ProductParamsValueTranslate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_params_value_translate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_params_value_id'], 'integer'],
            [['value'], 'required'],
            [['language', 'value'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('admin', 'ID'),
            'product_params_value_id' => Yii::t('admin', 'Product Params Value ID'),
            'language' => Yii::t('admin', 'Language'),
            'value' => Yii::t('admin', 'Value'),
        ];
    }
}
