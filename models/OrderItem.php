<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_item".
 *
 * @property int $id
 * @property int|null $order_id
 * @property int|null $product_id
 * @property string|null $name
 * @property float|null $price
 * @property int|null $count
 * @property float|null $total
 */
class OrderItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'product_id', 'count'], 'integer'],
            [['price', 'total'], 'number'],
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
            'order_id' => Yii::t('admin', 'Order ID'),
            'product_id' => Yii::t('admin', 'Product ID'),
            'name' => Yii::t('admin', 'Name'),
            'price' => Yii::t('admin', 'Price'),
            'count' => Yii::t('admin', 'Count'),
            'total' => Yii::t('admin', 'Total'),
        ];
    }

    public function add($product, $orderId,$count,$total){
        $model = new self;
        $model->order_id = $orderId;
        $model->product_id = $product->id;
        $model->name = $product->header;
        $model->price = $product->price;
        $model->count = $count;
        $model->total = $total;
        $model->save(false);
    }

    public function getItemsByOrder($orderId){
        return self::find()->where(['order_id'=>$orderId])->all();
    }

}
