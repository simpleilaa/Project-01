<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>
		User Login
	</title>
	<!-- Favicon -->
	<link href="<?php echo base_url();?>assets/img/brand/favicon.png" rel="icon" type="image/png">
	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<!-- Icons -->
	<link href="<?php echo base_url();?>assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
	<link href="<?php echo base_url();?>assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
	<!-- CSS Files -->
	<link href="<?php echo base_url();?>assets/css/argon-dashboard.css?v=1.1.0" rel="stylesheet" />
</head>
<style type="text/css">
	body{
		background-image: url('<?php echo base_url();?>assets/img/bg.jpg');
		background-size: cover;
		background-repeat: no-repeat;
		height: 100%;
		font-family: 'Numans', sans-serif;
	}
</style>
<body>
	<div class="main-content">

		<!-- Header -->
		<div class="header py-7 py-lg-8">

				<!-- <div class="separator separator-bottom separator-skew zindex-100">
					<svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
						<polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
					</svg>
				</div> -->
			</div>
			<!-- Page content -->
			<div class="container mt--8 pb-5">
				<div class="row justify-content-center">
					<div class="col-lg-5 col-md-7">
						<div class="card bg-secondary shadow border-0">
<!-- 						<div class="card-header bg-transparent pb-5">
							<div class="text-muted text-center mt-2 mb-3"><small>Sign in with</small></div>
							<div class="btn-wrapper text-center">
								<a href="#" class="btn btn-neutral btn-icon">
									<span class="btn-inner--icon"><img src="<?php //echo base_url();?>assets/img/icons/common/github.svg"></span>
									<span class="btn-inner--text">Github</span>
								</a>background{opacity: 0.5;}
								<a href="#" class="btn btn-neutral btn-icon">
									<span class="btn-inner--icon"><img src="<?php //echo base_url();?>assets/img/icons/common/google.svg"></span>
									<span class="btn-inner--text">Google</span>
								</a>
							</div>
						</div> -->
						<div class="card-body px-lg-5 py-lg-5" style="background{opacity: 0.2;}">
							
							<form role="form" style="" method="post" action="<?php echo base_url('login/login'); ?>">
								<div class="form-group mb-3">
									<div class="input-group input-group-alternative">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="ni ni-email-83"></i></span>
										</div>
										<input class="form-control" placeholder="Username" type="text" name="username">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group input-group-alternative">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
										</div>
										<input class="form-control" placeholder="Password" type="password" name="password">
									</div>
								</div>
								
								<div class="text-right">
									
									<a href="<?php echo base_url('channels'); ?>"><input type="submit" class="btn btn-primary my-4" value="Login"></a>
								</div>
							</form>

						</div>
					</div>
					
				</div>
			</div>
		</div>
		<footer class="py-5">
			<div class="container">
				<div class="row align-items-center justify-content-xl-between">
					<div class="col-xl-6">
					</div>
				</div>
			</div>
		</footer>
	</div>
	<!--   Core   -->
	<script src="../assets/js/plugins/jquery/dist/jquery.min.js"></script>
	<script src="../assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<!--   Optional JS   -->
	<!--   Argon JS   -->
	<script src="../assets/js/argon-dashboard.min.js?v=1.1.0"></script>
	<script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
	<script>
		window.TrackJS &&
		TrackJS.install({
			token: "ee6fab19c5a04ac1a32a645abde4613a",
			application: "argon-dashboard-free"
		});
	</script>
</body>

</html>