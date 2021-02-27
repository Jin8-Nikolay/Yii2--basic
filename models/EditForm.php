<?php

namespace app\models;

use Yii;
use app\models\User;
use yii\db\ActiveRecord;

class EditForm extends ActiveRecord
{
    public static function tableName()
    {
        return 'user';
    }
    public function rules(){
        return [
            [['username','email'],'unique'],
            [['username','email','phone','patronymic','surname'],'string'],
            ['email','email'],
            [['username','email','phone','patronymic','surname'],'required'],
        ];
    }

    public function edit(){
        $model = self::findOne(Yii::$app->user->id);
        $model->username = $this->username;
        $model->email = $this->email;
        $model->surname = $this->surname;
        $model->patronymic = $this->patronymic;
        $model->phone = $this->phone;
        $model->save(false);

    }

    public function findUser(){
        return self::findOne(Yii::$app->user->id);
    }

}