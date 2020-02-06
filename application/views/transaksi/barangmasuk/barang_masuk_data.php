<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Item</h1>
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
	</div>

	<div class="card-body">
            <ul class="nav nav-tabs" id="" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#data" role="tab" aria-controls="custom-content-below-home" aria-selected="false">Data Transaksi Barang Masuk</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill" href="#transfer" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">Transfer Data</a>
              </li>
            </ul>
            <div class="tab-content" id="custom-content-below-tabContent">
              <div class="tab-pane fade active show" id="data" role="tabpanel" aria-labelledby="custom-content-below-home-tab"><br>
				<div class="pull-right">
					<a href="<?= site_url('barangmasuk/add') ?>" class="btn btn-primary btn-sm">
						<i class="fa fa-plus"></i>Create</a>
				</div><br>
                 <table id="example1" class="table table-bordered table-striped table-responsive no-padding">
				    <thead>
				    <tr>
				      	<th>No</th>
						<th>No Transaksi</th>
						<th>Total</th>
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
						<td>Rp. <?= number_format($data->total_masuk) ?></td>
						<td><?= $data->tanggal_masuk ?></td>
						<td class="text-center" width="160px">
								<button href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_datadetail" onclick="datatransaksimasuk('<?php echo $data->id_barang_masuk ?>')">
									<i class="fa fa-pencil"></i>Detail
								</button>
						</td>
				    </tr>
					<?php } ?>
				    </tbody>
				  </table>
              </div>
              	<div class="tab-pane fade" id="transfer" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
	              	<div class="col-md-4 col-offset-8">
	              	<label>Tambah Barang</label>
						<a href="" class="btn btn-default input-group-text" data-toggle="modal" data-target="#modal-default" id="cari_btt">
							Cari
						</a>
	            	</div><hr>
	            	<!-- <form action="<?= base_url('barangmasuk/trans_brg')?>" method="POST"> -->
		            	<input type="text" name="barcode_sc" id="bc_sc" style="display: none;">
		            	<input type="text" name="unit_sc" id="un_sc"  style="display: none;">
		            	<div class="col-md-4 col-offset-8">
		            		<label for="label">Stok Target</label>
			            	<select required id="returnget_barcode" class="form-control" name="un_tg"></select>
		            	</div>
		            	<hr>
		            	<div class="col-md-4 col-offset-8">
			            	<div class="form-group">
			            		<label for="label">Stok Yang Akan Di Transfer</label>
							    <input type="text" class="form-control" id="jm_sc" placeholder="Masukan Jumlah Transfer" name="jm_sc" required>
			            	</div>
		            	</div>  
		            	<div class="col-md-4 col-offset-8">
			            	<div class="form-group">
			            		<label for="label">Jumlah Ecer</label>
							    <input type="text" class="form-control" id="jm_tg" placeholder="Masukan Jumlah ecer" name="jm_tg" required>
			            	</div>
		            	</div>
		            	<div class="col-md-4 col-offset-8">
		            		<a onclick="get_gg()" href="<?= base_url('barangmasuk')?>" class="btn btn-primary">Simpan</a>
		            	</div>               
		            <!-- </form> -->
            	</div>
            
            </div>
          </div>

	<!-- /.card-header -->
	<div class="card-body">
	  
	</div>
	<!-- /.card-body -->
</div>

<!-- modal untuk detail barang masuk -->
<div class="modal fade" id="modal_datadetail">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Detail Transaksi Masuk</h4>
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
			  <div id="returndatatransaksimasuk"></div>
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


<!-- modal untuk data transfer -->
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

	<!-- /.card-header -->
	<div class="card-body">
	  <table id="example2" class="table table-bordered table-striped table-responsive no-padding">
	    <thead>
	    <tr>
	    	<th>No.</th>
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
			foreach ($data_transfer->result() as $dataa) { ?>
	    <tr>
	    	<td style="width:5%;"><?= $no++ ?>.</td>
			<td><?= $dataa->barcode ?></td>
			<td><?= $dataa->name ?></td>
			<td><?= $dataa->category_name ?></td>
			<td><?= $dataa->unit_name ?></td>
			<td><?= $dataa->hargabeli ?></td>
			<td><?= $dataa->jumlah_stok ?></td>
			<td class="text-center" width="160px">
					<a href="#" onclick="get_barcode('<?= $dataa->barcode?>', '<?= $dataa->unit_id?>'); detail_barang('<?= $dataa->barcode ?>', '<?= $dataa->unit_id ?>', '<?= $dataa->name ?>'); " data-dismiss="modal" class="btn btn-success btn-sm" >
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
<script type="text/javascript">
	$(document).ready( function () {
	    $('#example2').DataTable();
	} );

	function get_barcode(barcode, unit) {
      $.ajax({
        url:"<?= base_url(); ?>Barangmasuk/get_barcode",
        method:"POST",
        data:{barcode:barcode, unit:unit},
        success:function(data) {
            $('#returnget_barcode').html(data);
        }
      })
	}

	function get_barang(barcode, unit)
	{
		$.ajax({
			url:"<?= base_url(); ?>Barangmasuk/get_barang",
			method:"POST",
			data:{barcode:barcode, unit:unit},
			success:function(data){
				$('#returnget_barang').html(data);
				console.log(data)
			}
		})
	}

	function get_gg() {
	  var bc_sc = $('#bc_sc').val()
	  var un_sc = $('#un_sc').val()
	  var jm_sc = $('#jm_sc').val()
	  var un_trgt = $('#returnget_barcode').val()
	  var jm_trgt = $('#jm_tg').val()

      $.ajax({
        url:"<?= base_url(); ?>Barangmasuk/trans_brg",
        method:"POST",
        data:{bc_sc:bc_sc, un_sc:un_sc, jm_sc:jm_sc, un_trgt:un_trgt, jm_trgt:jm_trgt},
        success:function(data) {
            console.log(data)
            alert ('Data Telah Tersimpan!')
        }
      })
	}

	function detail_barang(barcode, unit, name) {
		$('#bc_sc').val(barcode)
		$('#un_sc').val(unit)
		$('#cari_btt').html(name)
	}
</script>