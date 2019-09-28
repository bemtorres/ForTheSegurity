<?php 
	session_start();
	if (!isset($rootDir)){
		$rootDir = $_SERVER['DOCUMENT_ROOT'];
	}
	require_once($rootDir . "/DAO/InstitucionDAO.php");
	require_once($rootDir . "/DAO/UsuarioDAO.php");
	
	require_once($rootDir . "/DAO/OrientacionDAO.php");

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
	$orientaciones = OrientacionDAO::buscarAll();
	$mensaje=0;
    if(isset($_SESSION['mensaje_p'])){
       $mensaje = $_SESSION['mensaje_p'];
       $_SESSION['mensaje_p'] = null;
    }
?>
<?php require_once('layout.php'); ?>

	<div class="main-panel">
		<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Nueva Pregunta</h4>
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
									<div class="card-title">Fomulario Nueva Pregunta</div>
								</div>
								<form action="Controlador/Cpregunta.php" method="post">
									<div class="card-body">
                                        <div class="form-group">
										    <label for="comment">Pregunta:</label>
										    <textarea class="form-control" id="comment" name="pregunta" rows="5"></textarea>
										</div>
										<?php foreach ($orientaciones as $o) { ?>
											<div class="form-check">
												<label class="form-check-label">
													<input class="form-check-input" type="checkbox"  name="items[]" value="<?php echo $o->getId_orientacion() ?>">
													<span class="form-check-sign"><?php echo $o->getDescripcion() ?></span>
												</label>
                            				</div>
										<?php } ?>
										
									</div>
									<div class="card-action">
										<button type="submit" class="btn btn-success pull-rigth" name="opcion" value="agregar" >Agregar</button>
                                    </div>
								</form>
							</div>							
						</div>					
					</div>
				</div>
            </div>
    </div>


<?php require_once('footer.php'); ?>