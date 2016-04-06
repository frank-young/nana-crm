<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

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
						
							<script type="text/javascript">
								jQuery(document).ready(function($)
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
							</script>
						
							<!-- mail table -->
							<table class="table mail-table">
							
								<!-- mail table header -->
								<thead>
									<tr>
										<th class="col-cb">
											<input type="checkbox" class="cbr" />
										</th>
										<th colspan="4" class="col-header-options">
											
											<div class="mail-select-options">全选</div>
											
											<div class="mail-pagination">
												显示 <strong>1至 30</strong> / 共<strong><?=Html::encode($total)?></strong> 封邮件
												
												<div class="next-prev">
													<a href="#"><i class="fa-angle-left"></i></a>
													<a href="#"><i class="fa-angle-right"></i></a>
												</div>
											</div>
										</th>
									</tr>
								</thead>
							
								<!-- mail table footer -->
								<tfoot>
									<tr>
										<th class="col-cb">
											<input type="checkbox" class="cbr" />
										</th>
										<th colspan="4" class="col-header-options">
											
											<div class="mail-select-options">全选</div>
											
											<div class="mail-pagination">
												显示 <strong>1至 30</strong> / 共<strong><?=Html::encode($total)?></strong> 封邮件
												
												<div class="next-prev">
													<a href="#"><i class="fa-angle-left"></i></a>
													<a href="#"><i class="fa-angle-right"></i></a>
												</div>
											</div>
										</th>
									</tr>
								</tfoot>
								
								<!-- email list -->
								<tbody>
									<?php
									foreach($array as $key=>$value):
										?>
									<tr class="unread">
										<td class="col-cb">
											<div class="checkbox checkbox-replace">
												<input type="checkbox" class="cbr" />
											</div>
										</td>
										<td class="col-name">
											<a href="#" class="star">
												<i class="fa-star-empty"></i>
											</a>
											<a href="mailbox-message.html" class="col-name"><?=Html::encode($value['replyToName'])?></a>
										</td>
										<td class="col-subject">
											<a href="message.php">
												<?=Html::encode($value['subject'])?>
											</a>
										</td>
										<td class="col-options hidden-sm hidden-xs"></td>
										<td class="col-time">
											<?php
												$time = strtotime('now') - $value['datetime'];
												$dayNow = date("m-d",strtotime('now'));
												$day = date("m-d",$value['datetime']);
												$weekarray=array("星期日","星期一","星期二","星期三","星期四","星期五","星期六");
												
												if($dayNow==$day&&$time<24*60*60){
													echo date('H:i',$value['datetime']);
												}else if($dayNow!=$day){	//日期不相等，并且时间小于两天，就是昨天
													if($time<=24*60*60*1){
														echo "昨天";
													}else if($time<=24*60*60*6){	//预留了5天
														echo $weekarray[date("w",$value['datetime'])];	//输出中文星期 
													}
												}else{
													echo date("m-d",$value['datetime']);// 其他日期
												}
												
											?>
										</td>
									</tr>	
									<?php
									 endforeach;
									 ?>				
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
										<span class="badge badge-success pull-right"><?=Html::encode(count($unread))?></span>
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
			
		
		
			
		