<?php print_r($_SESSION['user']); ?>
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
   
   </div></div></div><!-- //END PAGE ASIDE PANEL --><!-- PAGE CONTENT CONTAINER --><div class="content" id="content"><!-- PAGE HEADING --><div class="page-heading"><div class="page-heading__container"><div class="icon"><span class="li-feather3"></span></div>
  <h1 class="title">Assigned Job</h1><p class="caption">OfficeAid</p></div><div class="page-heading__container float-right d-none d-sm-block"></div>
  <nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="">Dashboard</a></li>
    </ol>
    </nav>
  </div><!-- //END PAGE HEADING -->
  <div class="container-fluid">
   <div class="card">
    <div class="card-body">

        <table id="dt-example-responsive" class="table table-bordered" >
          <thead>
            <tr>
              <th>No #</th>
              <th>Subject</th>
              <th>CreatedBy</th>
              <th>Department</th>
              <th>Priority</th>
              <th>AssignedTo</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
        <script type="text/javascript">
          $(document).ready(function(){
            /************** Default Settings **************/
              $.extend( $.fn.dataTable.defaults, {
                autoWidth: false,
                responsive: true,
                columnDefs: [{ 
                    orderable: false,
                    width: '100px',
                }],
                dom: '<"datatable-header"fl><"datatable-scroll-wrap"t><"datatable-footer"ip>',
                language: {
                  search: '<span>Filter:</span> _INPUT_',
                  lengthMenu: '<span>Show:</span> _MENU_',
                  paginate: { 'first': 'First', 'last': 'Last', 'next': ' Next &rarr;', 'previous': '&larr; Preview ' }
                },
                drawCallback: function () {
                  $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
                },
                preDrawCallback: function() {
                  $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
                }
              });
            /************** Default Settings **************/

            /********** Activated Accounts ************/
              $('#dt-example-responsive').dataTable({
                "order": [[ 0, "desc" ]],
                ajax: {
                  type : 'GET',
                  url : '<?= base_url()?>dashboard/allrequests_json',
                  dataSrc: '',
                  error: function() {
                    alert("error retrieving list");
                  }
                },
                columns: [
                  {data: "id",render: function(data,type,row,meta) {
                    return row.id
                  }},
                  {data: "subject"},
                  /*{data: "description",render: function(data,type,row,meta) { 
                    let desc = row.description.substring(0,20);
                    return desc;
                  }},*/
                  {data: "email"},
                  {data: "department"},
                  {data: "priority"},
                  {data: "status", render: function(data,type,row,meta) { 
                    return '<div class="form-control-element"><select class="custom-select margin-bottom-20" id="rw_settings_layout" style="margin-bottom: 0px!important;padding: 0px 0px 0px 0px !important;"><option value="default">Open </option><option value="boxed">Pending</option><option value="indent">Excalated</option><option value="indent">Resolved</option><option value="indent">Closed</option></select></div>';
                  }},
                  {data: "status", render: function(data,type,row,meta) { 
                    return '<div class="form-control-element"><select class="custom-select margin-bottom-20" id="rw_settings_layout" style="margin-bottom: 0px!important;padding: 0px 0px 0px 0px !important;"><option value="default">Open </option><option value="boxed">Pending</option><option value="indent">Excalated</option><option value="indent">Resolved</option><option value="indent">Closed</option></select></div>';
                  }},
                  {render: function(data,type,row,meta) {
                    return "<button class='btn btn-primary btn-xs view_req_det' data-t_id='"+row.id+"' data-s_name='"+row.sender_name+"' data-s_contact='"+row.sender_contact+"' data-sub='"+row.subject+"' data-desc='"+row.description+"' data-priority='"+row.priority+"' data-d_date='"+row.due_date +"' data-dept='"+row.department_name+"' data-assigned_to='"+row.assigned_to+"'>Details</button>"
                  }}
                ],
              });
            /********** Activated Accounts ************/
          });
          //$("#dt-example-responsive").DataTable();
        </script>
    </div>
                                      
                            

</div>
 



</div>
</div><!-- //END PAGE CONTENT CONTAINER --></div><!-- //END PAGE CONTENT --></div><!-- //END PAGE WRAPPER --><!-- TEMPLATE SETTINGS -->
