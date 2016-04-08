<?php  
use yii\widgets\Pjax;  
use yii\helpers\Html; 
use  yii\grid\GridView;
?>  

<h1>这是time页面</h1>

<button id="btnajax">点击</button>
<div class="ajax"></div>

<script>
		$(function(){
		
			 $.ajax({
			   type: "get",
			   url: "index.php?r=time/index",
			   beforeSend: function(XMLHttpRequest){
					$('<div class="quick-alert">数据加载中，请稍后</div>')
						.insertAfter( $("#btnajax") )
						.fadeIn('slow')
			   },
			   success: function(data, textStatus){
					$(".ajax").html(data[0]);
					// $("item",data).each(function(i, domEle){
					// 	$(".ajax").append("<li>"+$(domEle).children("title").text()+"</li>");
					// });
					
			   },
			   complete: function(XMLHttpRequest, textStatus){
					//HideLoading();
						$('.quick-alert')
						.fadeOut('slow', function() {
						  $(this).remove();
						});
						alert("<?=date('Y-m-d',1221346454789)?>")
			   },
			   error: function(){
					//请求出错处理
			   }
			 });
	});
	</script>   
