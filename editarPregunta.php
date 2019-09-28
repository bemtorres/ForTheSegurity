<?php require_once('layout.php'); ?>

	<div class="main-panel">
		<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Editar Pregunta</h4>
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
									<div class="card-title">Fomulario Editar Pregunta</div>
								</div>
								<form action="Controlador/Cpregunta.php" method="post">
									<div class="card-body">
									    <div class="form-group">
										    <label for="comment">Pregunta:</label>
										    <textarea class="form-control" id="comment" rows="5">

										    </textarea>
										</div>
										<div class="form-check">
                                			<label class="form-check-label">
                                    		<input class="form-check-input" type="checkbox" value="">
                                    		<span class="form-check-sign">Area/Orientacion</span>
                               			 	</label>
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