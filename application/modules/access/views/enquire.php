        <form id="New_Request_Form" action="javascript:void(0);" onsubmit="formSubmit()">
          <div class="row">
            <div class="col-6">
              <div class="form-control-element">
                <select class="custom-select margin-bottom-20" name="department" required>
                  <option value="">Select Department</option>
                  <?php if(!empty($departments)) : foreach($departments as $department) : ?>
                    <option value="<?=$department->id?>"> <?=$department->name?> </option>
                   <?php endforeach; endif; ?>
                </select>
              </div>
              <div class="form-control-element">
                <input type="text" class="form-control margin-bottom-20" placeholder="Subject" name="subject" maxlength="30" required>
                <div class="form-control-element__box"><span class="fa fa-pencil"></span></div>
              </div>
              <div class="form-control-element">
                <input type="text" class="form-control margin-bottom-20" placeholder="Enter Your Name" name="creator_name" required>
                <div class="form-control-element__box"><span class="fa fa-user-secret"></span></div>
              </div>
              <div class="form-control-element">
                <input type="text" class="form-control margin-bottom-20" placeholder="Enter Phone Number" name="creator_contact" required>
                <div class="form-control-element__box"><span class="fa fa-phone"></span></div>
              </div>
              <div class="form-control-element">
                <select class="custom-select margin-bottom-20" name="priority" required>
                  <option value="">Priority</option>
                  <option>Low</option>
                  <option>Medium</option>
                  <option>High</option>
                  <option>Urgent</option>
                </select>
              </div>
              <div class="col-6" style="float: left; padding-left: 0px">
                <div class="form-control-element">
                  <input type="date" class="form-control margin-bottom-20" placeholder="Date" min="<?=gmdate('Y-m-d')?>" name="date" required>
                  <div class="form-control-element__box"><span class="fa fa-calendar"></span></div>
                </div>
              </div>
              <div class="col-6" style="float: right">
                <div class="form-control-element">
                  <input type="file" class="form-control" placeholder="Attachment" style="border:0px">
                  <div class="form-control-element__box"></div>
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="card">
                <div class="card-body">
                  <h4 id="rw-fe-summernote">Description</h4>
                  <textarea id="summernote" name="description"></textarea>
                </div>
              </div>
            </div>
            <div class="divider"></div>
          </div>
          <button class="btn btn-primary btn-block" id="new_request_submit">Submit Ticket</button>
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

