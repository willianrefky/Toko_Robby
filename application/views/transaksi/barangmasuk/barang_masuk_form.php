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


<div class="card">
	<div class="card-header">
		<h3 class="box-title"><?=ucfirst($page) ?> Barang Masuk</h3>
		<div class="pull-right">
			<a href="<?= site_url('barangmasuk') ?>" class="btn btn-warning btn-sm">
				<i class="fa fa-undo"></i>Back</a>
		</div>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-6 col-md-offset-4">
				<form action="<?= site_url('barangmasuk/process') ?>" method="post">
					<div class="form-group">
						<label>ID Transaksi Barang Masuk *</label>
						<input type="hidden" name="id" >
						<input value="<?= $id_barang_masuk; ?>" type="text" readonly="readonly" class="form-control" name="id_barang_masuk">
					</div>
					<div class="form-group">
	                    <label>Barang</label>
	                    <div class="input-group">
	                    <input type="text" name="barcode_barang" id="barcode_barang" readonly required placeholder="Barcode Barang">
	                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Barang">
		                    <div class="input-group-append">
	                            <a href=""class="btn btn-default input-group-text" data-toggle="modal" data-target="#modal-default">
				                  Cari
				                </a>
	                        </div>
                        </div>
                	</div>
                	<div class="form-group">
						<label>Supplier *</label>
						<select name="supplier_name" id="supplier_id" class="form-control" required>
	                        <option value="">Pilih Supplier</option>
	                        <?php foreach ($data_supplier->result() as $bs) : ?>
	                            <option value="<?= $bs->supplier_id?>"><?= $bs->name ?></option>
	                        <?php endforeach; ?>
                        </select>
					</div>	
                </div>
			<div class="col-md-6 col-md-offset-4">

                	<div class="form-group">
                    <label for="stok">Stok</label>
                        <input readonly="readonly" id="stock" name="stok" type="text" class="form-control">
                	</div>
					<div class="form-group">
						<label>Jumlah Masuk *</label>
                        	<div class="input-group">
                            <input value="" name="jumlah_masuk" id="jumlah_masuk" type="number" class="form-control" placeholder="Jumlah Masuk...">
                            <div class="input-group-append">
                                <span class="input-group-text" id="unit"></span>
                            </div>
                        	</div>
					</div>
						
					
					<div class="form-group">
						<label for="tanggal_masuk">Tanggal Masuk *</label>
						<?php $now = date("Y-m-d")?>
						<input type="text" name="date" id="tanggal_masuk" class="form-control" required value="<?= $now ?>" readonly>
					</div>				
					<div class="form-group">
						<button type="submit" name="<?=$page ?>" class="btn btn-success btn-flat">
							<i class="fa fa-check"></i>Save
						</button>
						<button type="reset" class="btn btn-flat">Reset</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- <script type="text/javascript">
		
	$(document).ready(function(){

		$("#nama_barang").autocomplete({

			source: "<?php echo base_url('barangmasuk/get_autocomplete/?'); ?>"

                // select: function (event, ui) {
                //     $('[name="nama_barang"]').val(ui.item.label); 
                //     $('[name="stok"]').val(ui.item.stok); 
                // }
		});
	});

</script> -->
<!--  -->
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
			<td><?= $data->price ?></td>
			<td><?= $data->stock ?></td>
			<td class="text-center" width="160px">
					<a href="#" class="btn btn-success btn-sm" onclick="databarang('<?= $data->barcode?>', '<?= $data->name?>', '<?= $data->unit_name?>', '<?= $data->stock?>')"  data-dismiss="modal">
						<i class="fa fa-plus"></i>Tambah
					</a>
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

<!-- <script> 
	$('.btn-warning').click(e => {
		e.preventDefault();

		$(this).css('color','pink');
	})
</script> -->

<script type="text/javascript">
	function databarang($barcode, $nama, $unit, $stock) {
		$("#barcode_barang").val($barcode);
		$("#nama_barang").val($nama);
		$("#stock").val($stock);
		document.getElementById("unit").innerHTML = $unit;
	}
</script>