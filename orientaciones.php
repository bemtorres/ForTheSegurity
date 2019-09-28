<?php 
    session_start();
    
    if (!isset($rootDir)){
        $rootDir = $_SERVER['DOCUMENT_ROOT'];
    }
    require_once ($rootDir . "/DAO/OrientacionDAO.php");

    $Orientaciones = OrientacionDAO::buscarAll(); 

?>

<?php require_once('layout.php'); ?>
    
    <div class="main-panel">
      	
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Area de preguntas</h4>
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
                                            <h4 class="card-title">Tabla de Areas</h4>
                                            <a href="nuevoOrientacion.php" class="btn btn-success btn-round ml-auto"><i class="fa fa-plus"> Nueva Area</i></a>
                                        
                                        </div>
                                    </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="basic-datatables" class="display table table-striped table-hover" >
                                        <thead>
                                            <tr>
                                                <th>Area</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>									
                                                <th>Area</th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php  foreach ($Orientaciones as $i) { 
                                                $u = OrientacionDAO::buscar($i->getId_Orientacion()); ?>
                                                <tr>
                                                <td><?php echo $u->getDescripcion() ?></td>
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