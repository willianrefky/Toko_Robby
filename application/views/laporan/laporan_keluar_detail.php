<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Laporan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= site_url('dashboard') ?>">Home</a></li>
              <li class="breadcrumb-item active">Laporan</li>
              <li class="breadcrumb-item active">Detail</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<div class="card">
	<div class="card-header">
	  <h3 class="card-title">No Transaksi - <?php echo $idtransaksi ?></h3><br>
	  <div class="pull-right">
			<a href="<?= site_url('laporan/laporan_keluar') ?>" class="btn btn-warning btn-sm">
				<i class="fa fa-undo"></i>Back</a>
		</div>
	</div>

	<!-- /.card-header -->
	<div class="card-body">
	  <table id="example1" class="table table-bordered table-striped">
	    <thead>
	    <tr>
	      <th>No.</th>
	      <th>Nama Barang</th>
	      <th>Harga satuan Barang</th>
	      <th>Jumlah Beli</th>
	    </tr>
	    </thead>
	    <tbody>
	    	<?php $no = 1; 
	      foreach($data_detail_keluar->result_array() as $dtkl) { ?>
	      <tr>
	        <td style="width:5%;"><?php echo $no++ ?></td>
		    <td><?php echo $dtkl['name'] ?></td>
		    <td>Rp. <?php echo number_format($dtkl['hargajual']) ?></td>
		    <td><?php echo $dtkl['jumlah'] ?></td>
	      </tr>
	    <?php } ?>
	    </tbody>
	  </table>
	</div>
	<!-- /.card-body -->
	</div>