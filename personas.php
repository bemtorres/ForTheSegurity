
<?php 
    session_start();

    if (!isset($rootDir)){
        $rootDir = $_SERVER['DOCUMENT_ROOT'];
    }
    require_once ($rootDir . "/DAO/PersonaDAO.php");
    require_once ($rootDir . "/DAO/UsuarioDAO.php");

    $personas = PersonaDAO::buscarAll(); 

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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                        <div class="d-flex align-items-center">
                                            <h4 class="card-title">Tabla de Empleados</h4>
                                            <a href="nuevoUsuario.php" class="btn btn-success btn-round ml-auto"><i class="fa fa-plus"> Nuevo Empleados</i></a>
                                        
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
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Run</th>
                                                <th>Nombre Completo</th>
                                                <th>Correo</th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php  foreach ($personas as $p) { 
                                                $u = UsuarioDAO::buscar($i->getId_usuario()); ?>
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