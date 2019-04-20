  <!-- PAGE WRAPPER -->
  <div class="page"> <?php //print "<pre>"; print_r($_SESSION); print "</pre>"; ?>
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page__content" id="page-content">
      <!-- PAGE LOGIN CONTAINER -->
      <div class="important-container login-container">
        <div class="content">
        <center>
          <div class="logo-text" style="margin-bottom: -80px;"><img src="<?=base_url()?>resources/assets/img/backgrounds/officeaid.PNG">
              <!--<strong class="text-primary">#</strong><strong>ivl</strong>-->
            </div> 
            <p class="caption text-center margin-bottom-30" style="margin-top: 19%">how can we assist you.</p>
        </center>
        <div class="divider"></div>
        <!--  <a href="index.html" class="logo-holder logo-holder--lg logo-holder--wide">
            
          </a>-->
      <div class="row margin-bottom-20">
        <div class="col-12 col-lg-6">
          <a href="<?=base_url()?>access/request" style="text-decoration:white">
          <div class="widget">
            <div class="widget__icon_layer widget__icon_layer--right">
              <span class="li-register"></span>
            </div>
            <div class="widget__container">
              <div class="widget__line">
                <div class="widget__icon">
                  <span class="li-register"></span>
                </div>
                <div class="widget__title">New Request</div>
                <div class="widget__subtitle">Issue Resolution</div>
              </div>
              <div class="widget__box widget__box--left">
                <div class="widget__informer"><?=number_format($totalRequests)?> Pending Requests</div>
              </div>
            </div>
          </div>
          </a>
        </div>
        <div class="col-12 col-lg-6">
          <a href="#" id="history_btn" style="text-decoration:white">
          <div class="widget">
            <div class="widget__icon_layer widget__icon_layer--right">
              <span class="li-papers"></span>
            </div><div class="widget__container">
              <div class="widget__line">
                <div class="widget__icon">
                  <span class="li-papers"></span>
                </div>
                <div class="widget__title">History</div>
                <div class="widget__subtitle">orders to be moved</div>
              </div>
              <div class="widget__box widget__box--left">
                <div class="widget__informer">
                  <?php 
                    if(isset($_SESSION['user']['id']))
                      print number_format($totalRequestsCompleted)." orders";
                    else
                      print "Login Required";
                  ?> 
                </div>
              </div>
            </div>
          </div>
          </a>
        </div>
      </div>
      <div class="row margin-bottom-20">
      
        <div class="col-12 col-lg-6">
          <a href="<?=base_url()?>access/files" style="text-decoration:white">          
            <div class="widget">
            <div class="widget__icon_layer widget__icon_layer--right">
              <span class="li-lan"></span>
            </div>
            <div class="widget__container">
              <div class="widget__line">
                <div class="widget__icon">
                  <span class="li-lan"></span>
                </div>
                <div class="widget__title">Directory</div>
                <div class="widget__subtitle">Send or Upload a File</div>
              </div>
              <div class="widget__box widget__box--left">
                <div class="widget__informer">1200 orders</div>
              </div>
            </div>
          </div>
          </a>

        </div>
        <div class="col-12 col-lg-6">
          <a href="#" id="report_btn" style="text-decoration: none">
          <div class="widget">
            <div class="widget__icon_layer widget__icon_layer--right">
              <span class="li-library"></span>
            </div><div class="widget__container">
              <div class="widget__line">
                <div class="widget__icon">
                  <span class="li-library"></span>
                </div>
                <div class="widget__title">Reports</div>
                <div class="widget__subtitle">All Activities</div>
              </div>
              <div class="widget__box widget__box--left">
                <div class="widget__informer">
                  <?php 
                    if(isset($_SESSION['user']['id']))
                      print "Access Granted";
                    else
                      print "Login Required";
                  ?>
                </div>
              </div>
            </div>
          </div>
          </a>
        </div>
      </div>
                  <div class="divider"></div>

                </div>

                
              </div><!-- PAGE LOGIN CONTAINER --><!-- PAGE CONTENT CONTAINER -->
              <div class="content d-none d-lg-block" id="content" style="background-color: #28abb061; background-size: 100% auto">
                <?php if(!empty($companyinfo)) : ?>
                    <p class="caption text-center margin-bottom-30" style="margin-top: 20%;color: #fff;font-size: 20px"><?=$companyinfo[0]->name?></p>
                    <div class="divider"></div>
                    <CENTER>
                     <img src="<?=base_url().$companyinfo[0]->logo_path?>"style="padding: 25px" width="270px" height="270px"> 
                    </CENTER>
                    <div class="divider"></div>
                    <ul class="nav navigation" style="color: #fff">
                    <!-- <li>Incooperation Date:<span class="text-muted text-regular "><b>21-10-2015</b> </span></li> -->

                    <li>Postal Address:<span class="text-muted text-regular"><br><b><?=strtoupper($companyinfo[0]->postal_address)?></b></span></li>
                    <li>Residence Address:<span class="text-muted text-regular"><br><b><?=strtoupper($companyinfo[0]->residence_address)?></b></span></li>
                    <li>Email Address:<span class="text-muted text-regular"><br><b><?=strtoupper($companyinfo[0]->email)?></b></span></li>
                    <li>Website Address:<span class="text-muted text-regular"><br><b><?=strtoupper($companyinfo[0]->website)?></b></span></li>
                    <div class="divider"></div>
                    <li>License :<span class="text-muted text-regular"><br><b><p id="demo"></p></b></span></li>
                  </ul>
               <?php endif; ?>
              </div><!-- //END PAGE CONTENT CONTAINER -->

            </div><!-- //END PAGE CONTENT -->
  </div><!-- //END PAGE WRAPPER --><!-- TEMPLATE SETTINGS -->
</div>

<script>
// Set the date we're counting down to
var countDownDate = new Date("Jan 21, 2019 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>

<script type="text/javascript">
  /* History Btn Click*/
  $('#history_btn').click(function(){
    let userid = <?php echo ($_SESSION['user']['id']) ?? 0?>;
    let login_url = 'access/allrequests';

    if(userid > 0) {
      location.href = login_url;
    }
    else {
      $('.bd-example-modal-sm').modal('show');
      $('#login_redirect').val(login_url);
    }
  });

  /* Report Btn Click*/
  $('#report_btn').click(function(){
    let userid = <?php echo ($_SESSION['user']['id']) ?? 0?>;
    let login_url = 'dashboard/home';

    if(userid > 0) {
      location.href = login_url;
    }
    else {
      $('.bd-example-modal-sm').modal('show');
      $('#login_redirect').val(login_url);
    }
  });
</script>


