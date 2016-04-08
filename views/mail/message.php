<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\widgets\Pjax;
use yii\web\View;

$this->title = $head['subject'];
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
					<div class="col-sm-9 mailbox-right">
						
						<div class="mail-single">
							
							<!-- Email Title and Button Options -->
							<div class="mail-single-header">
								<h2>
									<?=Html::encode($head['subject'])?>
									<span class="badge badge-success badge-roundless pull-right upper">hello</span>
									
									<a href="javascript:history.go(-1);" class="go-back">
										<i class="fa-angle-left"></i>
										返回
									</a>
								</h2>
								
								<div class="mail-single-header-options">
									<a href="mailbox-compose.html" class="btn btn-gray btn-icon">
										<span>回复</span>
										<i class="fa-reply-all"></i>
									</a>
									
									<a href="index.php?r=mail/delete&id=<?=$id?>" class="btn btn-gray btn-icon">
										<i class="fa-trash"></i>
									</a>
								</div>
							</div>
							
							<!-- Email Info From/Reply -->
							<div class="mail-single-info">
								
								<div class="mail-single-info-user dropdown">
									<a href="#" data-toggle="dropdown">
										<img src="images/user-3.png" class="img-circle" width="38" /> 
										<span><?=Html::encode($head['replyToName'])?></span>
										(<?=Html::encode($head['replyTo'])?>) 发给 <span>我</span> 的
										<em class="time"><?=Html::encode(date("Y年m月d日 H:i",$head['datetime']))?></em>
									</a>
									
									<ul class="dropdown-menu dropdown-secondary">
										<li>
											<a href="#">
												<i class="fa-reply"></i>
												回复
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa-forward"></i>
												标记
											</a>
										</li>
										<li class="divider"></li>
										<li>
											<a href="index.php?r=mail/delete&id=<?=$id?>">
												<i class="fa-trash"></i>
												删除
											</a>
										</li>
									</ul>
								</div>
								
								<div class="mail-single-info-options">
									<a href="#" class="star starred">
										<i class="fa-star-empty"></i>
									</a>
									<a href="#">
										<i class="linecons-attach"></i>
									</a>
								</div>
								
							</div>
							
							<!-- Email Body -->
							<div class="mail-single-body">
								<?= $content?>
							</div>
							
							

							<!-- Email Attachments -->
							<div class="mail-single-attachments">
							
								<h3>
									<i class="linecons-attach"></i>
									附件
								</h3>
								
								<ul class="list-unstyled list-inline">
								<?php
									// if($arrFiles):
	                                    // foreach($arrFiles as $key=>$value):
	                                    // 	echo ($value=="")?"":"附件: ".$value."<br>"; 
	                                    // 	if($value!=""):
								?>
									<li>
										<a href="#" class="thumb">
											<img src="images/attach-1.png" class="img-thumbnail" />
										</a>
										
										<a href="#" class="name">
											
											<span>14KB</span>
										</a>
										
										<div class="links">
											<a href="#">查看</a> - 
											<a href="#">下载</a>
										</div>
									</li>
								<?php
											// endif;
	          //                           endforeach;
	                               // endif;
								?>
								</ul>
							</div>
							
							<div class="mail-single-reply">
								
								<div class="fake-form">
									<div>
										<a href="extra-portlets.html">回复</a> 或者 <a href="extra-portlets.html">转寄</a> 这封邮件...
									</div>
								</div>
								
							</div>
							
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