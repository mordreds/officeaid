   
        <table id="dt-example-responsive" class="table table-bordered" >
          <thead>
            <tr>
              <th>No #</th>
              <th>Department</th>
              <th>Subject</th>
              <!-- <th>Description</th> -->
              <th>CreatedBy</th>
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
                  url : '<?= base_url()?>access/allrequests_json',
                  dataSrc: '',
                  error: function() {
                    alert("error retrieving list");
                  }
                },
                columns: [
                  {data: "id",render: function(data,type,row,meta) {
                    return row.id
                  }},
                  {data: "department_name"},
                  {data: "subject"},
                  /*{data: "description",render: function(data,type,row,meta) { 
                    let desc = row.description.substring(0,20);
                    return desc;
                  }},*/
                  {data: "sender_name"},
                  {data: "assignee"},
                  {data: "status", render: function(data,type,row,meta) { 
                    if(row.status == "completed") {
                      label_class = "label-success";
                    }
                    else if(row.status == "inactive"){
                      label_class = "label-danger";
                    }
                    else if(row.status == "pending" || row.status == "processing")
                      label_class = "label-warning";

                    user_status = row.status;
                    return '<span class="label '+label_class+'">'+row.status+'</span>';}
                  },
                  {render: function(data,type,row,meta) {
                    return "<button class='btn btn-primary btn-xs view_req_det' data-t_id='"+row.id+"' data-s_name='"+row.sender_name+"' data-s_contact='"+row.sender_contact+"' data-sub='"+row.subject+"' data-desc='"+row.description+"' data-priority='"+row.priority+"' data-d_date='"+row.due_date +"' data-dept='"+row.department_id+"' data-assigned_to='"+row.assigned_to+"'>Details</button>"
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

<div class="modal fade req_det" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Awaiting</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="loader" style="margin-left: 25%;"></div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).on('click', '.view_req_det', function(event) {
    event.preventDefault();
    /* Act on the event */
    $('.req_det').modal('show');
  });;
</script>

