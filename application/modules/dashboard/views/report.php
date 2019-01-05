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
        <div class="card" style="width:100% !important">
          <div class="card-body">
            <div class="row">
              <div class="col-3">
                  <div class="form-control-element">
                  <select class="custom-select margin-bottom-20" id="rw_settings_layout">
                    <option value="default">Department</option>
                    <option value="boxed">IT</option>
                    <option value="indent">HR</option>
                  </select>
              </div>
            </div>
              <div class="col-3">
                  <div class="form-control-element">
                  <select class="custom-select margin-bottom-20" id="rw_settings_layout">
                    <option value="default">Category</option>
                    <option value="boxed">IT</option>
                    <option value="indent">HR</option>
                  </select>
              </div>
            </div>
             <div class="col-3">
                   <div class="form-group margin-top-10 margin-bottom-30">
                                      <div class="input-group">
                                      <div class="input-group-prepend">
                                      <div class="input-group-text">
                                    <span class="fa fa-calendar-check-o"></span>
                                    </div>
                                    </div><input type="text" class="form-control" placeholder="Press on field to open..." id="dr-example-ex"></div>
                                    <script type="text/javascript">document.addEventListener("DOMContentLoaded", function () {
                                        $("#dr-example-ex").daterangepicker({
                                            "opens": "right"                                        
                                        });
                                    });

                                </script>
                                    </div>
            </div>
              <div class="col-3">
                 <input type="submit" name="Submit Ticket" type="Submit" class="btn btn-primary btn-block" data-toggle="modal" data-target=".bd-example-modal-sm">
              </div>
            
          </div>
        </div>
      </div>
         <div class="card-body" style="margin-top: -20px">
    <table id="dt-example-buttons" class="table table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>ID</th>
          <th>Department</th>
          <th>Category</th>
          <th>Subject</th>
          <th>Date Issued</th>
          <th>Date Completed</th>
          <th>Assigned To</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>ID</th>
          <th>Department</th>
          <th>Category</th>
          <th>Subject</th>
          <th>Date Issued</th>
          <th>Date Completed</th>
          <th>Assigned To</th>
            </tr>
          </tfoot>
          <tbody>
            <tr>
              <td>Tiger Nixon</td>
              <td>System Architect</td>
              <td>Edinburgh</td>
              <td>61</td>
              <td>2011/04/25</td>
              <td>2011/04/25</td>
              <td>$320,800</td>
            </tr>
            <tr>
              <td>Tiger Nixon</td>
              <td>System Architect</td>
              <td>Edinburgh</td>
              <td>61</td>
              <td>2011/04/25</td>
              <td>2011/04/25</td>
              <td>$320,800</td>
            </tr>
            <tr>
              <td>Tiger Nixon</td>
              <td>System Architect</td>
              <td>Edinburgh</td>
              <td>61</td>
              <td>2011/04/25</td>
              <td>2011/04/25</td>
              <td>$320,800</td>
            </tr>
            
              </tbody>
              </table>
              <script type="text/javascript">document.addEventListener("DOMContentLoaded", function () {
                                        app._loading.show($("#dt-ext-buttons"),{spinner: true});
                                        $("#dt-example-buttons").DataTable({
                                            dom: "Bfrtip",
                                            buttons: ["copy", "csv", "excel", "pdf", "print"],
                                            "initComplete": function(settings, json) {
                                                setTimeout(function(){
                                                    app._loading.hide($("#dt-ext-buttons"));
                                                },1000);
                                            }
                                        });
                                    });</script>
    </div>
        
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