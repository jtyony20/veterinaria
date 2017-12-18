

 <div class="col-md-12">
        <!-- Horizontal Form -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <!-- /cuerpo -->
                <div class="box-footer">
                <!-- cuerpo --> 
                    <div class="box-body">



 
        <h3>Datos del paciente</h3>
        <br />
        <button class="btn btn-success" onclick="add_person()"><i class="glyphicon glyphicon-plus"></i> Nuevo Paciente</button>
        <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Recargar</button>
        <br />
        <br />
        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Especie</th>
                    <th>Raza</th>
                    <th>Edad</th>
                    <th>Sexo</th>
                    <th>Color</th>
                    <th>Señas</th>
                    <th>Cliente</th>
                    <th style="width:125px;">Acción</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
 
            <tfoot>
            	 <tr>
                    <th>Nombre</th>
                    <th>Especie</th>
                    <th>Raza</th>
                    <th>Edad</th>
                    <th>Sexo</th>
                    <th>Color</th>
                    <th>Señas</th>
                    <th>Cliente</th>															
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
                <h3 class="modal-title">Paciente Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/> 
                    <div class="form-body">
                    	<div class="form-group">
							<label for="" class="col-sm-3">Nombre</label>
							<div class="col-sm-9">
								<input id="nombre" name="txtnombre" placeholder="Nombre" type="text" class="form-control">
								<span class="help-block"></span>
							</div>
						</div>
	                    <div class="form-group">
								<label for="" class="col-sm-3">Especie</label>
								<div class="col-sm-9">
									<input id="especie" name="txtespecie" placeholder="Especie"  type="text" class="form-control">
									<span class="help-block"></span>
								</div>
						</div>
						<div class="form-group">
								<label for="" class="col-sm-3">Raza</label>
								<div class="col-sm-9">
									<input id="raza" name="txtraza" placeholder="Raza" type="text" class="form-control"> 
									<span class="help-block"></span>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-3">Edad</label>
								<div class="col-sm-9">
									<input id="edad" name="txtedad" type="text"  placeholder="Edad" class="form-control">
									<span class="help-block"></span>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-3">Sexo</label>
								<div class="col-sm-9">
								<select id="sexo" name="txtsexo" class="form-control" >
									<option>::Elegir::</option>
									<option value="macho">Macho</option>
									<option value="hembra">Hembra</option>
								</select>
								<span class="help-block"></span>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-3">Color</label>
								<div class="col-sm-9">
									<input id="color" name="txtcolor" placeholder="Color" type="text" class="form-control">
									<span class="help-block"></span>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-3">Señas</label>
								<div class="col-sm-9">
									<input id="señas" name="txtsenas" placeholder="Señas" type="text" class="form-control">
									<span class="help-block"></span>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-3">Cliente</label>
								<div class="col-sm-9">
									<input id="cliente" name="txtcliente" placeholder="Cliente" type="text" class="form-control">
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
					<h4 class="modal-title">Eliminacion de usuario</h4>
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
