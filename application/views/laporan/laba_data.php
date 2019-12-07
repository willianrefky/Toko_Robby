<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Laporan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item">Laporan</li>
              <li class="breadcrumb-item active">Laba atau keuntungan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<div class="card">
  <form action="<?= base_url('laporan_pdf/laporan_laba_pdf');?>">
    <input type="month" class="form-control" name="input-bulanan" id="input-bulanan">
    <div class="input-group-append">
      <a class="btn btn-primary btn-sm text-white mt-1 ml-2" id="search-laba-bulanan"><i class="fa fa-search"></i> Cari</a>
      <button type="submit" class="btn btn-danger btn-sm text-white mt-1 ml-2" name="cetak-data"><i class="fa fa-print"></i> Cetak</button>
    </div>
  </form>

  <hr>
  <label>Pembelian</label>
  <input type="text" class="form-control" name="total-beli" id="total-beli" readonly=""><hr>
  <label>Penjualan</label>
  <input type="text" class="form-control" name="total-jual" id="total-jual" readonly=""><hr>
  <label>Laba</label>
  <input type="text" class="form-control" name="total-laba" id="total-laba" readonly="">

                      
</div>