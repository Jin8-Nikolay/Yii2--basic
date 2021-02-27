<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int|null $category_id
 * @property string|null $meta_title
 * @property string|null $meta_description
 * @property string|null $header
 * @property string|null $content
 * @property string|null $short_content
 * @property float|null $price
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $status
 * @property string|null $image
 */
class Product extends \yii\db\ActiveRecord
{

    public static $statusActive = 1;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'created_at', 'updated_at', 'status'], 'integer'],
            [['meta_description', 'content', 'short_content', 'image'], 'string'],
            [['price'], 'number'],
            [['meta_title', 'header'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
            'header' => 'Header',
            'content' => 'Content',
            'short_content' => 'Short Content',
            'price' => 'Price',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
            'image' => 'Image',
        ];
    }

    public function getCartProducts($ids)
    {
        if ($ids) {
            return self::find()->where('id IN(' . $ids . ')')->all();
        }
    }

    public static function findActive(){
        return self::find()->where(['status'=>self::$statusActive])->all();
    }

    public static function minPrice($category_id){
        return self::find()->where(['status'=> self::$statusActive])
            ->andWhere(['category_id' => $category_id])->min('price');
    }
    public static function maxPrice($category_id){
        return self::find()->where(['status'=> self::$statusActive])
            ->andWhere(['category_id' => $category_id])->max('price');
    }

}
