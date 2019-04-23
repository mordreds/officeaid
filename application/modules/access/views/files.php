<div class="card-body">

<div class="row">
  <?php if(!empty($alldepartments)) : foreach($alldepartments as $key=>$dept) : ?>
    <div class="col-6 col-lg-4">
      <a href="#" class="department" data-id="<?=$dept->id?>" style="text-decoration:white">          
        <div class="widget" style="margin-bottom: 10px; !important">
          <div class="widget__icon_layer widget__icon_layer--right">
            <span class="li-lan"></span>
          </div>
          <div class="widget__container">
            <div class="widget__line">
              <div class="widget__icon">
                <span class="li-lan"></span>
              </div>
              <div class="widget__title"><?=$dept->name?></div>
              <div class="widget__subtitle">All Files</div>
            </div>
            <div class="widget__box widget__box--left">
              <div class="widget__informer"><?=number_format($dept->filescount)?> file(s)</div>
            </div>
          </div>
        </div>
      </a>
    </div>
<?php endforeach; endif; ?>
    </div>

<div class="divider"></div>
  <a href="http://officeaid.io/access/ftp" class="btn btn-primary btn-xs">Send a new File</a>
</div>
<table id="dt-example-responsive" class="table table-bordered" >
  <thead>
    <tr>
      <th>id</th>
      <th>Created By</th>
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
    function create_datatable(tableid,departmentid) {
      let table = $('#'+tableid).dataTable();
      table.fnDestroy();
      $('#'+tableid).dataTable({
        "order": [[ 0, "desc" ]],
        ajax: {
          type : 'GET',
          url : '<?= base_url()?>access/allfiles_json/'+departmentid,
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
            if(row.status == "Public") 
              return '<div class="btn btn-outline-success btn-block disabled btn-sm">'+row.status+'</div>';
            
            else if(row.status == "Private")
              return '<div class="btn btn-outline-danger btn-block disabled btn-sm">'+row.status+'</div>'
          }},
          {data: "filetype"},
          {render: function(data,type,row,meta) {
            if(row.status == "Public") 
              color = "color: #428c01";
            else if(row.status == "Private")
              color = "color: #ff2d2d";

            if(row.filetype == "doc" || row.filetype == "docx") 
              fileicon = 'fa fa-file-word-o';
            
            else if(row.filetype == "image")
              fileicon = "fa fa-file-image-o";
            
            else if(row.filetype == "pdf")
              fileicon = "fa fa-file-pdf-o";
            
            else if(row.filetype == "xls" || row.filetype == "xlsx")
              fileicon = "fa fa-file-excel-o";
            
            else
              fileicon = "fa fa-file-text-o";

            if(row.status == "Public")
              return '<a href="<?=base_url()?>'+row.filepath+'" style="'+color+'" data-id="'+window.btoa(row.id)+'" data-stats="'+row.status+'"><span class="fa '+fileicon+' fa-2x"></span></a>'
            else
              return '<a href="#" class="verify_file" style="'+color+'" data-id="'+window.btoa(row.id)+'" data-stats="'+row.status+'"><span class="fa '+fileicon+' fa-2x"></span></a>'
          }}
        ],
      });
    }
    /********** Activated Accounts ************/
    
    /************** department files *************** */
    $(".department").click(function () {
      let departmentid = $(this).data('id');
      let tableid = "dt-example-responsive";
      create_datatable(tableid,departmentid)
    });
    /************** department files *************** */
  });
        </script>
      </div>
    </div><!-- PAGE LOGIN CONTAINER -->
  </div><!-- //END PAGE CONTENT -->
</div>
