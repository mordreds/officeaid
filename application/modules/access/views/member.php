<div class="page"><!-- PAGE CONTENT WRAPPER -->
    <div class="page__content" id="page-content"><!-- PAGE CONTENT CONTAINER -->
      <div class="page-aside invert" id="page-aside">

        <div class="scroll" style="max-height: 100%">
          <div class="navigation" id="navigation-default">
            <div class="user user--bordered user--lg user--w-lineunder user--controls">
              <img src="assets/img/users/user_1.jpg">
              <div class="user__name"><strong>OfficeAid</strong><br><span class="text-muted">Online</span>
               
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
      <div class="card-body">
        <div class="page-heading">
          
            <nav aria-label="breadcrumb" role="navigation">
              <ol class="breadcrumb"><li class="breadcrumb-item">
                <a href="">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="#">Request History</a></li>
              </ol></nav></div>
        <label></label>

        <div class="card-body">
  <h4 id="rw-dt-responsive">Default example</h4>
  <table id="dt-example-responsive" class="table table-bordered" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th>ID </th>
        <th>Department</th>
        <th>Category</th>
        <th>Subject</th>
        <th>Description</th>
        <th>Assigned To</th>
        <th>Status</th>
        <th>Date</th>
        <th>Attachment</th>
        </tr>
      </thead>
        <tfoot>
          <tr>
           <th>ID </th>
        <th>Department</th>
        <th>Category</th>
        <th>Subject</th>
        <th>Description</th>
        <th>Assigned To</th>
        <th>Status</th>
        <th>Date</th>
        <th>Attachment</th>
          </tr>
        </tfoot>
        <tbody>
          <tr>
            <td><a href="<?=base_url()?>access/enquire">0012</a></td>
            <td>Credit</td>
            <td>Loans</td>
            <td>Monthly Report</td>
            <td>for December</td>
            <td>Amartey</td>
            <td>Pending</td>
            <td>2011/04/25</td>
            <td>t.nixon@datatables.net</td>
            </tr>
          <tr>
            <td><a href="<?=base_url()?>access/enquire">0013</a></td>
            <td>IT</td>
            <td>APEX LINK</td>
            <td>Malfunction</td>
            <td>Cant Access System</td>
            <td>Kelvin</td>
            <td>Pending</td>
            <td>2011/07/25</td>
            <td>g.winters@datatables.net</td>
            </tr>
         
          </tbody></table><script type="text/javascript">document.addEventListener("DOMContentLoaded", function () {
                                        app._loading.show($("#dt-ext-responsive"),{spinner: true});
                                        $("#dt-example-responsive").DataTable({
                                            "responsive": true,
                                            "initComplete": function(settings, json) {
                                                setTimeout(function(){
                                                    app._loading.hide($("#dt-ext-responsive"));
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