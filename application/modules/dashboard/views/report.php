<div class="page__content page-aside--hidden" id="page-content"><!-- PAGE ASIDE PANEL -->
  <div class="page-aside page-aside--hidden invert" id="page-aside">
    <div class="scroll" style="max-height: 100%">
      <div class="navigation" id="navigation-default">
        <div class="user user--bordered user--lg user--w-lineunder user--controls"><div class="user__name">
            <strong>About Us</strong><br>
            <ul class="nav navigation" style="color: #fff">
                    <!-- <li>Incooperation Date:<span class="text-muted text-regular "><b>21-10-2015</b> </span></li> -->

                    <li>Postal Address:<span class="text-muted text-regular"><br><b>MARKSBON SYSTEMS</b></BR><b>BOX TA353, TAIFA - ACCRA</b></span></li>
                    <li>Website Address:<span class="text-muted text-regular"><br><b>www.markcbon.com</b></span></li>
                    <div class="divider"></div>
                    <li>License :<span class="text-muted text-regular"><br><b>PAID</b></span></li>
                  </ul>
           </div>
         </div>
   
   </div></div></div><!-- //END PAGE ASIDE PANEL --><!-- PAGE CONTENT CONTAINER -->
   <div class="content" id="content"><!-- PAGE HEADING --><div class="page-heading"><div class="page-heading__container"><div class="icon"><span class="icon li-layers"></span></div>
  <h1 class="title">Reports</h1><p class="caption">OfficeAid</p></div><div class="page-heading__container float-right d-none d-sm-block"></div>
  <nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="">Dashboard</a></li>
    </ol>
    </nav>
  </div><!-- //END PAGE HEADING -->
  <div class="container-fluid">
   <div class="card">
    <div class="card-body">
      <form action="#" onsubmit="event.preventDefault(); return generatereport();">
        <div class="card" style="width:100% !important">
            <div class="card-body">
              <div class="row">
                <div class="col-3">
                  <div class="form-control-element">
                    <select class="custom-select margin-bottom-20" name="department">
                      <option value="" disabled selected>Department / Branch</option>
                      <?php if(!empty($alldepartments)) : foreach($alldepartments as $dept) : ?>
                        <option value="<?=$dept->id?>"> <?=$dept->name?> </option>
                       <?php endforeach; endif; ?>
                    </select>
                  </div>
                  <div class="form-control-element">
                    <select class="custom-select margin-bottom-20" name="createdby">
                      <option value="" disabled selected>Created By</option>
                      <?php if(!empty($allusers)) : foreach($allusers as $user) : ?>
                        <option value="<?=$user->username?>"> <?=$user->fullname?> </option>
                       <?php endforeach; endif; ?>
                    </select>
                  </div>
                  <div class="form-control-element">
                    <select class="custom-select margin-bottom-20" name="assignee">
                      <option value="" disabled selected>Assigned To</option>
                      <?php if(!empty($allassignees)) : foreach($allassignees as $assignee) : ?>
                        <option value="<?=$assignee->id?>"> <?=$assignee->fullname?> </option>
                       <?php endforeach; endif; ?>
                    </select>
                  </div>
                </div>
                <div class="col-3">
                  <div class="form-control-element">
                    <select class="custom-select margin-bottom-20" name="issue_type">
                      <option value="" disabled selected>Type</option>
                      <option>All</option>
                      <option value="ticket">Ticket</option>
                      <option value="task">Task</option>
                    </select>
                  </div>
                  <div class="form-control-element">
                    <select class="custom-select margin-bottom-20" name="complain_type">
                      <option value="" disabled selected>Issue Type</option>
                      <option value="0">All</option>
                      <?php if(!empty($allissues)) : foreach($allissues as $issue) : ?>
                        <option value="<?=$issue->id?>"> <?=$issue->name?> </option>
                       <?php endforeach; endif; ?>
                    </select>
                  </div>
                </div>
                <div class="col-3">
                 <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <span class="fa fa-calendar-check-o"></span>
                        </div>
                      </div>
                      <input type="date" class="form-control" name="starttime">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <span class="fa fa-calendar-check-o"></span>
                        </div>
                      </div>
                      <input type="date" class="form-control" name="endtime">
                    </div>
                  </div>
                </div>
                <div class="col-3">
                  <button type="submit" class="btn btn-primary btn-block">Generate Report</button>
                </div>
            </div>
          </div>
        </div>
      </form>

      <div id="department-result" class="row" style="display:none">
        <div class="divider"></div>
          <table id="department-datatable" class="table table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>ID</th>
                <th>Staff</th>
                <th>Type</th>
                <th>Issue Type</th>
                <th>Description</th>
                <th>Location</th>
                <th>Date Issued</th>
                <th>Date Completed</th>
                <th>status</th>
                <th>Assigned To</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>

        <div id="user-result" class="row" style="display:none">
          <div class="divider"></div>
          <table id="users-datatable" class="table table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>ID</th>
                <th>Staff</th>
                <th>Type</th>
                <th>Issue Type</th>
                <th>Description</th>
                <th>Department / Branch</th>
                <th>Date Issued</th>
                <th>Date Completed</th>
                <th>status</th>
                <th>Assigned To</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
    </div>
</div>
</div>
</div><!-- //END PAGE CONTENT CONTAINER --></div><!-- //END PAGE CONTENT --></div><!-- //END PAGE WRAPPER --><!-- TEMPLATE SETTINGS -->

<script type="text/javascript">
  function generatereport() { 
    let formurl = "<?=base_url()?>dashboard/generatereport";
    let formData = {
      'department' : $('[name="department"] option:selected').val(),
      'assignee' : $('[name="assignee"] option:selected').val(),
      'createdby' : $('[name="createdby"] option:selected').val(),
      'complain_type': $('[name="complain_type"] option:selected').val(),
      'issue_type': $('[name="issue_type"] option:selected').val(),
      'starttime': $('[name="starttime"]').val(),
      'endtime': $('[name="endtime"]').val()
    };

    if(formData.department == "") { 
      $('#department-result').attr('style', "display:none");
      $('#user-result').attr('style', "display:block");

      var uninitialized = $('#users-datatable').filter(function() {
        return !$.fn.DataTable.fnIsDataTable(this);
      });

      if(uninitialized.length == 0)
        $('#users-datatable').DataTable().destroy();

      $('#users-datatable').DataTable({ 
        dom: "Bfrtip",
        buttons: ["copy", "csv", "excel", "pdf", "print"],
        ajax: {
          dataSrc: '',
          type: 'post',
          url: formurl,
          data : formData,
          error: function() {
            alert("error retrieving list");
          }
        },
        columns: [
          {data: "id", visible:false},
          {data: "created_by"},
          {data: "type"},
          {data: "complain"},
          {data: "description"},
          {data: "department"},
          {data: "date_created"},
          {data: "date_solved"},
          {data: "status"},
          {data: "assignee"}
        ],
      });
    } 
    else {
      $('#userresult').attr('style', "display:none");
      $('#department-result').attr('style', "display:block");

      var uninitialized = $('#department-datatable').filter(function() {
        return !$.fn.DataTable.fnIsDataTable(this);
      });

      if(uninitialized.length == 0)
        $('#department-datatable').DataTable().destroy();

      $('#department-datatable').DataTable({ 
        dom: "Bfrtip",
        buttons: ["copy", "csv", "excel", "pdf", "print"],
        ajax: {
          dataSrc: '',
          type: 'post',
          url: formurl,
          data : formData,
          error: function() {
            alert("error retrieving list");
          }
        },
        columns: [
          {data: "id", visible:false},
          {data: "department"},
          {data: "created_by"},
          {data: "type"},
          {data: "complain"},
          {data: "description"},
          {data: "date_created"},
          {data: "date_solved"},
          {data: "status"},
          {data: "assignee"}
        ],
      });
    }

    
  }
</script>
