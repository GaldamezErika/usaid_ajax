<?php $this->load->helper('alumno_ajax') ?>
<body>
	<div class="container">
		<button type="button" class="btn btn-success" id="NuevoAlumno">Nuevo</button>
		<table class="table table-hover table-bordered table-striped table-sm">
			<thead class="thead-dark">
				<tr>
					<th>N°</th>
					<th>Nombres</th>
					<th>Apellidos</th>
					<th>Sexo</th>
					<th>Curso</th>
					<th>Eliminar</th>
					<th>Actualizar</th>
				</tr>
			</thead>
			<tbody id="tabla_alumno">
				
			</tbody>
		</table>
	</div>


	<div class="modal" tabindex="-1" role="dialog" id="modalBorrar">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Eliminar</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>¿Desea elimina el alumno?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" id="btnBorrar">Eliminar</button>
				</div>
			</div>
		</div>
	</div>


	<div class="modal" tabindex="-1" role="dialog" id="modalGuardar">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title"></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="" method="POST" id="formAlumno">
						<input type="hidden" name="id" id="id" value="0">
						<div class="row">
							<div class="col">
								<label>Nombres:</label>
								<input type="text" name="nombres" id="nombres" class="form-control">
							</div>
							<div class="col">
								<label>Apellidos:</label>
								<input type="text" name="apellidos" id="apellidos" class="form-control">
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col">
								<label>Sexo:</label>
								<select name="sexo" id="sexo" class="form-control">
									<option value="">--Seleccione sexo--</option>
								</select>
							</div>
							<div class="col">
								<label>Curso:</label>
								<select name="curso" id="curso" class="form-control">
									<option value="">--Seleccione curso--</option>
								</select>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" id="btnGuardar">Guardar</button>
				</div>
			</div>
		</div>
	</div>