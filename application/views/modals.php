<?php if(isset($_SESSION['user']['id'])) : ?>

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

  <!-- ****** Delivery Method Modal  ******* -->
    <div id="delivery" class="modal fade">
      <div class="modal-dialog" style="width:450px;">
        <div class="modal-content">
          <div class="modal-header bg-teal-400">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h6 class="modal-title">Delivery Method</h6>
          </div>
          <form action="<?=base_url()?>overview/save_order" method="post">
            <div class="modal-body">
              <div class="row">
                <div class="col-sm-12 ">
                  <div class="form-group">
                    <label class="display-block">Select Due Date </label>
                    <input type="date" placeholder="0.00" class="form-control" id="collection_due_date" name="order_due_date" required>
                  </div>
                </div>
                <div class="col-sm-12 ">
                  <div class="form-group">
                    <label class="display-block">Select Delivery Method </label>
                      <select id="delivery_method" class="form-control display_delivery" name="delivery_method" required>
                        <option value="">Select One</option>
                      </select>
                  </div>
                </div>
              </div>
              <label class="display-block" id="delivery_notice"></label> 
              <hr></hr>
              <div class="row">
                <div class="col-sm-12 ">
                  <div class="form-group">
                    <label class="display-block">Enter Delivery Location</label>
                    <input type="text" class="form-control" name="delivery_location" required/>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-4">
                    <label class="display-block" style="color:red"><b>Total</b> </label><br/>
                    <input type="text" id="cart_total_amount" class="form-control order_total_cost" style="font-size: 28px;padding:0px" readonly required>
                  </div>
                  <div class="col-sm-4">
                    <label class="display-block" >Balance</label>
                    <input type="text" class="form-control order_balance" name="order_balance" readonly required>
                  </div>
                  <div class="col-sm-4">
                    <label class="display-block" >Amount Paid</label><br/>
                    <input name="amount_paid" type="number" min="0" class="form-control amount_payable" style="font-size: 28px;" required>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-denger pull-left" data-dismiss="modal">Discard</button> &nbsp;&nbsp;
              <button id="proceed_btn" type="submit" class="btn btn-warning btn-xs heading-btn legitRipple"> Proceed</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <script type="text/javascript">
      $(document).on("click","#edit_service_submit",function(){
        let formurl = $(this).data('formurl');
        let tableid = $(this).data('tableid');
        let formData = { 
          'id': $(this).data('id'),
          'service_name': $('#service_displayname').val(),
          'service_desc': $('#service_description').val(),
        };
        ajax_post(formurl,formData,tableid);
      });
    </script>
  <!-- ****** Delivery Method Modal ******* -->

  <!-- ****** Order Details  ******* -->
    <script type="text/javascript">
      $(document).on('click','.view_order_details',function(){
        let status = "";
        let action = "";

        <?php if($page_controller == "overview" || $page_controller == "inhouse") : ?>
          status = {data: 'status', render: function(data,type,row,meta) { 
            if(row.status == "Pending") 
              label_class = "label-default";
            else if(row.status == "Washing") 
              label_class = "label-warning";
            else if(row.status == "Drying") 
              label_class = "label-warning";
            else if(row.status == "Ironing") 
              label_class = "label-warning";
            else if(row.status == "Ready For Dispatch") 
              label_class = "label-success";
            else
              label_class = "label-default";
            
            return '<span class="label '+label_class+' change_order_status" style="cursor:pointer">'+row.status+'</span>';
          }};

          <?php if($page_controller == "inhouse") : ?>
            action = {render: function(data,type,row,meta) { 
              return '<ul class="action_btns"><li><select class="form-control selectbox"><option>1wsrfer</option><option>1wsrfer</option><option>1wsrfer</option><option>1wsrfer</option><option>1wsrfer</option><option>1wsrfer</option><option>1wsrfer</option></select></li></ul>';
            }};
          <?php endif; ?>
        <?php endif; ?>

        order_id = $(this).data('order_id');

        /****** Populating Details Table ********/
        $('#view_order_details_tbl').DataTable().destroy();
        $('#view_order_details_tbl').DataTable({
          searching: false,
          paging: false,
          order: [],
          autoWidth: false,
          ajax: {
            type : 'GET',
            url : "<?= base_url()?>overview/search_order_details_by_orderno/"+order_id,
            dataSrc: '',
            //success: function(response){ alert(response.order_number)},
            error: function() {
              $.jGrowl("View Order Details Failed", {
                theme: 'alert-styled-left bg-danger'
              });
            }
          },
          columns: [
            {data: "service_name"},
            {data: "description"},
            {data: "quantity"},
            //status
          ],
        });
        /****** Populating Details Table ********/

        /*<?php if($page_controller == "overview") : ?>
        $('#view_order_details_tbl').DataTable({
          searching: false,
          paging: false,
          order: [],
          autoWidth: false,
          ajax: {
            type : 'GET',
            url : "<?= base_url()?>overview/search_order_details_by_orderno/"+order_id,
            dataSrc: '',
            //success: function(response){ alert(response.order_number)},
            error: function() {
              $.jGrowl("View Order Details Failed", {
                theme: 'alert-styled-left bg-danger'
              });
            }
          },
          columns: [
            {data: "service_name"},
            {data: "description"},
            {data: "quantity"},
            //status
          ],
        });
        <?php endif; ?>

        <?php if($page_controller == "inhouse") : ?>
        $('#view_order_details_tbl').DataTable({
          searching: false,
          paging: false,
          order: [],
          autoWidth: false,
          ajax: {
            type : 'GET',
            url : "<?= base_url()?>overview/search_order_details_by_orderno/"+order_id,
            dataSrc: '',
            //success: function(response){ alert(response.order_number)},
            error: function() {
              $.jGrowl("View Order Details Failed", {
                theme: 'alert-styled-left bg-danger'
              });
            }
          },
          columns: [
            {data: "service_name"},
            {data: "description"},
            {data: "quantity"},
            status,action
          ],
        });
        <?php endif; ?>*/

        $('#order_details').modal('show');
      });
    </script>
    <div id="order_details" class="modal fade">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header bg-slate-800">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h6 class="modal-title">ORDER DETAILS</h6>
          </div>
          <form action="<?=base_url()?>overview/save_order" method="post">
            <div class="modal-body">
              <table id="view_order_details_tbl" class="table table-xs">
              <thead>
                <tr class="bg-teal-400">
                  <th>Service</th>
                  <th>Description</th>
                  <th>Quantity</th>
                  <!-- <th>Status</th>
                  <?php if($page_controller == "inhouse") : ?>
                  <th>Action</th>
                  <?php endif; ?> -->
                </tr>
              </thead>
              <tbody></tbody>
            </table>
            </div>
            <div class="modal-footer">
            </div>
          </form>
        </div>
      </div>
    </div>
  <!-- ****** Order Details  ******* -->

  <!-- ****** Pay Balance  ******* -->
    <?php if($page_controller == "overview") : ?>
    <script type="text/javascript">
      $(document).on("click",".pay_bill",function(){
        $('[name=order_id]').val($(this).data('order_id'));
        $('[name=pay_bill_total_bal]').val($(this).data('total_balance'));
        $('#pay_order').modal('show');
      });
    </script>
    <div id="pay_order" class="modal fade">
      <div class="modal-dialog" style="width:400px">
        <div class="modal-content">
          <div class="modal-header bg-slate-800">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h6 class="modal-title">Balance Payment</h6>
          </div>
          <form action="<?=base_url()?>overview/pay_balance" method="post">
            <input type="hidden" name="order_id">
            <div class="modal-body">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="display-block">Balance</label>
                  <input type="text" placeholder="0.00" class="form-control" name="pay_bill_total_bal" readonly>
                </div>
              </div>
              <div class="col-md-12">
                 <div class="form-group">
                    <label class="display-block">Amount</label>
                    <input type="number" name="balance_paid" min="0" placeholder="0.00" class="form-control">
                 </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-warning pull-left" data-dismiss="modal">Close <i class="icon icon-x position-right"></i></button>
              <button type="submit" class="btn btn-primary pull-right">Save <i class="icon icon-database position-right"></i></button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <?php endif; ?>
  <!-- ****** Pay Balance ******* -->

  <!-- ****** Comments  ******* -->
    <?php if($page_controller == "inhouse" || $page_controller == "overview" | $page_controller == "dispatch") : ?>
    <script type="text/javascript">
      $('table').on("click",".view_order_comments",function(){
        let order_id = $(this).data('order_id');
        let formurl = "<?=base_url()?>inhouse/retrieve_comments";
        let formData = {'order_id': order_id};
        
        $.ajax({
          type : 'POST',
          url : formurl,
          data : formData,
          success: function(response) { 
            response = JSON.parse(response)
            let comments = "";
            if(!response.DB_ERROR) {
              $.each(response, function(key,value){
                commenter_fullname = value.commenter_fullname;
                comment = value.comment;
                comment_time = value.date_created;

                comments += '<li class="media"><a href="#" class="media-left"><img src="assets/images/demo/users/face25.jpg" class="img-circle img-sm" alt=""></a><div class="media-body"><div class="media-heading text-semibold"><a href="#">'+commenter_fullname+'</a> <span class="media-annotation pull-right">'+comment_time+'</span></div>'+comment+'</div></li>';
              });
            }

            $('#all_comments_view').html(comments);
            $('[name="order_id"]').val(order_id);
            $('#comment').modal('show');
          },
          error: function() {
            $.jGrowl('View Comments Failed', {
              theme: 'alert-styled-left bg-danger'
            });
          }
        });
      });
      /******** Confirm Dispatch *********/
      $('table').on("click",".dispatch",function(){
        let order_id = $(this).data('order_id');
        let order_no = $(this).data('order_no');

        $('#orderno_').text(order_no);
        $('[name="dispatch_order_id"]').val(order_id);
        $('#confirm_dispatch').modal('show');
      });
      /******** Confirm Dispatch *********/
    </script>
    
    <div id="comment" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-slate-800">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h6 class="modal-title">Comments On Order</h6>
          </div>
          <div class="modal-body">
            <div class="caption">
              <form action="<?=base_url()?>overview/save_comment" method="post">
                <input type="hidden" name="order_id" />
              <ul class="media-list content-group" id="all_comments_view"></ul>
              <textarea name="comment" class="form-control content-group" rows="2" cols="1" placeholder="Add comment" required></textarea>
              <div class="row">
                <div class="col-xs-6">
                  <ul class="icons-list icons-list-extended mt-10">
                    <li><a href="#"><i class="icon-mic2"></i></a></li>
                    <li><a href="#"><i class="icon-file-picture"></i></a></li>
                    <li><a href="#"><i class="icon-file-plus"></i></a></li>
                  </ul>
                </div>
                <div class="col-xs-6 text-right">
                  <button type="submit" class="btn bg-teal-400 btn-labeled btn-labeled-right"><b><i class="icon-circle-right2"></i></b> Send</button>
                </div>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="confirm_dispatch" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <form action="<?=base_url()?>inhouse/order_complete" method="post">
            <div class="modal-header bg-slate-800">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h6 class="modal-title">Confirm Dispatch </h6>
            </div>
            <div class="modal-body">
              <input type="hidden" name="dispatch_order_id" />
              Do You Confirm that order number <strong><em id='orderno_'></em></strong> is ready for <b>Dispatch</b> .. ?
            </div>
            <div class="modal-footer"><hr/>
              <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Close</button> 
              <button type="submit" class="btn bg-teal-400 btn-labeled btn-labeled-right"><b><i class="icon-circle-right2"></i></b> Confirm</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div id="confirmation_modal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <form id="confirmation_modal_form"  method="post">
            <div class="modal-header bg-slate-800">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h6 class="modal-title" id="modal_heading"></h6>
            </div>
            <div class="modal-body">
              <input type="hidden" name="order_id" />
              <input type="hidden" name="status" />
              Do You Confirm that order number <strong><em id='cancel_orderno_'></em></strong> should be <b>Cancelled</b> .. ?
            </div>
            <div class="modal-footer"><hr/>
              <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Close</button> 
              <button type="submit" class="btn bg-teal-400 btn-labeled btn-labeled-right"><b><i class="icon-circle-right2"></i></b> Confirm</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <?php endif; ?>
  <!-- ****** Comments  ******* -->
<!-- ***************************** Universal In System *********************************** -->

<!-- ***************************** Users Page ******************************************** -->
  <?php if($controller_function == "users") : ?>
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

<!-- ***************************** New Registration Page ********************************* -->
  <?php if($controller_function == "new_registration") : ?>
    <!-- *********** Edit Laundry Service ********* -->
      <script type="text/javascript">
        $('.table').on('click','.edit_service', function(){
          $('#service_displayname').val($(this).data('name'));
          $('#service_description').val($(this).data('desc'));
          $('#edit_service_submit').attr('data-id',$(this).data('id'));
          $('#edit_service_submit').attr('data-service_name',$(this).data('name'));
          $('#edit_service_submit').attr('data-service_desc',$(this).data('desc'));
          $('#edit_service_submit').attr('data-tableid',$(this).data('tableid'));
          $('#edit_service_submit').attr('data-formurl',"<?=base_url()?>settings/save_services");
          $('#edit_service').modal('show');
        });
      </script>

      <div id="edit_service" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-teal-400">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h6 class="modal-title">Edit Service</h6>
            </div>
            <div class="modal-body">
              <div class="form-group has-feedback">
                <label  class="display-block">Name: </label>
                <input id="service_displayname" type="text" class="form-control">
              </div>
              <div class="form-group has-feedback">
                <label  class="display-block">Description: </label>
                <input id="service_description" type="text" class="form-control">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-link" data-dismiss="modal">Close</button> &nbsp;&nbsp;
              <button type="button" class="btn btn-primary" id="edit_service_submit" data-dismiss="modal">Save</button>
            </div>
          </div>
        </div>
      </div>
      <script type="text/javascript">
        $(document).on("click","#edit_service_submit",function(){
          let formurl = $(this).data('formurl');
          let tableid = $(this).data('tableid');
          let formData = { 
            'id': $(this).data('id'),
            'service_name': $('#service_displayname').val(),
            'service_desc': $('#service_description').val(),
          };
          ajax_post(formurl,formData,tableid);
        });
      </script>
    <!-- *********** Edit Laundry Service ********* -->

    <!-- *********** Edit Laundry Weights ********* -->
      <script type="text/javascript">
        $('.table').on('click','.edit_weight_btn', function(){
          var selectbox = $('select.display_services').selectBoxIt().data('selectBox-selectBoxIt');
          selectbox.setOption({selectOption: $(this).data('id')});

          /*$('#weight_serviceType').val($(this).data('service'));*/
          $('#weight_displayname').val($(this).data('name'));
          $('#weight_description').val($(this).data('desc'));
          $('#edit_weight_submit').attr('data-id',$(this).data('id'));
          $('#edit_weight_submit').attr('data-weight_name',$(this).data('name'));
          $('#edit_weight_submit').attr('data-weight_desc',$(this).data('desc'));
          $('#edit_weight_submit').attr('data-tableid',$(this).data('tableid'));
          $('#edit_weight_submit').attr('data-formurl',"<?=base_url()?>settings/save_weight");
          $('#edit_weight').modal('show');
        });
      </script>

      <div id="edit_weight" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-teal-400">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h6 class="modal-title">Edit Weight Info</h6>
            </div>
            <div class="modal-body">
              <div class="form-group has-feedback">
                <label  class="display-block">Service Type: </label>
                <select id="new_service" class="form-control display_services" name="service_type"></select>
              </div>
              <div class="form-group has-feedback">
                <label  class="display-block">Name: </label>
                <input id="weight_displayname" type="text" class="form-control">
              </div>
              <div class="form-group has-feedback">
                <label  class="display-block">Description: </label>
                <input id="weight_description" type="text" class="form-control">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-link" data-dismiss="modal">Close</button> &nbsp;&nbsp;
              <button type="button" class="btn btn-primary" id="edit_weight_submit" data-dismiss="modal">Save <i class="icon-arrow-right14 position-right"></i></button>
            </div>
          </div>
        </div>
      </div>
      <script type="text/javascript">
        $(document).on("click","#edit_weight_submit",function(){
          let formurl = $(this).data('formurl');
          let tableid = $(this).data('tableid');
          let formData = { 
            'id': $(this).data('id'),
            'service_type': $('#new_service').val(),
            'weight': $('#weight_displayname').val(),
            'weight_description': $('#weight_description').val(),
          };
          ajax_post(formurl,formData,tableid);
        });
      </script>
    <!-- *********** Edit Laundry Weights ********* -->

    <!-- *********** Edit Laundry Garments ********* -->
      <script type="text/javascript">
        $('.table').on('click','.edit_garment_btn', function(){
          $('#garment_displayname').val($(this).data('name'));
          $('#garment_description').val($(this).data('desc'));
          $('#edit_garment_submit').attr('data-id',$(this).data('id'));
          $('#edit_garment_submit').attr('data-garment_name',$(this).data('name'));
          $('#edit_garment_submit').attr('data-garment_desc',$(this).data('desc'));
          $('#edit_garment_submit').attr('data-tableid',$(this).data('tableid'));
          $('#edit_garment_submit').attr('data-formurl',"<?=base_url()?>settings/save_garment");
          $('#edit_garment').modal('show');
        });
      </script>

      <div id="edit_garment" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-teal-400">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h6 class="modal-title">Edit Weight Info</h6>
            </div>
            <div class="modal-body">
              <div class="form-group has-feedback">
                <label  class="display-block">Name: </label>
                <input id="garment_displayname" type="text" class="form-control">
              </div>
              <div class="form-group has-feedback">
                <label  class="display-block">Description: </label>
                <input id="garment_description" type="text" class="form-control">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-link" data-dismiss="modal">Close</button> &nbsp;&nbsp;
              <button type="button" class="btn btn-primary" id="edit_garment_submit" data-dismiss="modal">Save <i class="icon-arrow-right14 position-right"></i></button>
            </div>
          </div>
        </div>
      </div>
      <script type="text/javascript">
        $(document).on("click","#edit_garment_submit",function(){
          let formurl = $(this).data('formurl');
          let tableid = $(this).data('tableid');
          let formData = { 
            'id': $(this).data('id'),
            'garment_name': $('#garment_displayname').val(),
            'garment_desc': $('#garment_description').val(),
          };
          ajax_post(formurl,formData,tableid);
        });
      </script>
    <!-- *********** Edit Laundry Garments ********* -->

    <!-- *********** Edit Laundry Price ********* -->
      <script type="text/javascript">
        $('.table').on('click','.edit_price_btn', function(){
          let service_id = $(this).data("service_id");
          let weight_id  = $(this).data("weight_id");
          let garment_id  = $(this).data("garment_id");

          selectbox_initialize('#price_service_type','services',service_id);
          selectbox_initialize('#price_garments','garments',garment_id);
          
          var weights = $("#price_weight").selectBoxIt({
            autoWidth: false,
            defaultText: "Select One",
            populate: function(){
              var deferred = $.Deferred(), arr = [], x = -1;
              $.ajax({
              url: '<?= base_url()?>settings/retrieve_alldata/vw_weights/default'}).done(function(data) {
                data = JSON.parse(data);
                while(++x < data.length){
                  if(data[x].id == weight_id)
                    arr[x] = { value : data[x].id, text : data[x].weight, selected: "selected" };
                  else
                  arr[x] = { value : data[x].id, text : data[x].weight };
                }
                deferred.resolve(arr);
              });
              return deferred;
            }
          });
          
          $('#amount').val($(this).data('amount'));

          $('#edit_price_submit').attr('data-id',$(this).data('id'));
          $('#edit_price_submit').attr('data-service_id',$(this).data('service_id'));
          $('#edit_price_submit').attr('data-weight_id',$(this).data('weight_id'));
          $('#edit_price_submit').attr('data-garment_id',$(this).data('garment_id'));
          $('#edit_price_submit').attr('data-tableid',$(this).data('tableid'));
          $('#edit_price_submit').attr('data-formurl',"<?=base_url()?>settings/save_price");
          $('#edit_price_list').modal('show');
        });
      </script>

      <div id="edit_price_list" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-teal-400">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h6 class="modal-title">Edit Price Info</h6>
            </div>
            <div class="modal-body">
              <div class="form-group has-feedback">
                <label  class="display-block">Service Type: </label>
                <select id="price_service_type" class="form-control" name="service_type">
                  <option value="">Select One</option>
                </select>
              </div>
              <div class="form-group has-feedback">
                <label  class="display-block">Service Weight: </label>
                <select id="price_weight" class="form-control display_weights" name="weight">
                  <option value="">Select One</option>
                </select>
              </div>
              <div class="form-group has-feedback">
                <label  class="display-block">Service Garment: </label>
                <select id="price_garments" class="form-control" name="weight">
                  <option value="">Select One</option>
                </select>
              </div>
              <div class="form-group has-feedback">
                <label  class="display-block">Amount: </label>
                <input id="amount" type="text" class="form-control">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-link" data-dismiss="modal">Close</button> &nbsp;&nbsp;
              <button type="button" class="btn btn-primary" id="edit_price_submit" data-dismiss="modal">Save <i class="icon-arrow-right14 position-right"></i></button>
            </div>
          </div>
        </div>
      </div>
      <script type="text/javascript">
        $(document).on("click","#edit_price_submit",function(){
          let formurl = $(this).data('formurl');
          let tableid = $(this).data('tableid');
          let formData = { 
            'id': $(this).data('id'),
            'service_id': $('#price_service_type').val(),
            'weight_id': $('#price_weight').val(),
            'garment_id': $('#price_garments').val(),
            'amount': $('#amount').val(),
          };
          ajax_post(formurl,formData,tableid);
        });
      </script>
    <!-- *********** Edit Laundry Price ********* -->

    <!-- *********** Edit Laundry Delivery Price ********* -->
      <script type="text/javascript">
        $('.table').on('click','.edit_delivery_price_btn', function(){
          let location = $(this).data("location");
          let duration  = $(this).data("duration");
          let price  = $(this).data("price");

          $('#delivery_location').val(location);
          $('#delivery_duration').val(duration);
          $('#delivery_price').val(price);
         
          $('#edit_delivery_price_submit').attr('data-id',$(this).data('id'));
          $('#edit_delivery_price_submit').attr('data-location',$(this).data('location'));
          $('#edit_delivery_price_submit').attr('data-duration',$(this).data('duration'));
          $('#edit_delivery_price_submit').attr('data-price',$(this).data('price'));
          $('#edit_delivery_price_submit').attr('data-tableid',$(this).data('tableid'));
          $('#edit_delivery_price_submit').attr('data-formurl',"<?=base_url()?>settings/save_delivery");
          $('#edit_delivery_price_list').modal('show');
        });
      </script>

      <div id="edit_delivery_price_list" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-teal-400">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h6 class="modal-title">Edit Delivery Prices</h6>
            </div>
            <div class="modal-body">
              <div class="form-group has-feedback">
                <label  class="display-block">Location: </label>
                <input id="delivery_location" type="text" class="form-control">
              </div>
              <div class="form-group has-feedback">
                <label  class="display-block">Duration(in days): </label>
                <input id="delivery_duration" type="text" class="form-control">
              </div>
              <div class="form-group has-feedback">
                <label  class="display-block">Price: </label>
                <input id="delivery_price" type="text" class="form-control">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-link" data-dismiss="modal">Close</button> &nbsp;&nbsp;
              <button type="button" class="btn btn-primary" id="edit_delivery_price_submit"  data-dismiss="modal">Save <i class="icon-arrow-right14 position-right"></i></button>
            </div>
          </div>
        </div>
      </div>
      <script type="text/javascript">
        $(document).on("click","#edit_delivery_price_submit",function(){
          let formurl = $(this).data('formurl');
          let tableid = $(this).data('tableid');
          let formData = { 
            'id': $(this).data('id'),
            'location': $('#delivery_location').val(),
            'duration': $('#delivery_duration').val(),
            'price': $('#delivery_price').val(),
          };
          ajax_post(formurl,formData,tableid);
        });
      </script>
    <!-- *********** Edit Laundry Delivery Price ********* -->
  <?php endif; ?>
<!-- ***************************** New Registration Page ********************************* -->

<!-- ***************************** Customers Page ************************************* -->
  <?php if($page_controller == "customers") : ?>
    <script type="text/javascript">
      $(document).on("click",".edit_client_info",function(){
        $('#deletename_').text($(this).data('deletename'));
        // Filling Form Component
        $('[name="client_id"]').val($(this).data('client_id'));
        $('[name="fullname"]').val($(this).data('fullname'));
        $('[name="company_name"]').val($(this).data('company'));
        $('[name="residence_addr"]').val($(this).data('residence_address'));
        $('[name="postal_addr"]').val($(this).data('postal_address'));
        $('[name="email"]').val($(this).data('email'));
        $('[name="primary_tel"]').val($(this).data('phone_number_1'));
        $('[name="secondary_tel"]').val($(this).data('phone_number_2'));
        
        let gender = $(this).data('gender');
        if(gender) {
          $('[name="gender"]').val(gender).change();
        }

        let sms = $(this).data('sms_alert');
        if(sms) {
          $('[name="sms"]').attr('checked',true);
        }

        let online_portal = $(this).data('online_access');
        if(online_portal) {
          $('[name="online"]').attr('checked',true);
        }

        $('#edit_client_modal').modal('show');
      });
    </script>
    <div id="edit_client_modal" class="modal fade">
      <div class="modal-dialog" style="width:800px">
        <div class="modal-content">
          <div class="modal-header bg-teal-400">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h6 class="modal-title">Edit Customer Info</h6>
          </div>
          <div class="modal-body">
            <form action="#" method="post">
              <input type="hidden" name="client_id"/>
              <div class="">
                <div class="col-md-4 col-sm-4">
                  <div class="form-group">
                    <input type="text" name="fullname" placeholder="Full Name :" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-4 col-sm-4">
                  <div class="form-group">
                    <input type="text" name="company_name" placeholder="Company Name (optional) :" class="form-control">
                  </div>
                </div>
                <div class="col-md-4 col-sm-4">
                  <div class="form-group">
                    <input type="text" style="display:none" name="gender_alt" class="form-control" readonly >
                    <select class="form-control selectbox" name="gender" data-defaultText="Gender" required>
                      <option value="" selected="true">Select One</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="">
                <div class="col-md-4 col-sm-4">
                  <div class="form-group">
                    <input type="text" name="residence_addr" placeholder="Residence Address" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-4 col-sm-4">
                  <div class="form-group">
                    <input type="text" name="postal_addr" placeholder="Postal Address" class="form-control">
                  </div>
                </div>
                <div class="col-md-4 col-sm-4">
                  <div class="form-group">
                    <input type="email" name="email" placeholder="Email Address:" class="form-control">
                  </div>
                </div>
              </div>
              <div class="">
                <div class="col-md-4 col-sm-4">
                  <div class="form-group">
                    <input type="text" name="primary_tel" placeholder="Phone No #1:" class="form-control" minlength="10" required>
                  </div>
                </div>
                <div class="col-md-4 col-sm-4">
                  <div class="form-group">
                    <input type="text" name="secondary_tel" placeholder="Phone No #2:" class="form-control">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <div class="checkbox checkbox-switchery">
                      <label><input type="checkbox" name="sms" class="switchery">
                        SMS Alert
                      </label>
                    </div>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <div class="checkbox checkbox-switchery">
                      <label><input type="checkbox" name="online" class="switchery">
                      Online Portal
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Close</button> 
            <button type="button" data-action="reload" class="btn btn-success legitRipple" id="edit_client_submit" data-dismiss="modal">Save <i class="icon-database2 position-right"></i></button>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
      $(document).on("click","#edit_client_submit",function(){
        let formurl = "<?=base_url()?>settings/save_client_info";
        let tableid = "allcustomers";
        let formData = { 
          'id': $('[name="client_id"]').val(),
          'fullname': $('[name="fullname"]').val(),
          'company_name': $('[name="company_name"]').val(),
          'gender': $('[name="gender"]').val(),
          'residence_addr': $('[name="residence_addr"]').val(),
          'postal_addr': $('[name="postal_addr"]').val(),
          'primary_tel': $('[name="primary_tel"]').val(),
          'secondary_tel': $('[name="secondary_tel"]').val(),
          'email': $('[name="email"]').val(),
          'sms': $('[name="sms"]').val(),
          'online': $('[name="online"]').val(),
        };
        ajax_post(formurl,formData,tableid);
      });
    </script>
  <?php endif;?>
<!-- ***************************** Customers Page ************************************* -->

<!-- ***************************** In House Page ************************************* -->
  <?php if($page_controller == "inhouse") : ?>
    <script type="text/javascript">
      $(document).on("click",".change_order_status",function(){
        
        //$('#status_history').modal('show');
      });
    </script>
    <div id="status_history" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <form action="#">
            <div class="modal-body">
              <table id="alluser" class="table ">
                <thead>
                  <tr class="bg-teal-400">
                    <th >Status</th>
                    <th >Last Name</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Check-In</td>
                    <td>Bismark</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php endif;?>
<!-- ***************************** In House Page ************************************* -->

<!-- ***************************** Dispatch Page ************************************* -->
  <?php if($page_controller == "dispatch") : ?>
    <script type="text/javascript">
      $(document).on("click",".delivered",function(){
        let order_id = $(this).data('order_id');
        let order_no = $(this).data('order_no');

        $('#delivery_orderno_').text(order_no);
        $('[name="delivery_order_id"]').val(order_id);

        $('#confirm_delivery').modal('show');
      });
    </script>
    <div id="confirm_delivery" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <form action="<?=base_url()?>inhouse/order_delivered" method="post">
            <div class="modal-header bg-slate-800">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h6 class="modal-title">Confirm Delivery </h6>
            </div>
            <div class="modal-body">
              <input type="hidden" name="delivery_order_id" />
              Do You Confirm that order number <strong><em id='delivery_orderno_'></em></strong> has been safely delivered .. ?
            </div>
            <div class="modal-footer"><hr/>
              <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Close</button> 
              <button type="submit" class="btn bg-teal-400 btn-labeled btn-labeled-right"><b><i class="icon-circle-right2"></i></b> Confirm</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    
  <?php endif;?>
<!-- ***************************** Dispatch Page ************************************* -->

<!-- ***************************** Employee Page ************************************* -->
  <?php if($controller_function == "company") : ?>
    <script type="text/javascript">
      $(document).on("click",".edit_employee_info",function(){
        $('#deletename_').text($(this).data('deletename'));
        // Filling Form Component
        $('[name="modal_employee_id"]').val($(this).data('employee_id'));
        $('[name="modal_first_name"]').val($(this).data('firstname'));
        $('[name="modal_middle_name"]').val($(this).data('middlename'));
        $('[name="modal_last_name"]').val($(this).data('lastname'));
        $('[name="modal_gender"]').val($(this).data('gender'));
        $('[name="modal_marital_status"]').val($(this).data('marital'));
        $('[name="modal_residence_addr"]').val($(this).data('residence_address'));
        $('[name="modal_position"]').val($(this).data('position'));
        $('[name="modal_email"]').val($(this).data('email'));
        $('[name="modal_primary_tel"]').val($(this).data('phone_number_1'));
        $('[name="modal_secondary_tel"]').val($(this).data('phone_number_2'));
        $('[name="modal_emergency_fullname"]').val($(this).data('emergency_fullname'));
        $('[name="modal_emergency_phone_1"]').val($(this).data('emergency_phone_1'));
        $('[name="modal_emergency_residence"]').val($(this).data('emergency_residence'));
        $('[name="modal_emergency_relationship"]').val($(this).data('emergency_relationship'));

        $(".selectbox").selectBoxIt({
          autoWidth: false,
          defaultText: "<em style='color: #827f7f'>Select One</em>",
        });

        $('#edit_employee_modal').modal('show');
      });
    </script>
    <div id="edit_employee_modal" class="modal fade">
      <div class="modal-dialog" style="width:900px">
        <div class="modal-content">
          <div class="modal-header bg-teal-400">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h6 class="modal-title">Edit Employee Info</h6>
          </div>
          <form>
          <div class="modal-body">
            <input type="hidden" name="modal_employee_id"/>
            <div class="row">
              <div class="col-md-4 col-sm-4">
                <div class="form-group">
                  <label class="display-block">First Name <span style="color:red;">*</span></label>
                  <input type="text" name="modal_first_name" placeholder="First Name" class="form-control" required>
                </div>
              </div>
              <div class="col-md-4 col-sm-4">
                <div class="form-group">
                  <label class="display-block">Middle Name <span style="color:red;">*</span></label>
                  <input type="text" name="modal_middle_name" placeholder="Middle Name" class="form-control">
                </div>
              </div>
              <div class="col-md-4 col-sm-4">
                <div class="form-group">
                  <label class="display-block">Last Name <span style="color:red;">*</span></label>
                  <input type="text" name="modal_last_name" placeholder="Last Name" class="form-control">
                </div>
              </div>
              <div class="col-md-4 col-sm-4">
                <div class="form-group">
                  <label class="display-block">Gender <span style="color:red;">*</span></label>
                  <select class="form-control selectbox" name="modal_gender" data-defaultText="Gender" required>
                    <option value="" selected="true">Select One</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4 col-sm-4">
                <div class="form-group">
                  <label class="display-block">Marital Status <span style="color:red;">*</span></label>
                  <select name="modal_marital_status" class="form-control selectbox">
                    <option value=""><em>Select One</em></option>
                    <option>Single</option>
                    <option>Married</option>
                    <option>Divorced</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4 col-sm-4">
                <div class="form-group">
                  <label class="display-block">Residence Address <span style="color:red;">*</span></label>
                  <input type="text" name="modal_residence_addr" placeholder="Residence Address" class="form-control" required>
                </div>
              </div>
              <div class="col-md-4 col-sm-4">
                <div class="form-group">
                  <label class="display-block">Phone Number 1 <span style="color:red;">*</span></label>
                  <input type="text" name="modal_primary_tel" placeholder="Phone No #1:" class="form-control" minlength="10" required>
                </div>
              </div>
              <div class="col-md-4 col-sm-4">
                <div class="form-group">
                  <label class="display-block">Phone Number 2 <span style="color:red;">*</span></label>
                  <input type="text" name="modal_secondary_tel" placeholder="Phone No #2:" class="form-control">
                </div>
              </div>
              <div class="col-md-4 col-sm-4">
                <div class="form-group">
                  <label class="display-block">Email <span style="color:red;">*</span></label>
                  <input type="email" name="modal_email" placeholder="Email Address:" class="form-control">
                </div>
              </div>
              <div class="col-md-4 col-sm-4">
                <div class="form-group">
                  <label class="display-block">Position <span style="color:red;">*</span></label>
                  <select name="modal_position" class="form-control display_positions" required>
                    <option value=""><em>Select One</em></option>
                  </select>
                </div>
              </div>
              <div class="col-md-4 col-sm-4">
                <div class="form-group">
                  <label class="display-block">Contact Name <span style="color:red;">*</span> (<em style="color:#b57171">emergency</em>)</label>
                  <input type="text" name="modal_emergency_fullname" class="form-control" required>
                </div>
              </div>
              <div class="col-md-4 col-sm-4">
                <div class="form-group">
                  <label class="display-block">Residence Address <span style="color:red;">*</span> (<em style="color:#b57171">emergency</em>)</label>
                  <input type="text" name="modal_emergency_residence" class="form-control" required>
                </div>
              </div>
              <div class="col-md-4 col-sm-4">
                <div class="form-group">
                  <label class="display-block">Phone Number <span style="color:red;">*</span> (<em style="color:#b57171">emergency</em>)</label>
                  <input type="text" name="modal_emergency_phone_1" class="form-control" required>
                </div>
              </div>
              <div class="col-md-4 col-sm-4">
                <div class="form-group">
                  <label class="display-block">Relationship <span style="color:red;">*</span> (<em style="color:#b57171">emergency</em>)</label>
                  <select name="modal_emergency_relationship" class="form-control selectbox">
                    <option value=""><em>Select One</em></option>
                    <option>Father</option>
                    <option>Mother</option>
                    <option>Sibling</option>
                    <option>Guardian</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Close</button> 
            <button type="button" data-dismiss="modal" id="edit_employee_submit" class="btn btn-success legitRipple">Save <i class="icon-database2 position-right"></i></button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <script type="text/javascript">
      $(document).on("click","#edit_employee_submit",function(){
        let formurl = "<?=base_url()?>administration/save_employee";
        let tableid = "allemployees";
        let formData = { 
          'response_type' : "JSON",
          'id': $('[name="modal_employee_id"]').val(),
          'first_name': $('[name="modal_first_name"]').val(),
          'middle_name': $('[name="modal_middle_name"]').val(),
          'last_name': $('[name="modal_last_name"]').val(),
          'gender': $('[name="modal_gender"] option:selected').val(),
          'marital_status': $('[name="modal_marital_status"] option:selected').val(),
          'position': $('[name="modal_position"] option:selected').val(),
          'residence_addr': $('[name="modal_residence_addr"]').val(),
          'primary_tel': $('[name="modal_primary_tel"]').val(),
          'secondary_tel': $('[name="modal_secondary_tel"]').val(),
          'email': $('[name="modal_email"]').val(),
          'emergency_fullname': $('[name="modal_emergency_fullname"]').val(),
          'emergency_residence': $('[name="modal_emergency_residence"]').val(),
          'emergency_phone_1': $('[name="modal_emergency_phone_1"]').val(),
          'emergency_relationship': $('[name="modal_emergency_relationship"] option:selected').val(),
        };
        ajax_post(formurl,formData,tableid);
        //console.log(formData);
        //alert($('[name="modal_position"] option:selected').val());
      });
    </script>
  <?php endif;?>
<!-- ***************************** Employee Page ************************************* -->

<!-- *********** check out ********* -->
  <div id="order_receipt" class="modal fade" >
    <div class="modal-dialog" style="width:350px;" id="printSection">
      <div class="modal-content">
        <div class="modal-header ">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="row" style="padding:2px;">
            <div class="col-sm-6 content-group">
              <h5 class="text-uppercase text-semibold"><?=$_SESSION['companyinfo']['name']?></h5>
            </div>
            <div class="col-sm-6 content-group">
              <div class="invoice-details">
                <ul class="list-condensed list-unstyled">
                  <li><span class="text-semibold" id="receipt_orderno"></span></li>
                  <li>Date: <span class="text-semibold" id="receipt_date"></span></li>
                  <li>Due Date: <span class="text-semibold" id="receipt_duedate"></span></li>
                </ul>
              </div>
            </div>
            <div class="modal-body no-padding">
              <table class="table table-xxs" id="receipt_table">
                <thead>
                  <tr>
                    <th>Description</th>
                    <th style="width: 15px !important; text-align: center; padding: 0px">Qty</th>
                    <th style="width: 15px !important; text-align: center; padding: 0px">Unit</th>
                    <th style="width: 15px !important; text-align: center; padding: 0px">Total</th>
                  </tr>
                </thead>
                <tbody style="font-style: italic;"></tbody>
              </table>
            </div>
            <div class="col-xs-5">
              <span class="text-muted">Invoice To:</span>
              <ul class="list-condensed list-unstyled">
                <li><span class="text-semibold" id="receipt_client"></span></li>
              </ul>
              <span class="text-muted">Delivery Method:</span>
              <ul class="list-condensed list-unstyled">
                <li class="text-semibold" id="receipt_delivery_method"></li>
              </ul>
              <span class="text-muted">Balance:</span>
              <ul class="list-condensed list-unstyled">
                <li class="text-semibold" id="receipt_balance"></li>
              </ul>
            </div>
            <div class="col-xs-7">
              <span class="text-muted">Total Due:</span>
              <div class="content-group">
                <h6></h6>
                <div class="table-responsive no-border">
                  <table class="table table-xxs">
                    <tbody>
                      <tr>
                        <th>Subtotal:</th>
                        <td class="text-right" id="receipt_subtotal"></td>
                      </tr>
                      <tr>
                        <th>Tax <span class="text-regular" id="receipt_tax"></span>:</th>
                        <td class="text-right" id="receipt_tax_value"></td>
                      </tr>
                      <tr>
                        <th>Delivery:</th>
                        <td class="text-right" id="receipt_delivery_cost"></td>
                      </tr>
                      <tr>
                        <th>Total (GH¢):</th>
                        <td class="text-right text-primary"><h5 class="text-semibold" id="receipt_total_cost"></h5></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-link" data-dismiss="modal">Close</button> &nbsp;&nbsp;
          <button type="button" id="print_receipt" data-dismiss="modal" class="btn bg-teal-400 btn-xs"><i class="icon-printer position-left"></i> Print</button>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>