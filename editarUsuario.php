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
						<h4 class="page-title">Editar Empleado</h4>
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
									<div class="card-title">Fomulario Editar Empleado</div>
								</div>
								<form action="Controlador/Cusuario.php" method="post">
									<div class="card-body">
									
										<div class="form-group">
											<label for="text1">Nombre de usuario</label>
											<input type="text" class="form-control" id="text1" name="username" placeholder="">
										</div>
										<div class="form-group">
											<label for="text1">Run</label>
											<input type="text" class="form-control" id="text1" name="run" placeholder="19000111K (Sin Guión y puntos)" maxlength="9" onkeyup="this.value = validarRut(this.value)" pattern=".{8,9}" title="Requiere 8 a 9 caracteres">
										</div>
										<div class="form-group">
											<label for="text1">Nombre</label>
											<input type="text" class="form-control" id="text1" name="nombres" placeholder="">
										</div>
										
										<div class="form-group">
											<label for="text1">Apellido</label>
											<input type="date" class="form-control" id="text1" name="apellidos" placeholder="">
										</div>
										<div class="form-group">
											<label for="text1">Correo</label>
											<input type="email" class="form-control" id="text1" name="correo" placeholder="">
										</div>
										<div class="form-check">
											<label>Sexo</label><br/>
											<label class="form-radio-label">
												<input class="form-radio-input" type="radio" name="txtGenero" value="1"  checked="">
												<span class="form-radio-sign">Hombre</span>
											</label>
											<label class="form-radio-label ml-3">
												<input class="form-radio-input" type="radio" name="txtGenero" value="0">
												<span class="form-radio-sign">Mujer</span>
											</label>
										</div>							
									</div>
									<div class="card-action">
										<button type="submit" class="btn btn-success pull-rigth">Guardar Cambios</button>
									</div>
								</form>
							</div>							
						</div>					
					</div>
				</div>
            </div>
    </div>


<?php require_once('footer.php'); ?>