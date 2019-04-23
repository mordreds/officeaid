<div class="page"><!-- PAGE CONTENT WRAPPER -->
  <a href="<?=base_url()?>access/files" class="btn btn-primary btn-xs">History</a>
    <div class="page__content" id="page-content"><!-- PAGE CONTENT CONTAINER -->
      <!-- //END PAGE CONTENT CONTAINER --><!-- PAGE LOGIN CONTAINER -->
      <div class="important-container login-container">
        <form action="<?=base_url()?>access/savefile" method="post" enctype="multipart/form-data">
          <div class="card-body">
          <?php if($this->session->flashdata('success')) : ?>
            <div class="alert alert-success" role="alert"><strong>Success!</strong> <?=$this->session->flashdata('success')?></div>
          <?php elseif($this->session->flashdata('error')) : ?>
            <div class="alert alert-danger" role="alert"><strong><?=$this->session->flashdata('error')?> !</strong>  </div>
          <?php endif; ?>
          
            <div class="divider"></div>
            <div class="form-control-element ">
              <select class="custom-select margin-bottom-20" id="rw_settings_layout" name="accesstype">
                <option value="" disabled selected>Access Type</option>
                <option>Public</option>
                <option>Private</option>
              </select>
            </div>
            <div class="form-control-element">
              <select class="custom-select margin-bottom-20" id="rw_settings_layout" name="department">
              <option value="" disabled selected>Select Department</option>
                <?php if(!empty($departments)) : foreach($departments as $dept) : ?>
                  <option value="<?=$dept->id?>"><?=$dept->name?></option>
                <?php endforeach; endif; ?>
              </select>
            </div>
            <div class="form-control-element ">
              <select class="custom-select margin-bottom-20" id="rw_settings_layout" name="createdby">
                <option value="default">Select Your Name</option>
                <?php if(!empty($allusers)) : foreach($allusers as $user) : ?>
                  <option value="<?=$user->id?>"><?=$user->fullname?></option>
                <?php endforeach; endif; ?>
              </select>
            </div>
            <div class="form-control-element">
              <input type="text" class="form-control" name="subject" placeholder="Enter Subject" />
              <div class="form-control-element__box"><span class="fa fa-pencil"></span></div>
            </div><br/>
            <div class="form-control-element">
              <input type="file" class="form-control" name="file"  />
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
