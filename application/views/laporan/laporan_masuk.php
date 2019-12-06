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
      <li class="nav-item"><a class="nav-link active" href="#mingguan" data-toggle="tab">Bulanan</a></li>
  </div><!-- /.card-header -->
  <div class="card-body">
    <div class="tab-content">
      <div class="tab-pane active" id="mingguan">
        <div class="card">
          <div class="card-header">
            <h3 class="box-title">Data Barang Masuk Bulanan</h3><hr>
            <form method="post" action="<?= base_url('laporan/data_barang_masuk'); ?>">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Bulan</label>
                    <select class="form-control" name="month">
                      <option value=""> --- Pilih Bulan --- </option>
                      <option value="01">Januari</option>
                      <option value="02">Februari</option>
                      <option value="03">Maret</option>
                      <option value="04">April</option>
                      <option value="05">Mei</option>
                      <option value="06">Juni</option>
                      <option value="07">Juli</option>
                      <option value="08">Agustus</option>
                      <option value="09">September</option>
                      <option value="10">Oktober</option>
                      <option value="11">November</option>
                      <option value="12">Desember</option>
                    </select>
                    <label>Tahun</label>
                    <?php $year = 2000; ?>
                    <?php $ylast = date("Y") + 10; ?>
                    <select class="form-control" name="year">
                      <option value=""> --- Pilih Tahun --- </option>
                      <?php for ($y = $year; $y <= $ylast; $y++){
                        echo "<option value = '$y'>$y</option>";
                      } ?>
                    </select>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <button name="query" type="submit" class="btn btn-primary pl-5 pr-5"><i class="fa fa-search"></i>  Cari </button>
                    </div>
                    <div class="col-sm-6">
                      <button name="print" type="submit" class="btn btn-danger pl-5 pr-5"><i class="fa fa-print"></i>Cetak</button>
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
                  <th>ID Barang Masuk</th>
                  <th>Barcode</th>
                  <th>Item</th>
                  <th>Jumlah Masuk</th>
                  <th>Supplier ID</th>
                  <th>Nama Supplier</th>
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