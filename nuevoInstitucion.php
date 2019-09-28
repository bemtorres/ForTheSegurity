<?php require_once('layout.php'); ?>

	<div class="main-panel">
		<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Nueva Institución</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="instituciones.php">
									Todas las Instituciones
									<i class="flaticon-home"></i>
								</a>
							</li>
							
						</ul>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Fomulario Nueva institución</div>
								</div>
								<form action="Controlador/Cinstitucion.php" method="post">
									<div class="card-body">
                                        <div class="form-group">
											<label for="text1">Nombre de institución</label>
											<input type="text" class="form-control" id="text1" name="nombreInstitucion" placeholder="">
										</div>	
										<div class="form-group">
											<label for="text1">Correo</label>
											<input type="email" class="form-control" id="text1" name="correoInstitucion" placeholder="">
										</div>	
									</div>
									<div class="card-action">
										<button type="submit" name="opcion" value="agregar" class="btn btn-success pull-rigth">Agregar</button>
                                    </div>
								</form>
							</div>							
						</div>					
					</div>
				</div>
            </div>
    </div>


<?php require_once('footer.php'); ?>