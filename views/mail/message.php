<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\widgets\Pjax;
use yii\web\View;

$this->title = '收件箱';
$this->params['breadcrumbs'][] = $this->title;
?>
			<div class="page-title">
				
				<div class="title-env">
					<h1 class="title"><?= Html::encode($this->title) ?></h1>
					<p class="description">方便快捷管理您的企业邮件</p>
				</div>
				
				<div class="breadcrumb-env">
						
					<?= Breadcrumbs::widget([
			            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
			        ]) ?>
							
				</div>
					
			</div>
					
			<section class="mailbox-env">
				
				<div class="row">
					
					<!-- Email Single -->
					<div class="col-sm-9 mailbox-right" id="ajax-content">
						<div class="mail-single">
							<div id="task"></div>
						</div>
						
					</div>
					
					<!-- Mailbox Sidebar -->
					<div class="col-sm-3 mailbox-left">
						
						<div class="mailbox-sidebar">
							
							<a href="mailbox-compose.html" class="btn btn-block btn-secondary btn-icon btn-icon-standalone btn-icon-standalone-right">
								<i class="linecons-mail"></i>
								<span>写邮件</span>
							</a>
							
							
							<ul class="list-unstyled mailbox-list">
								<li class="active">
									<a href="#">
										收件箱
										<span class="badge badge-success pull-right">6</span>
									</a>
								</li>
								<li>
									<a href="#">
										发件箱
									</a>
								</li>
								<li>
									<a href="#">
										草稿箱
									</a>
								</li>
								<li>
									<a href="#">
										垃圾邮件
										<span class="badge badge-purple pull-right">2</span>
									</a>
								</li>
								<li>
									<a href="#">
										已删除
									</a>
								</li>
							</ul>
							
							<div class="vspacer"></div>
							
							<ul class="list-unstyled mailbox-list">
								<li class="list-header">标签过滤</li>
								<li>
									<a href="#">
										询盘
										<span class="badge badge-success badge-roundless pull-right upper">询盘</span>
									</a>
								</li>
								<li>
									<a href="#">
										订单
										<span class="badge badge-red badge-roundless pull-right upper">订单</span>
									</a>
								</li>
								<li>
									<a href="#">
										其他
										<span class="badge badge-warning badge-roundless pull-right upper">其他</span>
									</a>
								</li>
							</ul>
							
						</div>
						
					</div>
					
				</div>
				
			</section>

			<script>
				<?php $this->beginBlock('abc'); ?>
				$(document).on('click','.pagination a',function(e){
				    e.preventDefault();
				    var url=$(this).attr('href');
				    $.get(url,function(msg){
				        //alert(msg);
				        $('#lists').html(msg);
				    });
				});
				<?php $this->endBlock();  $this->registerJs($this->blocks['abc'], View::POS_END); ?>
			</script>
			<script>
	<?php $this->beginBlock('ajaxMailContent') ?>
		$(function(){
			function ajaxContent($id){
				$.ajax({
			   type: "get",
			   url: 'index.php?r=mail/detail&id='+$id,
			   beforeSend: function(XMLHttpRequest){
					$taskText = ('<div class="quick-alert" style="text-align:center;width:200px;margin: 0 auto;"><i class="fa fa-spinner fa-spin"></i> 努力加载数据中,请稍后...</div>')
						 $("#task").html($taskText)
					show_loading_bar({
						pct: 90,
						delay: 4,
					});
			   },
			   success: function(data, textStatus){
			   		$('#task').siblings().remove();
			  		console.log(data['head']);
						var $html ='<div class="mail-single-header"><h2>'+data['head']['subject']+'<span class="badge badge-success badge-roundless pull-right upper">hello</span> <a href="javascript:history.go(-1);" class="go-back"><i class="fa-angle-left"></i> 返回</a></h2><div class="mail-single-header-options"><a href="mailbox-compose.html" class="btn btn-gray btn-icon"><span>回复</span> <i class="fa-reply-all"></i></a> <a href="#"  class="btn btn-gray btn-icon btn-delete"><i class="fa-trash"></i></a></div></div><div class="mail-single-info"><div class="mail-single-info-user dropdown"><a href="#" data-toggle="dropdown"><img src="images/user-3.png" class="img-circle" width="38"> <span></span> ('+data['head']['from']+') 发给 <span>我</span> 的 <em class="time">'+data['head']['datetime']+'</em></a><ul class="dropdown-menu dropdown-secondary"><li><a href="#"><i class="fa-reply"></i> 回复</a></li><li><a href="#"><i class="fa-forward"></i> 标记</a></li><li class="divider"></li><li><a href="#" class="btn-delete"><i class="fa-trash"></i> 删除</a></li></ul></div><div class="mail-single-info-options"><a href="#" class="star starred"><i class="fa-star-empty"></i></a> <a href="#"><i class="linecons-attach"></i></a></div></div><div class="mail-single-body">'+data['content']+'</div><div class="mail-single-attachments"><h3><i class="linecons-attach"></i> 附件</h3><ul class="list-unstyled list-inline"><li><a href="#" class="thumb"><img src="images/attach-1.png" class="img-thumbnail"></a> <a href="#" class="name"><span>14KB</span></a><div class="links"><a href="#">查看</a> - <a href="#">下载</a></div></li></ul></div><div class="mail-single-reply"><div class="fake-form"><div><a href="extra-portlets.html">回复</a> 或者 <a href="extra-portlets.html">转寄</a> 这封邮件...</div></div></div>';
						$($html)
							.insertAfter($("#task"))
			   },
			   complete: function(XMLHttpRequest, textStatus){
					// 进度条加载
					show_loading_bar(100);
					// 隐藏旋转加载
					$('.quick-alert')
						.fadeOut('slow', function() {
						  $(this).remove();
						});
			   },
			   error: function(){
					//请求出错处理
					alert('出错了')
			   }
			 });
			}
			ajaxContent(<?=$id?>);
			// function ajaxDelete(id){
			// 	$.ajax({
			//    type: "get",
			//    url: 'index.php?r=mail/delete&id='+id,
			//    beforeSend: function(XMLHttpRequest){
			// 		$taskText = ('<div class="quick-alert" style="text-align:center;width:200px;margin: 0 auto;"><i class="fa fa-spinner fa-spin"></i> 正在删除,请稍后...</div>')
			// 			 $("#task").html($taskText)
			// 		show_loading_bar({
			// 			pct: 90,
			// 			delay: 4,
			// 		});
			//    },
			//    success: function(data, textStatus){
			//    		alert('success');
			//    },
			//    complete: function(XMLHttpRequest, textStatus){
			//    		// 隐藏旋转加载
			// 		$('.quick-alert')
			// 			.fadeOut('slow', function() {
			// 			  $(this).remove();
			// 			});
			//    },
			//    error: function(){
			// 		//请求出错处理
			// 		alert('出错了')
			//    }
			//  });
			// }
			// $('.btn-delete').on('click',function(){
			// 	alert('fdsa')
			// 	ajaxDelete(<?=$id?>);
			// })
	});
	<?php $this->endBlock() ?>  
	<?php $this->registerJs($this->blocks['ajaxMailContent'], \yii\web\View::POS_END); ?> 
	</script>
 