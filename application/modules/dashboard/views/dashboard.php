<div class="page__content page-aside--hidden" id="page-content"><!-- PAGE ASIDE PANEL -->
  <div class="page-aside page-aside--hidden invert" id="page-aside">
    <div class="scroll" style="max-height: 100%">
      <div class="navigation" id="navigation-default">
        <div class="user user--bordered user--lg user--w-lineunder user--controls"><div class="user__name">
            <strong>About Us</strong><br>
            <ul class="nav navigation" style="color: #fff">
                    <!-- <li>Incooperation Date:<span class="text-muted text-regular "><b>21-10-2015</b> </span></li> -->

                    <li>Postal Address:<span class="text-muted text-regular"><br><b>MARKSBON SYSTEMS</b></BR><b>BOX TA353, TAIFA - ACCRA</b></span></li>
                    <li>Website Address:<span class="text-muted text-regular"><br><b>www.marksbon.com</b></span></li>
                    <div class="divider"></div>
                    <li>License :<span class="text-muted text-regular"><br><b>PAID</b></span></li>
                  </ul>
           </div>
         </div>
   
   </div></div></div><!-- //END PAGE ASIDE PANEL --><!-- PAGE CONTENT CONTAINER --><div class="content" id="content"><!-- PAGE HEADING --><div class="page-heading"><div class="page-heading__container"><div class="icon"><span class="li-chart-growth"></span></div>
  <h1 class="title">Indicators</h1><p class="caption">OfficeAid</p></div>
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
                                            </div>
                                            </div>
                                            <div class="dropdown-menu dropdown-menu-right"><a href="#" class="dropdown-item" data-demo-action="update">Update</a> <a href="#" class="dropdown-item" data-demo-action="expand">Expand</a> <a href="#" class="dropdown-item" data-demo-action="invert">Invert style</a><div class="dropdown-divider">
                                              
                                            </div>
                                            <a href="#" class="dropdown-item" data-demo-action="remove">Remove card</a>
                                            </div>
                                            </div>
                                            </div>
                                            <div class="card-body">
                                              <div class="row">
                                                <div class="col-12 col-lg-6">
                                                <h4 id="rw-ch-doughnut">Tickets</h4>
                                                <p class="subtitle margin-bottom-20">All Tickets</p>
                                                <canvas id="doughnutChart"></canvas>
                                              </div>
                                                <div class="col-12 col-lg-6">
                                                  <h4 id="rw-ch-pie">Classifications</h4>
                                                  <p class="subtitle margin-bottom-20">Issue Report</p><canvas id="pieChart"></canvas>
                                                  </div>
                                                  </div>
                                                  <script type="text/javascript">document.addEventListener("DOMContentLoaded", function () {
                                        
                                        var randomScalingFactorNew = function() {
                                            return Math.round(Math.random() * 100);
                                        };
                                        
                                        var douConfig = {
                                            type: 'doughnut',
                                            data: {
                                                datasets: [{
                                                    data: [ <?=implode(',', $ticket_status)?> ],
                                                    backgroundColor: [
                                                        window.chartColors.info,
                                                        window.chartColors.warning,
                                                        window.chartColors.success,
                                                        window.chartColors.danger,
                                                    ],
                                                    label: 'Dataset 1'
                                                }],
                                                labels: [<?=implode(',', $ticket_labels)?>]
                                            },
                                            options: {
                                                responsive: true,
                                                legend: {
                                                    position: 'right',
                                                },
                                                title: {
                                                    display: false
                                                },
                                                animation: {
                                                    animateScale: true,
                                                    animateRotate: true
                                                }
                                            }
                                        };
                                        
                                        var pieConfig = {
                                            type: 'pie',
                                            data: {
                                                datasets: [{
                                                    data: [
                                                        randomScalingFactorNew(),
                                                        randomScalingFactorNew(),
                                                        randomScalingFactorNew(),
                                                        randomScalingFactorNew(),
                                                        randomScalingFactorNew(),
                                                        randomScalingFactorNew(),
                                                        randomScalingFactorNew(),
                                                        randomScalingFactorNew(),
                                                        randomScalingFactorNew()
                                                    ],
                                                    backgroundColor: [<?=implode(',', $complain_types_background)?>],
                                                    label: 'Dataset 1'
                                                }],
                                                labels: [<?=implode(',', $complain_types)?>]
                                            },
                                            options: {                                                
                                                responsive: true,
                                                legend: {
                                                    position: 'right',
                                                },
                                                title: {
                                                    display: false
                                                },
                                                animation: {
                                                    animateScale: true,
                                                    animateRotate: true
                                                }
                                            }
                                        };
                                        
                                        var ctxDou = document.getElementById("doughnutChart").getContext("2d");
                                        var myDoughnut = new Chart(ctxDou, douConfig);
                                       
                                        var ctxPie = document.getElementById("pieChart").getContext("2d");
                                        var myPie = new Chart(ctxPie, pieConfig);
                                    });</script>
                                </div>
                            </div>
 



</div></div><!-- //END PAGE CONTENT CONTAINER --></div><!-- //END PAGE CONTENT --></div><!-- //END PAGE WRAPPER --><!-- TEMPLATE SETTINGS -->
