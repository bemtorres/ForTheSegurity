<?php 
    session_start();

    if (!isset($rootDir)){
        $rootDir = $_SERVER['DOCUMENT_ROOT'];
    }
	require_once ($rootDir . "/DAO/OrientacionDAO.php");	
	require_once ($rootDir . "/DAO/InstitucionDAO.php");
	require_once ($rootDir . "/DAO/UsuarioDAO.php");

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

	<div class="main-panel">
		<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Nueva area de pregunta</h4>
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
									<div class="card-title">Fomulario Nueva Area</div>
								</div>
								<form action="Controlador/Corientacion.php" method="post">
									<div class="card-body">
									<div class="form-group">
											<label for="text1">Area</label>
											<input type="text" class="form-control" id="text1" name="nombre" placeholder="">
										</div>		
									</div>
									<div class="card-action">
										<button type="submit" name="opcion" value="agregar" class="btn btn-success pull-rigth">Agregar</button>
                                    </div>
								</form>
							</div>							
						</div>					
					</div>
				</div>
            </div>
    </div>


<?php require_once('footer.php'); ?>