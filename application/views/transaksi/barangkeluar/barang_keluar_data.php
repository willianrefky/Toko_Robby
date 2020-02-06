<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">TRANSAKSI</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= site_url('dashboard') ?>">Home</a></li>
              <li class="breadcrumb-item active">Barang Keluar</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


    

<div class="card">
	<div class="card-header">
	  <h3 class="box-title">Data Barang Keluar</h3>
	  <div class="pull-right">
			<a href="<?= site_url('barangkeluar/add') ?>" class="btn btn-primary btn-sm">
				<i class="fa fa-plus"></i>Create</a>
		</div>
	</div>

	<!-- /.card-header -->
	<div class="card-body">
	  <table id="example1" class="table table-bordered table-striped">
	    <thead>
	    <tr>
	      	<th>No</th>
			<th>No Transaksi</th>
			<th>Tanggal Keluar</th>
			<th>Harga Total</th>
			<th>Aksi</th>
	    </tr>
	    </thead>
	    <tbody>
    	<?php $no = 1;
			foreach ($data_barangkeluar->result() as $data) { ?> 
	    <tr>
	      	<td style="width:5%;"><?= $no++ ?>.</td>
			<td><?= $data->id_barang_keluar ?></td>
			<td><?= $data->tanggal_keluar ?></td>
			<td>Rp.<?= number_format($data->harga) ?></td>
			<td class="text-center" width="160px">
				<button href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_data" onclick="datatransaksi('<?php echo $data->id_barang_keluar ?>')">
						<i class="fa fa-pencil"></i>Detail
					</button>
			</td>
	    </tr>
		<?php } ?>
	    </tbody>
	  </table>
	</div>
	<!-- /.card-body -->
</div>


<!-- modal detail -->
<div class="modal fade" id="modal_data">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Detail Transaksi Keluar</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="card">
	<div class="card-header">
	  <h3 class="card-title">Data Transaksi</h3><br>
	  <h2>No.Transaksi</h2>
	  <div>

		</div>
	</div>

	<!-- /.card-header -->
	<div class="card-body">
	  <div id="returndatatransaksi"></div>
	</div>
	<!-- /.card-body -->
	</div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>
