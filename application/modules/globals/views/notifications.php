<?php 
  if($this->session->flashdata('error'))
    print '<small class="display-block" style="color:red">'.@$this->session->flashdata('error').'</small>';
  else
    print '<small class="display-block">All fields are required</small>';
  if($this->session->flashdata('error_alert')) {
?>
  <script type="text/javascript">
    swal({
        title: "<?=$this->session->flashdata('error_alert_title')?>",
        text: "<?=$this->session->flashdata('error_alert')?>!",
        confirmButtonColor: "#EF5350",
        type: "error"
    });
  </script>

<?php } else if($this->session->flashdata('success_alert')) { ?>

  <script type="text/javascript">
    // Success alert
    swal({
        title: "<?=$this->session->flashdata('success_alert_title')?>",
        text: "<?=$this->session->flashdata('success_alert')?>!",
        confirmButtonColor: "#66BB6A",
        type: "success"
    });
  </script>

<?php } else if($this->session->flashdata('info_alert')) { ?>

  <script type="text/javascript">
    // Success alert
    swal({
        title: "<?=$this->session->flashdata('info_alert_title')?>",
        text: "<?=$this->session->flashdata('info_alert')?>!",
        confirmButtonColor: "#2196F3",
        type: "info"
    });
  </script>
  
<?php } else {} ?>