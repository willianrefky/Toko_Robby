<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Kategori</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item">Item</li>
              <li class="breadcrumb-item active"><?=ucfirst($page1) ?> Item</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<?php $this->view('messages') ?>
<div class="card">
	<div class="card-header">
		<h3 class="box-title"><?=ucfirst($page) ?> Item</h3>
		<div class="pull-right">
			<a href="<?= site_url('item') ?>" class="btn btn-warning btn-sm">
				<i class="fa fa-undo"></i>Back</a>
		</div>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<form action="<?= site_url('item/process') ?>" method="post">
					<div class="form-group">
						<label>Barcode *</label>
						<input type="hidden" name="id" value="<?=$row->item_id?>">
						<input type="text" value="<?=$row->barcode?>" name="barcode" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="item_name">Nama Produk *</label>
						<input type="text" value="<?=$row->name?>" name="item_name" id="item_name" class="form-control" required>
					</div>

					<div class="form-group">
						<label>Kategori *</label>
						<select name="category" class="form-control">
							<option value="">Pilih</option>
							<?php foreach($data_categorys->result() as $dctgs) { ?>
								<option value="<?php echo $dctgs->category_id?>" <?php if ($dctgs->name == $row->category_name) { echo "selected"; }?> ><?php echo $dctgs->name?></option>
							<?php } ?>
						</select>
					</div>

					<?php if($page == 'add') { ?>
						<div class="form-group">
							<label>Unit *</label>
							<select name="unit[]" class="form-control">
								<option value="">Pilih</option>
								<?php foreach($data_units->result() as $dtuns) { ?>
									<option value="<?php echo $dtuns->unit_id?>"><?php echo $dtuns->name?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label>Harga Beli *</label>
							<input type="number" value="" name="hargabeli[]" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Harga jual *</label>
							<input type="number" value="" name="hargajual[]" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Keterangan Pcs *</label>
							<input type="number" value="" name="keteranganpcs[]" class="form-control" required>
						</div>
						<div id="insert-form"></div>
						<button type="button" id="btn-tambah-form">Tambah Data Form</button>
						<button type="button" id="btn-reset-form">Reset Form</button><br><br>
						
					<?php } ?>

					<div class="form-group">
						<button type="submit" name="<?=$page ?>" class="btn btn-success btn-flat">
							<i class="fa fa-check"></i>Save
						</button>
						<button type="reset" class="btn btn-flat">Reset</button>
					</div>
				</form>
				<input type="hidden" id="jumlah-form" value="1">
			</div>
		</div>
	</div>
</div>

