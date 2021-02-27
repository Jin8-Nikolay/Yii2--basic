<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_params_translate".
 *
 * @property int $id
 * @property int|null $product_params_id
 * @property string|null $language
 * @property string $name
 * @property string|null $description
 */
class ProductParamsTranslate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_params_translate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_params_id'], 'integer'],
            [['name'], 'required'],
            [['description'], 'string'],
            [['language', 'name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('admin', 'ID'),
            'product_params_id' => Yii::t('admin', 'Product Params ID'),
            'language' => Yii::t('admin', 'Language'),
            'name' => Yii::t('admin', 'Name'),
            'description' => Yii::t('admin', 'Description'),
        ];
    }
}
