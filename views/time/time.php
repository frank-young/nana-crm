<?php  
use yii\widgets\Pjax;  
use yii\helpers\Html; 
use  yii\grid\GridView;
?>  

<h1>这是time页面</h1>

<?=Html::a('刷新',['time/time'],['class'=>'btn btn-lg btn-primary'])?>   
<h3><?=$time?>
</h3>


<?=Html::a('进入index页面',['time/index'],['class'=>'btn btn-lg btn-primary'])?>   
