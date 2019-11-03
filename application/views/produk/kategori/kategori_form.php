<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Kategori</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item">Kategori</li>
              <li class="breadcrumb-item active"><?=ucfirst($page) ?> Kategori</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


<div class="card">
	<div class="card-header">
		<h3 class="box-title"><?=ucfirst($page) ?> Kategori</h3>
		<div class="pull-right">
			<a href="<?= site_url('kategori') ?>" class="btn btn-warning btn-sm">
				<i class="fa fa-undo"></i>Back</a>
		</div>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<form action="<?= site_url('kategori/process') ?>" method="post">
					<div class="form-group">
						<label>Categori Name *</label>
						<input type="hidden" name="id" value="<?=$row->category_id?>">
						<input type="text" value="<?=$row->name?>" name="category_name" class="form-control" required>
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