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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script><!-- 
<script src="cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script> -->

<script>
  $(function () {
    $("#example1").DataTable();
    // $('#example2').DataTable({
    //   "paging": true,
    //   "lengthChange": false,
    //   "searching": false,
    //   "ordering": true,
    //   "info": true,
    //   "autoWidth": false,
    // });
  });
</script>
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
var kdesember = $('#outdesember').val();



var brgmasukcrt = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Januari', 'Februari', 'Maret', 'Appril', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        datasets: [{
            label: 'Transaksi Barang keluar',
            data: [kjanuari, kfebruari, kmaret, kapril, kmei, kjuni, kjuli, kagustus,kseptember, koktober, knovember, kdesember],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
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
var mdesember = $('#inpdesember').val();

var brgkeluarcrt = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Januari', 'Februari', 'Maret', 'Appril', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        datasets: [{
            label: 'Transaksi Barang Masuk',
            data: [mjanuari, mfebruari, mmaret, mapril, mmei,mjuni, mjuli, magustus ,mseptember ,moktober , mnovember, mdesember],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
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


<!-- detail transaksi keluar -->
<script type="text/javascript">
    function datatransaksi($trbarang) {
      var query = $trbarang;

      $.ajax({
        url:"<?= base_url(); ?>Barangkeluar/fetch",
        method:"POST",
        data:{query:query},
        success:function(data) {
            $('#returndatatransaksi').html(data);
        }
      })
    }
</script>

<!-- detail transaksi masuk -->
<script type="text/javascript">
    function datatransaksimasuk($trbarangmasuk) {
      var query = $trbarangmasuk;

      $.ajax({
        url:"<?= base_url(); ?>Barangmasuk/aho",
        method:"POST",
        data:{query:query},
        success:function(data) {
            $('#returndatatransaksimasuk').html(data);
        }
      })
    }
</script>

<!-- detail item -->
<script type="text/javascript">
  function dataitem($item){
    var query = $item;

    $('#returnitems').html(query)
    $('#returnitem').val(query)
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

    $('#search-data-bulan-keluar').on('click', function(){
      var search = $('#bulan_keluar').val()
      if(search != ''){
        console.log(search)
        caribulankeluar(search)
      } else {
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

<!-- function total laba -->
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
            ket.text(res.keterangan)
          }
        })
      } else{
        laba.val('');
        jual.val('');
        beli.val('');
        ket.text('Laba');
      }

    });

    // $('#search-laba-bulanan').on('click', function(){
    //   var search = $('#input-bulanan').val()
    //   if(search != ''){
    //     console.log(search)
    //     caripembelian(search)
    //     caripenjualan(search)
    //     totallaba(search)

    //     // var beli = $('#total-beli').val();
    //     // var jual = $('#total-jual').val();
    //     // var totallaba = jual-beli;
    //     // console.log(totallaba)
    //     // $('#total-laba').val(totallaba);
    //   }
    // })
  });

  // function caripembelian($search) {
  //   var search = $search;

  //   $.ajax({
  //     url:"<?php echo base_url(); ?>Laporan/totalpembelian",
  //     method:"POST",
  //     data:{search:search},
  //     success:function(data){
  //       $('#total-beli').val(data);
  //     }
  //   })
  // }

  // function caripenjualan($search) {
  //   var search = $search;

  //   $.ajax({
  //     url:"<?php echo base_url(); ?>Laporan/totalpenjualan",
  //     method:"POST",
  //     data:{search:search},
  //     success:function(data){
  //       $('#total-jual').val(data);
  //     }
  //   })
  // }

  // function totallaba($search) {
  //   var search = $search;

  //   $.ajax({
  //     url:"<?php echo base_url(); ?>Laporan/totallaba",
  //     method:"POST",
  //     data:{search:search},
  //     success:function(data){
  //       $('#total-laba').val(data);
  //     }
  //   })
  // }

</script>


<script type="text/javascript">
  $(document).ready(function(){
    $("#btn-tambah-form").click(function(){ // Ketika tombol Tambah Data Form di klik
      var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
      var nextform = jumlah + 1; // Tambah 1 untuk jumlah form n
    $("#insert-form").append(
      "<div class='form-group'>"+
            "<label>Unit *</label>"+
            "<select name='unit[]' class='form-control'>"+
              "<option value=''>Pilih</option>"+
              "<?php foreach($data_units->result() as $dtuns) { ?>"+
                "<option value='<?php echo $dtuns->unit_id?>'><?php echo $dtuns->name?></option>"+
              "<?php } ?>"+
            "</select>"+
          "</div>" +
      "<div class='form-group'>" +
      "<label>Harga Beli *</label>" +
      "<input type='number' value='' name='hargabeli[]' class='form-control' required>" +
      "</div>" +
      "<div class='form-group'>" +
      "<label>Harga Beli *</label>" +
      "<input type='number' value='' name='hargajual[]' class='form-control' required>" +
      "</div>" +
      "<div class='form-group'>" +
      "<label>Keterangan Pcs *</label>" +
      "<input type='number' value='' name='keteranganpcs[]' class='form-control' required>" +
      "</div>"
      );
    $("#jumlah-form").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
    });
    // Buat fungsi untuk mereset form ke semula
    $("#btn-reset-form").click(function(){
      $("#insert-form").html(""); // Kita kosongkan isi dari div insert-form
      $("#jumlah-form").val("1"); // Ubah kembali value jumlah form menjadi 1
    });
  })
</script>

</body>
</html>


