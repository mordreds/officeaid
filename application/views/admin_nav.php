<div class="page page--w-header page--w-container">
		<header class="page__header invert">
			<div class="logo-holder">
				<a href="<?=base_url()?>" class="logo-text d-none d-lg-block">
	<strong class="text-primary">Office</strong><strong>Aid</strong></a> 
	 <a href="index.html" class="logo-text d-lg-none">
	 	<strong class="text-primary">i</strong><strong>vl</strong></a>
	 	<div class="rw-btn rw-btn--nav" data-action="aside-hide"><span></span>
	 	</div>
	 </div>
<div class="box-fluid"></div>
<div class="box">
	<div class="dropdown float-left">
		<button class="btn btn-light btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<span class="li-clipboard-alert"></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<div class="page-heading">
					<div class="page-heading__container">
						<h1 class="title">Notifications</h1>
						<p class="caption">List of latest events</p></div>
						<div class="page-heading__container float-right">
							<button class="btn btn-light btn-icon"><span class="fa fa-refresh"></span>
							</button>
						</div>
					</div>
					<ul class="list-group list-group-flush">
						<li class="list-group-item padding-left-5 border-top-0">
						<div class="user user--bordered user--lg">
							<div class="user__name">
								<strong>Tracey Newman</strong> commented on your <strong>Awesome article</strong>, <span class="text-muted">5 min ago</span></div>
							</div>
						</li>
						</ul>
					</div></div>
					<a class="btn btn-light btn-icon float-left" href="<?=base_url()?>access/logout">
						<span class="li-power-switch"></span>
					</a> 
				</div>
			</header>
			<div class="page__container"><nav class="horizontal-navigation">
				<button class="btn btn-light btn--icon" data-action="horizontal-show"><span class="fa fa-bars"></span> Toggle navigation</button>
<ul>
		<li class="title">Main</li>
	<li class="openable"><a href="<?=base_url()?>dashboard/home"><span class="icon li-home"></span> 
	<span class="text">Dashboards</span></a>
</li>
	  
	  	</li>
	  	<li class="title">Interface</li>
	  </li>
		<?php if(in_array('AssignTicket',$_SESSION['user']['roles'])) : ?>
	  	<li class="openable"><a href="<?=base_url()?>dashboard/job">
				<span class="icon li-feather3"></span> 
				<span class="text">Assigned</span></a>
	    </li>
		<?php endif; ?>
	  <li class="openable"><a href="<?=base_url()?>dashboard/control"><span class="icon li-ellipsis"></span> <span class="text">Controls</span></a>
	      		</li>

	      		<li class="openable"><a href="<?=base_url()?>dashboard/report"><span class="icon li-layers"></span> <span class="text">Report</span></a>
	      		</li>
	      				<li class="title">Template options</li>
		<?php if(in_array('UserMgmt',$_SESSION['user']['roles'])) : ?>
			<li class="openable"><a href="#"><span class="icon li-wallet"></span>
					<span class="text">User Profile</span></a>
					<ul>
						<li class="openable"><a href="<?=base_url()?>dashboard/users" class="no-icon"><span class="text"> Users</span></a></li>
						<li class="openable"><a href="<?=base_url()?>dashboard/privillage" class="no-icon"><span class="text">Privillages</span></a></li>
				</ul>
			</li>
		<?php endif; ?>
<li class="openable"><a href="<?=base_url()?>dashboard/stationary"><span class="icon li-clipboard-pencil"></span> <span class="text">Task</span></a>
	      		</li>
	  
	</ul>
	</nav></div>

	<div class="page"><!-- PAGE CONTENT WRAPPER -->
    <div class="page__content" id="page-content"><!-- PAGE CONTENT CONTAINER -->
     