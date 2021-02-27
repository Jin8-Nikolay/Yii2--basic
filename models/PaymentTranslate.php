<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "payment_translate".
 *
 * @property int $id
 * @property int|null $delivery_id
 * @property string|null $name
 * @property string|null $description
 * @property float|null $price
 */
class PaymentTranslate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payment_translate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['delivery_id'], 'integer'],
            [['description'], 'string'],
            [['price'], 'number'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('admin', 'ID'),
            'delivery_id' => Yii::t('admin', 'Delivery ID'),
            'name' => Yii::t('admin', 'Name'),
            'description' => Yii::t('admin', 'Description'),
            'price' => Yii::t('admin', 'Price'),
        ];
    }
}
