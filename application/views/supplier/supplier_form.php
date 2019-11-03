<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Supplier</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item">Supplier</li>
              <li class="breadcrumb-item active"><?= ucfirst($page1) ?> supplier</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


<div class="card">
	<div class="card-header">
		<h3 class="box-title"><?=ucfirst($page) ?> Kategori</h3>
		<div class="pull-right">
			<a href="<?= site_url('supplier') ?>" class="btn btn-warning btn-sm">
				<i class="fa fa-undo"></i>Back</a>
		</div>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<form action="<?= site_url('supplier/process') ?>" method="post">
					<div class="form-group">
						<label>Supplier Name *</label>
						<input type="hidden" name="id" value="<?=$row->supplier_id?>">
						<input type="text" value="<?=$row->name?>" name="supplier_name" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Phone *</label>
						<input type="number" value="<?=$row->phone?>" name="phone" class="form-control"  required>
					</div>
					<div class="form-group">
						<label>Address *</label>
						<textarea name="address" class="form-control" required><?=$row->address ?></textarea>
					</div>
					<div class="form-group">
						<label>Description</label>
						<textarea name="desc" class="form-control"><?=$row->description ?></textarea>
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