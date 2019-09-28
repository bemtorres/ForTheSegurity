<?php 
    session_start();

    if (!isset($rootDir)){
        $rootDir = $_SERVER['DOCUMENT_ROOT'];
    }
    require_once ($rootDir . "/DAO/PreguntaDAO.php");
    require_once ($rootDir . "/DAO/OrientacionDAO.php");

    $preguntas = PreguntaDAO::buscarAll(); 

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
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Pregunta</th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php  foreach ($preguntas as $i) { 
                                                $u = PreguntaDAO::buscar($i->getId_pregunta()); ?>
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