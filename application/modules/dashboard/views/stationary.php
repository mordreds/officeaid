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
   
   </div></div></div><!-- //END PAGE ASIDE PANEL --><!-- PAGE CONTENT CONTAINER --><div class="content" id="content"><!-- PAGE HEADING --><div class="page-heading"><div class="page-heading__container"><div class="icon"><span class="li-clipboard-pencil"></span></div>
  <h1 class="title">Task</h1><p class="caption">OfficeAid</p></div><div class="page-heading__container float-right d-none d-sm-block"></div>
  <nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="">Dashboard</a></li>
    </ol>
    </nav>
  </div><!-- //END PAGE HEADING -->-
  <div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <?php if($this->session->flashdata('success')) : ?>
            <div class="alert alert-success" role="alert"><strong>Success!</strong> <?=$this->session->flashdata('success')?></div>
          <?php elseif($this->session->flashdata('error')) : ?>
            <div class="alert alert-danger" role="alert"><strong><?=$this->session->flashdata('error')?> !</strong>  </div>
          <?php endif; ?>
          
            <div class="divider"></div>
      <form id="New_Request_Form" action="<?=base_url()?>access/save_task" method="post">
          <div class="row">
            <div class="col-6">
              <div class="form-control-element margin-bottom-20">
                <select class="select2 form-control custom-select" name="assignedto"  required>
                  <option value="" disabled selected> Select Staff</option>
                  <?php if(!empty($allusers)) : foreach($allusers as $user) : ?>
                  <option value="<?=$user->id?>"><?=$user->fullname?></option>
                <?php endforeach; endif; ?>
                </select>
              </div>
              <p></p>
              <!-- <div class="form-control-element">
                <select class="custom-select margin-bottom-20" name="department" required>
                  <option value="" disabled selected>Select Department</option>
                  <?php if(!empty($departments)) : foreach($departments as $department) : ?>
                    <option value="<?=$department->id?>"> <?=$department->name?> </option>
                   <?php endforeach; endif; ?>
                </select>
              </div> -->
              
              <div class="form-control-element">
                <input type="text" class="form-control margin-bottom-20" placeholder="Subject" name="subject" maxlength="30" required>
                <div class="form-control-element__box"><span class="fa fa-pencil"></span></div>
              </div>
              <div class="form-control-element">
                <input type="date" class="form-control margin-bottom-20" placeholder="Scheduled Date" name="duedate" min="<?=date('Y-m-d')?>" required>
                <div class="form-control-element__box"><span class="fa fa-time"></span></div>
              </div>
              
              <!-- <div class="col-6" style="float: right">
                <div class="form-control-element">
                  <input type="file" class="form-control" placeholder="Attachment" style="border:0px" accept="image/*">
                  <div class="form-control-element__box"></div>
                </div>
              </div> -->
            </div>
            <div class="col-6" >
              <div class="form-group row"><!-- <label class="col-sm-2 col-form-label">Description</label> -->
                <div class="col-sm-12">
                  <textarea class="form-control" rows="7" name="description" placeholder="Type Description Of Task Here ......"></textarea>
                </div>
              </div>
            </div>
            <div class="divider"></div>
          </div>
          <button class="btn btn-primary btn-block" id="new_request_submit">Submit Ticket</button>
        </form>
                                      
                            

</div>
 



</div>
</div><!-- //END PAGE CONTENT CONTAINER --></div><!-- //END PAGE CONTENT --></div><!-- //END PAGE WRAPPER --><!-- TEMPLATE SETTINGS -->
