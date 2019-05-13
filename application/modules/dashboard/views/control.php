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
   
   </div></div></div><!-- //END PAGE ASIDE PANEL --><!-- PAGE CONTENT CONTAINER --><div class="content" id="content"><!-- PAGE HEADING --><div class="page-heading"><div class="page-heading__container"><div class="icon"><span class="li-chart-settings"></span></div>
  <h1 class="title">My Assignments</h1><p class="caption">OfficeAid</p></div><div class="page-heading__container float-right d-none d-sm-block"></div>
  <nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="">Dashboard</a></li>
    </ol>
    </nav>
  </div><!-- //END PAGE HEADING -->
  <div class="container-fluid">
   <div class="card">
    <div class="card-body">
        <table id="all_my_assignments" class="table table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>ID</th>
          <th>Created By</th>
          <th>Department</th>
          <th>Issue Type</th>
          <th>Subject</th>
          <th>Priority</th>
          <th>Due Date</th>
          <th>Attachments</th>
          <th>Type</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>Task</td>
          <td>Credit</td>
          <td>Can't query report on t24</td>
          <td>2011/04/20</td>
          <td>
           <div class="form-control-element">
              <select class="select2 form-control custom-select" id="rw_settings_layout">
                <option>  Pending </option>
                <option> Processing </option>
                <option> Resolved </option>
                <option> Closed </option>
            </div>  
          </td>
          <td>Bismark</td>
          <td><span class="icon li-document"></span></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
</div>
</div><!-- //END PAGE CONTENT CONTAINER --></div><!-- //END PAGE CONTENT --></div><!-- //END PAGE WRAPPER --><!-- TEMPLATE SETTINGS -->

<script type="text/javascript">
  $(document).ready(function(){
    $('#all_my_assignments').dataTable({
      "order": [[ 0, "desc" ]],
        ajax: {
          type : 'GET',
          url : '<?= base_url()?>dashboard/allassignments_json/',
          dataSrc: '',
          error: function() {
            alert("error retrieving list");
          }
        },
        columns: [
          {data: "id", visible:false},
          {data: "created_by"},
          {data: "created_by_department"},
          {data: "complain"},
          {data: "subject"},
          {data: "priority"},
          {data: "duedate"},
          {data: "filepath", render: function(data,type,row,meta){
            if(row.filetype == "doc" || row.filetype == "docx") 
              fileicon = 'fa fa-file-word-o';
            
            else if(row.filetype == "image")
              fileicon = "fa fa-file-image-o";
            
            else if(row.filetype == "pdf")
              fileicon = "fa fa-file-pdf-o";
            
            else if(row.filetype == "xls" || row.filetype == "xlsx")
              fileicon = "fa fa-file-excel-o";
            
            else if(row.filetype == "zip" || row.filetype == "rar")
              fileicon = "fa fa-file-archive-o";
            
            else
              fileicon = "fa fa-file-text-o";

            /* checking if is uploaded*/
            if(row.filepath)
              return '<a href="<?=base_url()?>' + row.filepath + '" style="color: #428c01" data-id="'+window.btoa(row.id)+'"><span class=" '+fileicon+' fa-2x"></span></a>';
            else
              return "<b>No File</b>"
          }},
          {data: "type"},
          {data: "status", render: function(data,type,row,meta){
            let status = row.status;
            if(status == 'pending')
              pending = "selected";
            else
            pending = "";

            if(status == 'processing')
              processing = "selected";
            else
            processing = "";

            if(status == 'resolved')
              processed = "selected";
            else
            processed = "";

            if(status == 'Escalated (APEX)')
                escalated = "selected";
              else
              escalated = "";

            return '<div class="form-control-element"><select class="custom-select changestatus" data-id='+window.btoa(row.id)+'><option '+pending+'>Pending</option><option '+processing+'>Processing</option><option '+processed+'>Resolved</option><option '+escalated+'>Escalated (APEX)</option></select></div>';
          }},
          {render: function(data,type,row,meta) {
            return "<button class='btn btn-primary btn-xs view_req_det' data-t_id='"+row.id+"' data-s_name='"+row.created_by+"' data-s_contact='"+row.sender_contact+"' data-sub='"+row.subject+"' data-desc='"+row.description+"' data-priority='"+row.priority+"' data-d_date='"+row.due_date +"' data-dept='"+row.complain+"' data-assigned_to='"+row.assigned_to+"' data-img='"+row.filepath+"'>Details</button>"
          }}
        ],
    });
  });
</script>

<!-- Updating Status of Ticket -->
<script type="text/javascript">
  $(document).on("change",".changestatus",function(){
    let formData = { 
      'ticketid': $(this).data('id'),
      'status': $(this).children('option:selected').text()
    };
    
    $.ajax({
      type : 'POST',
      url : '<?= base_url()?>dashboard/updaterequest',
      data : formData,
      success: function(response) {
        let responseData = JSON.parse(response);
        if(responseData['status'] == 203) {
          alert(responseData['error']);
        }
        else if(responseData['status'] == 200) {
          alert(responseData['message'])
        }
        //console.log(responseData);
      },
      error: function() {
        alert("Error Transmitting Data")
      }
    });
  });
</script>
<!-- Updating Status of Ticket -->
