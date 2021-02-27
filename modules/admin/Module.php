<?php

namespace app\modules\admin;
use Yii;
/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{

    public $controllerNamespace = 'app\modules\admin\controllers';
    public $layout = 'main';

    public function init()
    {

        Yii::$app->language = 'ua';
        Yii::$app->i18n->translations['admin'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en-US',
            'basePath' => '@app/messages',
        ];

        parent::init();

        // custom initialization code goes here
    }
}
