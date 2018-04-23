<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url();?>assets_main/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="<?php echo base_url();?>assets_main/img/favicon.png" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Berbagi_app - Edit Donasi Barang</title>

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
	                </li class="active">
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
						<a class="navbar-brand" href="#">Edit Donasi Barang</a>
					</div>
					
				</div>
			</nav>

	        <div class="content">
	            <div class="container-fluid">
	                <div class="row">
	                    <div class="col-md-8">
	                        <div class="card">
	                            <div class="card-header" data-background-color="purple">
	                                <h4 class="title">Edit Donasi Barang</h4>
									<p class="category">Isi data dengan lengkap</p>
	                            </div>
	                            <div class="card-content">
	                                <form>
	                                    <div class="row">
	                                        <div class="col-md-12">
												<div class="form-group label-floating">
													<label class="control-label">Nama Donasi Barang</label>
													<input type="text" value="<?php echo $nama_donasi_barang; ?>" class="form-control" disabled>
												</div>
	                                        </div>
	                                    </div>
										<div class="row">
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Tanggal Donasi Barang</label>
													<input type="text" value="<?php echo $tanggal_donasi_barang; ?>" class="form-control" disabled>
												</div>
	                                        </div>
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Jam Donasi Barang</label>
													<input type="text" value="<?php echo $jam_donasi_barang; ?>" class="form-control" disabled>
												</div>
	                                        </div>
	                                    </div>

	                                    <div class="row">
	                                        <div class="col-md-12">
													<div class="form-group label-floating">
									    				<label class="control-label"> Deskripsi Donasi Barang</label>
								    					<textarea class="form-control" rows="5" disabled><?php echo $deskripsi_donasi_barang; ?></textarea>
		                        					</div>
	                                            </div>
	                                    </div>
										<div class="row">
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Status</label>
													<input type="text" value="<?php echo $status_donasi_barang; ?>" class="form-control" disabled >
												</div>
	                                        </div>
										</div>
	                                    <button type="button" class="btn btn-danger pull-right" data-toggle="modal" data-target="#myModalHapus" onclick="SaveIdDonasi(<?php echo $id_donasi_barang?>)">Hapus</button>
										<button type="button" class="btn btn-info pull-right" onclick="EditData(<?php echo $id_donasi_barang?>)">Edit</button>
										<?php if($status_donasi_barang!="Disetujui")
												echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalDisetujui">Setujui</button>';
										?>
										<?php if($status_donasi_barang!="Ditolak")
												echo '<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModalDitolak">Tolak</button>';
										?>
										<?php if($status_donasi_barang!="Menunggu")
											echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalMenunggu">Menunggu</button>';
										?>
	                                </form>
	                            </div>
	                        </div>
	                    </div>
						<div class="col-md-4">
    						<div class="card card-profile">
    							<div class="card-avatar">
    								<a href="#pablo">
    									<img  src="<?php echo base_url('image/panti/'.$foto_panti_asuhan);?>" width="300px"; height="auto";/>
    								</a>
    							</div>
    							<div class="content">
    								<h6 class="category text-gray">Panti Asuhan</h6>
    								<h4 class="card-title"><?php echo $nama_panti_asuhan; ?></h4>
									<h4 class="card-title"><?php echo $telp_panti_asuhan; ?></h4>
    								<p class="card-content">
    								<?php echo $alamat_panti_asuhan; ?>	
									</p>
    								
    							</div>
    						</div>
		    			</div>
						
						<div class="col-md-4">
    						<div class="card card-profile">
    							<div class="card-avatar">
    								<a href="#pablo">
    									<img  src="<?php echo base_url('image/donatur/'.$foto_donatur);?>" width="100%"; height="auto";/>
    								</a>
    							</div>

    							<div class="content">
    								<h6 class="category text-gray">Donatur</h6>
    								<h4 class="card-title"><?php echo $nama_donatur; ?></h4>
									<h4 class="card-title"><?php echo $telp_donatur; ?></h4>
    								<p class="card-content">
    								<?php echo $alamat_donatur; ?>	
									</p>
    								
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
	
<!-- Sart Modal Hapus -->
	<div class="modal fade" id="myModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Peringatan!!!</h4>
				</div>
				<div class="modal-body">
					<p>Apakah anda yakin akan mengahapus Permintaan ini?
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

<!-- Sart Modal Edit Data -->
	<div class="modal fade" id="myModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<form class="form" action="<?php echo site_url('updatebarang'); ?>" method="post" enctype="multipart/form-data">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					<i class="material-icons">clear</i>
				</button>
					<h4 class="modal-title">Edit Donasi Barang</h4>
				</div>
				<div class="modal-body">
				<input type="hidden" name="id_donasi_barang" />
					<div class="form-group">
						<label class="control-label">Judul Donasi Barang</label>
						<input type="text" name="nama_donasi_barang" class="form-control">
					</div>
					<div class="form-group">
						<label class="control-label">Tanggal Donasi</label>
						<input type="text" name="tanggal_donasi_barang" class="form-control">
					</div>
					<div class="form-group">
						<label class="control-label">Jam Donasi Barang</label>
						<input type="text" name="jam_donasi_barang" class="form-control">
					</div>
					<div class="form-group">
						<label class="control-label">Deskripsi Barang</label>
						<textarea type="text" rows="3" name="deskripsi_donasi_barang" class="form-control"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary btn-round">Simpan Data</button>
					<button type="button" class="btn btn-primary btn-round" data-dismiss="modal">Batal</button>
				</div>
			</div>
		</div>
		</form>
	</div>
	<!--  End Modal -->
	
<!-- Sart Modal Disetujui -->
	<div class="modal fade" id="myModalDisetujui" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<form class="form" action="<?php echo site_url('updatebsetuju'); ?>" method="post" enctype="multipart/form-data">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Peringatan!!!</h4>
				</div>
				<div class="modal-body">
				<input type="hidden" name="id_donasi_barang" value="<?php echo $id_donasi_barang; ?>" />
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

<!-- Sart Modal Ditolak -->
	<div class="modal fade" id="myModalDitolak" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<form class="form" action="<?php echo site_url('updatebtolak'); ?>" method="post" enctype="multipart/form-data">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Peringatan!!!</h4>
				</div>
				<div class="modal-body">
				<input type="hidden" name="id_donasi_barang" value="<?php echo $id_donasi_barang; ?>" />
					<p>Apakah anda yakin akan menolak Permintaan ini?
					</p>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-default btn-simple">Tolak</button>
					<button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Tidak</button>
				</div>
			</div>
		</div>
	</form>
	</div>
<!--  End Modal -->

<!-- Sart Modal Menunggu -->
	<div class="modal fade" id="myModalMenunggu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<form class="form" action="<?php echo site_url('updatebmenunggu'); ?>" method="post" enctype="multipart/form-data">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Peringatan!!!</h4>
				</div>
				<div class="modal-body">
				<input type="hidden" name="id_donasi_barang" value="<?php echo $id_donasi_barang; ?>" />
					<p>Apakah anda yakin akan mengubah status Permintaan ini menjadi menunggu?
					</p>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-default btn-simple">Menunggu</button>
					<button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Tidak</button>
				</div>
			</div>
		</div>
		</form>
	</div>
<!--  End Modal -->

<script type="text/javascript">

function SaveIdDonasi(id)
{
	$.ajax({
		type: "GET",
		url: "<?php echo site_url('getid_barang'); ?>",
		data: "id_donasi_barang="+id
	}).done(function( msg ) {
	});
}

function Delete()
{
	$.ajax({
		type: "GET",
		url: "<?php echo site_url('delete_barang'); ?>"
	}).done(function( msg ) {
		window.location.href = "<?php echo site_url('donasi'); ?>";
	});
}

function EditData(id_donasi_barang)
{
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('Admin_Donasi_Barang/ajax_edit_barang')?>/" + id_donasi_barang,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="id_donasi_barang"]').val(data.id_donasi_barang);
            $('[name="nama_donasi_barang"]').val(data.nama_donasi_barang);
            $('[name="tanggal_donasi_barang"]').val(data.tanggal_donasi_barang);
			$('[name="jam_donasi_barang"]').val(data.jam_donasi_barang);
			$('[name="deskripsi_donasi_barang"]').val(data.deskripsi_donasi_barang);
            $('#myModalEdit').modal('show'); // show bootstrap modal when complete loaded
            //$('.modal-title').text('Edit Person'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
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
