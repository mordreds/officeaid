<body class="login-container bg-slate-800">
  <!-- Page container -->
  <div class="page-container">
    <!-- Page content -->
    <div class="page-content">
      <!-- Main content -->
      <div class="content-wrapper">
        <!-- Content area -->
        <div class="content">
          <!-- Advanced login -->
          <form action="<?=base_url()?>access/reset_password_request" method="post">
            <div class="panel panel-body login-form">
              <div class="text-center">
								<div class="icon-object border-warning text-warning"><i class="icon-spinner11"></i></div>
								<h5 class="content-group">Password recovery
                  <?php 
                    if($this->session->flashdata('error'))
                      print '<small class="display-block" style="color:red">'.@$this->session->flashdata('error').'</small>';
                    else
                      print '<small class="display-block">We will send you instructions in email</small>';

                    if($this->session->flashdata('error_alert')) {
                  ?>
                    <script type="text/javascript">
                      swal({
                          title: "Oops...",
                          text: "<?=$this->session->flashdata('error_alert')?>!",
                          confirmButtonColor: "#EF5350",
                          type: "error"
                      });
                    </script>

                  <?php } else if($this->session->flashdata('success_alert')) { ?>

                    <script type="text/javascript">
                      // Success alert
                      swal({
                          title: "Request Sent!",
                          text: "<?=$this->session->flashdata('success_alert')?>!",
                          confirmButtonColor: "#66BB6A",
                          type: "success"
                      });
                    </script>

                  <?php } else if($this->session->flashdata('info_alert')) { ?>

                    <script type="text/javascript">
                      // Success alert
                      swal({
                          title: "Notice!",
                          text: "<?=$this->session->flashdata('info_alert')?>!",
                          confirmButtonColor: "#2196F3",
                          type: "info"
                      });
                    </script>
                    
                  <?php } else {} ?>
                </h5>
							</div>

              <div class="form-group has-feedback has-feedback-left">
                <input type="email" class="form-control" placeholder="Your Email" oncopy="return false;" onpaste="return false;" onselectstart="return false;" autocomplete="off" name="email" required>
                <div class="form-control-feedback">
                  <i class="icon-envelope text-muted"></i>
                </div>
              </div>

              <div class="form-group">
                <button type="submit" name="reset_password" class="btn bg-pink-400 btn-block">Reset password <i class="icon-arrow-right14 position-right"></i></button>
              </div>

              <div class="content-divider text-muted form-group"><span>or sign in with</span></div>
              <div class="text-left">
								<a style="background: #37474f;color: white;" href="<?=base_url()?>access/login" type="submit" class="btn btn-link"><i class="icon-arrow-left13 position-left"></i> Back to login form
								</a>
							</div>
            </div>
          </form>
          <!-- /advanced login -->
        </div>
        <!-- /content area -->
      </div>
      <!-- /main content -->
    </div>
    <!-- /page content -->
  </div>
  <!-- /page container -->
</body>

