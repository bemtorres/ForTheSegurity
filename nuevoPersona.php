<?php 
	session_start();
	if (!isset($rootDir)){
		$rootDir = $_SERVER['DOCUMENT_ROOT'];
	}
	require_once($rootDir . "/DAO/InstitucionDAO.php");
	require_once($rootDir . "/DAO/UsuarioDAO.php");

	$nombreUSuario  ="";
	$cargo  ="";
	$id=0;
	if(isset($_SESSION['id_acceso'])){
		$usuario = UsuarioDAO::buscar($_SESSION['id_acceso']);
		$nombreUSuario = $usuario->getNombre();
		switch ($usuario->getTipo_usuario()) {
            case 1:
				$cargo = "Administrador";
                break;
            case 2:
                $cargo = "Institución";
                break;
            case 3:
                $cargo = "Trabajadores";
                break;
		}
		$correo = $usuario->getCorreo();
	}else{
		// home
	}

?>
<?php require_once('layout.php'); ?>
<script>
    function validarRut(string) {//solo letras y numeros
      var out = '';
      //Se añaden las letras validas
      var filtro = '1234567890Kk';//Caracteres validos

      for (var i = 0; i < string.length; i++)
        if (filtro.indexOf(string.charAt(i)) != -1)
          out += string.charAt(i).toUpperCase();
      return out;
    }   
  </script>
	<div class="main-panel">
		<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Nuevo Usuario</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
							
						</ul>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Fomulario Nuevo Usuario</div>
								</div>
								<form action="Controlador/Cpersona.php" method="post">
									<div class="card-body">
										<div class="form-group">
											<label for="text1">Rut</label>
											<input type="text" class="form-control" id="text1" name="run" placeholder="19000111K (Sin Guión y puntos)" maxlength="9" onkeyup="this.value = validarRut(this.value)" pattern=".{8,9}" title="Requiere 8 a 9 caracteres">
										</div>
										<div class="form-group">
											<label for="text1">Nombre</label>
											<input type="text" class="form-control" id="text1" name="username" placeholder="">
										</div>		
										<div class="form-group">
												<label for="text1">Apellido</label>
												<input type="text" class="form-control" id="text1" name="username" placeholder="">
										</div>
										
										<div class="form-group">
											<label for="text1">Correo</label>
											<input type="text" class="form-control" id="text1" name="nombres" placeholder="">
										</div>
										
										
													
									</div>
									<div class="card-action">
										<button type="submit" class="btn btn-success pull-rigth">Agregar</button>
									</div>
								</form>
							</div>							
						</div>					
					</div>
				</div>
            </div>
    </div>


<?php require_once('footer.php'); ?>