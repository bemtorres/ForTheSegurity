
<?php 
    session_start();

    if (!isset($rootDir)){
        $rootDir = $_SERVER['DOCUMENT_ROOT'];
    }
    require_once ($rootDir . "/DAO/PersonaDAO.php");
    require_once ($rootDir . "/DAO/UsuarioDAO.php");
    require_once ($rootDir . "/DAO/InstitucionDAO.php");
    require_once ($rootDir . "/DAO/Detalle_persona_instDAO.php");

	$nombreUSuario  ="";
	$cargo  ="";
	$id=0;
	if(isset($_SESSION['id_acceso'])){
		$usuario = UsuarioDAO::buscar($_SESSION['id_acceso']);
        $nombreUSuario = $usuario->getNombre();
        $id_ins = $_SESSION['id_inst'];
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
    
    
        $per = Detalle_persona_instDAO::busarPersonaIns($id_ins);
        $personas = array();
        foreach ($per as $p) {
            $persona  = PersonaDAO::buscar($p->getId_persona());
            array_push($personas,$persona);
        }

    // Mensajes
    $mensaje=0;
    if(isset($_SESSION['mensaje_institucion'])){
       $mensaje = $_SESSION['mensaje_institucion'];
       $_SESSION['mensaje_institucion'] = null;
    }

  ?>
  
<?php require_once('layout.php'); ?>
<script>
    function validarRut(string) {//solo letras y numeros
      var out = '';
      //Se añaden las letras validas
      var filtro = '1234567890Kk';//Caracteres validos

      for (var i = 0; i < string.length; i++)
        if (filtro.indexOf(string.charAt(i)) != -1)
          out += string.charAt(i).toUpperCase();
      return out;
    }   
  </script>  
    <div class="main-panel">
      	
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Personas registradas en <?php echo $usuario->getNombre() ?></h4>
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
                    <?php if($mensaje==1){ ?>
                        <div class="col-md-12">
                            <div class="alert alert-danger" role="alert">
                                Error Intente Nuevamente.
                            </div>
                        </div>
                    <?php } ?>
                
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="basic-datatables" class="display table table-striped table-hover" >
                                        <thead>
                                            <tr>
                                                <th>Run</th>
                                                <th>Nombre Completo</th>
                                                <th>Correo</th>
                                                <th>Sexo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php  foreach ($personas as $p) { 
                                                $u = UsuarioDAO::buscar($p->getId_usuario()); ?>
                                            <tr>
                                                <td><?php echo $p->getRut() ?></td>
                                                <td><?php echo $u->getNombre() . " " . $p->getApellidos() ?></td>
                                                <td><?php echo $u->getCorreo() ?></td>
                                                <td><?php if($p->getSexo()==1) {echo "Hombre";}else{echo "Mujer";}?></td>
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