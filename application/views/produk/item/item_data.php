<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Item</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= site_url('dashboard') ?>">Home</a></li>
              <li class="breadcrumb-item active">Item</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <?php $this->view('messages') ?>

<div class="card">
	<div class="card-header">
	  <h3 class="card-title">Data Item</h3><br>
	  <div>
			<a href="<?= site_url('item/add') ?>" class="btn btn-primary btn-sm">
				<i class="fa fa-plus"></i>Create</a>
		</div>
	</div>

	<!-- /.card-header -->
	<div class="card-body">
	  <table id="example1" class="table table-bordered table-striped table-responsive">
	    <thead>
	    <tr>
	      	<th>No</th>
			<th>Barcode</th>
			<th>Name</th>
			<th>Category</th>
			<th>Unit</th>
			<th>Price</th>
			<th>Stok</th>
			<th>Action</th>
	    </tr>
	    </thead>
	    <tbody>
    	<?php $no = 1;
			foreach ($data_item->result() as $data) { ?>
	    <tr>
	      <td style="width:5%;"><?= $no++ ?>.</td>
			<td><?= $data->barcode ?></td>
			<td><?= $data->name ?></td>
			<td><?= $data->category_name ?></td>
			<td><?= $data->unit_name ?></td>
			<td><?= $data->price ?></td>
			<td><?= $data->stock ?></td>
			<td class="text-center" width="160px">
					<a href="<?= site_url('item/edit/'.$data->item_id) ?>" class="btn btn-primary btn-sm">
						<i class="fa fa-pencil"></i>Update
					</a>
					<a href="<?= site_url('item/del/'.$data->item_id) ?>" onclick="return confirm('Apakah yakin hapus data?')" class="btn btn-danger btn-sm">
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