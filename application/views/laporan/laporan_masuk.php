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
              <li class="breadcrumb-item active">Laporan Barang Masuk </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="card">
  <div class="card-header d-flex p-0">
    <h3 class="card-title p-3">Laporan Barang Masuk</h3>
    <ul class="nav nav-pills ml-auto p-2">
      <li class="nav-item"><a class="nav-link active" href="#mingguan" data-toggle="tab">Harian</a></li>
      <li class="nav-item"><a class="nav-link" href="#bulanan" data-toggle="tab">Bulanan</a></li>
  </div><!-- /.card-header -->
  <div class="card-body">
    <div class="tab-content">
      <div class="tab-pane active" id="mingguan">
        <div class="card">
          <div class="card-header">
            <h3 class="box-title">Data Barang Masuk Harian</h3><hr>
            <form method="post" action="<?= base_url('laporan_pdf/laporan_masuk_harian_pdf');?>">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Tanggal Barang Masuk*</label>
                    <div class="input-group">
                      <input type="date" class="form-control" name="tanggal_masuk" id="tanggal_masuk">  
                      <div class="input-group-append">
                        <a class="btn btn-primary btn-sm text-white pt-2" id="search-data-tanggal-masuk"><i class="fa fa-search"></i> Cari</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4" style="margin-top: 31px;">
                  <button type="submit" class="btn btn-danger btn-sm pt-2 pb-2 pl-3 pr-3 text-white" name="cetak-data"><i class="fa fa-print"></i> Cetak</button>
                </div>
              </div>
            </form>
          </div>

          <!-- /.card-header -->
          <div class="card-body">
            <div id="returnlaporantanggalmasuk"></div>
          </div>
          <!-- /.card-body -->
        </div>
      </div>
      <!-- /.tab-pane -->
      <div class="tab-pane" id="bulanan">
        <div class="card">
          <div class="card-header">
            <h3 class="box-title">Data Barang Masuk Bulanan</h3><hr>
            <form method="post" action="<?= base_url('laporan_pdf/laporan_masuk_bulanan_pdf');?>">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Bulan Barang Masuk*</label>
                    <div class="input-group">
                      <input type="month" class="form-control" name="bulan_masuk" id="bulan_masuk">  
                      <div class="input-group-append">
                        <a class="btn btn-primary btn-sm text-white pt-2" id="search-data-bulan-masuk"><i class="fa fa-search"></i> Cari</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-3" style="margin-top: 31px;">
                  <button type="submit" class="btn btn-danger btn-sm pt-2 pb-2 pl-3 pr-3 text-white" name="cetak-data"><i class="fa fa-print"></i> Cetak</button>
                </div>
              </div>
            </form>
          </div>

          <!-- /.card-header -->
          <div class="card-body">
            <div id="returnlaporanbulanmasuk"></div>
          </div>
          <!-- /.card-body -->
        </div>        
      </div>
      <!-- /.tab-pane -->

    </div>
    <!-- /.tab-content -->
  </div><!-- /.card-body -->
</div>