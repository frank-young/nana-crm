			<div class="page-title">
				
				<div class="title-env">
					<h1 class="title">新邮件</h1>
					<p class="description">方便快捷管理您的企业邮件</p>
				</div>
				
					<div class="breadcrumb-env">
					
								<ol class="breadcrumb bc-1">
									<li>
							<a href="dashboard-1.html"><i class="fa-home"></i>主页</a>
						</li>
								<li>
						
										<a href="mailbox-main.html">邮箱</a>
								</li>
							<li class="active">
						
										<strong>写邮件</strong>
								</li>
								</ol>
								
				</div>
					
			</div>
					
			<section class="mailbox-env">
				
				<div class="row">
					
					<!-- Compose Email Form -->
					<div class="col-sm-9 mailbox-right">
						
						<div class="mail-compose">
							
							<form method="post" role="form">
							
								<!-- Header Title and Button Options -->
								<div class="mail-header">
									<div class="row">
										<div class="col-sm-6">							
											<h3>
												<i class="linecons-pencil"></i>
												写邮件
											</h3>
										</div>
										
										<div class="col-sm-3 col-xs-5">
											<button type="button" class="btn btn-gray btn-single btn-icon btn-icon-standalone btn-icon-standalone-right btn-block">
												<i class="linecons-fire"></i>
												<span>删除</span>
											</button>
										</div>
										
										<div class="col-sm-3 col-xs-8">					
											<button type="submit" class="btn btn-secondary btn-single btn-icon btn-icon-standalone btn-icon-standalone-right btn-block">
												<i class="linecons-mail"></i>
												<span>发送</span>
											</button>
										</div>
									</div>
								</div>
								
								<div class="form-group">
									<label for="to">收件人:</label>
									<input type="text" class="form-control" id="to" tabindex="1" />
									
									<div class="field-options">
										<a href="javascript:;" onclick="jQuery(this).hide(); jQuery('#cc').parent().removeClass('hidden'); jQuery('#cc').focus();">Lucy</a>
										<a href="javascript:;" onclick="jQuery(this).hide(); jQuery('#bcc').parent().removeClass('hidden'); jQuery('#bcc').focus();">Pual</a>
									</div>
								</div>
								
								<div class="form-group hidden">
									<label for="cc">Lucy:</label>
									<input type="text" class="form-control" id="cc" tabindex="2" />
								</div>
								
								<div class="form-group hidden">
									<label for="bcc">Pual:</label>
									<input type="text" class="form-control" id="bcc" tabindex="2" />
								</div>
								
								<div class="form-group">
									<label for="subject">主题:</label>
									<input type="text" class="form-control" id="subject" tabindex="1" />
								</div>
								
								
								<div class="compose-message-editor">
									<textarea class="form-control wysihtml5" data-html="false" data-color="false" data-stylesheet-url="assets/css/wysihtml5-color.css" name="sample_wysiwyg" id="sample_wysiwyg"></textarea>
								</div>
							
								<div class="row">
									<div class="col-sm-3">
										<button type="submit" class="btn btn-secondary btn-block btn-icon btn-icon-standalone">
											<i class="linecons-mail"></i>
											<span>发送</span>
										</button>
									</div>
									
									<div class="col-sm-offset-6 col-sm-3">
										<button type="submit" class="btn btn-white btn-single btn-block btn-icon btn-icon-standalone">
											<i class="fa-plus"></i>
											<span>附件</span>
										</button>
									</div>
								</div>	
							</form>					
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