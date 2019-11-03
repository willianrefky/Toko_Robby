<script src="<?= site_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url().'assets/plugins/jquery-ui/jquery-ui.js'?>" type="text/javascript"></script>
<script src="<?php echo base_url().'assets/plugins/jquery-ui/jquery-ui.min.js'?>" type="text/javascript"></script>

<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= site_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= site_url(); ?>assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<!-- <script src="<?= site_url(); ?>assets/plugins/sparklines/sparkline.js"></script>
 --><!-- JQVMap -->
<!-- <script src="<?= site_url(); ?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= site_url(); ?>assets/plugins/jqvmap/maps/jquery.vmap.world.js"></script> -->
<!-- jQuery Knob Chart -->
<script src="<?= site_url(); ?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= site_url(); ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?= site_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= site_url(); ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= site_url(); ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= site_url(); ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= site_url(); ?>assets/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= site_url(); ?>assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= site_url(); ?>assets/dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?= site_url(); ?>assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?= site_url(); ?>assets/plugins/raphael/raphael.min.js"></script>
<script src="<?= site_url(); ?>assets/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?= site_url(); ?>assets/plugins/jquery-mapael/maps/world_countries.min.js"></script>
<!-- ChartJS -->
<script src="<?= site_url(); ?>assets/plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<!-- <script src="<?= site_url(); ?>assets/dist/js/pages/dashboard2.js"></script> -->

<!-- tables -->
<!-- <script src="<?= site_url(); ?>assets/plugins/jquery/jquery.min.js"></script> -->
<!-- Bootstrap 4 -->
<script src="<?= site_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="<?= site_url(); ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= site_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>

</body>
</html>


