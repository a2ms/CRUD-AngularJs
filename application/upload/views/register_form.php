<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login Form Forum PWL 7415</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" type="text/css" href=" <?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css">
		    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/form-elements1.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style1.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->


    </head>

    <body>

	
	
        <!-- Top content -->
        <div class="top-content">

            <div class="inner-bg">
                <div class="container">
                    <div class="row">
				
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>Register Form</strong></h1>
                            <div class="description">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Register to our forum</h3>
	<?php if(isset($_SESSION)) {
      if($this->session->userdata('message')!='')
        {
          echo '<div class="alert alert-info"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' .$this->session->userdata('message'). '</div>';
        }
    } ?>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-arrow-right"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form role="form" action="<?php echo site_url('signupaction'); ?>" method="post" class="login-form" enctype="multipart/form-data">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-username">Email</label>
			                        	<input type="text" name="email" placeholder="Email..." class="form-username form-control" id="email">
			                        </div>
									<div class="form-group">
			                        	<label class="sr-only" for="form-password">Password</label>
			                        	<input type="password" name="password" placeholder="Password..." class="form-password form-control" id="password">
			                        </div>
									<div class="form-group">
			                        	<label class="sr-only" for="form-password">Confirm Password</label>
			                        	<input type="password" name="password_confirm" placeholder="Confirm Password..." class="form-password form-control" id="password_confirm">
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-name">Nama</label>
			                        	<input type="text" name="nama" placeholder="Name..." class="form-nama form-control" id="nama">
			                        </div>
									<div class="form-group">
										<input type="file"  class="btn btn-link-2" name="gambar" id="gambar"/>
			                        </div>
			                        <button type="submit" class="btn">Sign Up!</button>

			                    </form>
		                    </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 social-login">
                        	<h3>Already have an account? <a href="<?php echo base_url('index.php');?>">Login Here.!!!</a></h3>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <!-- Javascript -->
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.backstretch.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/scripts.js"></script>

        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>
