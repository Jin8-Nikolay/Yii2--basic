<?php

namespace app\models;
use creocoder\translateable\TranslateableBehavior;
use Yii;


class Page extends \yii\db\ActiveRecord
{

    public function behaviors()
    {
        return [
            'translateable' => [
                'class' => TranslateableBehavior::className(),
                'translationAttributes' => ['header','header2','content','short_content',
                    'meta_title','meta_description', 'images'],
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
        return 'page';
    }

    public function rules()
    {
        return [
            [['status', 'category_id', 'created_at', 'updated_at'], 'integer'],
            [['index', 'alias'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('admin', 'ID'),
            'status' => Yii::t('admin', 'Status'),
            'index' => Yii::t('admin', 'Index'),
            'alias' => Yii::t('admin', 'Alias'),
            'category_id' => Yii::t('admin', 'Category ID'),
            'created_at' => Yii::t('admin', 'Created At'),
            'updated_at' => Yii::t('admin', 'Updated At'),
        ];
    }

    public function getTranslations()
    {
        return $this->hasMany(PageTranslate::className(), ['page_id' => 'id']);
    }

}
