<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Laporan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item">Laporan</li>
              <li class="breadcrumb-item active">Laba atau keuntungan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

    <div class="row">
      <div class="col-md-6 col-md-offset-4">
        <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Laba atau Keuntungan</h3>
            </div>
            <div class="card-body">
              
              <div class="form-group">
                <label>Cari Bulan:</label>
                <input type="month" name="input-bulanan" id="input-bulanan" class="form-control my-colorpicker1 colorpicker-element">
              </div>

              <div class="form-group">
                <label>Pembelian:</label>
                <input type="text"  name="total-beli" id="total-beli" class="form-control my-colorpicker1 colorpicker-element" readonly="readonly" >
              </div>

              <div class="form-group">
                <label>Pejualan:</label>
                  <input type="text"  name="total-jual" id="total-jual" class="form-control" readonly="readonly">
              </div>

              <div class="form-group">
                <label class="ket">Laba:</label>
                  <input type="text" name="total-laba" id="total-laba" class="form-control datetimepicker-input" readonly="readonly" >
              </div>
            </div>
            <!-- /.card-body -->
        </div>
      </div>
    </div>

