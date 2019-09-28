<?php 
    session_start();

    if (!isset($rootDir)){
        $rootDir = $_SERVER['DOCUMENT_ROOT'];
    }
    require_once ($rootDir . "/DAO/PreguntaDAO.php");
    require_once ($rootDir . "/DAO/OrientacionDAO.php");
    require_once($rootDir . "/DAO/InstitucionDAO.php");
    require_once($rootDir . "/DAO/UsuarioDAO.php");      
    require_once($rootDir . "/DAO/AlternativaDAO.php");      
    require_once($rootDir . "/DAO/Detalle_preg_orienDAO.php");

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
	$mensaje=0;
    if(isset($_SESSION['mensaje_p'])){
       $mensaje = $_SESSION['mensaje_p'];
       $_SESSION['mensaje_p'] = null;
    }

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $pregunta  = PreguntaDAO::buscar($id);
        if($pregunta->getId_pregunta()==$id){
            $id_pregunta =  $pregunta->getId_pregunta();
            $alternativas = AlternativaDAO::buscarAll2($id_pregunta);
        }else{
            header('Location: preguntas.php');
        }
       
    }else{
        header('Location: preguntas.php');
    }
  ?>
<?php require_once('layout.php'); ?>
    
    <div class="main-panel">
      	
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Alternativas</h4>
                    <ul class="breadcrumbs">
                        <li class="nav-home">
                            <a href="home.php">
                                <i class="flaticon-home"></i>
                            </a>
                            
                        </li>				
                    </ul>
                </div>
                
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                        <div class="d-flex align-items-center">
                                            <h4 class="card-title"> Pregunta : <?php  echo $pregunta->getDescripcion() ?></h4>
                                            <button type="button" class="btn btn-success btn-round ml-auto" data-toggle="modal" data-target="#exampleModal">
                                                        <i class="fa fa-plus"> Agregar</i>
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Agregar Alternativa</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form action="Controlador/Calternativa.php" method="post">
                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                                <label for="text1">Alternativa</label>
                                                                                <input type="text" class="form-control" id="text1" name="alternativa" placeholder="">
                                                                        </div>
                                                                        <input type="text" hidden class="hidden" name="id_pregunta" value="<?php echo $id_pregunta ?>">
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                                        <button type="submit" name="opcion" value="agregar" class="btn btn-primary">Guardar Cambios</button>
                                                                    </div>
                                                                </form>
                                                          
                                                            </div>
                                                        </div>
                                                    </div>
                                        </div>
                                    </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="basic-datatables" class="display table table-striped table-hover" >
                                        <thead>
                                            <tr>
                                                <th>Alternativas</th>
                                                <!-- <th>#</th>
                                                <th></th> -->
                                            </tr>
                                        </thead>
                                        <!-- <tfoot>
                                            <tr>
                                                <th>Pregunta</th>
                                                <th>#</th>
                                                <th></th>
                                            </tr>
                                        </tfoot> -->
                                        <tbody>
                                            <?php foreach ($alternativas as $a) { ?>                                               
                                            <tr>    
                                                <th><?php echo $a->getDescripcion() ?></th>
                                                    <!-- <th>#</th>
                                                    <th></th> -->
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    

                </div>
            </div>
        </div>
			
    
    </div>
<?php require_once('footer.php'); ?>