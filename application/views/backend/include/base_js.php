<!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url() ?>assets/backend/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>assets/backend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url() ?>assets/backend/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url() ?>assets/backend/js/sb-admin-2.min.js"></script>
  
  <!-- Page level plugins -->
  <script src="<?php echo base_url() ?>assets/backend/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url() ?>assets/backend/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- Page level custom scripts -->
  <script src="<?php echo base_url() ?>assets/backend/js/demo/datatables-demo.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="<?php echo base_url() ?>assets/datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  
  <?php echo "<script>".$this->session->flashdata('message')."</script>"?>
  <!--Start of Tawk.to Script-->
  <!-- <script type="text/javascript">
  var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
  (function(){
  var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
  s1.async=true;
  s1.src='https://embed.tawk.to/5c78e8c23341d22d9ce6c142/default';
  s1.charset='UTF-8';
  s1.setAttribute('crossorigin','*');
  s0.parentNode.insertBefore(s1,s0);
  })();
  </script> -->
  <script type="text/javascript">
    $(document).ready(function(){
      $(".preloader").fadeOut();
    })
  </script>
  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tentang Arga Travel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Arga Hutama <br>
        Pemrograman Web 2, dosen Bp. Chaerul <br>
        Universitas Mercu Buana
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
