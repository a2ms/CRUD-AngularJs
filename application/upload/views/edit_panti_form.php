<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url();?>assets_main/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="<?php echo base_url();?>assets_main/img/favicon.png" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Berbagi_app - Edit Panti</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="<?php echo base_url();?>assets_main/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Material Dashboard CSS    -->
    <link href="<?php echo base_url();?>assets_main/css/material-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?php echo base_url();?>assets_main/css/demo.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
</head>

<body>

	<div class="wrapper">
	    <div class="sidebar" data-color="purple" data-image="<?php echo base_url();?>assets_main/img/sidebar-1.jpg">
			<!--
	        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"
		    Tip 2: you can also add an image using data-image tag

			-->

			<div class="logo">
				<a href="<?php echo base_url('index.php/dashboard');?>" class="simple-text">
					Admin Berbagi_App
				</a>
			</div>


	    	<div class="sidebar-wrapper">
	            <ul class="nav">
	                <li>
	                    <a href="<?php echo base_url('index.php/dashboard');?>">
	                        <i class="material-icons">dashboard</i>
	                        <p>Dashboard</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="<?php echo base_url('index.php/panti_terverifikasi');?>">
	                        <i class="material-icons">home</i>
	                        <p>Panti Terverifikasi</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="<?php echo base_url('index.php/panti_belum_terverifikasi');?>">
	                        <i class="material-icons">account_balance</i>
	                        <p>Panti Belum Terverifikasi</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="<?php echo base_url('index.php/donatur');?>">
	                        <i class="material-icons">perm_identity</i>
	                        <p>Donatur</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="<?php echo base_url('index.php/berita');?>">
	                        <i class="material-icons">library_books</i>
	                        <p>Berita</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="<?php echo base_url('index.php/permintaan_kegiatan');?>">
	                        <i class="material-icons">add_alert</i>
	                        <p>Permintaan Kegiatan</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="<?php echo base_url('index.php/donasi');?>">
	                        <i class="material-icons text-gray">monetization_on</i>
	                        <p>Donasi Dana & Barang</p>
	                    </a>
	                </li>
					<li class="active-pro">
                        <a href="<?php echo site_url('logoutaction'); ?>">
	                        <i class="material-icons">assignment_return</i>
	                        <p>Log Out</p>
	                    </a>
                    </li>
	            </ul>
	    	</div>
		</div>

	    <div class="main-panel">
			<nav class="navbar navbar-transparent navbar-absolute">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#">Edit Panti Asuhan</a>
					</div>
					<div class="collapse navbar-collapse">
						

						<form class="navbar-form navbar-right" role="search">
							<div class="form-group  is-empty">
	                        	<input type="text" class="form-control" placeholder="Search">
	                        	<span class="material-input"></span>
							</div>
							<button type="submit" class="btn btn-white btn-round btn-just-icon">
								<i class="material-icons">search</i><div class="ripple-container"></div>
							</button>
	                    </form>
					</div>
				</div>
			</nav>

	        <div class="content">
	            <div class="container-fluid">
	                <div class="row">
	                    <div class="col-md-8">
						<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
	                        <div class="card">
	                            <div class="card-header" data-background-color="purple">
	                                <h4 class="title">Edit Panti Asuhan</h4>
									<p class="category">Isi data dengan lengkap</p>
	                            </div>
	                            <div class="card-content">
	                                <form>
	                                    <div class="row">
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Nama Panti Asuhan</label>
													<input type="text" class="form-control" name="nama_panti_asuhan" id="nama_panti_asuhan" required value="<?php echo $nama_panti_asuhan; ?>" >
												</div>
	                                        </div>
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Nomor ID Sertifikat Panti</label>
													<input type="text" class="form-control" name="no_id_panti_asuhan" id="no_id_panti_asuhan" required value="<?php echo $no_id_panti_asuhan; ?>" >
												</div>
	                                        </div>
	                                    </div>
										
										<div class="row">
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Nama Pemilik</label>
													<input type="text" class="form-control" name="nama_pemilik" id="nama_pemilik" required value="<?php echo $nama_pemilik; ?>" >
												</div>
	                                        </div>
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Nomor KTP Pemilik</label>
													<input type="text" class="form-control" name="no_ktp_pemilik" id="no_ktp_pemilik" required value="<?php echo $no_ktp_pemilik; ?>" >
												</div>
	                                        </div>
	                                    </div>
										
										<div class="row">
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">No Telepon</label>
													<input type="text" class="form-control" name="telp_panti_asuhan" id="telp_panti_asuhan" required value="<?php echo $telp_panti_asuhan; ?>">
												</div>
	                                        </div>
											<div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">No Rekening</label>
													<input type="text" class="form-control" name="rekening_panti_asuhan" id="rekening_panti_asuhan" required value="<?php echo $rekening_panti_asuhan; ?>">
												</div>
	                                        </div>
	                                    </div>

	                                    <div class="row">
	                                        <div class="col-md-12">
												<div class="form-group label-floating">
													<label class="control-label">Alamat</label>
													<input type="text" class="form-control" name="alamat_panti_asuhan" id="alamat_panti_asuhan" required value="<?php echo $alamat_panti_asuhan; ?>">
												</div>
	                                        </div>
	                                    </div>
										
										<div class="row">
	                                        <div class="col-md-12">
												<div class="form-group label-floating">
													<label class="control-label">Kebutuhan Panti Asuhan</label>
													<input type="text" class="form-control" name="kebutuhan_panti_asuhan" id="kebutuhan_panti_asuhan" required value="<?php echo $kebutuhan_panti_asuhan; ?>">
												</div>
	                                        </div>
	                                    </div>

	                                    <div class="row">
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Rentang Usia</label>
													<input type="text" class="form-control" name="rentang_usia" id="rentang_usia" required value="<?php echo $rentang_usia; ?>">
												</div>
	                                        </div>
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Jumlah anak Laki-laki</label>
													<input type="text" class="form-control" name="jumlah_anak_laki" id="jumlah_anak_laki" required value="<?php echo $jumlah_anak_laki; ?>">
												</div>
	                                        </div>
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Jumlah anak Perempuan</label>
													<input type="text" class="form-control" name="jumlah_anak_perempuan" id="jumlah_anak_perempuan" required value="<?php echo $jumlah_anak_perempuan; ?>">
												</div>
	                                        </div>
	                                    </div>
										
										<div class="row">
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Longtitude</label>
													<input type="text" class="form-control" name="longtitude_panti_asuhan" id="longtitude_panti_asuhan" required value="<?php echo $longtitude_panti_asuhan; ?>">
												</div>
	                                        </div>
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Latitude</label>
													<input type="text" class="form-control" name="latitude_panti_asuhan" id="latitude_panti_asuhan" required value="<?php echo $latitude_panti_asuhan; ?>">
												</div>
	                                        </div>
	                                    </div>
										
										<div class="row">
											<div class="col-md-6">
											</br>
											<label>Foto Sertifikat</label>
												<div class="input-group">
													<input type="file" class="btn btn-primary" name="foto_sertifikat_panti_asuhan" id="foto_sertifikat_panti_asuhan"/>
												</div>
											</div>
										</div>

	                                    <div class="row">
	                                        <div class="col-md-12">
													<div class="form-group label-floating">
									    				<label class="control-label"> Deskripsi Sejarah Panti Asuhan</label>
								    					<textarea class="form-control" rows="5" name="deskripsi_panti_asuhan" id="deskripsi_panti_asuhan" required ><?php echo $deskripsi_panti_asuhan; ?></textarea>
		                        					</div>
	                                            </div>
	                                    </div>
										<!--
										<div class="row">
												<div class="col-md-6">
													<div class="form-group label-floating">
													  <label class="control-label">Status Panti Asuhan</label>
													  <select name="status_panti_asuhan" id="status_panti_asuhan" class="underlines" required>
													   <option><li>Terverifikasi</li><li>Tidak_Terverifikasi</li></option>
													  </select>
													</div>
											</div>
										</div>-->
										
										<input type="hidden" name="id_panti_asuhan" value="<?php echo $id_panti_asuhan; ?>" /> 

	                                    <button type="submit" class="btn btn-primary pull-right"><?php echo "Update" ?></button>
										<a href="<?php echo site_url('panti_terverifikasi') ?>" class="btn btn-primary pull-right">Cancel</a>
	                                    <div class="clearfix"></div>
	                                </form>
	                            </div>
	                        </div>
							</form>
	                    </div>
						<div class="col-md-4">
    						<div class="card card-profile">
    							<div class="card-avatar">
    								<a href="#pablo">
    									<img src="<?php echo base_url('image/panti/'.$foto_panti_asuhan);?>"/>
    								</a>
    							</div>

    							<div class="content">
    								<h6 class="category text-gray">Panti Asuhan</h6>
    								<h4 class="card-title"><?php echo $nama_panti_asuhan; ?></h4>
									<h4 class="card-title"><?php echo $no_id_panti_asuhan; ?></h4>
    							</div>
    						</div>
		    			</div>
	                </div>
	            </div>
	        </div>

	        <footer class="footer">
				<div class="container-fluid">
					
					<p class="copyright pull-right">
						&copy; <script>document.write(new Date().getFullYear())</script> <a href="<?php echo base_url('index.php/dashboard');?>">Berbagi_App</a>, made with love
					</p>
				</div>
			</footer>
	    </div>
	</div>

</body>

	<!--   Core JS Files   -->
	<script src="<?php echo base_url();?>assets_main/js/jquery-3.1.0.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets_main/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets_main/js/material.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="<?php echo base_url();?>assets_main/js/chartist.min.js"></script>

	<!--  Notifications Plugin    -->
	<script src="<?php echo base_url();?>assets_main/js/bootstrap-notify.js"></script>

	<!--  Google Maps Plugin    -->
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

	<!-- Material Dashboard javascript methods -->
	<script src="<?php echo base_url();?>assets_main/js/material-dashboard.js"></script>

	<!-- Material Dashboard DEMO methods, don't include it in your project! -->
	<script src="<?php echo base_url();?>assets_main/js/demo.js"></script>

</html>
