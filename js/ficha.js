
	
	
var save_method; //for save method string
var table;
 
$(document).ready(function() {
 $("#table1").dataTable({});
    //datatables
    table = $('#table').DataTable({ 
 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url":baseurl+"cficha/ajax_list",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],
 
    });
 
    //datepicker
    $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,  
    });
 
    //set input/textarea/select event when change value, remove class error and remove text help block 
    $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("textarea").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("select").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
 
});
 
 
 
function add_person()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
}
 
function edit_person(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
 
    //Ajax Load data from ajax
    $.ajax({
        url :baseurl+'cusuarios/ajax_edit/' + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
 
            $('[name="id"]').val(data.id);
            $('[name="txtnombre"]').val(data.nombre);
            $('[name="txtappaterno"]').val(data.appaterno);
            $('[name="txtapmaterno"]').val(data.apmaterno);
            $('[name="txtdni"]').val(data.dni);
            $('[name="txtcelular"]').val(data.celular);
            $('[name="txtemail"]').val(data.email);
            $('[name="txtpassword"]').val(data.password);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Editar Usuario'); // Set title to Bootstrap modal title
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}
 
function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}
 
function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;
 
    if(save_method == 'add') {
        url = baseurl+"cusuarios/ajax_add";
    } else {
        url = baseurl+"cusuarios/ajax_update";
    }
 
    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {
 
            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                reload_table();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
 
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
 
        }
    });
}
 
function delete_person(id)
{

$('#mbtnDeleteUsuario').click(function() {

     $.ajax({
            url : baseurl+'cusuarios/ajax_delete/'+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#mbtnCerrarModal').click();
                 location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

});
   
}














//::::::::s:::::::::::::::::::::::::::::::::::::::::::::::::::::::::
//:::::::::::::::::::::INSERTAR FICHA::::::::::::::::::::::::::
//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

$('#mbtnInsertFicha').click(function() {

	var fecha = $("#fecha").val();
	var sintomas_signos = $("#sintomas").val();
	var peso = $("#peso").val();
	var temperatura = $("#temperatura").val();
	var vacunas = $("#vacunas").val();
	var diagnostico = $("#diagnostico").val();
	var tratamiento = $("#tratamiento").val();	
	var citas = $("#citas").val();
	var id_paciente = $("#id_paciente").val();
	
	$.post(baseurl+'cficha/save',
	{	
		fecha: fecha,
		sintomas_signos: sintomas_signos,
		peso: peso,
		temperatura:temperatura,
		vacunas: vacunas,
		diagnostico: diagnostico,
		tratamiento:tratamiento,
		citas:citas,
		id_paciente:id_paciente

	}, 
	function(data) {
	alert('Fue un exitoso')
	});

});












































//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
//:::::::::::::::::::::ACTUALIZAR FICHA::::::::::::::::::::::::::
//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::







selecFichaUpdate = function(id_ficha,fecha,sintomas_signos,peso,temperatura,vacunas,diagnostico,tratamiento,citas,id_paciente){

	$("#mhidden_id_ficha_update_ficha").val(id_ficha)

	$("#fecha_update_ficha").val(fecha);
	$("#sintomas_signos_update_ficha").val(sintomas_signos);
	$("#peso_update_ficha").val(peso);
	$("#temperatura_update_ficha").val(temperatura);
	$("#vacunas_update_ficha").val(vacunas);
	$("#diagnostico_update_ficha").val(diagnostico);
	$("#tratamiento_update_ficha").val(tratamiento);	
	$("#citas_update_ficha").val(citas);
	$("#id_paciente_update_ficha").val(id_paciente);

};

$('#mbtnUpdateFicha').click(function() {

	var id_ficha = $("#mhidden_id_ficha_update_ficha").val();

	var fecha = $("#fecha_update_ficha").val();
	var sintomas_signos = $("#sintomas_signos_update_ficha").val();
	var peso = $("#peso_update_ficha").val();
	var temperatura = $("#temperatura_update_ficha").val();
	var vacunas = $("#vacunas_update_ficha").val();
	var diagnostico = $("#diagnostico_update_ficha").val();
	var tratamiento = $("#tratamiento_update_ficha").val();	
	var citas = $("#citas_update_ficha").val();
	var id_paciente = $("#id_paciente_update_ficha").val();

	$.post(baseurl+'cficha/updateFicha',
	{	
		id_ficha:id_ficha,
		fecha: fecha,
		sintomas_signos: sintomas_signos,
		peso: peso,
		temperatura:temperatura,
		vacunas: vacunas,
		diagnostico: diagnostico,
		tratamiento:tratamiento,
		citas:citas,
		id_paciente:id_paciente

	}, 
	function(data) {

		$('#mbtnCerrarModal').click();
		location.reload();

	});

});

//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
//:::::::::::::::::::ELIMINAR FICHA::::::::::::::::::::::::::::::
//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

selecFichaDelete = function(id_ficha,nombre){
	$("#mhidden_id_ficha_delete_ficha").val(id_ficha);
	$("#nombre_ficha").text("");
	$("#nombre_ficha").append(nombre);
}

$('#mbtnDeleteFicha').click(function() {

	var id_ficha = $("#mhidden_id_ficha_delete_ficha").val();

	$.post(baseurl+'cficha/deleteFicha',
	{	
		id_ficha: id_ficha

	}, 
	function(data) {
		
		$('#mbtnCerrarModal').click();
		location.reload();

	});

});

