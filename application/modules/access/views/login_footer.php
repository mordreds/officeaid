    <script src="<?=base_url()?>resources/js/vendors/maskedinput/jquery.maskedinput.min.js"></script>
    <script src="<?=base_url()?>resources/js/vendors/jquery/jquery-migrate.min.js"></script>
    <script src="<?=base_url()?>resources/js/vendors/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="<?=base_url()?>resources/js/vendors/mcustomscrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>resources/js/app.js"></script>
    <script type="text/javascript" src="<?=base_url()?>resources/js/plugins.js"></script>
    <script type="text/javascript" src="<?=base_url()?>resources/js/demo.js"></script>
    <script type="text/javascript" src="<?=base_url()?>resources/js/settings.js"></script>
    <script type="text/javascript" src="<?=base_url()?>resources/js/vendors/datatables/datatables.min.js"></script>

    <script src="<?=base_url()?>resources/node_modules/select2/dist/js/select2.full.min.js" type="text/javascript"></script>

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

    <script>
        $(function () {
            // Switchery
            var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
            $('.js-switch').each(function () {
                new Switchery($(this)[0], $(this).data());
            });
            // For select 2
            $(".select2").select2();
            $('.selectpicker').selectpicker();
            //Bootstrap-TouchSpin
            $(".vertical-spin").TouchSpin({
                verticalbuttons: true
            });
            var vspinTrue = $(".vertical-spin").TouchSpin({
                verticalbuttons: true
            });
            if (vspinTrue) {
                $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
            }
            $("input[name='tch1']").TouchSpin({
                min: 0,
                max: 100,
                step: 0.1,
                decimals: 2,
                boostat: 5,
                maxboostedstep: 10,
                postfix: '%'
            });
            $("input[name='tch2']").TouchSpin({
                min: -1000000000,
                max: 1000000000,
                stepinterval: 50,
                maxboostedstep: 10000000,
                prefix: '$'
            });
            $("input[name='tch3']").TouchSpin();
            $("input[name='tch3_22']").TouchSpin({
                initval: 40
            });
            $("input[name='tch5']").TouchSpin({
                prefix: "pre",
                postfix: "post"
            });
            // For multiselect
            $('#pre-selected-options').multiSelect();
            $('#optgroup').multiSelect({
                selectableOptgroup: true
            });
            $('#public-methods').multiSelect();
            $('#select-all').click(function () {
                $('#public-methods').multiSelect('select_all');
                return false;
            });
            $('#deselect-all').click(function () {
                $('#public-methods').multiSelect('deselect_all');
                return false;
            });
            $('#refresh').on('click', function () {
                $('#public-methods').multiSelect('refresh');
                return false;
            });
            $('#add-option').on('click', function () {
                $('#public-methods').multiSelect('addOption', {
                    value: 42,
                    text: 'test 42',
                    index: 0
                });
                return false;
            });
            $(".ajax").select2({
                ajax: {
                    url: "https://api.github.com/search/repositories",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term, // search term
                            page: params.page
                        };
                    },
                    processResults: function (data, params) {
                        // parse the results into the format expected by Select2
                        // since we are using custom formatting functions we do not need to
                        // alter the remote JSON data, except to indicate that infinite
                        // scrolling can be used
                        params.page = params.page || 1;
                        return {
                            results: data.items,
                            pagination: {
                                more: (params.page * 30) < data.total_count
                            }
                        };
                    },
                    cache: true
                },
                escapeMarkup: function (markup) {
                    return markup;
                }, // let our custom formatter work
                minimumInputLength: 1,
                //templateResult: formatRepo, // omitted for brevity, see the source of this page
                //templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
            });
        });
    </script>
	</body>
</html>