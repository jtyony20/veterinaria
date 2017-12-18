

 <div class="col-md-12">
        <!-- Horizontal Form -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <!-- /cuerpo -->
                <div class="box-footer">
                <!-- cuerpo --> 
                    <div class="box-body">


        <h3>Lista de atención</h3>
        <br />
        <button class="btn btn-success" onclick="add_person()"><i class="glyphicon glyphicon-plus"></i> Nueva Ficha Clinica</button>
      
        <br />
        <br />
        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Sintomas</th>
                    <th>Peso</th>
                    <th>Temperatura</th>
                    <th>Vacunas</th>
                    <th>Diagnostico</th>
                    <th>Tratamiento</th>
                    <th>Citas</th>
                    <th>Paciente</th>
                    <th style="width:125px;">Acción</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
 
            <tfoot>
            	<tr>
              		<th>Fecha</th>
                    <th>Sintomas</th>
                    <th>Peso</th>
                    <th>Temperatura</th>
                    <th>Vacunas</th>
                    <th>Diagnostico</th>
                    <th>Tratamiento</th>
                    <th>Citas</th>
                    <th>Paciente</th>
               		<th style="width:125px;">Acción</th>
            	</tr>
            </tfoot>
        </table>

				</div>
			</div>
		</div>
	<!-- /.box -->
	</div>
</div>


<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">User Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/> 
                    <div class="form-body">
                    	<div class="form-group">
							<label for="" class="col-sm-3">Fecha</label>
							<div class="col-sm-9">
								<input id="fecha" name="txtfecha" placeholder="fecha" type="text" class="form-control">
								<span class="help-block"></span>
							</div>
						</div>
	                    <div class="form-group">
								<label for="" class="col-sm-3">Sintomas y Signos</label>
								<div class="col-sm-9">
									<input id="sintomas_signos" name="txtsintomas_signos" placeholder="Sintomas y Signos"  type="text" class="form-control">
									<span class="help-block"></span>
								</div>
						</div>
						<div class="form-group">
								<label for="" class="col-sm-3">Peso</label>
								<div class="col-sm-9">
									<input id="peso" name="txtpeso" placeholder="Peso" type="text" class="form-control"> 
									<span class="help-block"></span>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-3">Temperatura</label>
								<div class="col-sm-9">
									<input id="temperatura" name="txttemperatura" type="text"  placeholder="Temperatura" class="form-control">
									<span class="help-block"></span>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-3">Vacunas</label>
								<div class="col-sm-9">
									<input id="vacunas" name="txtvacunas" type="text" placeholder="Vacunas" class="form-control">
									<span class="help-block"></span>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-3">Diagnostico</label>
								<div class="col-sm-9">
									<textarea  id="diagnostico" name="txtdiagnostico"  placeholder="Diagnostico"  type="text" class="form-control" rows="3"></textarea>
									<span class="help-block"></span>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-3">Tratamientos</label>
								<div class="col-sm-9">
									<textarea  id="tratamientos" name="txttratamientos"  placeholder="Tratamientos"  type="text" class="form-control" rows="3"></textarea>
									<span class="help-block"></span>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-3">Citas</label>
								<div class="col-sm-9">
									<input id="citas" name="txtcitas" placeholder="Citas" type="text" class="form-control">
									<span class="help-block"></span>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-3">Paciente</label>
								<div class="col-sm-9">
									<input id="paciente" name="txtpaciente" placeholder="Paciente" type="text" class="form-control">
									<span class="help-block"></span>
								</div>
							</div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Guardar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
    </div>


					

<!-- modal delete -->
<div class="example-modal">
	<div class="modal fade" id="modalDeletePersona" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-md" role="document">
			<div class="modal-content">
				<div class="modal-header " >
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Eliminacion de ficha clinica</h4>
				</div>
				<div class="modal-body">
					Esta seguro de eliminar a <span id="nombre"></span> ?
					<form class="form-horizontal" action="">
						<input type="hidden" id="mcaja_id_usuario_delete">
						
						
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal" id="mbtnCerrarModal">cancel</button>
					<button type="button" class="btn btn-danger" id="mbtnDeleteUsuario">Delete</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
</div>
<!-- /modal delete -->
</div>
<script>
	var baseurl = "<?php echo base_url(); ?>";
</script>
