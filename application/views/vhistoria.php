
  <!-- Horizontal Form -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <!-- /cuerpo -->
                <div class="box-footer">
                <!-- cuerpo --> 
                    <div class="box-body">
						<!-- Stack the columns on mobile by making one full-width and the other half-width -->
						<div class="row">
						  <div class=" line1 col-md-11 callout callout-info"><center><h3><label>Datos Del Paciente</h3></center></div>
						</div>
						<!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
						<div class="row">
						<div class="col-md-1"></div>
						  <div class="col-md-2">
						  	<div class="form-group">
						  		Nombre:<strong><?php echo '  '.$historias->nombrep; ?></strong>
						  	</div>
						  </div>
						  <div class="col-md-2">
						  	<div class="form-group">
						  		Especie:<b><?php echo '  '.$historias->especie; ?></b>
						  	</div>
						  </div>
						  <div class="col-md-2">
						  	<div class="form-group">
						  		Raza:<strong><?php echo '  '.$historias->raza; ?></strong>
						  	</div>
						  </div>
						  <div class="col-md-2">
						  	<div class="form-group">
						  		Edad:<strong><?php echo '   '.$historias->edad; ?></strong>
						  	</div>
						  </div>
						</div>
						<hr style="width:100%; ">
						<div class="row">
						  <div class=" line1 col-md-11 callout callout-info"><center><h3><label>Datos Del Dueño</h3></center></div>
						</div>
						<div class="row">
							<div class="col-md-1"></div>
						  <div class="col-md-2">
						  	<div class="form-group">
						  		Codigo:<strong><?php echo '  '.$historias->codigo; ?></strong>
						  	</div>
						  </div>
						  <div class="col-md-2">
						  	<div class="form-group">
						  		Nombre:<strong><?php echo '  '.$historias->nombrec; ?></strong>
						  	</div>
						  </div>
						  <div class="col-md-2">
						  	<div class="form-group">
						  		Apellido:<strong><?php echo '  '.$historias->apellido; ?></strong>
						  	</div>
						  </div>
						  <div class="col-md-3">
						  	<div class="form-group">
						  		Direccion:<strong><?php echo '  '.$historias->direccion; ?></strong>
						  	</div>
						  </div>
						</div>
						<hr style="width:100%; ">
						<div class="row">
						  <div class=" line1 col-md-11 callout callout-info"><center><h3><label>Atención</h3></center></div>
						</div>
						<div class="row">
							<div class="col-md-1"></div>
						  <div class="col-md-2">
						  	<div class="form-group">
						  		Fecha:<strong><?php echo '  '.$historias->fechaf; ?></strong>
						  	</div>
						  </div>
						  <div class="col-md-2">
						  	<div class="form-group">
						  		Sintomas:<strong><?php echo '  '.$historias->sintomas_signos; ?></strong>
						  	</div>
						  </div>
						  <div class="col-md-1">
						  	<div class="form-group">
						  		Peso:<strong><?php echo '   '.$historias->peso; ?></strong>
						  	</div>
						  </div>
						  <div class="col-md-1">
						  	<div class="form-group">
						  		Vacunas: <strong><?php echo '   '.$historias->vacunas; ?></strong>
						  	</div>
						  </div>
						  <div class="col-md-2">
						  	<div class="form-group">
						  		Temperatura:<strong><?php echo '   '.$historias->temperatura; ?></strong>
						  	</div>
						  </div>
						</div>
						
						<div class="row">
							<div class="col-md-1">
								
							</div>
						  <div class="col-md-3">
						  	<div class="form-group">
						  		Diagnostico:
						  		<strong><p><?php echo $historias->diagnostico; ?></p></strong>
						  	</div>
						  </div>
						  <div class="col-md-3">
						  	<div class="form-group">
						  		Tratamiento: 
						  		<strong><p><?php echo $historias->tratamiento; ?></p></strong>
						  	</div>
						  </div>
						  <div class="col-md-2">
						  	<div class="form-group">
						  		Citas:<strong><?php echo '  '.$historias->citas; ?></strong>
						  	</div>
						  </div>
						</div>
						<hr style="width:100%; ">
						
			</div>
			</div>
		</div>
		<style type="text/css" media="screen">
		.line1{
			margin-left: 10px;
			height: 50px;
			background-color: #DAF7A6;
		}	
		</style>
	<!-- /.box -->
	</div>
</div>