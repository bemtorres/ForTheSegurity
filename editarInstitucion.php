<?php require_once('layout.php'); ?>

	<div class="main-panel">
		<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Editar Institución</h4>
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
									<div class="card-title">Fomulario Editar Institución</div>
								</div>
								<form action="Controlador/Cinstitucion.php" method="post">
									<div class="card-body">
									
										<div class="form-group">
											<label for="text1">Nombre de institución</label>
											<input type="text" class="form-control" id="text1" name="username" placeholder="">
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