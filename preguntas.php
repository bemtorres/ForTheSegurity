<?php 
    session_start();

    if (!isset($rootDir)){
        $rootDir = $_SERVER['DOCUMENT_ROOT'];
    }
    require_once ($rootDir . "/DAO/PreguntaDAO.php");
    require_once ($rootDir . "/DAO/OrientacionDAO.php");
    require_once($rootDir . "/DAO/InstitucionDAO.php");
    require_once($rootDir . "/DAO/UsuarioDAO.php");        
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
  ?>
<?php require_once('layout.php'); ?>
    
    <div class="main-panel">
      	
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Preguntas</h4>
                    <ul class="breadcrumbs">
                        <li class="nav-home">
                            <a href="home.php">
                                <i class="flaticon-home"></i>
                            </a>
                            
                        </li>				
                    </ul>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                        <div class="d-flex align-items-center">
                                            <h4 class="card-title">Tabla de Preguntas</h4>
                                            <a href="nuevoPregunta.php" class="btn btn-success btn-round ml-auto"><i class="fa fa-plus"> Nueva Pregunta</i></a>
                                        
                                        </div>
                                    </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="basic-datatables" class="display table table-striped table-hover" >
                                        <thead>
                                            <tr>
                                                <th>Pregunta</th>
                                                <th>#</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Pregunta</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php  foreach ($preguntas as $i) { 
                                                $u = PreguntaDAO::buscar($i->getId_pregunta());
                                                $ds = Detalle_preg_orienDAO::buscarAll2($u->getId_pregunta());
                                                $text = "";
                                                foreach ($ds as $d) {
                                                    $df = OrientacionDAO::buscar($d->getId_orientacion());
                                                    $text .= $df->getDescripcion() . " , ";
                                                }
                                               

                                                ?>
                                            <tr>
                                                <td><?php echo $u->getDescripcion() ?></td>
                                                <td><?php echo $text ?></td>
                                                <th>
                                                    <a href="alternativas.php?id=<?php echo $i->getId_pregunta() ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                                
                                                </th>
                                            </tr>
                                            <?php  } ?>
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