<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error">

   <div class="page-error centered">
        
        <div class="error-symbol">
            <i class="fa-warning"></i>
        </div>
        
        <h2>
            <?= Html::encode($this->title) ?>

            <small><?= nl2br(Html::encode($message)) ?></small>
        </h2>
        
        <p>您寻找的页面被外星人绑架了!</p>
        <p>你可以搜索或联系我们的代理来帮助你!</p>
        
    </div>
    
    <div class="page-error-search centered">
        <form class="form-half" method="get" action="" enctype="application/x-www-form-urlencoded">
            <input type="text" class="form-control input-lg" placeholder="搜索..." />
            
            <button type="submit" class="btn-unstyled">
                <i class="linecons-search"></i>
            </button>
        </form>
        
        <a href="#" class="go-back">
            <i class="fa-angle-left"></i>
            返回
        </a>
    </div>

</div>
