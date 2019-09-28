<!DOCTYPE html>
<html lang="en">
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
</head>
<body class="login" data-background-color="bg3">
	<div class="wrapper wrapper-login">
		<div class="container container-login animated fadeIn">
			<h3 class="text-center">Iniciar Sesión</h3>
			<form action="Controlador/CLogin.php" method="post">
				<div class="login-form">
					<div class="form-group">
						<label for="username" class="placeholder"><b>Usuario</b></label>
						<input id="username" name="username" type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="password" class="placeholder"><b>Contraseña</b></label>
						
						<div class="position-relative">
							<input id="password" name="password" type="password" class="form-control" required>
							<div class="show-password">
								<i class="flaticon-interface"></i>
							</div>
						</div>
					</div>
					<div class="form-group form-action-d-flex mb-3">
					
						<button type="submit" class="btn btn-primary col-md-5 float-right mt-3 mt-sm-0 fw-bold">Ingresar</button>
					</div>
				
				</div>
			</form>
		
		</div>
	</div>
	<script src="/assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="/assets/js/core/popper.min.js"></script>
	<script src="/assets/js/core/bootstrap.min.js"></script>
	<script src="/assets/js/ready.js"></script>
	
	<script src="js/app.js"></script>

</body>
</html>