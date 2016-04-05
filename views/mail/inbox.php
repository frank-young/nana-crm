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
												显示 <strong>1至 30</strong> / 共<strong>789</strong> 封邮件
												
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
												显示 <strong>1至 30</strong> / 共<strong>789</strong> 封邮件
												
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
											<a href="mailbox-message.html" class="col-name">呐呐科技</a>
										</td>
										<td class="col-subject">
											<a href="mailbox-message.html">
												谷歌广告：谷歌关键词服务
											</a>
										</td>
										<td class="col-options hidden-sm hidden-xs"></td>
										<td class="col-time">08:40</td>
									</tr>
									
									<tr class="unread"><!-- new email class: unread -->
										<td class="col-cb">
											<div class="checkbox checkbox-replace">
												<input type="checkbox" class="cbr" />
											</div>
										</td>
										<td class="col-name">
											<a href="#" class="star starred">
												<i class="fa-star"></i>
											</a>
											<a href="mailbox-message.html" class="col-name">呐呐科技</a>
										</td>
										<td class="col-subject">
											<a href="mailbox-message.html">
												重置账户密码
											</a>
										</td>
										<td class="col-options hidden-sm hidden-xs">
											<a href="mailbox-message.html"><i class="linecons-attach"></i></a>
										</td>
										<td class="col-time">11:17</td>
									</tr>
									
									<tr>
										<td class="col-cb">
											<div class="checkbox checkbox-replace">
												<input type="checkbox" class="cbr" />
											</div>
										</td>
										<td class="col-name">
											<a href="#" class="star">
												<i class="fa-star-empty"></i>
											</a>
											<a href="mailbox-message.html" class="col-name">呐呐科技</a>
										</td>
										<td class="col-subject">
											<a href="mailbox-message.html">
												<span class="label label-danger">订单</span>
												您有一个新订单
											</a>
										</td>
										<td class="col-options hidden-sm hidden-xs"></td>
										<td class="col-time">Today</td>
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
			
		
		
			
		