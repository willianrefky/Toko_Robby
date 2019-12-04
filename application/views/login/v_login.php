</head>
<body class="hold-transition login-page">
	<div class="login-box">
		<div class="card">
			<div class="card-body login-card-body">
				<div class="login-logo">
					<img src="<?=site_url()?>assets/images/robbylogo.png" alt="">
					<h3>Toko Robby</h3>
				</div>
				<form action="<?= site_url('login/login_process') ?>" method="post">
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="Username" name="username" required="">
					</div>
					<div class="form-group has-feedback">
						<input type="password" class="form-control" placeholder="Password" name="password" required="">
					</div>
					<?php 
						// Cek apakah terdapat session bernama message
						if($this->session->flashdata('message')){ // Jika terdapat session message
							echo $this->session->flashdata('message'); // Tampilkan pesan
						}
					?>
					<div class="row">
						<div class="col-8"></div>
						<div class="col-4">
							<input type="submit" class="btn btn-primary btn-block" value="Login">
						</div>
					</div>
				</form>
			</div>	
		</div>
	</div>
	<footer class="main-footer" style="margin-left: 0; margin-top: -20px; position: fixed;">
    	<strong>Copyright &copy; 2019 <a href="http://adminlte.io">IndoKreaktif</a>.</strong> All rights reserved.    
    	<div class="float-right d-none d-sm-inline-block" style="padding-left: 912px;">
    		<b>Version</b> 0.1
    	</div>
  	</footer>
</body>