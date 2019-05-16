        <form action="<?=base_url()?>access/save_request" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-6">
              <?php if($this->session->flashdata('success')) : ?>
                <div class="alert alert-success" role="alert"><strong>Success!</strong> <?=$this->session->flashdata('success')?></div>
              <?php elseif($this->session->flashdata('error')) : ?>
                <div class="alert alert-danger" role="alert"><strong><?=$this->session->flashdata('error')?> !</strong>  </div>
              <?php endif; ?>
               <div class="form-control-element margin-bottom-20">
                <select class="select2 form-control custom-select" name="complain" required>
                  <option value="" disabled selected>Select Issue Type</option>
                  <?php if(!empty($allcomplains)) : foreach($allcomplains as $complain) : ?>
                    <option value="<?=$complain->id?>"> <?=$complain->name?> </option>
                   <?php endforeach; endif; ?>
                </select>
              </div>

              <div class="form-control-element  margin-bottom-20">
                <select class="select2 form-control custom-select" name="email" required>
                  <option value="" disabled selected>Select Your Email</option>
                  <?php if(!empty($allusers)) : foreach($allusers as $user) : ?>
                    <option value="<?=$user->username?>"> <?=$user->fullname." (".$user->username.")"?> </option>
                   <?php endforeach; endif; ?>
                </select>
              </div>
              
              <!-- <div class="form-control-element">
                <input type="email" class="form-control margin-bottom-20" placeholder="Enter Your Email" name="email" required>
                <div class="form-control-element__box"><span class="fa fa-envelope"></span></div>
              </div> -->
              <div class="form-control-element">
                <input type="text" class="form-control margin-bottom-20" placeholder="Subject" name="subject" maxlength="30" required>
                <div class="form-control-element__box"><span class="fa fa-pencil"></span></div>
              </div>
              <div class="form-control-element">
                <input type="text" class="form-control margin-bottom-20" placeholder="Enter Phone Number" name="creator_contact" required>
                <div class="form-control-element__box"><span class="fa fa-phone"></span></div>
              </div>
              <div class="form-control-element">
                <select class="custom-select margin-bottom-20" name="priority" placeholder= required>
                  <option value="" disabled selected>Priority</option>
                  <option>Low</option>
                  <option>Medium</option>
                  <option>High</option>
                  <option>Urgent</option>
                </select>
              </div>
              <div class="form-control-element">
                <input type="file" class="form-control" placeholder="Attachment" name="file">
                <input type="hidden" id="b64" name="image64">
                <div class="form-control-element__box"><span class="fa fa-file"></span></div>
              </div>
              <!-- <div class="col-6" style="float: right">
                <div class="form-control-element">
                  <input type="file" class="form-control" placeholder="Attachment" style="border:0px" accept="image/*">
                  <div class="form-control-element__box"></div>
                </div>
              </div> -->
            </div>
            <div class="col-6">
              <div class="card">
                <div class="card-body">
                  <h4 id="rw-fe-summernote"></h4>
                  <textarea id="summernote" name="description"></textarea>
                </div>
              </div>
            </div>
            <div class="divider"></div>
          </div>
          <button type="submit" class="btn btn-primary btn-block" id="new_request_submit">Submit Ticket</button>
        </form>
      </div>
    </div><!-- PAGE LOGIN CONTAINER -->
  </div><!-- //END PAGE CONTENT -->
</div>

<div class="modal fade loading_screen" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
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


<div class="modal fade ticket_result" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Notification</h5>
        <button type="button" class="close close_ticket_modal" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <Strong class="ticketNo"></Strong>
      </div><div class="modal-footer">
        <button type="button" class="btn btn-primary close_ticket_modal" data-dismiss="modal">Close</button> 
      </div>
    </div>
  </div>
</div>

</div><!-- //END PAGE CONTENT CONTAINER -->
</div>
<!-- //END PAGE CONTENT -->

</div>

