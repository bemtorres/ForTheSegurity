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
						<h4 class="page-title">Nueva Institución</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
							
						</ul>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Fomulario Nueva Institución</div>
								</div>
								<form action="Controlador/Cinstitucion.php" method="post">
									<div class="card-body">
									
										<div class="form-group">
											<label for="text1">Nombre de institución</label>
											<input type="text" class="form-control" id="text1" name="username" placeholder="">
										</div>							
									</div>
									<div class="card-action">
										<button type="submit" class="btn btn-success pull-rigth">Agregar</button>
									</div>
								</form>
							</div>							
						</div>					
					</div>
				</div>
            </div>
    </div>


<?php require_once('footer.php'); ?>