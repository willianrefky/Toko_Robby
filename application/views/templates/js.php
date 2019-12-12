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


<!-- js untuk grafik barang masuk -->
<script>
var ctx = document.getElementById('brgmasukcrt').getContext('2d');
var mjanuari = $('#inpjanuari').val();
var mfebruari = $('#inpfebruari').val();
var mmaret = $('#inpmaret').val();
var mapril = $('#inpapril').val();
var mmei = $('#inpmei').val();
var mjuni = $('#inpjuni').val();
var mjuli = $('#inpjuli').val();
var magustus = $('#inpagustus').val();
var mseptember = $('#inpseptember').val();
var moktober = $('#inpoktober').val();
var mnovember = $('#inpnovember').val();
var mdesember =$('#inpdesember').val();

var brgmasukcrt = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Januari', 'Februari', 'Maret', 'Appril', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        datasets: [{
            label: 'Transaksi Barang Masuk',
            data: [mjanuari, mfebruari, mmaret, mapril, mmei, mjuni, mjuli, magustus, mseptember, moktober, mnovember, mdesember],
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
</script>

<!-- js untuk grqafik barang keluar -->
<script>
var ctx = document.getElementById('brgkeluarcrt').getContext('2d');
var kjanuari = $('#outjanuari').val();
var kfebruari = $('#outfebruari').val();
var kmaret = $('#outmaret').val();
var kapril = $('#outapril').val();
var kmei = $('#outmei').val();
var kjuni = $('#outjuni').val();
var kjuli = $('#outjuli').val();
var kagustus = $('#outagustus').val();
var kseptember = $('#outseptember').val();
var koktober = $('#outoktober').val();
var knovember = $('#outnovember').val();
var kdesember =$('#outdesember').val();

var brgkeluarcrt = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Januari', 'Februari', 'Maret', 'Appril', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        datasets: [{
            label: 'Transaksi Barang Masuk',
            data: [kjanuari, kfebruari, kmaret, kapril, kmei, kjuni, kjuli, kagustus, kseptember, koktober, knovember, kdesember],
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
</script>


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

    $('#search-data-bulan-dua').on('click', function(){
      var search = $('#bulan_keluar').val()
      if(search != ''){
        console.log(search)
        caribulankeluar(search)
      }else{
        $('#returnlaporanbulankeluar').html('')
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

    function caribulankeluar($query){
      var query = $query;

      $.ajax({
        url:"<?php echo base_url(); ?>Laporan/data_dua",
        method:"POST",
        data:{query:query},
        success:function(data){
          $('#returnlaporanbulankeluar').html(data)
        }
      })
    }
  })
</script>

<!-- laba -->
<script type="text/javascript">
  $(document).ready(function() {

    $('#input-bulanan').on('change',function(){
      const nilai = $(this).val();
      const laba = $('#total-laba');
      const jual = $('#total-jual');
      const beli = $('#total-beli');
      const ket = $('.ket');
     
      if(nilai !== ''){
        $.ajax({
          url: "<?php echo base_url(); ?>Laporan/totallaba",
          type: 'post',
          dataType: 'json',
          data: {search: nilai},
          
          success: res => {
            laba.val(res.laba);
            jual.val(res.penjualan);
            beli.val(res.pembelian);
            ket.text(res.keterangan);
            console.log(laba)
          }
        })
      } else{
        laba.val('');
        jual.val('');
        beli.val('');
        ket.text('Laba');
      }

    });
  });
</script>


</body>
</html>


