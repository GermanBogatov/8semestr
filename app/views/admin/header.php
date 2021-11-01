<?

use Libs\App; ?>
<!doctype html>
<html>

    <head>
        <script>
            window.BASE_DIR_AJAX = "<?= BASE_DIR_AJAX ?>";
             window.BASE_DIR = "<?=ADMIN_PREFIX?>";
        </script>

        <title>
            <?= $this->getTitle(); ?>
        </title>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        
        <link href="<?= TEMPLATE_ADMIN_PATH ?>/css/bootstrap.min.css?<?= rand() ?>" rel="stylesheet"/>
        <link href="<?= TEMPLATE_ADMIN_PATH ?>/css/datepicker3.css?<?= rand() ?>" rel="stylesheet"/>
<link href="<?= TEMPLATE_ADMIN_PATH ?>/css/font-awesome.min.css?<?= rand() ?>" rel="stylesheet"/>
<link href="<?= TEMPLATE_ADMIN_PATH ?>/css/styles.css?<?= rand() ?>" rel="stylesheet"/>

        
        <link href="<?= TEMPLATE_ADMIN_PATH ?>/style.css?<?= rand() ?>" rel="stylesheet"/>
        <link href="<?= MAIN_PREFIX ?>/app/css/preloader12.css?<?= rand() ?>" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	

        <script src="<?= TEMPLATE_ADMIN_PATH ?>/script.js?<?= rand() ?>"></script>

        <? if (isset($this->addjs)): ?>
            <script type ="text/javascript" src="<?= $this->addjs ?>?<?= rand() ?>"></script>
        <? endif ?>
        <? if (isset($this->addcss)): ?>
            <link rel="stylesheett" href="<?= $this->addcss ?>?<?= rand() ?>">
        <? endif ?>

    </head>

    <body>





        <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="<?=MAIN_PREFIX.'/'?>"><span>Italiano</span>Admino</a>
				<ul class="nav navbar-top-links navbar-right">
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em class="fa fa-envelope"></em><span class="label label-danger">15</span>
					</a>
						<ul class="dropdown-menu dropdown-messages">
							<li>
								<div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
									<img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
									</a>
									<div class="message-body"><small class="pull-right">3 mins ago</small>
										<a href="#"><strong>John Doe</strong> commented on <strong>your photo</strong>.</a>
									<br /><small class="text-muted">1:24 pm - 25/03/2015</small></div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
									<img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
									</a>
									<div class="message-body"><small class="pull-right">1 hour ago</small>
										<a href="#">New message from <strong>Jane Doe</strong>.</a>
									<br /><small class="text-muted">12:27 pm - 25/03/2015</small></div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="all-button"><a href="#">
									<em class="fa fa-inbox"></em> <strong>All Messages</strong>
								</a></div>
							</li>
						</ul>
					</li>
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em class="fa fa-bell"></em><span class="label label-info">5</span>
					</a>
						<ul class="dropdown-menu dropdown-alerts">
							<li><a href="#">
								<div><em class="fa fa-envelope"></em> 1 New Message
									<span class="pull-right text-muted small">3 mins ago</span></div>
							</a></li>
							<li class="divider"></li>
							<li><a href="#">
								<div><em class="fa fa-heart"></em> 12 New Likes
									<span class="pull-right text-muted small">4 mins ago</span></div>
							</a></li>
							<li class="divider"></li>
							<li><a href="#">
								<div><em class="fa fa-user"></em> 5 New Followers
									<span class="pull-right text-muted small">4 mins ago</span></div>
							</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
        
        <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
                            <div class="profile-usertitle-name"><?= Libs\User::getLogin()?></div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li class="<?= App::getCurPage() == ADMIN_PREFIX.'/' ? "active": ""?>"><a href="<?= MAIN_PREFIX ?>/admin/"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li class="<?= App::getCurPage() == ADMIN_PREFIX.'/sections/' ? "active": ""?>"><a href="<?= MAIN_PREFIX ?>/admin/sections/"><em class="fa fa-dashboard">&nbsp;</em> Категории</a></li>
			<li class="<?= App::getCurPage() == ADMIN_PREFIX.'/products/' ? "active": ""?>"><a href="<?= MAIN_PREFIX ?>/admin/products/"><em class="fa fa-dashboard">&nbsp;</em> Продукты</a></li>
			
                        <li><a href="<?= MAIN_PREFIX ?>/reg/logout/"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
		<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active"><?= $this->getTitle(); ?></li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><?= $this->getTitle(); ?></h1>
			</div>
		</div><!--/.row-->

