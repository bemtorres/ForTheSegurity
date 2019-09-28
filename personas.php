
<?php 
    session_start();

    if (!isset($rootDir)){
        $rootDir = $_SERVER['DOCUMENT_ROOT'];
    }
    require_once ($rootDir . "/DAO/PersonaDAO.php");
    require_once ($rootDir . "/DAO/UsuarioDAO.php");
    require_once ($rootDir . "/DAO/InstitucionDAO.php");

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
    $personas = PersonaDAO::buscarAll(); 

    // Mensajes
    $mensaje=0;
    if(isset($_SESSION['mensaje_persona'])){
       $mensaje = $_SESSION['mensaje_persona'];
       $_SESSION['mensaje_persona'] = null;
    }

  ?>
<?php require_once('layout.php'); ?>
    
    <div class="main-panel">
      	
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Empleados</h4>
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
                                            <h4 class="card-title">Tabla de Empleados</h4>
                                            <a href="nuevoPersona.php" class="btn btn-success btn-round ml-auto"><i class="fa fa-plus"> Nuevo Empleados</i></a>
                                        
                                        </div>
                                    </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="basic-datatables" class="display table table-striped table-hover" >
                                        <thead>
                                            <tr>
                                                <th>Run</th>
                                                <th>Nombre Completo</th>
                                                <th>Correo</th>
                                                <th>Sexo</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Run</th>
                                                <th>Nombre Completo</th>
                                                <th>Correo</th>
                                                <th>Sexo</th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php  foreach ($personas as $p) { 
                                                $u = UsuarioDAO::buscar($p->getId_usuario()); ?>
                                            <tr>
                                                <td><?php echo $p->getRut() ?></td>
                                                <td><?php echo $u->getNombre() . " " . $p->getApellidos() ?></td>
                                                <td><?php echo $u->getCorreo() ?></td>
                                                <td><?php if($p->getSexo()==1) {echo "Hombre";}else{echo "Mujer";}?></td>
                                                
                                            
                                                <th></th>
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