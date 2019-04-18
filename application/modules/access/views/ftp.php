<div class="page"><!-- PAGE CONTENT WRAPPER -->
  <a href="<?=base_url()?>access/files" class="btn btn-primary btn-xs">History</a>
    <div class="page__content" id="page-content"><!-- PAGE CONTENT CONTAINER -->
      <!-- //END PAGE CONTENT CONTAINER --><!-- PAGE LOGIN CONTAINER -->

  <div class="important-container login-container">
            
        <label></label>
        <form action="<?=base_url()?>access/receptionist" method="post">
         <div class="card-body">
        <div class="divider"></div>
          <div class="form-control-element ">
                  <select class="custom-select margin-bottom-20" id="rw_settings_layout">
                    <option value="default">Access</option>
                    <option value="boxed">Public</option>
                    <option value="indent">Private</option>
                  </select>
                </div>
           
                <div class="form-control-element">
                  <select class="custom-select margin-bottom-20" id="rw_settings_layout">
                    <option value="default">Department</option>
                    <option value="boxed">IT</option>
                    <option value="indent">HR</option>
                  </select>
                </div>
                <label></label>
            <div class="form-control-element">
                <input type="text" class="mask_phone form-control" placeholder="Subject">
                <div class="form-control-element__box"><span class="fa fa-user-secret"></span></div>
              </div>
                <label></label>
            <div class="form-control-element">
                <input type="file" class="mask_phone form-control" placeholder="Assigned To">
                <div class="form-control-element__box"><span class="fa fa-file"></span></div>
              </div> 
               <label></label>
            <div class="form-control-element">
                <input type="file" class="mask_phone form-control" placeholder="Assigned To">
                <div class="form-control-element__box"><span class="fa fa-file"></span></div>
              </div>
               <label></label>
            <div class="form-control-element">
                <input type="file" class="mask_phone form-control" placeholder="Assigned To">
                <div class="form-control-element__box"><span class="fa fa-file"></span></div>
              </div>
          <div class="divider"></div>
            <div class="form-group margin-bottom-30">
            <div class="form-row">
              <div class="col-2"></div>
              <div class="col-8"><button class="btn btn-primary btn-block">Submit</button>
              </div>
            </div>
          </div>
              
          
        </form>
        
        <div class="form-group text-center">
        </div>
      </div>
    </div><!-- PAGE LOGIN CONTAINER -->
  </div><!-- //END PAGE CONTENT -->
</div>

<script type="text/javascript">var editor = CodeMirror.fromTextArea(document.getElementById("codeEditor"), {
                lineNumbers: true,
                matchBrackets: true,
                mode: "application/x-httpd-php",
                indentUnit: 4,
                indentWithTabs: true,
                enterMode: "keep",
                tabMode: "shift"                                                
            });
            editor.setSize('100%','70px');</script>
            <script type="text/javascript" src="<?=base_url()?>resources/js/vendors/summernote/summernote-bs4.min.js"></script>
            <script type="text/javascript">$('#summernote').summernote({
                placeholder: 'Type in your text',
                tabsize: 2,
                height: 70
            });</script>
