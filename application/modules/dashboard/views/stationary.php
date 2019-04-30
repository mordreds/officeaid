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
  </div><!-- //END PAGE HEADING -->
  <div class="container-fluid">
  <div class="card">
    <div class="card-container">
    <div class="dropdown">
        <div class="rw-btn rw-btn--card" data-toggle="dropdown">
      <div>
                                                                
  </div></div><div class="dropdown-menu dropdown-menu-right"><a href="#" class="dropdown-item" data-demo-action="update">Update</a> <a href="#" class="dropdown-item" data-demo-action="expand">Expand</a> <a href="#" class="dropdown-item" data-demo-action="invert">Invert style</a><div class="dropdown-divider"></div><a href="#" class="dropdown-item" data-demo-action="remove">Remove card</a></div></div></div>
    <div class="card-body">

      <form id="New_Request_Form" action="javascript:void(0);" onsubmit="formSubmit()">
          <div class="row">
            <div class="col-6">
              <div class="form-control-element">
                <select class="custom-select margin-bottom-20" name="priority" placeholder= required>
                  <option value="" disabled selected> Select Staff</option>
                  <option>Bismark</option>
                  <option>Osborn</option>
                </select>
              </div>
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
                <input type="Date" class="form-control margin-bottom-20" placeholder="Scheduled Date" name="Date" required>
                <div class="form-control-element__box"><span class="fa fa-time"></span></div>
              </div>
              
              <!-- <div class="col-6" style="float: right">
                <div class="form-control-element">
                  <input type="file" class="form-control" placeholder="Attachment" style="border:0px" accept="image/*">
                  <div class="form-control-element__box"></div>
                </div>
              </div> -->
            </div>
            <div class="col-6" style="margin-top: 38px">
              <div class="form-group row"><label class="col-sm-2 col-form-label">Assignment</label><div class="col-sm-10"><textarea class="form-control" rows="5"></textarea></div></div>
            </div>
            <div class="divider"></div>
          </div>
          <button class="btn btn-primary btn-block" id="new_request_submit">Submit Ticket</button>
        </form>
                                      
                            

</div>
 



</div>
</div><!-- //END PAGE CONTENT CONTAINER --></div><!-- //END PAGE CONTENT --></div><!-- //END PAGE WRAPPER --><!-- TEMPLATE SETTINGS -->
