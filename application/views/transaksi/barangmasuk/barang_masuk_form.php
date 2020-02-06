<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Barang Masuk</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">Barang Masuk</li>
          <li class="breadcrumb-item active"><?=ucfirst($page) ?> Barang Masuk</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<?php $this->view('messages') ?>


<!-- cart sementara -->
<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col-md-11">
				<h3><?= ucfirst($page1)?> Barang Masuk </h3>
			</div>
			<div class="col-md-1">
				<a href="<?= site_url('barangmasuk') ?>" class="btn btn-warning btn-sm">
					<i class="fa fa-undo"></i>Back
				</a>
			</div>
		</div>
	</div>
	<div class="card-body" style="overflow: scroll; max-height: 300px;">
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>No.</th>
					<th>Barcode</th>
					<th>Nama Barang</th>
					<th>Unit</th>
					<th>Jumlah Beli</th>
					<th>Harga</th>
					<th>Sub Total</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				if (!empty($this->cart->total_items())) {
				 	$no = 1 ; $total= 0; $semua=0;
				 	foreach ($this->cart->contents() as $r) { ?>
				 		<tr>
				 			<td style="width:5%;"><?= $no++ ?>.</td>
							<td><?= $r['barcode'] ?></td>
							<td><?= $r['name'] ?></td>
							<td><?= $r['unit'] ?></td>
							<td><?= $r['qty'] ?></td>
							<td>Rp. <?= number_format($r['price']); ?> </td>
							<?php 
								$harga = $r['price'];
								$jml_b = $r['qty'];

								$total = $jml_b * $harga;
								if(!empty($total)){
									$semua += $total ;
								}
							?>
							<td>Rp. <?= number_format($total); ?></td>
							<td><a href="" data-toggle="modal" data-target="#edit<?= $r['rowid']; ?>">Edit</a> |
								<a href="<?= base_url('barangmasuk/delete_cart/') ?><?= $r['rowid'] ?>" >Delete</a>
							</td>
				 		</tr>

				 		<!-- modal edit -->
				 		<div class="modal fade" id="edit<?= $r['rowid'] ?>">
				 			<div class="modal-dialog modal-lg">
				 				<div class="modal-content">
				 					<div class="modal-header">
						              <h4 class="modal-title">Edit Barang <?= $r['name'] ?></h4>
						              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						                <span aria-hidden="true">&times;</span>
						              </button>
						            </div>
						            <div class="modal-body">
						            	<div class="card">
						            		<div class="card-header">
						            			<form method="post" action="<?= base_url('barangmasuk/update_cart/') ?><?= $r['rowid'] ?>">
						            				<div>
						            					<div class="form-group">
						            						<label>Jumlah Barang*</label>
															<input value="<?= $r['id'] ?>" type="hidden" class="form-control" name="id_cart">
															<input value="<?= $r['barcode'] ?>" type="hidden" class="form-control" name="id_brg">
															<input value="<?= $r['unit'] ?>" type="hidden" class="form-control" name="unt_brg">
															<input value="<?= $r['qty'] ?>" type="number" class="form-control" name="jumlah_brg">
						            					</div>
						            				</div>
						            				<div class="col-md-6 col-md-offset-4">
						            					<div class="form-group">
						            						<button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button>
						            					</div>
						            				</div>
						            			</form>
						            		</div>
						            	</div>
						            </div>
						            <div class="modal-footer justify-content-between">
						            	<button type="button" class="btn btn-default" data-dismiss="modal">Clode</button>
						            </div>
				 				</div>
				 			</div>
				 		</div>
				 	<?php 
				 	}
				 	} else{
				 		echo"<td colspan='8' style='text-align:center;'>Item Belum Dipilih</td>";
				 	} ?>
				 	<tr class="gradeA">
				 		<td colspan="7">T O T A L</td>
				 		<td>Rp. <?php if(!empty($total)){
				 			echo number_format($semua);
				 		} ?></td>
				 	</tr>
			</tbody>
		</table>
	</div>
</div>

<div class="card">
	<div class="card-body">
		<div class="row">
			<div class="col-md-6 col-md-offset-4">
				<?php echo form_open('barangmasuk/transaksi', array('class'=>'form-horizontal')); ?>
				<div class="form-group">
					<label> ID Transaksi Barang Masuk </label>
					<div class="input-group">
						<input type="hidden" name="id">
						<input type="text" value="<?= $id_barang_masuk; ?>" readonly class="form-control" name="id_barang_masuk">
						<?php $now = date("Y-m-d"); ?>
						<input type="text" name="date" id="tanggal_masuk" class="form-control" value="<?= $now ?>" readonly>
					</div>
				</div>
				<div class="form-group">
					<label>Tambah Barang</label>
					<a href="" class="btn btn-default input-group-text" data-toggle="modal" data-target="#modal-default">
						Cari
					</a>
				</div>
			</div>
		</div>

		<div class="col-md-6 col-md-offset-4">
			<div class="form-group">
				<div class="input-group">
					<?php if(!empty($total)){ ?>
						<input type="hidden" name="a" value="<?= $semua; ?>">
					<?php } ?>
				</div>
			</div>
			<div class="form-group">
				<button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button>
			</div>
		</div>
		</form>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Data Barang</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="card">
	<div class="card-header">
	  <h3 class="card-title">Data Item</h3><br>
	  <div>

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
			<th>aksi</th>
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
			<td><?= $data->hargabeli ?></td>
			<td><?= $data->jumlah_stok ?></td>
			<td class="text-center" width="160px">
					<a href="<?= base_url('barangmasuk/add_cart/')?><?php echo $data->barcode ?>/<?php echo $data->id_stok?>" class="btn btn-success btn-sm" >
						<i class="fa fa-plus"></i>Tambah
					</a>
					<!-- onclick="databarang('<?= $data->barcode?>', '<?= $data->name?>', '<?= $data->unit_name?>', '<?= $data->stock?>', '<?= $data->price?>')" -->
			</td>
	    </tr>
		<?php } ?>
	    </tbody>
	  </table>
	</div>
	<!-- /.card-body -->
	</div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>