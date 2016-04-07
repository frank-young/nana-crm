<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\widgets\Pjax;  

AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="stylesheet" href="http://fonts.useso.com/css?family=Arimo:400,700,400italic">
	
    	<?php $this->head() ?>

    <script src="js/jquery-1.11.1.min.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="js/html5shiv.min.js"></script>
		<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body class="page-body">
<?php $this->beginBody() ?>
 
	<div class="settings-pane">
			
		<a href="#" data-toggle="settings-pane" data-animate="true">
			&times;
		</a>
		
		<div class="settings-pane-inner">
			
			<div class="row">
				
				<div class="col-md-4">
					
					<div class="user-info">
						
						<div class="user-image">
							<a href="extra-profile.html">
								<img src="images/user-2.png" class="img-responsive img-circle" />
							</a>
						</div>
						
						<div class="user-details">
							
							<h3>
								<a href="extra-profile.html">超级管理员</a>
								
								<!-- Available statuses: is-online, is-idle, is-busy and is-offline -->
								<span class="user-status is-online"></span>
							</h3>
							
							<p class="user-title">呐呐科技-php工程师</p>
							
							<div class="user-links">
								<a href="extra-profile.html" class="btn btn-primary">编辑</a>
								<a href="extra-profile.html" class="btn btn-success">更新</a>
							</div>
							
						</div>
						
					</div>
					
				</div>
				
				<div class="col-md-8 link-blocks-env">
					
					<div class="links-block left-sep">
						<h4>
							<span>通知</span>
						</h4>
						
						<ul class="list-unstyled">
							<li>
								<input type="checkbox" class="cbr cbr-primary" checked="checked" id="sp-chk1" />
								<label for="sp-chk1">Messages</label>
							</li>
							<li>
								<input type="checkbox" class="cbr cbr-primary" checked="checked" id="sp-chk2" />
								<label for="sp-chk2">Events</label>
							</li>
							<li>
								<input type="checkbox" class="cbr cbr-primary" checked="checked" id="sp-chk3" />
								<label for="sp-chk3">Updates</label>
							</li>
							<li>
								<input type="checkbox" class="cbr cbr-primary" checked="checked" id="sp-chk4" />
								<label for="sp-chk4">Server Uptime</label>
							</li>
						</ul>
					</div>
					
					<div class="links-block left-sep">
						<h4>
							<a href="#">
								<span>Help Desk</span>
							</a>
						</h4>
						
						<ul class="list-unstyled">
							<li>
								<a href="#">
									<i class="fa-angle-right"></i>
									Support Center
								</a>
							</li>
							<li>
								<a href="#">
									<i class="fa-angle-right"></i>
									Submit a Ticket
								</a>
							</li>
							<li>
								<a href="#">
									<i class="fa-angle-right"></i>
									Domains Protocol
								</a>
							</li>
							<li>
								<a href="#">
									<i class="fa-angle-right"></i>
									Terms of Service
								</a>
							</li>
						</ul>
					</div>
					
				</div>
				
			</div>
		
		</div>
		
	</div>

	<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
			
		<!-- Add "fixed" class to make the sidebar fixed always to the browser viewport. -->
		<!-- Adding class "toggle-others" will keep only one menu item open at a time. -->
		<!-- Adding class "collapsed" collapse sidebar root elements and show only icons. -->
		<div class="sidebar-menu toggle-others fixed">
			
			<div class="sidebar-menu-inner">	
				
				<header class="logo-env">
					
					<!-- logo -->
					<div class="logo">
						<a href="dashboard-1.html" class="logo-expanded">
							<img src="images/logo@2x.png" width="80" alt="" />
						</a>
						
						<a href="dashboard-1.html" class="logo-collapsed">
							<img src="images/logo-collapsed@2x.png" width="40" alt="" />
						</a>
					</div>
					
					<!-- This will toggle the mobile menu and will be visible only on mobile devices -->
					<div class="mobile-menu-toggle visible-xs">
						<a href="#" data-toggle="user-info-menu">
							<i class="fa-bell-o"></i>
							<span class="badge badge-success">7</span>
						</a>
						
						<a href="#" data-toggle="mobile-menu">
							<i class="fa-bars"></i>
						</a>
					</div>
					
					<!-- This will open the popup with user profile settings, you can use for any purpose, just be creative -->
					<div class="settings-icon">
						<a href="#" data-toggle="settings-pane" data-animate="true">
							<i class="linecons-cog"></i>
						</a>
					</div>
					
								
				</header>
						
						
				<ul id="main-menu" class="main-menu">
					<!-- add class "multiple-expanded" to allow multiple submenus to open -->
					<!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->

							<li>
								<?= Html::a('<i class="linecons-globe"></i><span class="title">统筹全局</span>', ['overview/index'])
								?>
							</li>

					<li ><!--  class="active opened" -->
						<a href="index.php?r=client%2Fadd">
							<i class="linecons-user"></i>
							<span class="title">客户管理</span>
						</a>
						<ul>
							<li>
								<?= Html::a('<span class="title">新建客户</span>', ['client/add'])
								?>
							</li>
							<li>
								<?= Html::a('<span class="title">客户列表</span>', ['client/list'])
								?>
							</li>
							<li>
								<?= Html::a('<span class="title">客户生命周期管理</span>', ['client/life'])
								?>
							</li>
							<li>
								<?= Html::a('<span class="title">客户资料管理</span>', ['client/compose'])
								?>
							</li>
							<li>
								<?= Html::a('<span class="title">活跃客户管理</span>', ['client/data'])
								?>
							</li>
							<li>
								<?= Html::a('<span class="title">管理监控</span>', ['client/manager'])
								?>
							</li>
							<li>
								<a href="index.php?r=client%2Fwork">
								<span class="title">工作待办</span>
								<span class="label label-info pull-right">6</span>
							</a>
							</li>
							<li>
								<?= Html::a('<span class="title">导入导出</span>', ['client/tool'])
								?>
							</li>
						</ul>
					</li>
					<li>
						<a href="index.php?r=mail%2Finbox">
							<i class="linecons-mail"></i>
							<span class="title">邮件管理</span>
							<span class="label label-success pull-right">6</span>
						</a>
						<ul>
							<li>
								<?= Html::a('<span class="title">收件箱</span>', ['mail/inbox'])
								?>
							</li>
							<li>
								<?= Html::a('<span class="title">写邮件</span>', ['mail/compose'])
								?>
							</li>
							<li>
								<?= Html::a('<span class="title">查看邮件</span>', ['mail/message'])
								?>
							</li>
						</ul>
					</li>
					<li>
						<a href="index.php?r=tracking%2Flist">
							<i class="linecons-paper-plane"></i>
							<span class="title">邮件追踪</span>
						</a>
						<ul>
							<li>
								<?= Html::a('<span class="title">追踪列表</span>', ['tracking/list'])
								?>
							</li>
							<li>
								<?= Html::a('<span class="title">邮件定位</span>', ['tracking/location'])
								?>
							</li>
							<li>
								<?= Html::a('<span class="title">状态分析</span>', ['tracking/statistics'])
								?>
							</li>
						</ul>
					</li>
					<li>
						<a href="index.php?r=letters%2Findex">
							<i class="linecons-eye"></i>
							<span class="title">营销开发信</span>
						</a>
						<ul>
							<li>
								<?= Html::a('<span class="title">开发信管理</span>', ['letters/index'])
								?>
							</li>
							<li>
								<?= Html::a('<span class="title">新开发信</span>', ['letters/add'])
								?>
							</li>
							<li>
								<?= Html::a('<span class="title">群发开发信</span>', ['letters/mass'])
								?>
							</li>
							<li>
								<?= Html::a('<span class="title">信件列表</span>', ['letters/list'])
								?>
							</li>
						</ul>
					</li>
					<li>
						<a href="index.php?r=product%2Findex">
							<i class="linecons-diamond"></i>
							<span class="title">产品库</span>
						</a>
						<ul>
							<li>
								<?= Html::a('<span class="title">产品管理</span>', ['product/index'])
								?>
							</li>
							<li>
								<?= Html::a('<span class="title">新建产品</span>', ['product/add'])
								?>
							</li>
							
							<li>
								<?= Html::a('<span class="title">生成PDF</span>', ['product/pdf'])
								?>
							</li>
						</ul>
					</li>
					<li>
						<a href="index.php?r=company%2Frecord">
							<i class="linecons-star"></i>
							<span class="title">操作动态</span>
						</a>
						<ul>
							<li>
								<?= Html::a('<span class="title">操作记录</span>', ['company/record'])
								?>
							</li>
							<li>
								<?= Html::a('<span class="title">个人操作记录</span>', ['company/self'])
								?>
							</li>
						</ul>
					</li>
					<li>
						<a href="index.php?r=staff%2Frecord">
							<i class="linecons-star"></i>
							<span class="title">查看下属</span>
						</a>
						<ul>
							<li>
								<?= Html::a('<span class="title">下属管理</span>', ['staff/index'])
								?>
							</li>
							<li>
								<?= Html::a('<span class="title">添加下属账号</span>', ['staff/add'])
								?>
							</li>
							<li>
								<?= Html::a('<span class="title">下属客户</span>', ['staff/client'])
								?>
							</li>
						</ul>
					</li>
					<li>
						<a href="index.php?r=quotation%2Findex">
							<i class="linecons-pencil"></i>
							<span class="title">报价管理</span>
						</a>
						<ul>
							<li>
								<?= Html::a('<span class="title">报价管理</span>', ['quotation/index'])
								?>
							</li>
							<li>
								<?= Html::a('<span class="title">新建报价</span>', ['quotation/new'])
								?>
							</li>
							<li>
								<?= Html::a('<span class="title">生成PDF</span>', ['quotation/pdf'])
								?>
							</li>
						</ul>
					</li>
					<li>
						<a href="index.php?r=statistical%2Findex">
							<i class="linecons-database"></i>
							<span class="title">统计分析</span>
						</a>
						<ul>
							<li>
								<?= Html::a('<span class="title">数据统计</span>', ['statistical/index'])
								?>
							</li>
						</ul>
					</li>
					<li>
						<a href="index.php?r=time%2Findex">
							<i class="linecons-database"></i>
							<span class="title">测试链接</span>
						</a>
						<ul>
							<li>
								<?= Html::a('<span class="title">时间</span>', ['time/time'])
								?>
							</li>
							<li>
								<?= Html::a('<span class="title">index</span>', ['time/index'])
								?>
							</li>
						</ul>
					</li>				 
				</ul>
				<!-- ./ul	 -->
			</div>
			
		</div>

		
		<div class="main-content">
					
			<!-- User Info, Notifications and Menu Bar -->
			<nav class="navbar user-info-navbar" role="navigation">
				
				<!-- Left links for user info navbar -->
				<ul class="user-info-menu left-links list-inline list-unstyled">
					
					<li class="hidden-sm hidden-xs">
						<a href="#" data-toggle="sidebar">
							<i class="fa-bars"></i>
						</a>
					</li>
					
					<li class="dropdown hover-line">
						<a href="#" data-toggle="dropdown">
							<i class="fa-envelope-o"></i>
							<span class="badge badge-green">15</span>
						</a>
							
						<ul class="dropdown-menu messages">
							<li>
									
								<ul class="dropdown-menu-list list-unstyled ps-scrollbar">
								
									<li class="active"><!-- "active" class means message is unread -->
										<a href="#">
											<span class="line">
												<strong>Luc Chartier</strong>
												<span class="light small">- yesterday</span>
											</span>
											
											<span class="line desc small">
												This ain’t our first item, it is the best of the rest.
											</span>
										</a>
									</li>
									
									<li class="active">
										<a href="#">
											<span class="line">
												<strong>Salma Nyberg</strong>
												<span class="light small">- 2 days ago</span>
											</span>
											
											<span class="line desc small">
												Oh he decisively impression attachment friendship so if everything. 
											</span>
										</a>
									</li>
									
									<li>
										<a href="#">
											<span class="line">
												Hayden Cartwright
												<span class="light small">- a week ago</span>
											</span>
											
											<span class="line desc small">
												Whose her enjoy chief new young. Felicity if ye required likewise so doubtful.
											</span>
										</a>
									</li>
									
									<li>
										<a href="#">
											<span class="line">
												Sandra Eberhardt
												<span class="light small">- 16 days ago</span>
											</span>
											
											<span class="line desc small">
												On so attention necessary at by provision otherwise existence direction.
											</span>
										</a>
									</li>
									
									<!-- Repeated -->
									
									<li class="active"><!-- "active" class means message is unread -->
										<a href="#">
											<span class="line">
												<strong>Luc Chartier</strong>
												<span class="light small">- yesterday</span>
											</span>
											
											<span class="line desc small">
												This ain’t our first item, it is the best of the rest.
											</span>
										</a>
									</li>
									
									<li class="active">
										<a href="#">
											<span class="line">
												<strong>Salma Nyberg</strong>
												<span class="light small">- 2 days ago</span>
											</span>
											
											<span class="line desc small">
												Oh he decisively impression attachment friendship so if everything. 
											</span>
										</a>
									</li>
									
									<li>
										<a href="#">
											<span class="line">
												Hayden Cartwright
												<span class="light small">- a week ago</span>
											</span>
											
											<span class="line desc small">
												Whose her enjoy chief new young. Felicity if ye required likewise so doubtful.
											</span>
										</a>
									</li>
									
									<li>
										<a href="#">
											<span class="line">
												Sandra Eberhardt
												<span class="light small">- 16 days ago</span>
											</span>
											
											<span class="line desc small">
												On so attention necessary at by provision otherwise existence direction.
											</span>
										</a>
									</li>
									
								</ul>
								
							</li>
							
							<li class="external">
								<a href="blank-sidebar.html">
									<span>All Messages</span>
									<i class="fa-link-ext"></i>
								</a>
							</li>
						</ul>
					</li>
					
					<li class="dropdown hover-line">
						<a href="#" data-toggle="dropdown">
							<i class="fa-bell-o"></i>
							<span class="badge badge-purple">7</span>
						</a>
							
						<ul class="dropdown-menu notifications">
							<li class="top">
								<p class="small">
									<a href="#" class="pull-right">Mark all Read</a>
									您有 <strong>3</strong> 个新任务
								</p>
							</li>
							
							<li>
								<ul class="dropdown-menu-list list-unstyled ps-scrollbar">
									<li class="active notification-success">
										<a href="#">
											<i class="fa-user"></i>
											
											<span class="line">
												<strong>新订单</strong>
											</span>
											
											<span class="line small time">
												30 秒之前
											</span>
										</a>
									</li>
									
									<li class="active notification-secondary">
										<a href="#">
											<i class="fa-lock"></i>
											
											<span class="line">
												<strong>有一封新询盘</strong>
											</span>
											
											<span class="line small time">
												3 小时之前
											</span>
										</a>
									</li>
									
									<li class="notification-primary">
										<a href="#">
											<i class="fa-thumbs-up"></i>
											
											<span class="line">
												<strong>新任务</strong>
											</span>
											
											<span class="line small time">
												2 分钟之前
											</span>
										</a>
									</li>
									
								</ul>
							</li>
							
							<li class="external">
								<a href="#">
									<span>查看全部任务</span>
									<i class="fa-link-ext"></i>
								</a>
							</li>
						</ul>
					</li>
					
				</ul>
				
				
				<!-- Right links for user info navbar -->
				<ul class="user-info-menu right-links list-inline list-unstyled">
					
					<li class="search-form"><!-- You can add "always-visible" to show make the search input visible -->
						
						<form method="get" action="extra-search.html">
							<input type="text" name="s" class="form-control search-field" placeholder="搜索客户、邮件..." />
							
							<button type="submit" class="btn btn-link">
								<i class="linecons-search"></i>
							</button>
						</form>
						
					</li>
					
					<li class="dropdown user-profile">
						<a href="#" data-toggle="dropdown">
							<img src="images/user-4.png" alt="user-image" class="img-circle img-inline userpic-32" width="28" />
							<span>
								超级管理员
								<i class="fa-angle-down"></i>
							</span>
						</a>
						
						<ul class="dropdown-menu user-profile-menu list-unstyled">
							<li>
								<a href="#edit-profile">
									<i class="fa-edit"></i>
									新建客户
								</a>
							</li>
							<li>
								<a href="#settings">
									<i class="fa-wrench"></i>
									设置
								</a>
							</li>
							<li>
								<a href="#profile">
									<i class="fa-user"></i>
									个人资料
								</a>
							</li>
							<li>
								<a href="#help">
									<i class="fa-unlock-alt"></i>
									锁定屏幕
								</a>
							</li>
							<li class="last">
								<a href="extra-lockscreen.html">
									<i class="fa-lock"></i>
									退出登录
								</a>
							</li>
						</ul>
					</li>
					
					<li>
						<a href="#" data-toggle="chat">
							<i class="fa-comments-o"></i>
						</a>
					</li>
					
				</ul>
				
			</nav>
			
			
        <?= $content ?>
        <!-- Main Footer -->
			<!-- Choose between footer styles: "footer-type-1" or "footer-type-2" -->
			<!-- Add class "sticky" to  always stick the footer to the end of page (if page contents is small) -->
			<!-- Or class "fixed" to  always fix the footer to the end of page -->
			<footer class="main-footer sticky footer-type-1">
				
				<div class="footer-inner">
				
					<!-- Add your copyright text here -->
					<div class="footer-text">
						&copy; <?php echo date("Y")?>
						<strong>呐呐科技</strong> 
						版权所有 (<a href="http://www.nana-1.net/" target="_blank" title="呐呐科技">www.nana-1.com</a>)
					</div>
					
					
					<!-- Go to Top Link, just add rel="go-top" to any link to add this functionality -->
					<div class="go-up">
					
						<a href="#" rel="go-top">
							<i class="fa-angle-up"></i>
						</a>
						
					</div>
					
				</div>
				
			</footer>
        </div>
        <!-- start: Chat Section -->
		<div id="chat" class="fixed">
			
			<div class="chat-inner">
			
				
				<h2 class="chat-header">
					<a href="#" class="chat-close" data-toggle="chat">
						<i class="fa-plus-circle rotate-45deg"></i>
					</a>					
					聊天
					<span class="badge badge-success is-hidden">0</span>
				</h2>
				
				<script type="text/javascript">
				// Here is just a sample how to open chat conversation box
				jQuery(document).ready(function($)
				{
					var $chat_conversation = $(".chat-conversation");
					
					$(".chat-group a").on('click', function(ev)
					{
						ev.preventDefault();
						
						$chat_conversation.toggleClass('is-open');
						
						$(".chat-conversation textarea").trigger('autosize.resize').focus();
					});
					
					$(".conversation-close").on('click', function(ev)
					{
						ev.preventDefault();
						$chat_conversation.removeClass('is-open');
					});
				});
				</script>
				
				
				<div class="chat-group">
					<strong>Favorites</strong>
					
					<a href="#"><span class="user-status is-online"></span> <em>Catherine J. Watkins</em></a>
					<a href="#"><span class="user-status is-online"></span> <em>Nicholas R. Walker</em></a>
					<a href="#"><span class="user-status is-busy"></span> <em>Susan J. Best</em></a>
					<a href="#"><span class="user-status is-idle"></span> <em>Fernando G. Olson</em></a>
					<a href="#"><span class="user-status is-offline"></span> <em>Brandon S. Young</em></a>
				</div>
				
				
				<div class="chat-group">
					<strong>Work</strong>
					
					<a href="#"><span class="user-status is-busy"></span> <em>Rodrigo E. Lozano</em></a>
					<a href="#"><span class="user-status is-offline"></span> <em>Robert J. Garcia</em></a>
					<a href="#"><span class="user-status is-offline"></span> <em>Daniel A. Pena</em></a>
				</div>
				
				
				<div class="chat-group">
					<strong>Other</strong>
					
					<a href="#"><span class="user-status is-online"></span> <em>Dennis E. Johnson</em></a>
					<a href="#"><span class="user-status is-online"></span> <em>Stuart A. Shire</em></a>
					<a href="#"><span class="user-status is-online"></span> <em>Janet I. Matas</em></a>
					 
				</div>
			</div>
			
			<!-- conversation template -->
			<div class="chat-conversation">
				
				<div class="conversation-header">
					<a href="#" class="conversation-close">
						&times;
					</a>
					
					<span class="user-status is-online"></span>
					<span class="display-name">Arlind Nushi</span> 
					<small>Online</small>
				</div>
				
				<ul class="conversation-body">	
					<li>
						<span class="user">Arlind Nushi</span>
						<span class="time">09:00</span>
						<p>Are you here?</p>
					</li>
					<li class="odd">
						<span class="user">Brandon S. Young</span>
						<span class="time">09:25</span>
						<p>This message is pre-queued.</p>
					</li>
					<li>
						<span class="user">Brandon S. Young</span>
						<span class="time">09:26</span>
						<p>Whohoo!</p>
					</li>
					<li class="odd">
						<span class="user">Arlind Nushi</span>
						<span class="time">09:27</span>
						<p>Do you like it?</p>
					</li>
				</ul>
				
				<div class="chat-textarea">
					<textarea class="form-control autogrow" placeholder="Type your message"></textarea>
				</div>
			</div>
			
		</div>
		<!-- end: Chat Section -->
	</div>

<!-- 	<div class="page-loading-overlay">
		<div class="loader-2">页面延迟加载</div>	
	</div> -->

<?php $this->endBody() ?>
<script>
	// window.onload = function(){
	// 	show_loading_bar(100);
	// }
</script>

</body>
</html>

<?php $this->endPage() ?>
