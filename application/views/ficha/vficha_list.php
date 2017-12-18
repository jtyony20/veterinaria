<div class="col-md-12">
        <!-- Horizontal Form -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <!-- /cuerpo -->
                <div class="box-footer">
                <!-- cuerpo --> 
                    <div class="box-body">

        <h3>Historial Paciente</h3>
        <br />
        <table id="table1" class="table table-striped table-bordered" cellspacing="0" width="100%">
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
            <?php if(!empty($fichas)): ?>
                <?php foreach($fichas as $ficha):?>
                <tr>
                  <td><?php echo $ficha->fecha;?></td>
                  <td><?php echo $ficha->sintomas_signos;?></td>
                  <td><?php echo $ficha->peso;?></td>
                  <td><?php echo $ficha->temperatura;?></td>
                  <td><?php echo $ficha->vacunas;?></td>
                  <td><?php echo $ficha->diagnostico;?></td>
                  <td><?php echo $ficha->tratamiento;?></td>
                  <td><?php echo $ficha->citas;?></td>
                  <td><?php echo $ficha->id_paciente;?></td>
                  <td>
                    <div class="btn-group">
                      <button type="button" class="btn btn-info btn-view" data-toggle="modal" data-target="#modal-default" value="<?php echo $ficha->id;?>">
                        <span class="fa fa-eye"></span>
                      </button>
                      <a href="<?php echo base_url();?>cficha/edit/<?php echo $ficha->id; ?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                      <a href="<?php echo base_url();?>cficha/edit/delete/<?php echo $ficha->id; ?>" class="btn btn-danger btn-remove"><span class="fa fa-remove"></span></a>
                    </div>
                  </td>
                </tr>
              <?php endforeach;?>
              <?php endif; ?>
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