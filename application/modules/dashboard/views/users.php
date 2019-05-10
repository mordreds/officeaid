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
   
   </div></div></div><!-- //END PAGE ASIDE PANEL --><!-- PAGE CONTENT CONTAINER --><div class="content" id="content"><!-- PAGE HEADING --><div class="page-heading"><div class="page-heading__container"><div class="icon"><span class="li-users2"></span></div>
  <h1 class="title">Users</h1><p class="caption">OfficeAid</p></div><div class="page-heading__container float-right d-none d-sm-block"></div>
  <nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?=base_url()?>dashboard/home">Dashboard</a></li>
    </ol>
    </nav>
  </div><!-- //END PAGE HEADING -->
  <div class="container-fluid">

   <div class="card">
<div class="divider"></div>
<div class="row">
  <div  class="col-3" >
    <div class="cardbody" style="margin-left: 10px">
      <label></label>
      
      <?php if($this->session->flashdata('success')) : ?>
        <div class="alert alert-success" role="alert"><strong>Success!</strong> <?=$this->session->flashdata('success')?></div>
      <?php elseif($this->session->flashdata('error')) : ?>
        <div class="alert alert-danger" role="alert"><strong><?=$this->session->flashdata('error')?> !</strong>  </div>
      <?php endif; ?>

      <form action="<?=base_url()?>dashboard/save_user" method="post">
        <div class="form-control-element">
          <input type="text" class="mask_phone form-control" placeholder="Full Name" name="fullname" required>
          <!-- <div class="form-control-element__box"></div> -->
        </div> 
        <!-- <label></label>
        <div class="form-control-element">
          <input type="text" class="mask_phone form-control" placeholder="Branch" name="branch" >
          <div class="form-control-element__box"></div>
        </div> -->
        <label></label>
        <div class="form-control-element">
          <input type="email" class="mask_phone form-control" placeholder="Corporate Email" name="email" required>
          <div class="form-control-element__box"></div>
        </div>
        <label></label>
        <div class="form-control-element">
          <input type="text" class="mask_phone form-control" placeholder="Phone Number" name="phone_number" required>
          <div class="form-control-element__box"></div>
        </div> <br/>
        <div class="form-control-element">
          <select class="select2 form-control custom-select" name="department" required>
            <option value="" disabled selected>Select Department</option>
            <?php if(!empty($departments)) : foreach($departments as $department) : ?>
              <option value="<?=$department->id?>"> <?=$department->name?> </option>
             <?php endforeach; endif; ?>
          </select>
        </div>
        <p></p>
        <div class="form-control-element">
          <select class="select2 form-control custom-select" name="systemrole" required>
            <option value="" disabled selected>Select System Role</option>
            <?php if(!empty($systemrole)) : foreach($systemrole as $systemrole) : ?>
              <option value="<?=$systemrole->id?>"> <?=$systemrole->name?> </option>
             <?php endforeach; endif; ?>
          </select>
        </div>
        <p></p>
        <div class="form-control-element">
          <input type="password" class="mask_phone form-control" placeholder="password" name="password" required>
          <div class="form-control-element__box"></div>
        </div> 
        <label></label>
        <input type="submit" value="Add New User" type="Submit" class="btn btn-primary btn-block">
      </form>
  </div></div>
  <div class="col-9">
    <div class="card-body">
        <table id="users-datatable" class="table table-bordered" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Department / Branch</th>
            <th>Role</th>
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
          });
        </script>
        
        <script type="text/javascript">
          $('#users-datatable').dataTable({
            "order": [[ 0, "desc" ]],
            ajax: {
              type : 'GET',
              url : '<?= base_url()?>dashboard/getallusers_json',
              dataSrc: '',
              error: function() {
                alert("error retrieving list");
              }
            },
            columns: [
              {data: "id", visible: false},
              {data: "fullname"},
              {data: "username"},
              {data: "phone_number"},
              {data: "department"},
              {data: "group_name"},
              {data: "status", render: function(data,type,row,meta) { 
                if(row.status == "active") 
                  return '<div class="btn btn-outline-success btn-block disabled btn-sm">'+row.status+'</div>';
                
                else
                  return '<div class="btn btn-outline-danger btn-block disabled btn-sm">'+row.status+'</div>'
              }},
              {render: function(data,type,row,meta){
                if(row.status == "active")
                  button = '<a href="<?=base_url()?>dashboard/userstatus/inactive/'+row.id+'" type="button" class="btn btn-warning btn-xs">Suspend</a> ';
                else if(row.status == "inactive")
                  button = '<a href="<?=base_url()?>dashboard/userstatus/active/'+row.id+'" type="button" class="btn btn-success btn-xs">Activate</a> ';

                button += ' <a href="<?=base_url()?>dashboard/userstatus/deleted/'+row.id+'" type="button" class="btn btn-danger btn-xs">Delete</a>';

                button += ' <a href="#" '+row.id+'" type="button" data-toggle="modal" data-target=".bd-example-modal-sm" class="btn btn-primary btn-xs">Reset</a>'

                return button;
              }}
            ],
          });
        </script>
    </div>
     </div>                                 
    </div>                        

</div>
 



</div>
</div><!-- //END PAGE CONTENT CONTAINER --></div><!-- //END PAGE CONTENT --></div><!-- //END PAGE WRAPPER --><!-- TEMPLATE SETTINGS -->

<!--Reset Password-->
<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header"><h5 class="modal-title" id="exampleModalLabel">Reset Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        </div><div class="modal-body">
          <form>
            <div class="form-group"><label>Enter Default</label>
              <input type="text" class="form-control" placeholder="Example input"> 
              <span class="form-text">eg. 123456</span>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>