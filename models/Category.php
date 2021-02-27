<?php

namespace app\models;
use creocoder\translateable\TranslateableBehavior;
use Yii;


class Category extends \yii\db\ActiveRecord
{

    public static $statusActive = 1;

    public function behaviors()
    {
        return [
            'translateable' => [
                'class' => TranslateableBehavior::className(),
                'translationAttributes' => ['header','content','short_content'],
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
        return 'category';
    }


    public function rules()
    {
        return [
            [['created_at', 'updated_at', 'status'], 'integer'],
            [['index','image'], 'string', 'max' => 255],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => Yii::t('admin', 'ID'),
            'created_at' => Yii::t('admin', 'Created At'),
            'updated_at' => Yii::t('admin', 'Updated At'),
            'status' => Yii::t('admin', 'Status'),
            'index' => Yii::t('admin', 'Index'),
            'image' => Yii::t('admin', 'Image'),
        ];
    }

    public function getTranslations()
    {
        return $this->hasMany(CategoryTranslate::className(), ['category_id' => 'id']);
    }

    public static function findActive($id){
        return self::findOne(['id'=>$id,'status'=>self::$statusActive]);
    }
}
