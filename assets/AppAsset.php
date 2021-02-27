<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;


class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css',
        'css/core-style.css',
    ];
    public $js = [
        'js/popper.min.js',
        'js/plugins.js',
        'js/active.js',
        'https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js',
        'js/custom.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
