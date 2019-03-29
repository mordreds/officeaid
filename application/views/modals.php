 <!-- ***************************** Login Modal *********************************** -->
   <?php if(!isset($_SESSION['user']['id'])) : ?>
   <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Login to your account </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="" >
              <input type="hidden" id="login_redirect" name="redirect">
              <div class="text-center">
                  <h5 id="login_error_content" class="content-group" style="display: none;"></h5>
                </div>
              <div class="form-control-element">
                <input id="username" type="text" class="form-control" placeholder="Username" name="username" required>
                <div class="form-control-element__box"></div>
              </div> 
              <label></label>
              <div class="form-control-element">
                <input id="password" type="password" class="form-control" placeholder="Password" >
                  <div class="form-control-element__box"></div>
                </div> 
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
            <button id="login_submit" type="button" class="btn btn-primary" >Login</button>
          </form>
        </div>
      </div>
    </div>
    <!-- Login Modal -->

    <script type="text/javascript">
      $(document).on("click","#login_submit",function(){
        let formData = { 
          'username': $('#username').val(),
          'password': $('#password').val()
        };
        $.ajax({
          type : 'POST',
          url : '<?= base_url()?>access/login_validation',
          data : formData,
          success: function(response) {
            let responseData = JSON.parse(response);
            if(responseData['status'] == 203) {
              $('#login_error_content').html(responseData['error']);
              $('#login_error_content').attr('style', "display: block");
              $('#login_error_content').attr('style', "color: red");
            }
            else if(responseData['status'] == 200) {
              let redirect_url = $('#login_redirect').val();
              //alert(redirect_url);
              location.href = redirect_url;
            }
          },
          error: function() {
            alert("Error Transmitting Data")
          }
        });
      });
    </script>

  <?php endif;  if(isset($_SESSION['user']['id'])) : ?>

<!-- ***************************** Login Modal *********************************** -->

<!-- *****************************  Request Details *********************************** -->
  <div class="modal fade req_det" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Request Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="New_Request_Form" action="<?=base_url()?>access/updaterequest" method="POST">
            <input type="hidden" name="id" id="recordid">
            <div class="row">
              <div class="col-6">
                
                <div class="form-control-element">
                  <input type="text" id="department_name" class="form-control margin-bottom-20" readonly>
                  <div class="form-control-element__box"><span class="fa fa-building"></span></div>
                </div>
                
                <div class="form-control-element">
                  <input type="text" class="form-control margin-bottom-20" id="created_by" readonly>
                  <div class="form-control-element__box"><span class="fa fa-user-secret"></span></div>
                </div>

                <div class="form-control-element">
                  <input type="text" class="form-control margin-bottom-20" id="priority" readonly>
                  <div class="form-control-element__box"><span class="fa fa-user-secret"></span></div>
                </div>

                <div class="form-control-element">
                  <div class="form-control-element">
                    <input type="test" class="form-control margin-bottom-20" id="date" readonly>
                    <div class="form-control-element__box"><span class="fa fa-calendar"></span></div>
                  </div>
                </div>

                <div class="form-control-element">
                  <div class="form-control-element">
                    <h3> Files </h3>
                  </div>
                </div>
              
              </div>
              
              <div class="col-6">
                
                <div class="form-control-element">
                  <input type="text" class="form-control margin-bottom-20" id="subject" readonly>
                  <div class="form-control-element__box"><span class="fa fa-pencil"></span></div>
                </div>

                <div class="form-control-element">
                  <input type="text" class="form-control margin-bottom-20" id="phone_no" readonly>
                  <div class="form-control-element__box"><span class="fa fa-phone"></span></div>
                </div>

                <div class="form-control-element">
                  <textarea class="form-control description" id="summernote" rows="7" name="description" style="resize: none;"></textarea>
                </div>

              </div>
              
              
              <div class="divider"></div>
            </div>
            <button class="btn btn-primary btn-block" type="submit">Update Ticket</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    $(document).on('click', '.view_req_det', function(event) {
      event.preventDefault();
      /* Act on the event */
      $('.req_det').modal('show');
      $('#recordid').val($(this).data('t_id'));
      $('#department_name').val($(this).data('dept'));
      $('#created_by').val($(this).data('s_name'));
      $('#priority').val($(this).data('priority'));
      $('#subject').val($(this).data('sub'));
      $('#phone_no').val($(this).data('s_contact'));
      $('#date').val($(this).data('d_date'));
      $('.note-editable').html($(this).data('desc'));

      $('.note-placeholder').attr('style',"display:none");
      $('.note-style').attr('style',"display:none");
      $('.note-fontname').attr('style',"display:none");
      $('.note-color').attr('style',"display:none");
      $('.note-para').attr('style',"display:none");
      $('.note-table').attr('style',"display:none"); 
      $('.btn-codeview').attr('style',"display:none"); 
    });;
  </script>
<!-- ***************************** Request Details *********************************** -->



<!-- ***************************** Universal In System *********************************** -->
  <!-- *********** Delete Modal *********** -->
    <script type="text/javascript">
      $(document).on("click",".delete_button",function(){
        $('#deletename_').text($(this).data('deletename'));
        $('.delete_confirmed_').attr('data-formurl',$(this).data('formurl'));
        $('.delete_confirmed_').attr('data-deleteid',$(this).data('deleteid'));
        $('.delete_confirmed_').attr('data-tableid',$(this).data('tableid'));
        $('.delete_confirmed_').attr('data-keyword',$(this).data('keyword'));
        $('#delete_modal_').modal('show');
      });
    </script>
    <div id="delete_modal_" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-danger">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h6 class="modal-title">Delete Confirmation</h6>
          </div>
          <div class="modal-body">
            Do You Want To Really Delete <?php echo "<strong><em id='deletename_'></em></strong>"; ?> .... ?
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Close</button> 
            <button type="button" class="btn btn-danger delete_confirmed_" data-dismiss="modal">Delete</button>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
      $(document).on("click",".delete_confirmed_",function(){
        let formurl = $(this).data('formurl');
        let tableid = $(this).data('tableid');
        let formData = { 
          'id': $(this).data('deleteid'),
          'delete_item': "Confirmed",
          'tbl_ref': $(this).data('keyword'),
        };
        ajax_post(formurl,formData,tableid);
      });
    </script>

    <script type="text/javascript">
      $(document).on("click",".delete_btn",function(){
        $('#deletename').text($(this).data('displayname'));
        $('.delete_confirmed').attr('data-user_id',$(this).data('dataid'));
        $('.delete_confirmed').attr('data-email',$(this).data('email'));
        $('.delete_confirmed').attr('data-status',$(this).data('state'));
        $('#delete_modal').modal('show');
      });
    </script>
    <div id="delete_modal" class="modal fade">
      <div class="modal-dialog" style="width: 500px">
        <div class="modal-content">
          <div class="modal-header bg-danger">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h6 class="modal-title">Delete Confirmation</h6>
          </div>
          <div class="modal-body">
            Do You Want To Really Delete <?php echo "<strong><em id='deletename'></em></strong>"; ?> .... ?
            <input type="hidden" id="deleteId" name="deleteid"/> 
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-danger delete_confirmed" data-dismiss="modal">Delete</button>
          </div>
        </div>
      </div>
    </div>
  <!-- *********** Delete Modal *********** -->
  
<!-- ***************************** Universal In System *********************************** -->

<!-- ***************************** Users Page ******************************************** -->
  <?php if(false) : ?>
    <!-- *********** Reset Password ********* -->
      <script type="text/javascript">
        $('.table').on('click','#reset_password', function(){
          $('#password_reset_displayname').val($(this).data('fullname'));
          $('#change_pwd_submit').attr('data-user_id',$(this).data('id'));
          $('#change_pwd_submit').attr('data-email',$(this).data('username'));
          $('#password_reset_modal').modal('show');
        });
      </script>

      <div id="password_reset_modal" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-danger">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h6 class="modal-title">Reset Password</h6>
            </div>
            <div class="modal-body">
              <div class="form-group has-feedback">
                <label>Username: </label>
                <input id="password_reset_displayname" type="text" placeholder="Your username" class="form-control" readonly>
                <div class="form-control-feedback">
                  <i class="icon-user text-muted"></i>
                </div>
              </div>
              <div class="form-group has-feedback">
                <label>Password: </label>
                <input id="new_password" type="password" placeholder="Your password" class="form-control">
                <div class="form-control-feedback">
                  <i class="icon-lock text-muted"></i>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-link" data-dismiss="modal">Close</button> &nbsp;&nbsp;
              <button type="button" class="btn btn-success" id="change_pwd_submit" data-dismiss="modal">Save</button>
            </div>
          </div>
        </div>
      </div>
    <!-- *********** Reset Password ********* -->
  <?php endif; ?>
<!-- ***************************** Users Page ******************************************** -->
<?php endif; ?>