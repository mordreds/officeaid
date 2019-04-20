<div class="card-body">
  <a href="<?=base_url()?>access/ftp" class="btn btn-primary btn-xs">Send a new File</a>
</div>
<table id="dt-example-responsive" class="table table-bordered" >
  <thead>
    <tr>
      <th>id</th>
      <th>CreatedBy</th>
      <th>Subject</th>
      <th>Status</th>
      <th>File Type</th>
      <th>File</th>
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
          url : '<?= base_url()?>access/allfiles_json',
          dataSrc: '',
          error: function() {
            alert("error retrieving list");
          }
        },
        columns: [
          {data: "id", visible: false},
          {data: "fullname"},
          {data: "subject"},
          {data: "status", render: function(data,type,row,meta) { 
            if(row.status == "public") 
              return '<div class="btn btn-outline-success btn-block disabled btn-sm">'+row.status+'</div>';
            
            else if(row.status == "private")
              return '<div class="btn btn-outline-danger btn-block disabled btn-sm">'+row.status+'</div>'
          }},
          {data: "filetype"},
          {render: function(data,type,row,meta) {
            if(row.status == "public") 
              color = "color: #428c01";
            else if(row.status == "private")
              color = "color: #ff2d2d";

            if(row.filetype == "document") 
              fileicon = 'fa fa-file-word-o';
            
            else if(row.filetype == "image")
              fileicon = "fa fa-file-image-o";
            
            else if(row.filetype == "pdf")
              fileicon = "fa fa-file-pdf-o";
            
            else if(row.filetype == "excel")
              fileicon = "fa fa-file-excel-o";
            
            else
              fileicon = "fa fa-file-text-o";

            return '<a href="#" class="verify_file" style="'+color+'" data-id="'+window.btoa(row.id)+'" data-stats="'+row.status+'"><span class="fa '+fileicon+' fa-2x"></span></a>'
          }}
        ],
      });
    /********** Activated Accounts ************/
  });
        </script>
      </div>
    </div><!-- PAGE LOGIN CONTAINER -->
  </div><!-- //END PAGE CONTENT -->
</div>
