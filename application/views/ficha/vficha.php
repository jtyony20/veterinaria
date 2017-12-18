<div class="col-sm-1"></div>
<div class="container col-sm-9"  role="tabpanel">
	<form class="form-horizontal" action="">

		<div class="form-group">
			<label for="" class="col-sm-2">fecha</label>
			<div class="col-sm-9"><input name="txtfecha" id="fecha" type="date" class="form-control" required=""></div>
		</div>
		<div class="form-group">
			<label for="" class="col-sm-2">sintomas_signos</label>
			<div class="col-sm-9"><input name="txtsintomas" id="sintomas" type="text" class="form-control" required=""></div>
		</div>
		<div class="form-group">
			<label for="" class="col-sm-2">peso</label>
			<div class="col-sm-9"><input name="txtpeso" id="peso" type="text" class="form-control" required=""></div>
		</div>
		<div class="form-group">
			<label for="" class="col-sm-2">temperatura</label>
			<div class="col-sm-9"><input name="txttemperatura" id="temperatura" type="text" class="form-control"></div>
		</div>
		<div class="form-group">
			<label for="" class="col-sm-2">vacunas</label>
			<div class="col-sm-9"><input name="txtvacunas" id="vacunas" type="text" class="form-control" required=""></div>
		</div>
		<div class="form-group">
			<label for="" class="col-sm-2">diagnostico</label>
			<div class="col-sm-9"><textarea name="txtdiagnostico" id="diagnostico" type="text" class="form-control" rows="3"></textarea></div>
		</div>
		<div class="form-group">
			<label for="" class="col-sm-2">tratamiento</label>
			<div class="col-sm-9"><textarea name="txttratamiento" id="tratamiento" type="text" class="form-control" rows="3"></textarea></div>
		</div>
		<div class="form-group">
			<label for="" class="col-sm-2">citas</label>
			<div class="col-sm-9"><input name="txtcitas" id="citas" type="text" class="form-control" required=""></div>
		</div>

		<div class="form-group">
			<label for="" class="col-sm-2">paciente</label>
			<div class="col-sm-9"><input name="" id="id_paciente"  type="hidden" class="form-control" required="" name="<?php echo $pacientes->id ?> " value="<?php echo $pacientes->id;?>"><p><?php echo $pacientes->nombre;?></p></div>
		</div>
		
		<div class="form-group">
			<button style="margin-right: 15px;" name="" id="mbtnInsertFicha" type="button" class="btn btn-primary pull-right">Guardar</button>
			<button name="" id="mbtnCerrarModal" style="margin-right: 15px;"  type="button" class="btn btn-default pull-right" data-dismiss="modal">	Cancelar</button>
			
		</div>
	</form>
</div>		
          