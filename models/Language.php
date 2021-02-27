<?php

namespace app\models;

use app\helpers\StatusHelper;
use Yii;


class Language extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'language';
    }


    public function rules()
    {
        return [
            [['status', 'pos'], 'integer'],
            [['title', 'code', 'locale', 'icon'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('admin', 'ID'),
            'title' => Yii::t('admin', 'Title'),
            'code' => Yii::t('admin', 'Code'),
            'locale' => Yii::t('admin', 'Locale'),
            'icon' => Yii::t('admin', 'Icon'),
            'status' => Yii::t('admin', 'Status'),
            'pos' => Yii::t('admin', 'Pos'),
        ];
    }

    public static function findActive(){
        return self::find()->where(['status'=>StatusHelper::$active])->all();
    }

}
