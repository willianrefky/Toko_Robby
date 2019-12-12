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
              <span class="info-box-icon bg-warning elevation-1"><i class="far fa-chart-bar"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Transaksi barang Keluar</span>
                <span class="info-box-number"><?= $b_keluar; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
</div>
<div class="row">
          <div class="col-md-6 col-sm-12">
            <div class="info-box"> 
              <canvas id="brgmasukcrt"></canvas>
            </div>
          </div>
          <div class="col-md-6 col-sm-12">
            <div class="info-box"> 
              <canvas id="brgkeluarcrt"></canvas>
            </div>
          </div>
</div>
<div class="row">
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
                                  <a href="<?= base_url('barangmasuk/add/') . $min['barcode'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-plus"></i></a>
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
          <div class="col-md-4">
              <div class="card shadow mb-4">
                  <div class="card-header bg-success py-3">
                      <h6 class="m-0 font-weight-bold text-white text-center">5 Transaksi Terakhir Barang Masuk</h6>
                  </div>
                  <div class="table-responsive">
                      <table class="table mb-0 table-sm table-striped text-center">
                          <thead>
                              <tr>
                                  <th>Tanggal</th>
                                  <th>Barang</th>
                                  <th>Jumlah</th>
                              </tr>
                          </thead>
                          <tbody>
                                <?php foreach ($lima_barang_masuk as $key) : ?>
                                  <tr>
                                      <td><strong><?= $key['tanggal_masuk']; ?></strong></td>
                                      <td><?= $key['name']; ?></td>
                                      <td><span class="badge badge-success"><?= $key['jumlah_masuk']; ?></span></td>
                                  </tr>
                                <?php endforeach ; ?>
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
</div>

<!-- untuk parse data ke javacript gafik -->
<input type="hidden" name="" id="inpjanuari" value="<?php echo $mjanuari['brgmasuk']?>">
<input type="hidden" name="" id="inpfebruari" value="<?php echo $mfebruari['brgmasuk'] ?>">
<input type="hidden" name="" id="inpmaret" value="<?php echo $mmaret['brgmasuk'] ?>">
<input type="hidden" name="" id="inpapril" value="<?php echo $mapril['brgmasuk'] ?>">
<input type="hidden" name="" id="inpmei" value="<?php echo $mmei['brgmasuk'] ?>">
<input type="hidden" name="" id="inpjuni" value="<?php echo $mjuni['brgmasuk'] ?>">
<input type="hidden" name="" id="inpjuli" value="<?php echo $mjuli['brgmasuk'] ?>">
<input type="hidden" name="" id="inpagustus" value="<?php echo $magustus['brgmasuk'] ?>">
<input type="hidden" name="" id="inpseptember" value="<?php echo $mseptember['brgmasuk'] ?>">
<input type="hidden" name="" id="inpoktober" value="<?php echo $moktober['brgmasuk'] ?>">
<input type="hidden" name="" id="inpnovember" value="<?php echo $mnovember['brgmasuk'] ?>">
<input type="hidden" name="" id="inpdesember" value="<?php echo $mdesember['brgmasuk'] ?>">


<input type="hidden" name="" id="outjanuari" value="<?php echo $kjanuari['brgkeluar']?>">
<input type="hidden" name="" id="outfebruari" value="<?php echo $kfebruari['brgkeluar'] ?>">
<input type="hidden" name="" id="outmaret" value="<?php echo $kmaret['brgkeluar'] ?>">
<input type="hidden" name="" id="outapril" value="<?php echo $kapril['brgkeluar'] ?>">
<input type="hidden" name="" id="outmei" value="<?php echo $kmei['brgkeluar'] ?>">
<input type="hidden" name="" id="outjuni" value="<?php echo $kjuni['brgkeluar'] ?>">
<input type="hidden" name="" id="outjuli" value="<?php echo $kjuli['brgkeluar'] ?>">
<input type="hidden" name="" id="outagustus" value="<?php echo $kagustus['brgkeluar'] ?>">
<input type="hidden" name="" id="outseptember" value="<?php echo $kseptember['brgkeluar'] ?>">
<input type="hidden" name="" id="outoktober" value="<?php echo $koktober['brgkeluar'] ?>">
<input type="hidden" name="" id="outnovember" value="<?php echo $knovember['brgkeluar'] ?>">
<input type="hidden" name="" id="outdesember" value="<?php echo $kdesember['brgkeluar'] ?>">
