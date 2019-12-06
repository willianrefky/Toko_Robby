<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Transaksi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= site_url('dashboard') ?>">Home</a></li>
              <li class="breadcrumb-item active">Barang Masuk</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
</div>

    

<div class="card">
	<div class="card-header">
		<h3 class="box-title">Barang Masuk</h3>
		<div class="pull-right">
			<a href="<?= site_url('barangmasuk/add') ?>" class="btn btn-primary btn-sm">
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
			<th>Nama Barang</th>
			<th>Supplier</th>
			<th>Jumlah Masuk</th>
			<th>Tanggal Masuk</th>
			<th>Action</th>
	    </tr>
	    </thead>
	    <tbody>
    	<?php $no = 1;
			foreach ($data_barangmasuk->result() as $data) { ?> 
	    <tr>
	      	<td style="width:5%;"><?= $no++ ?>.</td>
			<td><?= $data->id_barang_masuk ?></td>
			<td><?= $data->item_name ?></td>
			<td><?= $data->supplier_name ?></td>
			<td><?= $data->jumlah_masuk ?></td>
			<td><?= $data->tanggal_masuk ?></td>
			<td class="text-center" width="160px">
					<a href="<?= site_url('barangmasuk/del/'.$data->id_barang_masuk) ?>" onclick="return confirm('Apakah yakin hapus data?')" class="btn btn-danger btn-sm">
						<i class="fa fa-trash"></i>Delete
					</a>
			</td>
	    </tr>
		<?php } ?>
	    </tbody>
	  </table>
	</div>
	<!-- /.card-body -->
</div>