<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        // 'css/site.css',
        'css/fonts/linecons/css/linecons.css',
        'css/fonts/fontawesome/css/font-awesome.min.css',
        'css/bootstrap.min.css',
        'css/xenon-core.css',
        'css/xenon-forms.css',
        'css/xenon-components.css',
        'css/xenon-skins.css',
        'css/custom.css',
    ];
    public $js = [
        'js/bootstrap.min.js',
        'js/TweenMax.min.js',
        'js/resizeable.js',
        'js/joinable.js',
        'js/xenon-api.js',
        'js/xenon-toggles.js',
        'js/xenon-custom.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        // 'yii\bootstrap\BootstrapAsset',
    ];
}
