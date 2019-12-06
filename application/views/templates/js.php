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
<!-- <script src="<?= site_url(); ?>assets/dist/js/pages/dashboard.js"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="<?= site_url(); ?>assets/dist/js/demo.js"></script>
<script src="<?= site_url(); ?>assets/chartjs/Chart.min.js"></script>>
<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?= site_url(); ?>assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?= site_url(); ?>assets/plugins/raphael/raphael.min.js"></script>
<script src="<?= site_url(); ?>assets/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?= site_url(); ?>assets/plugins/jquery-mapael/maps/world_countries.min.js"></script>
<!-- ChartJS --><!-- 
<script src="<?= site_url(); ?>assets/plugins/chart.js/Chart.min.js"></script>
 -->
<!-- PAGE SCRIPTS -->
<!-- <script src="<?= site_url(); ?>assets/dist/js/pages/dashboard2.js"></script> -->

<!-- tables -->
<!-- <script src="<?= site_url(); ?>assets/plugins/jquery/jquery.min.js"></script> -->
<!-- Bootstrap 4 -->
<script src="<?= site_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="<?= site_url(); ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= site_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- sweet alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

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
<!-- <script>
var ctx = document.getElementById('myChart').getContext('2d');

var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Januari', 'Februari', 'Maret', 'Appril', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3, 6, 7 ,4 ,6 ,2, 10],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(213, 191, 238, 0.9)',
                'rgba(227, 216, 201, 1)',
                'rgba(253, 196, 196, 1)',
                'rgba(235, 248, 180, 1)',
                'rgba(194, 242, 250, 1)',
                'rgba(55, 156, 190, 0.47)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script> -->
<script type="text/javascript">
    function datatransaksi($trbarang) {
      var query = $trbarang;

      $.ajax({
        url:"<?php echo base_url(); ?>Barangkeluar/fetch",
        method:"POST",
        data:{query:query},
        success:function(data) {
            $('#returndatatransaksi').html(data);
        }
      })
    }
</script>

<!-- Cari Tanggal masuk -->
<script type="text/javascript">
  $(document).ready(function() {
    $('#search-data-tanggal').on('click', function(){
      var search = $('#tanggal_masuk').val()
      if(search != ''){
        console.log(search)
        caritanggal(search)
      } else {
        $('#returnlaporantanggalmasuk').html('')
      }
    })

    $('#search-data-bulan').on('click', function(){
      var search = $('#bulan_masuk').val()
      if(search != ''){
        console.log(search)
        caribulan(search)
      } else {
        $('#returnlaporanbulanmasuk').html('')
      }
    })

    function caritanggal($query){
      var query = $query;

      $.ajax({
        url:"<?php echo base_url(); ?>Laporan/data",
        method:"POST",
        data:{query:query},
        success:function(data){
          $('#returnlaporantanggalmasuk').html(data)
        }
      })
    }

    function caribulan($query){
      var query = $query;

      $.ajax({
        url:"<?php echo base_url(); ?>Laporan/data",
        method:"POST",
        data:{query:query},
        success:function(data){
          $('#returnlaporanbulanmasuk').html(data)
        }
      })
    }
  })
</script>


<!-- js laporan barang keluar -->
<script type="text/javascript">
  $(document).ready(function() {
    $('#search-data-tanggal-dua').on('click', function(){
      var search = $('#tanggal_keluar').val()
      if(search != ''){
        console.log(search)
        caritanggalkeluar(search)
      } else {
        $('#returnlaporanhariankeluar').html('')
      }
    })


    function caritanggalkeluar($query){
      var query = $query;
      
      $.ajax({
        url:"<?php echo base_url(); ?>Laporan/data_dua",
        method:"POST",
        data:{query:query},
        success:function(data){
          $('#returnlaporanhariankeluar').html(data)
        }
      })
    }

    function caribulan($query){
      var query = $query;

      $.ajax({
        url:"<?php echo base_url(); ?>Laporan/data",
        method:"POST",
        data:{query:query},
        success:function(data){
          $('#returnlaporanbulanmasuk').html(data)
        }
      })
    }
  })
</script>

<!-- function total laba -->
<script type="text/javascript">
  $(document).ready(function() {
    $('#search-laba-bulanan').on('click', function(){
      var search = $('#input-bulanan').val()
      if(search != ''){
        console.log(search)
        caripembelian(search)
        caripenjualan(search)
        totallaba(search)

        // var beli = $('#total-beli').val();
        // var jual = $('#total-jual').val();
        // var totallaba = jual-beli;
        // console.log(totallaba)
        // $('#total-laba').val(totallaba);
      }
    })
  });

  function caripembelian($search) {
    var search = $search;

    $.ajax({
      url:"<?php echo base_url(); ?>Laporan/totalpembelian",
      method:"POST",
      data:{search:search},
      success:function(data){
        $('#total-beli').val(data);
      }
    })
  }

  function caripenjualan($search) {
    var search = $search;

    $.ajax({
      url:"<?php echo base_url(); ?>Laporan/totalpenjualan",
      method:"POST",
      data:{search:search},
      success:function(data){
        $('#total-jual').val(data);
      }
    })
  }

  function totallaba($search) {
    var search = $search;

    $.ajax({
      url:"<?php echo base_url(); ?>Laporan/totallaba",
      method:"POST",
      data:{search:search},
      success:function(data){
        $('#total-laba').val(data);
      }
    })
  }

</script>


</body>
</html>


