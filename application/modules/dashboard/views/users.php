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
    <div class="card-container">
    <div class="dropdown">
        <div class="rw-btn rw-btn--card" data-toggle="dropdown">
      <div>
                                                                
  </div>
</div><div class="dropdown-menu dropdown-menu-right"><a href="#" class="dropdown-item" data-demo-action="update">Update</a> <a href="#" class="dropdown-item" data-demo-action="expand">Expand</a> <a href="#" class="dropdown-item" data-demo-action="invert">Invert style</a><div class="dropdown-divider"></div><a href="#" class="dropdown-item" data-demo-action="remove">Remove card</a></div></div></div>

<div class="row">
  <div  class="col-4" >
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
          <select class="custom-select margin-bottom-20 form-control" name="department" required>
            <option value="" disabled selected>Select Department</option>
            <?php if(!empty($departments)) : foreach($departments as $department) : ?>
              <option value="<?=$department->id?>"> <?=$department->name?> </option>
             <?php endforeach; endif; ?>
          </select>
        </div>
        <div class="form-control-element">
          <select class="custom-select margin-bottom-20 form-control" name="systemrole" required>
            <option value="" disabled selected>Select System Role</option>
            <?php if(!empty($systemrole)) : foreach($systemrole as $systemrole) : ?>
              <option value="<?=$systemrole->id?>"> <?=$systemrole->name?> </option>
             <?php endforeach; endif; ?>
          </select>
        </div>
        <div class="form-control-element">
          <input type="password" class="mask_phone form-control" placeholder="password" name="password" required>
          <div class="form-control-element__box"></div>
        </div> 
        <label></label>
        <input type="submit" name="Submit Ticket" type="Submit" class="btn btn-primary btn-block" data-toggle="modal" data-target=".bd-example-modal-sm">
      </form>
  </div></div>
  <div class="col-8">
    <div class="card-body">
        <table id="users-datatable" class="table table-bordered" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Department</th>
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

                button += ' <a href="<?=base_url()?>dashboard/userstatus/deleted/'+row.id+'" type="button" class="btn btn-danger btn-xs">Delete</a>'

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
