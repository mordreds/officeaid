<!-- <div class="page page--w-header page--w-container">
		<header class="page__header invert">
			<div class="logo-holder">
				<a href="index.html" class="logo-text d-none d-lg-block">
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
					<a class="btn btn-light btn-icon float-left" href="<?=base_url()?>access/login">
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
	  <li class="openable"><a href="<?=base_url()?>dashboard/job"><span class="icon li-feather3"></span> <span class="text">Assigned</span></a>
	      		</li>
	  <li class="openable"><a href="<?=base_url()?>dashboard/control"><span class="icon li-ellipsis"></span> <span class="text">Controls</span></a>
	      		</li>

	      		<li class="openable"><a href="<?=base_url()?>dashboard/report"><span class="icon li-layers"></span> <span class="text">Report</span></a>
	      		</li>
	      				<li class="title">Template options</li>
	  <li class="openable"><a href="#"><span class="icon li-wallet"></span>
	  <span class="text">User Profile</span></a>
	  <ul>
	  	<li class="openable"><a href="<?=base_url()?>dashboard/users" class="no-icon"><span class="text"> Users</span></a>
	  </li><li class="openable"><a href="<?=base_url()?>dashboard/privillage" class="no-icon"><span class="text">Privillages</span></a>
	  </li>
	</ul>
</li>
<li class="openable"><a href="<?=base_url()?>dashboard/stationary"><span class="icon li-library"></span> <span class="text">Stationary</span></a>
	      		</li>
	  
	</ul>
	</nav></div> -->

	<div class="page"><!-- PAGE CONTENT WRAPPER -->
    <div class="page__content" id="page-content"><!-- PAGE CONTENT CONTAINER -->
      <div class="page-aside invert" id="page-aside">
        <div class="scroll" style="max-height: 100%">
          <div class="navigation" id="navigation-default">
            <div class="user user--bordered user--lg user--w-lineunder user--controls">
              <img src="<?=base_url().$companyinfo[0]->logo_path?>">
              <div class="user__name"><strong>OfficeAid</strong>
              	<br><span class="text-muted">Online</span>
                <div class="user__controls"> </div>
              </div>
              <div class="user__lineunder">
                <div class="text">Last visit 15min ago</div>
                <div class="buttons">
                  <div class="dropdown">
                    <button class="button button-settings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="#">Profile</a> 
                      <a class="dropdown-item" href="#">Projects</a> 
                      <a class="dropdown-item" href="#">Invoices</a> 
                      <a class="dropdown-item" href="#">Settings</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Log out</a>
                    </div>
                  </div>
                  <div class="button button-minimize" data-action="aside-minimize" data-toggle="tooltip" data-placement="top" data-original-title="Minimize navigation"></div>
                </div>
              </div>
            </div>
            <ul>
              <li class="title">Main</li>
              <li>
                <a href="<?=base_url()?>">
                  <span class="icon li-home"></span>
                  <span class="text">Dashboards</span>
                </a>
              </li>
              <li>
                <a href="<?=base_url()?>access/request">
                  <span class="icon li-document"></span> 
                  <span class="text">New Request</span>
                </a>
              </li>
              <li>
                <a href="<?=base_url()?>access/member">
                  <span class="icon li-group-work"></span> 
                  <span class="text">Request History</span></a>
              </li>
              <li class="title">Repository</li>
              <li >
                <li class="folder">
                      <a href="#">
                        <span class="icon li-layers"></span>
                        <span class="text">Departments</span></a>
                        <ul>
                          <?php if(!empty($alldepartments)) : foreach($alldepartments as $key=>$dept) : ?>
                          <li class="folder ">

                            <a  href="#" class="department" data-id="<?=$dept->id?>" >
                              <span class="icon fa fa-folder-o"></span>
                              <span class="text"><?=$dept->name?></span></a>
                              <div class="widget__informer"><?=number_format($dept->filescount)?> file(s)</div>
                              <ul>
                                <li>
                                  <a href="#"><span class="icon fa fa-file-o"></span>
                                    <span class="text">In</span></a></li>
                                    <li>
                                      <a href="#"><span class="icon fa fa-file-o"></span>
                                        <span class="text">Out</span></a></li>
                                      </ul>

                                    </li>
                                    <?php endforeach; endif; ?>
                                  </ul>
                                </li>
              </li>
              <li >
                <li class="folder">
                      <a href="#">
                        <span class="icon li-pie-chart"></span>
                        <span class="text">Branches</span></a>
                        <ul>
                          <li class="folder ">
                            <a href="#"><span class="icon fa fa-folder-o"></span>
                              <span class="text">OKH</span></a>
                              <ul>
                                <li>
                                  <a href="#"><span class="icon fa fa-file-o"></span>
                                    <span class="text">In</span></a></li>
                                    <li>
                                      <a href="#"><span class="icon fa fa-file-o"></span>
                                        <span class="text">Out</span></a></li>
                                      </ul>
                                    </li>
                                       <li class="folder ">
                            <a href="#"><span class="icon fa fa-folder-o"></span>
                              <span class="text">OKW</span></a>
                              <ul>
                                <li>
                                  <a href="#"><span class="icon fa fa-file-o"></span>
                                    <span class="text">In</span></a></li>
                                    <li>
                                      <a href="#"><span class="icon fa fa-file-o"></span>
                                        <span class="text">Out</span></a></li>
                                       
                                      </ul>
                                    </li>
                                    <li class="folder ">
                            <a href="#"><span class="icon fa fa-folder-o"></span>
                              <span class="text">OKG</span></a>
                              <ul>
                                <li>
                                  <a href="#"><span class="icon fa fa-file-o"></span>
                                    <span class="text">In</span></a></li>
                                    <li>
                                      <a href="#"><span class="icon fa fa-file-o"></span>
                                        <span class="text">Out</span></a></li>
                                       
                                      </ul>
                                    </li>
                                    <li class="folder ">
                            <a href="#"><span class="icon fa fa-folder-o"></span>
                              <span class="text">OKT</span></a>
                              <ul>
                                <li>
                                  <a href="#"><span class="icon fa fa-file-o"></span>
                                    <span class="text">In</span></a></li>
                                    <li>
                                      <a href="#"><span class="icon fa fa-file-o"></span>
                                        <span class="text">Out</span></a></li>
                                       
                                      </ul>
                                    </li>
                                      <li class="folder ">
                            <a href="#"><span class="icon fa fa-folder-o"></span>
                              <span class="text">OKB</span></a>
                              <ul>
                                <li>
                                  <a href="#"><span class="icon fa fa-file-o"></span>
                                    <span class="text">In</span></a></li>
                                    <li>
                                      <a href="#"><span class="icon fa fa-file-o"></span>
                                        <span class="text">Out</span></a></li>
                                       
                                      </ul>
                                    </li>
                                    <li class="folder ">
                            <a href="#"><span class="icon fa fa-folder-o"></span>
                              <span class="text">OKF</span></a>
                              <ul>
                                <li>
                                  <a href="#"><span class="icon fa fa-file-o"></span>
                                    <span class="text">In</span></a></li>
                                    <li>
                                      <a href="#"><span class="icon fa fa-file-o"></span>
                                        <span class="text">Out</span></a></li>
                                        
                                      </ul>
                                    </li>
                                    <li class="folder ">
                            <a href="#"><span class="icon fa fa-folder-o"></span>
                              <span class="text">OKS</span></a>
                              <ul>
                                <li>
                                  <a href="#"><span class="icon fa fa-file-o"></span>
                                    <span class="text">In</span></a></li>
                                    <li>
                                      <a href="#"><span class="icon fa fa-file-o"></span>
                                        <span class="text">Out</span></a></li>
                                        
                                      </ul>
                                    </li>
                                    <li class="folder ">
                            <a href="#"><span class="icon fa fa-folder-o"></span>
                              <span class="text">OKA</span></a>
                              <ul>
                                <li>
                                  <a href="#"><span class="icon fa fa-file-o"></span>
                                    <span class="text">In</span></a></li>
                                    <li>
                                      <a href="#"><span class="icon fa fa-file-o"></span>
                                        <span class="text">Out</span></a></li>
                                        
                                      </ul>
                                    </li>
                                      <li class="folder ">
                            <a href="#"><span class="icon fa fa-folder-o"></span>
                              <span class="text">OKP</span></a>
                              <ul>
                                <li>
                                  <a href="#"><span class="icon fa fa-file-o"></span>
                                    <span class="text">In</span></a></li>
                                    <li>
                                      <a href="#"><span class="icon fa fa-file-o"></span>
                                        <span class="text">Out</span></a></li>
                                        
                                      </ul>
                                    </li>
                                    <li class="folder ">
                            <a href="#"><span class="icon fa fa-folder-o"></span>
                              <span class="text">OKK</span></a>
                              <ul>
                                <li>
                                  <a href="#"><span class="icon fa fa-file-o"></span>
                                    <span class="text">In</span></a></li>
                                    <li>
                                      <a href="#"><span class="icon fa fa-file-o"></span>
                                        <span class="text">Out</span></a></li>
                                        
                                      </ul>
                                    </li>
                                  </ul>
                                </li>
              </li>
              
            </ul>
           </div>
          </div>
        </div><!-- //END PAGE CONTENT CONTAINER --><!-- PAGE LOGIN CONTAINER -->
        <div class="important-container login-container">
          <div class="card-body">
            <div class="page-heading">
              <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?=base_url()?>">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="#"><?=$pageName?></a></li>
                </ol>
              </nav>
            </div>
            <div class="divider"></div>