//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
//:::::::::::::::::::OBTENER TODOS LOS HISTORIAS:::::::::::::::::::
//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

$("#tblHistorias tbody").html('');
$.post(baseurl+'chistoria/getHistorias', function(data) {
	var obj = JSON.parse(data);
	$.each(obj, function(i, item) {
		$("#tblHistorias tbody").append(
			'<tr>'+
			'<td>'+item.id_historia_clinica+'</td>'+
			'<td>'+item.nombre+'</td>'+
			'<td>'+
			'<button class="btnVer btn btn-link" type="button" data-toggle="modal" data-target="#modalF" onclick="mostrarDatos(\''+item.id_paciente+'\',\''+item.nombre+'\',\''+item.especie+'\',\''+item.raza+'\',\''+item.edad+'\',\''+item.sexo+'\',\''+item.color+'\',\''+item.fecha_ingreso+'\',\''+item.id_cliente+'\');"><i class="fa fa-search"><i></button></td>'+
			'</td>'+
			'</tr>'
			);
	});

	/*$("#tblHistorias").dataTable({
		'paging':true,
		'filter':true,
		'info':true

	});*/

});



//:::::::::::::::::llenar modal datos paciente:::::::::::::::::::

mostrarDatos = function(id_paciente,nombre,especie,raza,edad,sexo,color,fecha_ingreso,id_cliente){
	$("#mhidden_id_paciente_paciente_f").val(id_paciente);
	$("#mcaja_nombre_paciente_f").val(nombre);
	$("#mcaja_especie_paciente_f").val(especie);
	$("#mcaja_raza_paciente_f").val(raza);
	$("#mcaja_edad_paciente_f").val(edad);
	$("#mcaja_sexo_paciente_f").val(sexo);
	$("#mcaja_color_paciente_f").val(color);
	$("#mcaja_fecha_ingreso_paciente_f").val(fecha_ingreso);
	$("#mcaja_id_cliente_paciente_f").val(id_cliente);

	traerFichas(id_paciente);
}


//::::::::::Traer fichas de un paciente determinado::::::::

traerFichas = function(id_paciente){
	$.post(baseurl+'cficha/getFicha', {id_paciente: id_paciente}, function(data) {
		var obj = JSON.parse(data);
		$("#listaFichas").html("");
		$.each(obj, function(i, item) {
			$("#listaFichas").append(
				' <div id="divFicha" style="background: white;position:relative;overflow: hidden;width: 100%;height:auto;box-shadow: 0px 0px 4px rgba(120,120,120,1);border-left: rgba(1,98,128,1) 3px solid;padding: 0px;border-top-left-radius: 3px;border-bottom-left-radius: 3px;">'+
					'<div style="padding: 5px;width:20%;height:100%;float:left;">'+
					'<h2 class="text-center">'+(i+1)+'</h2>'+
					'</div>'+
					'<div style="padding: 5px;width:70%;float:left;border-left: 1px solid rgba(200,200,200,1);border-right: 1px solid rgba(200,200,200,1);">'+
					'<table class="table" style="margin:0px;">'+
					'<thead>'+
					'<tr>'+
					'<th>fecha</th>'+
					'<th>signos</th>'+
					'</tr>'+
					'</thead>'+
					'<tbody>'+
					'<tr>'+
					'<td>'+item.fecha+'</td>'+
					'<td>'+item.sintomas_signos+'</td>'+
					'</tr>'+
					'</tbody>'+
					'</table>'+
					'</div>'+
					'<div id="divVerFicha" style="height:100%;padding: 5px;padding:26px 5px;width:10%;float:left;" class="text-center align-center">'+
					'<button class="btnVer btn btn-link" type="button" data-toggle="modal" data-target="#modalViewFicha" onclick="llenarFicha(\''+item.id_ficha+'\',\''+item.fecha+'\',\''+item.sintomas_signos+'\',\''+item.peso+'\',\''+item.temperatura+'\',\''+item.vacunas+'\',\''+item.diagnostico+'\',\''+item.tratamiento+'\',\''+item.citas+'\');">ver </button>'+
					'</div>'+
				'</div>'+
				'<br>'


				);
		});

	});
}

llenarFicha = function(id_ficha,fecha,sintomas_signos,peso,temperatura,vacunas,diagnostico,tratamiento,citas){
	
	$("#mcaja_id_ficha_unit").val(id_ficha);
	$("#mcaja_fecha_unit").val(fecha);
	$("#mcaja_sintomas_signos_unit").val(sintomas_signos);
	$("#mcaja_peso_unit").val(peso);
	$("#mcaja_temperatura_unit").val(temperatura);
	$("#mcaja_vacunas_unit").val(vacunas);
	$("#mcaja_diagnostico_unit").val(diagnostico);
	$("#mcaja_tratamiento_unit").val(tratamiento);	
	$("#mcaja_citas_unit").val(citas);
}






//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
//:::::::::::::::::::::INSERTAR HISTORIA:::::::::::::::::::::::::
/*:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

$('#mbtnInsertHistoria').click(function() {

	var id_paciente = $("#mcaja_id_paciente_insert").val();

	$.post(baseurl+'chistoria/insertHistoria',
	{	
		id_paciente:id_paciente,

	}, 
	function(data) {

		
		$('#mbtnCerrarModal').click();
		location.reload();


	});

});



//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
//:::::::::::::::::::::ACTUALIZAR HISTORIA:::::::::::::::::::::::::
//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

selecHistoriaUpdate = function(id_historia_clinica,id_paciente){

	$("#mhidden_id_historia_clinica_update").val(id_historia_clinica)
	$("#mcaja_id_paciente_update").val(id_paciente);

};

$('#mbtnUpdateHistoria').click(function() {

	var id_historia_clinica = $("#mhidden_id_historia_clinica_update").val();
	var id_paciente = $("#mcaja_id_paciente_update").val();

	$.post(baseurl+'chistoria/updateHistoria',
	{	
		id_historia_clinica: id_historia_clinica,
		id_paciente:id_paciente,

	}, 
	function(data) {

		$('#mbtnCerrarModal').click();
		location.reload();

	});

});

//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
//:::::::::::::::::::ELIMINAR HISTORIA:::::::::::::::::::::::::::::
//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

selecHistoriaDelete = function(id_historia_clinica){
	$("#mhidden_id_historia_clinica_delete").val(id_historia_clinica);
	$("#nombre").text("");
	$("#nombre").append(nombre+" "+app+" "+apm);
}

$('#mbtnDeleteHistoria').click(function() {

	var id_historia_clinica = $("#mhidden_id_historia_clinica_delete").val();

	$.post(baseurl+'chistoria/deleteHistoria',
	{	
		id_historia_clinica: id_historia_clinica

	}, 
	function(data) {
		
		$('#mbtnCerrarModal').click();
		location.reload();

	});

});*/

