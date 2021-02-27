<?php

namespace app\models;

use Yii;


class PageTranslate extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'page_translate';
    }


    public function rules()
    {
        return [
            [['header','meta_title'], 'required'],
            [['content', 'short_content', 'images'], 'string'],
            [['header', 'header2', 'meta_title', 'meta_description'], 'string', 'max' => 255],

        ];
    }


    public function attributeLabels()
    {
        return [
            'page_id' => Yii::t('admin', 'Page ID'),
            'language' => Yii::t('admin', 'Language'),
            'header' => Yii::t('admin', 'Header'),
            'header2' => Yii::t('admin', 'Header2'),
            'content' => Yii::t('admin', 'Content'),
            'short_content' => Yii::t('admin', 'Short Content'),
            'meta_title' => Yii::t('admin', 'Meta Title'),
            'meta_description' => Yii::t('admin', 'Meta Description'),
            'images' => Yii::t('admin', 'Images'),
        ];
    }
    public function getPage()
    {
        return $this->hasOne(Page::className(), ['id' => 'page_id']);
    }
}
