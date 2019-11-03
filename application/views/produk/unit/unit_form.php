<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Unit</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item">Unit</li>
              <li class="breadcrumb-item active"><?=ucfirst($page) ?> Unit</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


<div class="card">
	<div class="card-header">
		<h3 class="box-title"><?=ucfirst($page) ?> Unit</h3>
		<div class="pull-right">
			<a href="<?= site_url('unit') ?>" class="btn btn-warning btn-sm">
				<i class="fa fa-undo"></i>Back</a>
		</div>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<form action="<?= site_url('unit/process') ?>" method="post">
					<div class="form-group">
						<label>Unit Name *</label>
						<input type="hidden" name="id" value="<?=$row->unit_id?>">
						<input type="text" value="<?=$row->name?>" name="unit_name" class="form-control" required>
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