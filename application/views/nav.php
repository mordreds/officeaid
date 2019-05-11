  <div class="page page--w-header"><!-- PAGE HEADER -->
    <header class="page__header">
      <div class="logo-holder">
        <a href="index.html" class="logo-text d-none d-lg-block">
          <strong class="text-primary">Office</strong> <strong>Aid</strong></a> 
          <a href="index.html" class="logo-text d-lg-none"><strong class="text-primary">#</strong>
            <strong>OA</strong></a><div class="rw-btn rw-btn--nav" data-action="aside-hide"><span></span></div>
        </div>
        
        <div class="box-fluid"></div>

    </header>
    <!-- //END PAGE HEADER --><!-- PAGE CONTENT WRAPPER -->
    <div class="page__content" id="page-content"><!-- PAGE ASIDE PANEL -->
      <div class="page-aside invert" id="page-aside">
        <div class="navigation" id="navigation-default"><div class="user user--bordered user--lg user--w-lineunder user--controls"><img src="<?=base_url().$companyinfo[0]->logo_path?>"><div class="user__name"><strong>Dmitry Ivaniuk</strong><br><span class="text-muted">Administrator</span><div class="user__controls"></div></div>
        <div class="user__lineunder">
          <div class="text">Last visit 15min ago</div>
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


    


          <div class="card-body">
            