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
	  <table id="example1" class="table table-bordered table-striped ">
	    <thead>
	    <tr>
			<th>Barcode</th>
			<th>Name</th>
			<th>Category</th>
			<th>Unit</th>
			<th>Harga Beli</th>
			<th>Harga Jual</th>
			<th>Stok</th>
			<th>Action</th>
	    </tr>
	    </thead>
	    <tbody>
    	<?php 
			foreach ($data_item->result() as $data) { ?>
	    <tr>
			<td><a href="" data-toggle="modal" data-target="#modal_item" onclick="dataitem('<?php echo $data->barcode ?>')"><?= $data->barcode ?></a></td>
			<td><?= $data->name ?></td>
			<td><?= $data->category_name ?></td>
			<td><?= $data->unit_name ?></td>
			<td><?= $data->hargabeli ?></td>
			<td><?= $data->hargajual ?></td>
			<td><?= $data->jumlah_stok ?></td>
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



	<!-- modal detail -->
<div class="modal fade" id="modal_item">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Item Stok</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
					<!-- /.card-header -->
					<div class="card-body">
						<form action="<?= site_url('item/tambahstok') ?>" method="post">
						<div class="form-group">
							<label>Barcode *</label>
							<input type="text" name="barcode" class="form-control" id="returnitem">
						</div>
						<div class="form-group">
							<label>Harga Beli</label>
							<input type="text" name="hargabeli" class="form-control">
						</div>
						<div class="form-group">
							<label>Harga Jual</label>
							<input type="text" name="hargajual" class="form-control">
						</div>
						<div class="form-group">
							<label>Unit *</label>
							<?php echo form_dropdown('unit', $data_unit, $selectedunit, 
								['class' => 'form-control', 'required' => 'required']); ?>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-success btn-flat">
								<i class="fa fa-check"></i>Save
							</button>
							<button type="reset" class="btn btn-flat">Reset</button>
						</div>
						</form>
						
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