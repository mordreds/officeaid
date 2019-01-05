<?php
  $page_controller = $this->uri->segment(1);
  $controller_function = $this->uri->segment(2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<title><?=$title?></title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?=base_url()?>resources/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?=base_url()?>resources/css/icons/fontawesome/styles.min.css" rel="stylesheet" type="text/css">
	<link href="<?=base_url()?>resources/css/bootstrap.css" rel="stylesheet" type="text/css">
  <link href="<?=base_url()?>resources/css/core.css" rel="stylesheet" type="text/css">
	<link href="<?=base_url()?>resources/css/external.css" rel="stylesheet" type="text/css">
	<link href="<?=base_url()?>resources/css/components.css" rel="stylesheet" type="text/css">
	<link href="<?=base_url()?>resources/css/colors.css" rel="stylesheet" type="text/css">
	<link href="<?=base_url()?>resources/css/extras/animate.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="<?=base_url()?>resources/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>resources/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>resources/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>resources/js/plugins/loaders/blockui.min.js"></script>
  <script type="text/javascript" src="<?=base_url()?>resources/js/plugins/forms/selects/select2.min.js"></script>
  <script type="text/javascript" src="<?=base_url()?>resources/js/plugins/tables/datatables/datatables.min.js"></script>
  <script type="text/javascript" src="<?=base_url()?>resources/js/pages/datatables_custom.js"></script>
  <script type="text/javascript" src="<?=base_url()?>resources/js/plugins/forms/wizards/steps.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<!-- <script type="text/javascript" src="<?=base_url()?>resources/js/plugins/forms/styling/switchery.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>resources/js/plugins/forms/styling/uniform.min.js"></script>
  <script type="text/javascript" src="<?=base_url()?>resources/js/plugins/ui/nicescroll.min.js"></script>
  <script type="text/javascript" src="<?=base_url()?>resources/js/plugins/ui/drilldown.js"></script>-->
  <?php if($controller_function == "users") : ?>
  <script type="text/javascript" src="<?=base_url()?>resources/js/plugins/tables/datatables/extensions/responsive.min.js"></script>
  <?php endif; ?>

  <?php if($page_controller == "overview") : ?>
  	<script type="text/javascript" src="<?=base_url()?>resources/js/plugins/forms/styling/uniform.min.js"></script>
  	<script type="text/javascript" src="<?=base_url()?>resources/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
 
  <script type="text/javascript" src="<?=base_url()?>resources/js/plugins/forms/wizards/steps.min.js"></script>
  	<script type="text/javascript" src="<?=base_url()?>resources/js/pages/form_multiselect.js"></script>
  <?php endif; ?>

	<script type="text/javascript" src="<?=base_url()?>resources/js/core/app.js"></script>
	<!--<script type="text/javascript" src="<?=base_url()?>resources/js/pages/navigation_horizontal_mega.js"></script>-->
  <script type="text/javascript" src="<?=base_url()?>resources/js/plugins/ui/prism.min.js"></script>
	<!-- /theme JS files -->
</head>
<body class="hold-transition">
  <div class="pageloader"></div>
 <!-- Main navbar -->
	<div class="navbar navbar-inverse bg-teal ">
		<div class="navbar-header">
			<a class="navbar-brand" ><i class="icon-collaboration"></i> Laundry Name</a>

			<ul class="nav navbar-nav pull-right visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav navbar-right">
				<!-- Left aligned search form -->
			<form class="navbar-form navbar-left" action="#">
				<div class="form-group has-feedback">
					<input type="search" class="form-control input-xs " placeholder="Search">
					<div class="form-control-feedback">
						<i class="icon-search4 text-normal"></i>
					</div>
				</div>
			</form>

        <?php
          $profile_pic = (!isset($_SESSION['user']['profile_pic'])) ? base_url()."resources/images/users/default.jpg" : $_SESSION['user']['profile_pic'];
        ?>
				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<img src="<?=$profile_pic?>" alt="Profile Picture">
						<span><?=$_SESSION['user']['fullname']?></span>
						<i class="caret"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
					<!--	<li><a href="<?=base_url()?>user/profile"><i class="icon-user-plus"></i> My profile</a></li>
						<li><a href="#"><i class="icon-coins"></i> My balance</a></li>
						<li><a href="#"><span class="badge badge-warning pull-right">58</span> <i class="icon-comment-discussion"></i> Messages</a></li>
						<li class="divider"></li>
						<li><a href="#"><i class="icon-cog5"></i> Account settings</a></li>-->
						<li><a href="<?=base_url()?>access/logout"><i class="icon-switch2"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->

	
	<div class="navbar navbar-default navbar-fixed-bottom">
		<ul class="nav navbar-nav no-border visible-xs-block">
			<li><a class="text-center collapsed legitRipple" data-toggle="collapse" data-target="#navbar-second"><i class="icon-circle-up2"></i></a></li>
		</ul>

		<div class="navbar-collapse collapse" id="navbar-second">
			<p class="navbar-text"><i class="icon-global-check position-left"></i>marksbon <a href="#" class="navbar-link">Oms</a></p>
			

			<div class="navbar-right">
				<ul class="nav navbar-nav">
					<li><a href="#" class="legitRipple">Help center</a></li>
					<li><a href="#" class="legitRipple">Policy</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle legitRipple" data-toggle="dropdown" aria-expanded="false">
							<i class="icon-cog3"></i>
							<span class="visible-xs-inline-block position-right">Settings</span>
							<span class="caret"></span>
						</a>

						<ul class="dropdown-menu dropdown-menu-right">
							<li><a href="#"><i class="icon-dribbble3"></i> Dribbble</a></li>
							<li><a href="#"><i class="icon-pinterest2"></i> Pinterest</a></li>
							<li><a href="#"><i class="icon-github"></i> Github</a></li>
							<li><a href="#"><i class="icon-stackoverflow"></i> Stack Overflow</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<!-- Page container -->
  <div class="page-container">

    <!-- Page content -->
    <div class="page-content">

     
