<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url();?>assets_main/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="<?php echo base_url();?>assets_main/img/favicon.png" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Berbagi_app - Berita</title>

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
	                <li class="active">
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
						<button class="btn btn-primary btn-round" data-toggle="modal" data-target="#myModalTambah">
	                      Tambah Berita
	                    </button>
					</div>
					<div class="collapse navbar-collapse">
						

						<form class="navbar-form navbar-right" role="search" action="<?php echo site_url('search_berita');?>" method="post">
							<div class="form-group  is-empty">
	                        	<input type="text" class="form-control" placeholder="Search" name="cari">
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
	                                <h4 class="title">Berita</h4>
	                                <p class="category">Berita yang diposting oleh panti asuhan</p>
	                            </div>
	                            <div class="card-content table-responsive">
	                                <table class="table">
	                                    <thead class="text-primary">
	                                    	<th>Nama Panti Asuhan</th>
	                                    	<th>Judul Berita</th>
											<th>Tanggal Berita</th>
	                                    	<th>Foto</th>
											<th>Action</th>
	                                    </thead>
										<?php
										$start = 0;
										foreach ($berita_data as $get_berita)
										{
										?>
	                                    <tbody>
	                                        <tr>
											
	                                        	<td><?php echo $get_berita->nama_panti_asuhan ?></td>
	                                        	<td><?php echo $get_berita->judul_berita ?></td>
												<td><?php echo $get_berita->tanggal_berita ?></td>
												<td><img src="<?php echo base_url('image/berita/'.$get_berita->foto_berita);?>" class="imgberita" width="200px" height="125px"></td>
												<td class="td-actions text-right">
													<button type="button" rel="tooltip" title="Read More" class="btn btn-info btn-simple btn-xs" onclick="ViewData(<?php echo $get_berita->id_berita ?>)">
														<i class="material-icons">visibility</i>
													</button>
													<button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-simple btn-xs" onclick="EditData(<?php echo $get_berita->id_berita ?>)">
														<i class="material-icons">edit</i>
													</button>
													<button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs" data-toggle="modal" data-target="#myModalHapus" onclick="SaveIdBerita(<?php echo $get_berita->id_berita ?>)">
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
	<div class="modal fade" id="myModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Peringatan!!!</h4>
				</div>
				<div class="modal-body">
					<p>Apakah anda yakin akan mengahapus Berita ini?
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
	<form class="form" action="<?php echo site_url('updateberita'); ?>" method="post" enctype="multipart/form-data">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					
					<h4 class="modal-title">Edit Berita</h4>
					<input type="hidden" name="id_berita" />
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label class="control-label">Judul Berita</label>
						<input type="text" name="judul_berita" class="form-control" required>
					</div>
					<div class="form-group">
						<label class="control-label">Isi Berita</label>
						<textarea name="isi_berita" class="form-control" rows="5" required></textarea>
					</div>
					<div class="input-group">
					</br>
					<label>Gambar Berita</label>
					
					<input type="file" class="btn btn-primary" name="foto_berita" id="foto_berita"/>
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
	
	<!-- Sart Modal Detail Data -->
	<div class="modal fade" id="myModalDetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					<i class="material-icons">clear</i>
				</button>
					<h4 class="modal-title">Detail Berita</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label class="control-label">Nama Panti Asuhan</label>
						<input type="text" name="nama_panti_asuhan" class="form-control" disabled>
					</div>
					<div class="form-group">
						<label class="control-label">Judul Berita</label>
						<input type="text" name="judul_berita" class="form-control" disabled>
					</div>
					<div class="form-group">
						<label class="control-label">Tanggal Posting</label>
						<input type="text" name="tanggal_berita" class="form-control" disabled>
					</div>
					<div class="form-group">
						<label class="control-label">Isi Berita</label>
						<textarea name="isi_berita" class="form-control" rows="5" disabled></textarea>
					</div>
					<div class="form-group">
						<label class="control-label">Gambar Berita</label>
						<img class="img-rounded" name="foto" src="<?php echo base_url('image/berita/') ;?>" width="200px" height="125px"/>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	<!--  End Modal -->
	
	<!-- Sart Modal Tamhah Data -->
	<form action="<?php echo site_url('insert_berita');?>" method="post" enctype="multipart/form-data">
	<div class="modal fade" id="myModalTambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					
					<h4 class="modal-title">Tambah Berita</h4>
				</div>
				<div class="modal-body">
					<div class="form-group label-floating">
						<label class="control-label">Judul Berita</label>
						<input type="text" id="judul_berita" name="t_judul_berita" class="form-control" required>
					</div>
					<div class="form-group label-floating">
						<label class="control-label">Isi Berita</label>
						<input type="text" id="isi_berita" name="t_isi_berita" class="form-control" required>
					</div>
					<div class="input-group">
					</br>
					<label>Gambar Berita</label>
					
					<input type="file" class="btn btn-primary" name="foto_berita" id="foto_berita" required/>
				</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary btn-round">Tambah</button>
					<button type="button" class="btn btn-primary btn-round" data-dismiss="modal">Batal</button>
				</div>
			</div>
		</div>
	</div>
	</form>
	<!--  End Modal -->
	
	
<script type="text/javascript">

function SaveIdBerita(id)
{
	$.ajax({
		type: "GET",
		url: "<?php echo site_url('getid_berita'); ?>",
		data: "id_berita="+id
	}).done(function( msg ) {
	});
}

function Delete()
{
	$.ajax({
		type: "GET",
		url: "<?php echo site_url('delete_berita'); ?>"
	}).done(function( msg ) {
		window.location.href = "<?php echo site_url('berita'); ?>";
	});
}

function ViewData(id_berita)
{
	$.ajax({
        url : "<?php echo site_url('Admin_Berita/ajax_view')?>/" + id_berita,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
			$('[name="id_berita"]').val(data.id_berita);
            $('[name="judul_berita"]').val(data.judul_berita);
			$('[name="tanggal_berita"]').val(data.tanggal_berita);
            $('[name="isi_berita"]').val(data.isi_berita);
            $('[name="nama_panti_asuhan"]').val(data.nama_panti_asuhan);
			$('[name="foto"]').attr('src',"<?php echo base_url();?>image/berita/"+data.foto_berita);
            $('#myModalDetail').modal('show'); // show bootstrap modal when complete loaded
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}



function EditData(id_berita)
{
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('Admin_Berita/ajax_edit')?>/" + id_berita,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="id_berita"]').val(data.id_berita);
            $('[name="judul_berita"]').val(data.judul_berita);
            $('[name="isi_berita"]').val(data.isi_berita);
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
