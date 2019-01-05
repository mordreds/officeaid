<div class="page"><!-- PAGE CONTENT WRAPPER -->
    <div class="page__content" id="page-content"><!-- PAGE CONTENT CONTAINER -->
      <div class="page-aside invert" id="page-aside">

        <div class="scroll" style="max-height: 100%">
          <div class="navigation" id="navigation-default">
            <div class="user user--bordered user--lg user--w-lineunder user--controls">
              <img src="assets/img/users/user_1.jpg">
              <div class="user__name"><strong>OfficeAid</strong><br><span class="text-muted">Online</span>
                <div class="user__controls">
                  <div class="dropdown">
                    <button class="btn btn-light btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fa fa-cog"></span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="<?=base_url()?>dashboard/home">Administrator</a>
                        <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Log out</a></div></div>
                  </div>
                </div>
                <div class="user__lineunder"><div class="text">Last visit 15min ago</div><div class="buttons"><div class="dropdown"><button class="button button-settings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button><div class="dropdown-menu" aria-labelledby="dropdownMenuButton"><a class="dropdown-item" href="#">Profile</a> <a class="dropdown-item" href="#">Projects</a> <a class="dropdown-item" href="#">Invoices</a> <a class="dropdown-item" href="#">Settings</a><div class="dropdown-divider"></div><a class="dropdown-item" href="#">Log out</a></div></div><div class="button button-minimize" data-action="aside-minimize" data-toggle="tooltip" data-placement="top" data-original-title="Minimize navigation"></div></div></div></div>
              <ul>
                <li class="title">Main</li>
                <li ><a href="<?=base_url()?>access/login"><span class="icon li-home"></span><span class="text">Dashboards</span></a>
                </li>
                <li ><a href="<?=base_url()?>access/enquire"><span class="icon li-document"></span> <span class="text">New Request</span></a>
                </li><li ><a href="<?=base_url()?>access/member"><span class="icon li-group-work"></span> <span class="text">Request History</span></a>
                </li>
                <li class="title">Repository</li>
                <li ><a href="<?=base_url()?>access/confirm"><span class="icon li-pie-chart"></span> <span class="text">Send File</span></a></li>
                <li ><a href="<?=base_url()?>access/receptionist"><span class="icon li-menu-square"></span> <span class="text">Receive</span></a>
                </li>
              </ul></div></div></div><!-- //END PAGE CONTENT CONTAINER --><!-- PAGE LOGIN CONTAINER -->
  <div class="important-container login-container">

     <div class="page-heading">
          
            <nav aria-label="breadcrumb" role="navigation">
              <ol class="breadcrumb"><li class="breadcrumb-item">
                <a href="">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="#">Directory</a></li>
              </ol></nav>
            </div>
        <label></label>
        <form action="<?=base_url()?>access/receptionist" method="post">
         <div class="card-body">
        <div class="divider"></div>
          <div class="form-control-element ">
                  <select class="custom-select margin-bottom-20" id="rw_settings_layout">
                    <option value="default">Access</option>
                    <option value="boxed">Public</option>
                    <option value="indent">Private</option>
                  </select>
                </div>
           
                <div class="form-control-element">
                  <select class="custom-select margin-bottom-20" id="rw_settings_layout">
                    <option value="default">Category</option>
                    <option value="boxed">IT</option>
                    <option value="indent">HR</option>
                  </select>
                </div>
                <label></label>
            <div class="form-control-element">
                <input type="text" class="mask_phone form-control" placeholder="Subject">
                <div class="form-control-element__box"><span class="fa fa-user-secret"></span></div>
              </div>
              <label></label>
            <div class="form-control-element">
                <input type="number" class="mask_phone form-control" placeholder="Contact Details">
                <div class="form-control-element__box"><span class="fa fa-phone"></span></div>
              </div>
                <label></label>
            <div class="form-control-element">
                <input type="file" class="mask_phone form-control" placeholder="Assigned To">
                <div class="form-control-element__box"><span class="fa fa-file"></span></div>
              </div> 
               <label></label>
            <div class="form-control-element">
                <input type="file" class="mask_phone form-control" placeholder="Assigned To">
                <div class="form-control-element__box"><span class="fa fa-file"></span></div>
              </div>
               <label></label>
            <div class="form-control-element">
                <input type="file" class="mask_phone form-control" placeholder="Assigned To">
                <div class="form-control-element__box"><span class="fa fa-file"></span></div>
              </div>
          <div class="divider"></div>
            <div class="form-group margin-bottom-30">
            <div class="form-row">
              <div class="col-2"></div>
              <div class="col-8"><button class="btn btn-primary btn-block">Submit</button>
              </div>
            </div>
          </div>
              
          
        </form>
        
        <div class="form-group text-center">
        </div>
      </div>
    </div><!-- PAGE LOGIN CONTAINER -->
  </div><!-- //END PAGE CONTENT -->
</div>

<script type="text/javascript">var editor = CodeMirror.fromTextArea(document.getElementById("codeEditor"), {
                lineNumbers: true,
                matchBrackets: true,
                mode: "application/x-httpd-php",
                indentUnit: 4,
                indentWithTabs: true,
                enterMode: "keep",
                tabMode: "shift"                                                
            });
            editor.setSize('100%','70px');</script>
            <script type="text/javascript" src="<?=base_url()?>resources/js/vendors/summernote/summernote-bs4.min.js"></script>
            <script type="text/javascript">$('#summernote').summernote({
                placeholder: 'Type in your text',
                tabsize: 2,
                height: 70
            });</script>