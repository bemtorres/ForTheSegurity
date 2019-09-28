<?php 
	session_start();
	if (!isset($rootDir)){
		$rootDir = $_SERVER['DOCUMENT_ROOT'];
	}
	require_once($rootDir . "/DAO/InstitucionDAO.php");
	require_once($rootDir . "/DAO/UsuarioDAO.php");
	require_once($rootDir . "/DAO/AlternativaDAO.php");
	require_once($rootDir . "/DAO/PreguntaDAO.php");

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
	$preguntas = PreguntaDAO::buscarAll();
	$total = sizeof($preguntas);
	
	$i = mt_rand(1,$total);
	$x =1;
	foreach ($preguntas as $pre) {
		if($x==$i){
			$preg=$pre;
			break;
		}
		$x +=1;
	}
	$id_persona = $_SESSION['id_persona']; 
	// $pass = substr(str_shuffle("0123456789"), 0,5); 
	$pregunta = $preg->getDescripcion();
	$alternativas = array();
	$alternativas = AlternativaDAO::buscarAll2($preg->getId_pregunta());

?>
<?php require_once('layout.php'); ?>
    
		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<!-- <div class="page-header">
						<h4 class="page-title">Home</h4>
					</div> -->
					<div class="page-category">
							<!-- Button trigger modal -->
							<center>
								<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModal">
									Responder Pregunta
								</button>
							</center>
					

						<img id="img2" src="assets/img/Logo.png" class="img-responsive" width="100%"  alt="" >

					

						<!-- Modal -->
						<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Responde la siguiente pregunta</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<form action="Controlador/Crespuesta.php" method="post">
										<div class="modal-body">
											<div class="form-check">
											<h3><?php echo $pregunta ?></h3>	
											<label></label><br/>
											<?php foreach ($alternativas as $a) {?>
													<div class="form-group">
														<input class="form-radio-input" type="radio" name="id_respuesta" value="<?php echo $a->getId_alternativa() ?>">
														<span class="form-radio-sign"><?php echo $a->getDescripcion() ?></span>	
													</div>
											<?php } ?>										
											</div>	
											<input type="text" hidden class="hidden" name="id_persona" value="<?php echo $id_persona ?>">
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
											<button type="submit" name="opcion" value="agregar" class="btn btn-primary">Enviar</button>
										</div>
									</form>									
								</div>
							</div>
					</div>
				</div>
			</div>			
		</div>
	
<?php require_once('footer.php'); ?>