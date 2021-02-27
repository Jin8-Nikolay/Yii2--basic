<?php

namespace app\assets;

use yii\web\AssetBundle;


class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'admin/css/datepicker3.css',
        'admin/css/styles.css',
        'http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic',
        'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap',
        'admin/css/bootstrap-table.css',
        'admin/css/main.css',
    ];
    public $js = [
        'admin/js/chart.min.js',
        'admin/js/chart-data.js',
        'admin/js/easypiechart.js',
        'admin/js/easypiechart-data.js',
        'admin/js/bootstrap-datepicker.js',
        'admin/js/custom.js',
        'admin/js/main.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
