  <?php
    $username = (!empty($_SESSION['user']['fullname'])) ? $_SESSION['user']['fullname'] : "General Ticket User";
    $groupname = (!empty($_SESSION['user']['group_name'])) ? $_SESSION['user']['group_name'] : "End User";
  ?>

  <div class="page page--w-header"><!-- PAGE HEADER -->
    <header class="page__header">
      <div class="logo-holder">
        <a href="<?=base_url()?>" class="logo-text d-none d-lg-block">
          <strong class="text-primary">Office</strong> <strong>Aid</strong></a> 
          <a href="<?=base_url()?>" class="logo-text d-lg-none"><strong class="text-primary">#</strong>
            <strong>OA</strong></a><div class="rw-btn rw-btn--nav" data-action="aside-hide"><span></span></div>
        </div>
        
        <div class="box-fluid"></div>
        <div class="box">
  <div class="dropdown float-left">
    <button class="btn btn-light btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <span class="li-clipboard-alert"></span></button>
      <div class="dropdown-menu dropdown-menu-right">
        
          <ul class="list-group list-group-flush">
            <li class="list-group-item padding-left-5 border-top-0">
            <div class="user user--bordered user--lg">
              <div class="user__name">
                <button type="button" class="btn btn-outline-light btn-block" id="reset_password">Change Password</button>
              </div>
              </div>
            </li>
            </ul>
          </div></div>
          <a class="btn btn-light btn-icon float-left" href="<?=base_url()?>access/logout">
            <span class="li-power-switch"></span>
          </a> 
        </div>
    </header>
    <!-- //END PAGE HEADER --><!-- PAGE CONTENT WRAPPER -->
    <div class="page__content" id="page-content"><!-- PAGE ASIDE PANEL -->
      <div class="page-aside invert" id="page-aside">
        <div class="navigation" id="navigation-default"><div class="user user--bordered user--lg user--w-lineunder user--controls"><img src="<?=base_url().$companyinfo[0]->logo_path?>"><div class="user__name"><strong><?=$username?></strong><br><span class="text-muted"><?=$groupname?></span><div class="user__controls"></div></div>
        <div class="user__lineunder">
          <div class="text">Show Less</div>
        <div class="buttons"><div class="button button-minimize" data-action="aside-minimize" data-toggle="tooltip" data-placement="top" data-original-title="Minimize navigation">
      </div>
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
            <!--  <li>
                <a href="<?=base_url()?>access/request">
                  <span class="icon li-document"></span> 
                  <span class="text">New Request</span>
                </a>
              </li>
              <li>
                <a href="<?=base_url()?>access/member">
                  <span class="icon li-group-work"></span> 
                  <span class="text">Request History</span></a>
              </li>-->
              <li class="title">Repository</li>
              <li>
                  <li class="folder">
                    <a href="<?=base_url()?>access/files">
                      <span class="icon li-layers"></span>
                      <span class="text">Departments</span>
                    </a>
                    <ul>
                      <?php if(!empty($alldepartments)) : foreach($alldepartments as $key=>$dept) : ?>
                        <li class="folder ">
                          <a href="#" class="department" data-id="<?=$dept->id?>">
                            <span class="icon fa fa-folder-o"></span>
                            <span class="text"><?=$dept->name?></span>
                          </a>
                        </li>
                      <?php endforeach; endif; ?>
                    </ul>
                    </a>
                  </li>
              </li>
              <li >
                <li class="folder">
                  <a href="#">
                    <span class="icon li-pie-chart"></span>
                    <span class="text">Branches</span>
                  </a>
                  <ul>
                    <?php if(!empty($allbranches)) : foreach($allbranches as $key=>$dept) : ?>
                      <li class="folder ">
                        <a href="#" class="department" data-id="<?=$dept->id?>">
                          <span class="icon fa fa-folder-o"></span>
                          <span class="text"><?=$dept->name?></span>
                        </a>
                      </li>
                    <?php endforeach; endif; ?>
                  </ul>
                </li>
              </li>
              
            </ul>
      </div>
    </div>
    <!-- //END PAGE ASIDE PANEL --><!-- PAGE CONTENT CONTAINER --><div class="content" id="content"><!-- PAGE HEADING -->

    <!-- //END PAGE HEADING -->
    <div class="page-heading">
              <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?=base_url()?>">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="#"><?=$pageName?></a></li>
                </ol>
              </nav>
            </div>


    


          
            <div class="card">
              <div class="card-container">
                <div class="dropdown"><div class="rw-btn rw-btn--card" data-toggle="dropdown"><div></div></div><div class="dropdown-menu dropdown-menu-right"><a href="#" class="dropdown-item" data-demo-action="update">Update</a> <a href="#" class="dropdown-item" data-demo-action="expand">Expand</a> <a href="#" class="dropdown-item" data-demo-action="invert">Invert style</a><div class="dropdown-divider"></div><a href="#" class="dropdown-item" data-demo-action="remove">Remove card</a></div></div>
              </div>
             <div class="card-body">
          
            