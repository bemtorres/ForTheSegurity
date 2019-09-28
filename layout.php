
<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Feel-U</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="/assets/img/logoICO.ico" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="/assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['/assets/css/fonts.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="/assets/css/azzara.min.css">
	<link rel="stylesheet" href="/assets/css/style.css">
	
	<link rel="stylesheet" href="/assets/css/animate.css">

</head>
<body data-background-color="bg3">
	<div class="wrapper">
	
		<div class="main-header" data-background-color="hackathon">
			<!-- Logo Header -->
			<div class="logo-header">
				
				<a href="home" class="logo text-white">
				
				<img src="/assets/img/Logo.png" alt="..." class="avatar-img rounded">
				
				<!-- <img src="/assets/img/Fell-U_logo.png" with="100%" alt="navbar brand" class="navbar-brand"> -->
                <!-- <strong>ForThe<em>Security</em></strong> -->
                    
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="fa fa-bars"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
				<div class="navbar-minimize">
					<button class="btn btn-minimize btn-rounded">
						<i class="fa fa-bars"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg">
				
				<div class="container-fluid">					
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">

						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
										
									<img src="/assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<li>
									<div class="user-box">
										<div class="avatar-lg"><img src="/assets/img/profile.jpg" alt="image profile" class="avatar-img rounded"></div>
										<div class="u-text">
											<?php echo $cargo ?>
											<p class="text-muted"><?php echo $correo ?></p>
										</div>
									</div>
								</li>
								<li>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#">Mi perfil</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#">Cambiar Contraseña</a>
									<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="/">Salir</a>
								</li>
							</ul>
						</li>
						
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar">
			
			<div class="sidebar-background"></div>
			<div class="sidebar-wrapper scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="/assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<?php echo $nombreUSuario ?>
									<span class="user-level"><?php echo $cargo ?></span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="#profile">
											<span class="link-collapse btn btn-block btn-hackathon-success text-white">Mi Perfil</span>
										</a>
									</li>
									<li>
										<a href="#edit">
											<span class="link-collapse btn btn-block btn-hackathon-warning text-white">Cambio de Contraseña</span>
										</a>
									</li>
									<li>
										<a href="/">
											<span class="link-collapse btn btn-block btn-hackathon-danger text-white">Salir</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<?php 
						if($usuario->getTipo_usuario()==1){
								require_once('nav.php');
						}elseif($usuario->getTipo_usuario()==2){
							require_once('nav_institucion.php');
						}?>
					
				</div>
			</div>
		</div>

