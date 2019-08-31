<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>
		Tracking
	</title>
	<!-- Favicon -->
	<link href="<?php echo base_url();?>/assets/img/brand/favicon.png" rel="icon" type="image/png">
	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<!-- Icons -->
	<link href="<?php echo base_url();?>/assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
	<link href="<?php echo base_url();?>/assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
	<!-- CSS Files -->
	<link href="<?php echo base_url();?>/assets/css/argon-dashboard.css?v=1.1.0" rel="stylesheet" />
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>
   <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
   integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
   crossorigin=""></script>
   <link href="<?php echo base_url();?>/assets/css/speedometer.css" rel="stylesheet">
   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="<?php echo base_url();?>/assets/js/speedometer.js"></script>

   <style>
       /* Set the size of the div element that contains the map */
      #map {
        height: 400px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
	   #mapid { height: 380px; }
	   /* .inin{padding:0px} */
    </style>
</head>

<body class="">
	<div class="main-content">
		<!-- Navbar -->
		<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
			<div class="container-fluid">
				<!-- Brand -->
				<a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.html">Logo</a>
				<!-- Form -->

				<!-- User -->
				<ul class="navbar-nav align-items-center d-none d-md-flex">
					<li class="nav-item dropdown">
						<a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<div class="media align-items-center">
								<span class="avatar avatar-sm rounded-circle">
									<img alt="Image placeholder" src="<?php echo base_url();?>//assets/img/theme/team-4-800x800.jpg">
								</span>
								<div class="media-body ml-2 d-none d-lg-block">
									<span class="mb-0 text-sm  font-weight-bold"><?php echo $this->session->userdata('username');?></span>
								</div>
							</div>
						</a>
						<div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
							<div class=" dropdown-header noti-title">
								<h6 class="text-overflow m-0">Welcome!</h6>
							</div>
							<!-- <a href="#" class="dropdown-item">
								<i class="ni ni-single-02"></i>
								<span>My profile</span>
							</a> -->
							<a href="#" class="dropdown-item">
								<i class="ni ni-settings-gear-65"></i>
								<span>Settings</span>
							</a>
							<!-- <a href="./examples/profile.html" class="dropdown-item">
								<i class="ni ni-calendar-grid-58"></i>
								<span>Activity</span>
							</a>
							<a href="./examples/profile.html" class="dropdown-item">
								<i class="ni ni-support-16"></i>
								<span>Support</span>
							</a> -->
							<div class="dropdown-divider"></div>
							<a href="<?php echo base_url('login/logout');?>" class="dropdown-item">
								<i class="ni ni-user-run"></i>
								<span>Logout</span>
							</a>
						</div>
					</li>
				</ul>
			</div>
		</nav>
		<!-- End Navbar -->
		<!-- Header -->

		<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
			<div class="container-fluid">
				<div class="header-body">
					<!-- Card stats -->

				</div>
			</div>
		</div>
