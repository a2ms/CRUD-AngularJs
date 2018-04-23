<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url();?>assets_main/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="<?php echo base_url();?>assets_main/img/favicon.png" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Berbagi_app - Donasi</title>

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
	                <li class="active">
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
						<a class="navbar-brand" href="#">Table List Donasi</a>
					</div>
					<div class="collapse navbar-collapse">
						

						<form class="navbar-form navbar-right" role="search" action="<?php echo site_url('search_donasi_d');?>" method="post">
							<div class="form-group  is-empty">
	                        	<input type="text" class="form-control" placeholder="Search Dana" name="cari">
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
	                    <div class="col-md-12">
	                        <div class="card">
	                            <div class="card-header" data-background-color="purple">
	                                <h4 class="title">Donasi Dana</h4>
	                                <p class="category">Donasi kepada panti asuhan</p>
	                            </div>
	                            <div class="card-content table-responsive">
	                                <table class="table">
	                                    <thead class="text-primary">
	                                    	<th>Nama Donatur</th>
	                                    	<th>Nama Panti Asuhan</th>
											<th>Tanggal</th>
	                                    	<th>Nominal</th>
											<th>Action</th>
	                                    </thead>
										<?php
										$start = 0;
										foreach ($donasi_dana_data as $get_data)
										{
										?>
	                                    <tbody>
	                                        <tr>
	                                        	<td><?php echo $get_data->nama_donatur?></td>
	                                        	<td><?php echo $get_data->nama_panti_asuhan?></td>
												<td><?php echo $get_data->tanggal_donasi_dana?></td>
	                                        	<td><?php echo $get_data->nominal_donasi_dana?></td>
												<td class="td-actions text-right">
													<button type="button" rel="tooltip" title="Read More" class="btn btn-info btn-simple btn-xs" onclick="ViewDataDana(<?php echo $get_data->id_donasi_dana ?>)">
														<i class="material-icons">visibility</i>
													</button>
													<button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs" data-toggle="modal" data-target="#myModalHapusDana" onclick="SaveIdDana(<?php echo $get_data->id_donasi_dana ?>)">
														<i class="material-icons">close</i>
													</button>
												</td>
	                                        </tr>
	                                    </tbody>
										<?php
										}
										?>
	                                </table>

	                            </div>
	                        </div>
							<div class="text-center">
								<ul class="pagination pagination-info">
									<?php 
										echo '<li><a href="javascript:void(0);">' . $this->pagination->create_links() .'</a></li>';
									?>
								</ul>
							</div>
	                    </div>
						
						
								<div class="collapse navbar-collapse">
									

									<form class="navbar-form navbar-right" role="search" action="<?php echo site_url('search_donasi');?>" method="post">
										<div class="form-group  is-empty">
											<input type="text" class="form-control" placeholder="Search Barang" name="cari">
											<span class="material-input"></span>
										</div>
										<button type="submit" class="btn btn-white btn-round btn-just-icon">
											<i class="material-icons">search</i><div class="ripple-container"></div>
										</button>
									</form>
								</div>
						
						<div class="col-md-12">
	                        <div class="card">
	                            <div class="card-header" data-background-color="purple">
	                                <h4 class="title">Donasi Barang</h4>
	                                <p class="category">Donasi Barang kepada panti asuhan</p>
	                            </div>
	                            <div class="card-content table-responsive">
	                                <table class="table">
	                                    <thead class="text-primary">
	                                    	<th>Nama Donatur</th>
	                                    	<th>Nama Panti Asuhan</th>
	                                    	<th>Nama Barang</th>
											<th>Tanggal Permintaan</th>
											<th>Status Donasi</th>
											<th>Action</th>
	                                    </thead>
										<?php
										$start = 0;
										foreach ($donasi_barang_data as $get_data)
										{
										?>
	                                    <tbody>
	                                        <tr>
	                                        	<td><?php echo $get_data->nama_donatur?></td>
	                                        	<td><?php echo $get_data->nama_panti_asuhan?></td>
	                                        	<td><?php echo $get_data->nama_donasi_barang?></td>
												<td><?php echo $get_data->tanggal_donasi_barang?></td>
												<td><?php echo $get_data->status_donasi_barang?></td>
												<td class="td-actions text-right">
													<?php 
													echo anchor(site_url('detail_donasi/read/'.$get_data->id_donasi_barang),'<button type="button" rel="tooltip" title="Read More" class="btn btn-info btn-simple btn-xs">
														<i class="material-icons">visibility</i>
													</button>'); 
													?>
													<button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs" data-toggle="modal" data-target="#myModalHapusBarang" onclick="SaveIdBarang(<?php echo $get_data->id_donasi_barang ?>)">
														<i class="material-icons">close</i>
													</button>
												</td>
	                                        </tr>
	                                    </tbody>
										<?php
										}
										?>
	                                </table>

	                            </div>
	                        </div>
							<div class="text-center">
								<ul class="pagination pagination-info">
									<?php 
										echo '<li><a href="javascript:void(0);">' . $this->pagination->create_links() .'</a></li>';
									?>
								</ul>
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
	<div class="modal fade" id="myModalHapusDana" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Peringatan!!!</h4>
				</div>
				<div class="modal-body">
					<p>Apakah anda yakin akan mengahapus Donasi Dana ini?
					</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default btn-simple" onclick="DeleteDana()">Ya</button>
					<button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Tidak</button>
				</div>
			</div>
		</div>
	</div>
	<!--  End Modal -->
	
	<!-- Sart Modal Hapus -->
	<div class="modal fade" id="myModalHapusBarang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Peringatan!!!</h4>
				</div>
				<div class="modal-body">
					<p>Apakah anda yakin akan mengahapus Donasi Barang ini?
					</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default btn-simple" onclick="DeleteBarang()">Ya</button>
					<button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Tidak</button>
				</div>
			</div>
		</div>
	</div>
	<!--  End Modal -->
	
	
	<!-- Sart Modal Detail Data Donasi Dana -->
	<div class="modal fade" id="myModalDetailDana" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					<i class="material-icons">clear</i>
				</button>
					<h4 class="modal-title">Detail Donasi Dana</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label class="control-label">Nama Panti Asuhan</label>
						<input type="text" name="nama_panti_asuhan" class="form-control" disabled>
					</div>
					<div class="form-group">
						<label class="control-label">Nama Donatur</label>
						<input type="text" name="nama_donatur" class="form-control" disabled>
					</div>
					<div class="form-group">
						<label class="control-label">Tanggal Donasi</label>
						<input type="text" name="tanggal_donasi_dana" class="form-control" disabled>
					</div>
					<div class="form-group">
						<label class="control-label">Nominal</label>
						<input type="text" name="nominal_donasi_dana" class="form-control" disabled>
					</div>
					<div class="form-group">
						<label class="control-label">Gambar Bukti</label>
						<img class="img-rounded" name="foto" src="<?php echo base_url('image/bukti/') ;?>" width="200px" height="125px"/>
					</div>
					<div class="form-group">
						<label class="control-label">Status</label>
						<input type="text" name="status_donasi_dana" class="form-control" disabled>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--  End Modal -->
	
	<!-- Sart Modal Detail Data Donasi Barang
	<div class="modal fade" id="myModalDetailBarang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					<i class="material-icons">clear</i>
				</button>
					<h4 class="modal-title">Detail Donasi Barang</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label class="control-label">Nama Panti Asuhan</label>
						<input type="text" name="nama_panti_asuhanb" class="form-control" disabled>
					</div>
					<div class="form-group">
						<label class="control-label">Nama Donatur</label>
						<input type="text" name="nama_donaturb" class="form-control" disabled>
					</div>
					<div class="form-group">
						<label class="control-label">Judul Donasi Barang</label>
						<input type="text" name="nama_donasi_barang" class="form-control" disabled>
					</div>
					<div class="form-group">
						<label class="control-label">Tanggal Donasi</label>
						<input type="text" name="tanggal_donasi_barang" class="form-control" disabled>
					</div>
					<div class="form-group">
						<label class="control-label">Jam Donasi Barang</label>
						<input type="text" name="jam_donasi_barang" class="form-control" disabled>
					</div>
					<div class="form-group">
						<label class="control-label">Deskripsi Barang</label>
						<textarea type="text" rows="3" name="deskripsi_donasi_barang" class="form-control" disabled></textarea>
					</div>
					<div class="form-group">
						<label class="control-label">Status</label>
						<input type="text" name="status_donasi_barang" class="form-control" disabled>
					</div>
				</div>
			</div>
		</div>
	</div> -->
	<!--  End Modal -->
	
<script type="text/javascript">

function SaveIdDana(id)
{
	//alert(id);
	$.ajax({
		type: "GET",
		url: "<?php echo site_url('getid_dana'); ?>",
		data: "id_donasi_dana="+id
	}).done(function( msg ) {
	});
}

function DeleteDana()
{
	$.ajax({
		type: "GET",
		url: "<?php echo site_url('delete_dana'); ?>"
	}).done(function( msg ) {
		window.location.href = "<?php echo site_url('donasi'); ?>";
	});
}


function ViewDataDana(id_donasi_dana)
{
	//alert(id_donasi_dana);
	$.ajax({
        url : "<?php echo site_url('Admin_Donasi/ajax_view')?>/" + id_donasi_dana,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
			$('[name="id_donasi_dana"]').val(data.id_donasi_dana);
            $('[name="nominal_donasi_dana"]').val(data.nominal_donasi_dana);
			$('[name="tanggal_donasi_dana"]').val(data.tanggal_donasi_dana);
            $('[name="status_donasi_dana"]').val(data.status_donasi_dana);
            $('[name="nama_panti_asuhan"]').val(data.nama_panti_asuhan);
			$('[name="nama_donatur"]').val(data.nama_donatur);
			$('[name="foto"]').attr('src',"<?php echo base_url();?>image/bukti/"+data.foto_bukti_transfer);
            $('#myModalDetailDana').modal('show'); // show bootstrap modal when complete loaded
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function SaveIdBarang(idb)
{
	//alert(idb);
	$.ajax({
		type: "GET",
		url: "<?php echo site_url('getid_barang'); ?>",
		data: "id_donasi_barang="+idb
	}).done(function( msg ) {
	});
}

function DeleteBarang()
{
	$.ajax({
		type: "GET",
		url: "<?php echo site_url('delete_barang'); ?>"
	}).done(function( msg ) {
		window.location.href = "<?php echo site_url('donasi'); ?>";
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
