
<?php 
    session_start();

    if (!isset($rootDir)){
        $rootDir = $_SERVER['DOCUMENT_ROOT'];
    }
    require_once ($rootDir . "/DAO/InstitucionDAO.php");
    require_once ($rootDir . "/DAO/UsuarioDAO.php");

    $instituciones = InstitucionDAO::buscarAll();
   
    // $clientes = ClienteDAO::buscarAll();
  

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