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
  </div><!-- //END PAGE HEADING -->
  <div class="container-fluid">
   <div class="card">
    <div class="card-body">
        <table id="dt-example-responsive" class="table table-bordered" >
          <thead>
            <tr>
              <th>No #</th>
              <th>Issue Type</th>
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
                  {data: "id", visible: false},
                  {data: "complain"},
                  {data: "subject"},
                  {data: "email"},
                  {data: "department"},
                  {data: "priority"},
                  {data: "assigned_to"},
                  {data: "status", render: function(data,type,row,meta) { 
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

                    return '<div class="form-control-element"><select class="select2 form-control custom-select changestatus" data-id='+window.btoa(row.id)+'><option '+pending+'>Pending</option><option '+processing+'>Processing</option><option '+processed+'>Resolved</option><option '+escalated+'>Excalated (APEX)</option><option>Closed</option></select></div>';
                  }},
                  {render: function(data,type,row,meta) {
                    return "<button class='btn btn-primary btn-xs view_req_det' data-t_id='"+row.id+"' data-s_name='"+row.created_by+"' data-s_contact='"+row.sender_contact+"' data-sub='"+row.subject+"' data-desc='"+row.description+"' data-priority='"+row.priority+"' data-d_date='"+row.due_date +"' data-dept='"+row.complain+"' data-assigned_to='"+row.assigned_to+"'>Details</button>"
                  }}
                ],
              });
            /********** Activated Accounts ************/
          });
          //$("#dt-example-responsive").DataTable();
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

        <!-- Assignment of Ticket -->
        <script type="text/javascript">
          $(document).on("change",".assigntouser",function(){
            let formData = { 
              'ticketid': $(this).data('id'),
              'assignedto': $(this).children('option:selected').val()
            };
            //console.log(formData);
            $.ajax({
              type : 'POST',
              url : '<?= base_url()?>dashboard/assignedto',
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
        <!-- Assignment of Ticket -->
    </div>
</div>
</div>
</div><!-- //END PAGE CONTENT CONTAINER --></div><!-- //END PAGE CONTENT --></div><!-- //END PAGE WRAPPER --><!-- TEMPLATE SETTINGS -->
