    <script src="<?=base_url()?>resources/js/vendors/maskedinput/jquery.maskedinput.min.js"></script>
    <script src="<?=base_url()?>resources/js/vendors/jquery/jquery-migrate.min.js"></script>
    <script src="<?=base_url()?>resources/js/vendors/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="<?=base_url()?>resources/js/vendors/mcustomscrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>resources/js/app.js"></script>
    <script type="text/javascript" src="<?=base_url()?>resources/js/plugins.js"></script>
    <script type="text/javascript" src="<?=base_url()?>resources/js/demo.js"></script>
    <script type="text/javascript" src="<?=base_url()?>resources/js/settings.js"></script>
    <script type="text/javascript" src="<?=base_url()?>resources/js/vendors/datatables/datatables.min.js"></script>
    <script src="<?=base_url()?>resources/js/vendors/datatables/extensions/dataTables.responsive.min.js"></script>
    <!-- SummerNote -->
    <script type="text/javascript" src="<?=base_url()?>resources/js/vendors/summernote/summernote-bs4.min.js"></script>
    <script type="text/javascript">$('#summernote').summernote({
        placeholder: 'Type Your Description',
        tabsize: 2,
        height: 200
    });</script>
    <!-- New Request Save -->
    <script type="text/javascript">
      function formSubmit() {
        let formurl = "<?=base_url()?>access/save_request";
        let formData = {
          'subject' : $('[name="subject"]').val(),
          'description': $('[name="description"]').val(),
          'email': $('[name="email"]').val(),
          'creator_contact': $('[name="creator_contact"]').val(),
          'priority': $('[name="priority"]').val(),
          'complain': $('[name=complain]').val()
        };
        
        $.ajax({
            type: 'post',
            url: formurl,
            data : formData,
            cache: false,
            beforeSend: function(){
              $(".loading_screen").modal("show");
            },
            complete: function(){
                $(".loading_screen").modal("hide");
            },
            success: function(response){
              result = JSON.parse(response);

              if(result.ticketNo > 0) {
                $('.ticketNo').html("Ticket Submited Successfully..<br/> Ticket ID : " + result.ticketNo);
                $('.ticket_result').modal("show");
              }
              else {
                $('.ticketNo').html(result.error);
                $('.ticket_result').modal("show");
              }
            }
        });
      }

      $('.close_ticket_modal').click(function(){
        location.reload();
      });
    </script>
	</body>
</html>