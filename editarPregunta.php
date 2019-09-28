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

	<div class="main-panel">
		<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Editar Pregunta</h4>
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
									<div class="card-title">Fomulario Editar Pregunta</div>
								</div>
								<form action="Controlador/Cpregunta.php" method="post">
									<div class="card-body">
									    <div class="form-group">
										    <label for="comment">Pregunta:</label>
										    <textarea class="form-control" id="comment" rows="5">

										    </textarea>
										</div>
										<div class="form-check">
                                			<label class="form-check-label">
                                    		<input class="form-check-input" type="checkbox" value="">
                                    		<span class="form-check-sign">Area/Orientacion</span>
                               			 	</label>
                            			</div>
                                        <div class="card-action">
										<button type="submit" class="btn btn-success pull-rigth">Guardar Cambios</button>
									</div>
								</form>
							</div>							
						</div>					
					</div>
				</div>
            </div>
    </div>


<?php require_once('footer.php'); ?>