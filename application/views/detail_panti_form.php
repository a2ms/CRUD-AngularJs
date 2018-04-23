<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url();?>assets_main/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="<?php echo base_url();?>assets_main/img/favicon.png" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Berbagi_app - Detail Panti</title>

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
	                        <p>Donasi Dana</p>
	                    </a>
	                </li>
					<li>
	                    <a href="<?php echo base_url('index.php/donasi_barang');?>">
	                        <i class="material-icons text-gray">card_giftcard</i>
	                        <p>Donasi Barang</p>
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
						<a class="navbar-brand" >Detail Panti Asuhan</a>
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
	                        <div class="card">
	                            <div class="card-header" data-background-color="purple">
	                                <h4 class="title">Detail Panti Asuhan</h4>
									<p class="category">Detail Panti</p>
	                            </div>
	                            <div class="card-content">
	                                <form>
										<div class="row">
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Email</label>
													<input type="text" value="<?php echo $email; ?>"  class="form-control" disabled>
												</div>
	                                        </div>
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">No Telefon</label>
													<input type="text" value="<?php echo $telp_panti_asuhan; ?>" class="form-control" disabled>
												</div>
	                                        </div>
											<div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">No Rekening</label>
													<input type="text" value="<?php echo $rekening_panti_asuhan; ?>" class="form-control" disabled>
												</div>
	                                        </div>
	                                    </div>

	                                    <div class="row">
	                                        <div class="col-md-12">
												<div class="form-group label-floating">
													<label class="control-label">Alamat</label>
													<input type="text" value="<?php echo $alamat_panti_asuhan; ?>" class="form-control" disabled>
												</div>
	                                        </div>
	                                    </div>
										
										<div class="row">
	                                        <div class="col-md-12">
												<div class="form-group label-floating">
													<label class="control-label">Kebutuhan Panti Asuhan</label>
													<input type="text" value="<?php echo $kebutuhan_panti_asuhan; ?>" class="form-control" disabled>
												</div>
	                                        </div>
	                                    </div>

	                                    <div class="row">
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Rentang Usia</label>
													<input type="text" value="<?php echo $rentang_usia; ?>" class="form-control" disabled>
												</div>
	                                        </div>
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Jumlah anak Laki-laki</label>
													<input type="text" class="form-control" value="<?php echo $jumlah_anak_laki; ?>" disabled>
												</div>
	                                        </div>
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Jumlah anak Perempuan</label>
													<input type="text" class="form-control" value="<?php echo $jumlah_anak_perempuan; ?>"  disabled>
												</div>
	                                        </div>
	                                    </div>
										
										<div class="row">
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Longtitude</label>
													<input type="text" class="form-control" value="<?php echo $longtitude_panti_asuhan; ?>" disabled>
												</div>
	                                        </div>
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Latitude</label>
													<input type="text" class="form-control" value="<?php echo $latitude_panti_asuhan; ?>" disabled>
												</div>
	                                        </div>
	                                    </div>
										
										<div class="row">
											<div class="col-md-6">
											</br>
											<label>Foto Sertifikat</label>
											<img src="<?php echo base_url('image/sertifikat/'.$foto_sertifikat_panti_asuhan);?>" width="300px" height="200px"/>
											</div>
											</br>
											<div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Status Panti Asuhan</label>
													<input type="text" class="form-control" value="<?php echo $status_panti_asuhan; ?>" disabled>
												</div>
	                                        </div>
										</div>

	                                    <div class="row">
	                                        <div class="col-md-12">
													<div class="form-group label-floating">
									    				<label class="control-label"> Deskripsi Sejarah Panti Asuhan</label>
								    					<textarea class="form-control" rows="5" disabled><?php echo $deskripsi_panti_asuhan; ?> </textarea>
		                        					</div>
	                                            </div>
	                                    </div>

	                                    
	                                    <div class="clearfix"></div>
	                                </form>
	                            </div>
	                        </div>
	                    </div>
						<div class="col-md-4">
    						<div class="card card-profile">
    							<div class="card-avatar">
    								<a>
    									<img  src="<?php echo base_url('image/panti/'.$foto_panti_asuhan);?>" width="300px"; height="auto";/>
    								</a>
    							</div>

    							<div class="content">
    								<h6 class="category text-gray">Panti Asuhan</h6>
    								<h4 class="card-title"><?php echo $nama_panti_asuhan; ?></h4>
									<h4 class="card-title"><?php echo $no_id_panti_asuhan; ?></h4>
									<?php
									echo anchor(site_url('panti/update/'.$id_panti_asuhan),'<button href="#pablo" class="btn btn-primary btn-round">Edit Data</button>');
									?>
									<button class="btn btn-danger btn-round" data-toggle="modal" data-target="#myModal" onclick="SaveIdPanti(<?php echo $id_panti_asuhan?>)">Hapus</button>
									<?php if($status_panti_asuhan!="Terverifikasi")
										echo '<button class="btn btn-info btn-round" data-toggle="modal" data-target="#myModalVerifikasi">Verifikasi</button>';
									?>
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
	

<!-- Sart Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Peringatan</h4>
				</div>
				<div class="modal-body">
					<p> Apakah anda yakin menghapus panti asuhan ini?
					</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default btn-simple" onclick="Delete()">Ya</button>
					<button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Tidak</button>
				</div>
			</div>
		</div>
	</div>
	<!--  End Modal -->

<!-- Sart Modal Verifikasi -->
	<div class="modal fade" id="myModalVerifikasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<form class="form" action="<?php echo site_url('updateverifikasi'); ?>" method="post" enctype="multipart/form-data">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Peringatan!!!</h4>
				</div>
				<div class="modal-body">
				<input type="hidden" name="id_panti_asuhan" value="<?php echo $id_panti_asuhan; ?>" />
					<p>Apakah anda yakin akan menyetujui Permintaan ini?
					</p>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-default btn-simple">Setujui</button>
					<button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Tidak</button>
				</div>
			</div>
		</div>
		</form>
	</div>
<!--  End Modal -->
	
<script type="text/javascript">

function SaveIdPanti(id)
{
	alert(id);
	$.ajax({
		type: "GET",
		url: "<?php echo site_url('getid_panti'); ?>",
		data: "id_panti_asuhan="+id
	}).done(function( msg ) {
	});
}

function Delete()
{
	
	$.ajax({
		type: "GET",
		url: "<?php echo site_url('delete_panti'); ?>"
	}).done(function( msg ) {
		window.location.href = "<?php echo site_url('panti_terverifikasi'); ?>";
	});
}
</script>
	
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
