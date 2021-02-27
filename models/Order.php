<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $name
 * @property string|null $surname
 * @property string|null $patronymic
 * @property string|null $phone
 * @property string|null $email
 * @property float|null $total
 * @property int|null $count
 * @property int|null $status
 * @property string|null $content
 * @property int|null $delivery_id
 * @property int|null $payment_id
 * @property string|null $ip
 * @property string|null $system_info
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'count', 'status', 'delivery_id', 'payment_id'], 'integer'],
            [['total'], 'number'],
            [['comment', 'system_info'], 'string'],
            [['name', 'surname', 'patronymic', 'phone', 'email', 'ip','hash'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('admin', 'ID'),
            'user_id' => Yii::t('admin', 'User ID'),
            'name' => Yii::t('admin', 'Name'),
            'surname' => Yii::t('admin', 'Surname'),
            'patronymic' => Yii::t('admin', 'Patronymic'),
            'phone' => Yii::t('admin', 'Phone'),
            'email' => Yii::t('admin', 'Email'),
            'total' => Yii::t('admin', 'Total'),
            'count' => Yii::t('admin', 'Count'),
            'status' => Yii::t('admin', 'Status'),
            'comment' => Yii::t('admin', 'Content'),
            'delivery_id' => Yii::t('admin', 'Delivery ID'),
            'payment_id' => Yii::t('admin', 'Payment ID'),
            'ip' => Yii::t('admin', 'Ip'),
            'system_info' => Yii::t('admin', 'System Info'),
        ];
    }
}
