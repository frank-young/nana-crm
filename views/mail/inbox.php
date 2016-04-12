<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\widgets\Pjax;

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
			
			<!-- Inbox emails -->
			<div class="col-sm-9 mailbox-right">
				
				<div class="mail-env">
						<div class="ajax"></div>
					<!-- mail table -->
					<table class="table mail-table">
						<thead>
							<tr>
								<th class="col-cb">
									<div class="cbr-replaced">
										<div class="cbr-input">
											<input type="checkbox" class="cbr cbr-done"></div>
										<div class="cbr-state">
											<span></span>
										</div>
									</div>
								</th>
								<th colspan="4" class="col-header-options">
									<div class="mail-select-options">全选</div>
									<div class="mail-pagination">
										第 <strong class="mail-pagination-num"> </strong>页
										共/<strong class="mail-pagination-total"> </strong>
										封邮件
										<div class="next-prev">
											<a href="javascript:;" class="btn-prev"> <i class="fa-angle-left"></i>
											</a>
											<a href="javascript:;" class="btn-next"> <i class="fa-angle-right"></i>
											</a>
										</div>
									</div>
								</th>
							</tr>
						</thead>
						<!-- mail table footer -->					
						<tfoot>
							<tr>
								<th class="col-cb">
									<div class="cbr-replaced">
										<div class="cbr-input">
											<input type="checkbox" class="cbr cbr-done"></div>
										<div class="cbr-state">
											<span></span>
										</div>
									</div>
								</th>
								<th colspan="4" class="col-header-options">
									<div class="mail-select-options">全选</div>
									<div class="mail-pagination">
										第 <strong class="mail-pagination-num"> </strong>页
										共/<strong class="mail-pagination-total"> </strong>
										封邮件
										<div class="next-prev">
											<a href="javascript:;" class="btn-prev">
												<i class="fa-angle-left"></i>
											</a>
											<a href="javascript:;" class="btn-next">
												<i class="fa-angle-right"></i>
											</a>
										</div>
									</div>
								</th>
							</tr>
						</tfoot>
						<tbody>
							<tr id="task">
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
						</tbody>
					</table>
					
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
								<span class="badge badge-success pull-right"></span>
							</a>
						</li>
						<li>
							<?= Html::a('发件箱', ['mail/compose'])?>
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
	
	<!-- ajax处理 -->
	<script>
	<?php $this->beginBlock('ajaxMail') ?>
		$(function(){
			$('.btn-next').click(function(){
				var offset = parseInt($('.mail-pagination-num').html());
				if(offset<=$('.mail-pagination-total').html()/20){
					ajaxData('index.php?r=mail/processing&offset='+(offset+1));
				}
			})
			$('.btn-prev').click(function(){
				var offset = parseInt($('.mail-pagination-num').html());
				if(offset!=0){
					ajaxData('index.php?r=mail/processing&offset='+(offset-1));
				}
			})

			function ajaxData(url='index.php?r=mail/processing'){
				$.ajax({
			   type: "get",
			   url: url,
			   beforeSend: function(XMLHttpRequest){
					$taskText = ('<div class="quick-alert" style="text-align:center;width:200px;margin: 0 auto;"><i class="fa fa-spinner fa-spin"></i> 努力加载数据中,请稍后...</div>')
						 $("#task td:nth-child(3)").html($taskText)
					show_loading_bar({
						pct: 90,
						delay: 6,
					});
			   },
			   success: function(data, textStatus){
			   		$('#task').siblings().remove();
			   		$i = parseInt(data['offset']);
			   		
					$('.mail-pagination-num').html($i);
					$('.mail-pagination-total').html(data['total']);
					var offset = data['offset'];
				
					for(var i=data["currpage"]-19;i<=data["currpage"];i++){
						var $html ='<tr class="unread"><td class="col-cb"><div class="checkbox checkbox-replace"><div class="cbr-replaced"><div class="cbr-input"><input type="checkbox" class="cbr cbr-done"></div><div class="cbr-state"><span></span></div></div></div></td><td class="col-name"><a href="#" class="star"><i class="fa-star-empty"></i></a><a href="index.php?r=mail/message&id='+i+'" class="col-name">'+data['data'][i]["fromName"]+'</a></td><td class="col-subject"><a href="index.php?r=mail/message&id='+i+'">'+data['data'][i]["subject"]+'</a></td><td class="col-options hidden-sm hidden-xs"></td><td class="col-time">'+data['data'][i]["datetime"]+'</td></tr>';
						$($html)
							.insertAfter($("#task"))
							.fadeIn('fast');
					}
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
			 	ajaxData();
	});
	<?php $this->endBlock() ?>  
	<?php $this->registerJs($this->blocks['ajaxMail'], \yii\web\View::POS_END); ?> 
	</script>
	<script type="text/javascript">
		<?php $this->beginBlock('check') ?>  

		$(function($)
		{
			var $state = $(".mail-table thead input[type='checkbox'], .mail-table tfoot input[type='checkbox']"),
				$chcks = $(".mail-table tbody input[type='checkbox']");
			
			// Script to select all checkboxes
			$state.on('change', function(ev)
			{
				if($state.is(':checked'))
				{
					$chcks.prop('checked', true).trigger('change');
				}
				else
				{
					$chcks.prop('checked', false).trigger('change');
				}
			});
			
			// Row Highlighting
			$chcks.each(function(i, el)
			{
				var $tr = $(el).closest('tr');
				
				$(this).on('change', function(ev)
				{
					$tr[$(this).is(':checked') ? 'addClass' : 'removeClass']('highlighted');
				});
			});
			
			// Stars
			$(".mail-table .star").on('click', function(ev)
			{
				ev.preventDefault();
				
				if( ! $(this).hasClass('starred'))
				{
					$(this).addClass('starred').find('i').attr('class', 'fa-star');
				}
				else
				{
					$(this).removeClass('starred').find('i').attr('class', 'fa-star-empty');
				}
			});
		});
		<?php $this->endBlock() ?>  
		<?php $this->registerJs($this->blocks['check'], \yii\web\View::POS_END); ?> 
	</script>  
	<?php
		// $time = strtotime('now') - $value['datetime'];
		// $dayNow = date("m-d", strtotime('now'));
		// $day = date("m-d",$value['datetime']);
		// $weekarray=array("星期日","星期一","星期二","星期三","星期四","星期五","星期六");
		
		// if($dayNow==$day && $time<24*60*60){
		// 	echo date('H:i',$value['datetime']);
		// }else if($dayNow!=$day){	//日期不相等，并且时间小于两天，就是昨天
		// 	if($time<=24*60*60){
		// 		echo "昨天";
		// 	}else if($time<=24*60*60*6){	//预留了5天
		// 		echo $weekarray[date("w", $value['datetime'])-1];	//输出中文星期 
		// 	}else{
		// 		echo date("m-d",$value['datetime']);// 其他日期
		// 	}
		// }
	?>	
		
			
		