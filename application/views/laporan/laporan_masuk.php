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
      <li class="nav-item"><a class="nav-link active" href="#mingguan" data-toggle="tab">Mingguan</a></li>
      <li class="nav-item"><a class="nav-link" href="#bulanan" data-toggle="tab">Bulanan</a></li>
  </div><!-- /.card-header -->
  <div class="card-body">
    <div class="tab-content">
      <div class="tab-pane active" id="mingguan">
        <div class="card">
          <div class="card-header">
            <h3 class="box-title">Data Barang Masuk Harian</h3><hr>
            <form method="post" action="">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Tanggal Barang Masuk*</label>
                  <div class="input-group">
                    <input type="date" class="form-control" name="tanggal_masuk" id="tanggal_masuk">  
                      <div class="input-group-append">
                        <button class="btn btn-primary btn-sm" id="search-data-tanggal">Cari</button>
                      </div>
                  </div>
                </div>
              </div>
            </form>
          </div>

          <!-- /.card-header -->
          <div class="card-body">
            <table  class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>No Transaksi</th>
                  <th>Nama Barang</th>
                  <th>Nama Supplier</th>
                  <th>Jumlah Masuk</th>
                  <th>Tanggal Masuk</th>
                </tr>
              </thead>
              <tbody> 
              <!-- <tr>
                <td>#</td>
                <td>123</td>
                <td>12/12/19</td>
                <td>Rp. 20000</td>
                <td class="text-center" width="160px">
                  <button href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_data" onclick="">
                      <i class="fa fa-pencil"></i>Detail
                  </button>
                </td>
              </tr> -->
                <div id="returnlaporantanggalmasuk"></div>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
      </div>
      <!-- /.tab-pane -->
      <div class="tab-pane" id="bulanan">
                
      </div>
      <!-- /.tab-pane -->

    </div>
    <!-- /.tab-content -->
  </div><!-- /.card-body -->
</div>