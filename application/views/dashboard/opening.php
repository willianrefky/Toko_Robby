<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-boxes"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Barang Masuk</span>
                <span class="info-box-number">
                  <?= $barang; ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Suppliers</span>
                <span class="info-box-number"><?= $supplier; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Stok Barang Masuk</span>
                <span class="info-box-number"><?= $b_masuk;  ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Transaksi barang Keluar</span>
                <span class="info-box-number"><?= $b_keluar; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <div class="col-1"></div>
          <div class="col-10" >
          <div class="info-box"> 
            <canvas id="myChart">
            </canvas>
          </div>
          </div>


          <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header bg-danger py-3">
                    <h6 class="m-0 font-weight-bold text-white text-center">Stok Barang Minimum</h6>
                </div>
                <div class="table-responsive">
                    <table class="table mb-0 text-center table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Barang</th>
                                <th>Stok</th>
                                <th>Pasok</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php 
                          if($barang_min):
                          foreach ($barang_min as $min) :
                            ?>
                          <tr>
                              <td><?= $min['name']; ?></td>
                              <td><?= $min['stock']; ?></td>
                              <td>
                                  <a href="#" class="btn btn-warning btn-sm"><i class="fa fa-plus"></i></a>
                              </td>
                          </tr>
                          <?php endforeach; ?>
                          <?php else : ?>
                              <tr>
                                  <td colspan="3" class="text-center">
                                      Tidak ada barang stok minim
                                  </td>
                              </tr>
                          <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
          <div class="col-1"></div>
        </div>
