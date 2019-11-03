<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Kategori</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= site_url('dashboard') ?>">Home</a></li>
              <li class="breadcrumb-item active">Kategori</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <?php $this->view('messages') ?>

<div class="card">
	<div class="card-header">
	  <h3 class="card-title">Data Kategori</h3><br>
	  <div>
			<a href="<?= site_url('kategori/add') ?>" class="btn btn-primary btn-sm">
				<i class="fa fa-plus"></i>Create</a>
		</div>
	</div>

	<!-- /.card-header -->
	<div class="card-body">
	  <table id="example1" class="table table-bordered table-striped">
	    <thead>
	    <tr>
	      <th>No. </th>
	      <th>Nama Kategori</th>
	      <th>Aksi</th>
	    </tr>
	    </thead>
	    <tbody>
    	<?php $no = 1;
			foreach ($data_category->result() as $data) { ?>
	    <tr>
	      <td style="width:5%;"><?= $no++ ?>.</td>
			<td><?= $data->name ?></td>
			<td class="text-center" width="160px">
					<a href="<?= site_url('kategori/edit/'.$data->category_id) ?>" class="btn btn-primary btn-sm">
						<i class="fa fa-pencil"></i>Update
					</a>
					<a href="<?= site_url('kategori/del/'.$data->category_id) ?>" onclick="return confirm('Apakah yakin hapus data?')" class="btn btn-danger btn-sm">
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