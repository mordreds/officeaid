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
                    <li>License :<span class="text-muted text-regular"><br><b>Demo</b></span></li>
                  </ul>
           </div>
         </div>
   
   </div></div></div><!-- //END PAGE ASIDE PANEL --><!-- PAGE CONTENT CONTAINER --><div class="content" id="content"><!-- PAGE HEADING --><div class="page-heading"><div class="page-heading__container"><div class="icon"><span class="li-users2"></span></div>
  <h1 class="title">Privillages</h1><p class="caption">OfficeAid</p></div><div class="page-heading__container float-right d-none d-sm-block"></div>
  <nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="">Dashboard</a></li>
    </ol>
    </nav>
  </div><!-- //END PAGE HEADING -->
  <div class="container-fluid">

   <div class="card">
     <div class="divider"></div>

<div class="row">
  <div  class="col-4">
    <div class="card-body">
     <form action="<?=base_url()?>dashboard/changerole" method="post">

      <?php if($this->session->flashdata('success')) : ?>
        <div class="alert alert-success" role="alert"><strong>Success!</strong> <?=$this->session->flashdata('success')?></div>
      <?php elseif($this->session->flashdata('error')) : ?>
        <div class="alert alert-danger" role="alert"><strong><?=$this->session->flashdata('error')?> !</strong>  </div>
      <?php endif; ?>
      
      <div class="form-control-element">
        <select class="select2 form-control custom-select" name="user" required>
          <option value="" disabled selected>Select User</option>
          <?php if(!empty($allusers)) : foreach($allusers as $user) : ?>
            <option value="<?=$user->id?>"> <?=$user->fullname?> </option>
           <?php endforeach; endif; ?>
        </select>
      </div>
      <p></p>
      <div class="form-control-element">
        <select class="select2 form-control custom-select" name="systemrole" required>
          <option value="" disabled selected>Select System Role</option>
          <?php if(!empty($systemrole)) : foreach($systemrole as $role) : ?>
            <option value="<?=$role->id?>"> <?=$role->name?> </option>
           <?php endforeach; endif; ?>
        </select>
      </div>
      <p></p>
      <input type="submit" name="Submit Ticket" type="Submit" class="btn btn-primary btn-block" data-toggle="modal" data-target=".bd-example-modal-sm"/>
    </form>
  </div>
</div>
  <div class="col-8">
    <div class="card-body">
      <div class="row">
      
       
      <div class="col-10">
        <div class="card-body padding-top-10 padding-bottom-10">
          <div class="table-responsive">
            <table class="table table-indent-rows margin-bottom-0">
              <tbody>
                <?php if(!empty($systemrole)) : foreach ($systemrole as $key => $value) : 
                  $tempVar = explode('|', $value->roles);
                  $allroles = implode(', ', $tempVar);
                ?>
                <tr>
                  <td width="40">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="t1_checkbox_0"><label class="custom-control-label" for="t1_checkbox_0"></label></div>
                    </td>
                      <td width="180"><span class="text-muted"><?=$allroles?></td>
                      
                      <td width="150"><div class="btn btn-outline-success btn-block disabled btn-sm"><?=$value->name?></div>
                      </td>
                      <td width="40"><button class="btn btn-light btn-sm btn-icon"><span class="fa fa-pencil"></span></button>
                      </td>
                </tr>
                <?php endforeach; endif; ?>
                  </tbody>
                </table>
              </div>
            </div>
    </div>
    <div class="col-2">
        
    </div>
      </div>
    </div>
     </div>                                 
    </div>                        

</div>
 



</div>
</div><!-- //END PAGE CONTENT CONTAINER --></div><!-- //END PAGE CONTENT --></div><!-- //END PAGE WRAPPER --><!-- TEMPLATE SETTINGS -->
