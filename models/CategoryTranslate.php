<?php

namespace app\models;

use Yii;


class CategoryTranslate extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'category_translate';
    }


    public function rules()
    {
        return [
            [['category_id'], 'integer'],
            [['content', 'short_content','language'], 'string'],
            [['header'], 'string', 'max' => 255],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => Yii::t('admin', 'ID'),
            'category_id' => Yii::t('admin', 'Category ID'),
            'language' => Yii::t('admin', 'Language'),
            'header' => Yii::t('admin', 'Header'),
            'content' => Yii::t('admin', 'Content'),
            'short_content' => Yii::t('admin', 'Short Content'),
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
}
