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
						<?php echo form_dropdown('category', $data_category, $selectedkategori,
							['class' => 'form-control', 'required' => 'required']); ?>
					</div>
					<div class="form-group">
						<label>Unit *</label>
						<?php echo form_dropdown('unit', $data_unit, $selectedunit, 
							['class' => 'form-control', 'required' => 'required']); ?>
					</div>
					<div class="form-group">
						<label>Harga Beli*</label>
						<input type="number" value="<?=$row->price_in?>" name="price_in" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Harga Jual*</label>
						<input type="number" value="<?=$row->price?>" name="price" class="form-control" required>
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