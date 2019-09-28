
<?php 
    session_start();

    if (!isset($rootDir)){
        $rootDir = $_SERVER['DOCUMENT_ROOT'];
    }
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
    $instituciones = InstitucionDAO::buscarAll(); 
    $mensaje=0;
    if(isset($_SESSION['mensaje_institucion'])){
       $mensaje = $_SESSION['mensaje_institucion'];
       $_SESSION['mensaje_institucion'] = null;
    }
	
  ?>

<?php require_once('layout.php'); ?>
    
    <div class="main-panel">
      	
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Todas las Instituciones</h4>
                    <ul class="breadcrumbs">
                        <li class="nav-home">
                            <a href="home.php">
                                <i class="flaticon-home"></i>
                            </a>
                            
                        </li>				
                    </ul>
                </div>
                
                <div class="row">
                    <?php if($mensaje==1){ ?>
                    <div class="col-md-12">
                        <div class="alert alert-success" role="alert">
                            Se ha agregado correctamente.
                        </div>
                    </div>
                    <?php } ?>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                        <div class="d-flex align-items-center">
                                            <h4 class="card-title">Tabla de Instituciones</h4>
                                            <a href="nuevoInstitucion.php" class="btn btn-success btn-round ml-auto"><i class="fa fa-plus"> Nueva Institución</i></a>
                                        </div>
                                    </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="basic-datatables" class="display table table-striped table-hover" >
                                        <thead>
                                            <tr>
                                                <th>Institución</th>
                                                <th>Correo</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Institución</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php  foreach ($instituciones as $i) { 
                                                $u = UsuarioDAO::buscar($i->getId_usuario()); ?>
                                            <tr>
                                                <td><?php echo $u->getNombre() ?></td>
                                                <td><?php echo $u->getCorreo() ?></td>
                                                <th>
                                                    <a href="" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                                    <form action="" method="post">
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                                    </form>
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