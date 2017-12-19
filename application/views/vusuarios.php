

 <div class="col-md-12">
        <!-- Horizontal Form -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <!-- /cuerpo -->
                <div class="box-footer">
                <!-- cuerpo --> 
                    <div class="box-body">



 
        <h3>Datos de los usuarios</h3>
        <button class="btn btn-primary" onclick="add_person()"><i class="glyphicon glyphicon-plus"></i> Nuevo Usuario</button>
        <!--
        <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Recargar</button> -->
        <br />
        <br />
        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>ApPaterno</th>
                    <th>ApMaterno</th>
                    <th>Dni</th>
                    <th>Celular</th>
                    <th>Email</th>
                    <th style="width:125px;">Acción</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
 
            <tfoot>
            	<tr>
              		<th>Nombre</th>
               	 	<th>ApPaterno</th>
               		<th>ApMaterno</th>
               		<th>Dni</th>
               		<th>Celular</th>
               		<th>Email</th>
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
							<label for="" class="col-sm-3">Nombre</label>
							<div class="col-sm-9">
								<input id="nombre" name="txtnombre" placeholder="Nombre" type="text" class="form-control">
								<span class="help-block"></span>
							</div>
						</div>
	                    <div class="form-group">
								<label for="" class="col-sm-3">Ap.Paterno</label>
								<div class="col-sm-9">
									<input id="appaterno" name="txtappaterno" placeholder="Apellido paterno"  type="text" class="form-control">
									<span class="help-block"></span>
								</div>
						</div>
						<div class="form-group">
								<label for="" class="col-sm-3">Ap.Materno</label>
								<div class="col-sm-9">
									<input id="apmaterno" name="txtapmaterno" placeholder="Apellido materno" type="text" class="form-control"> 
									<span class="help-block"></span>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-3">DNI</label>
								<div class="col-sm-9">
									<input id="dni" name="txtdni" type="text"  placeholder="Dni" class="form-control">
									<span class="help-block"></span>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-3">Telefono</label>
								<div class="col-sm-9">
									<input id="celular" name="txtcelular" type="text" placeholder="Telefono" class="form-control">
									<span class="help-block"></span>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-3">Email</label>
								<div class="col-sm-9">
									<input id="email" name="txtemail" placeholder="Email" type="text" class="form-control">
									<span class="help-block"></span>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-3">Password</label>
								<div class="col-sm-9">
									<input id="text" name="txtpassword" placeholder="Password" type="password" class="form-control">
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
