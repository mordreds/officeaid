<div class="col-6">
  <?php if($this->session->flashdata('success')) : ?>
    <div class="alert alert-success" role="alert"><strong>Success!</strong> <?=$this->session->flashdata('success')?></div>
  <?php elseif($this->session->flashdata('error')) : ?>
    <div class="alert alert-danger" role="alert"><strong><?=$this->session->flashdata('error')?> !</strong>  </div>
  <?php endif; ?>
</div>
        <table id="dt-example-responsive" class="table table-bordered" >
          <thead>
            <tr>
              <th>No #</th>
              <th>Complain</th>
              <th>Subject</th>
              <th>Priority</th>
              <th>AssignedTo</th>
              <th>Date Created</th>
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
                  url : '<?= base_url()?>access/allrequests_json',
                  dataSrc: '',
                  error: function() {
                    alert("error retrieving list");
                  }
                },
                columns: [
                  {data: "id"},
                  {data: "complain"},
                  {data: "subject"},
                  {data: "priority"},
                  {data: "assignee"},
                  {data: "date_created"},
                  {data: "status", render: function(data,type,row,meta) { 
                    if(row.status == "Resolved") {
                      label_class = "label-success";
                    }
                    else if(row.status == "Escalated (APEX)"){
                      label_class = "label-danger";
                    }
                    else if(row.status == "pending" || row.status == "Processing")
                      label_class = "label-default";

                    user_status = row.status;
                    return '<span class="label '+label_class+'">'+row.status+'</span>';}
                  },
                  {render: function(data,type,row,meta) {
                    return "<button class='btn btn-primary btn-xs view_req_det' data-t_id='"+row.id+"' data-s_name='"+row.created_by+"' data-s_contact='"+row.sender_contact+"' data-sub='"+row.subject+"' data-desc='"+row.description+"' data-priority='"+row.priority+"' data-dept='"+row.complain+"' data-assigned_to='"+row.assigned_to+"' data-img='"+row.filepath+"'>Details</button> <button class='btn btn-danger btn-xs cancel_req' data-t_id='"+row.id+"' data-s_name='"+row.created_by+"'>Cancel</button>"
                  }}
                ],
              });
            /********** Activated Accounts ************/
          });
          //$("#dt-example-responsive").DataTable();
        </script>
      </div>
    </div><!-- PAGE LOGIN CONTAINER -->
  </div><!-- //END PAGE CONTENT -->
</div>
