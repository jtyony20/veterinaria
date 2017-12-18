
var save_method; 
var table;

$(document).ready(function() {
    table = $('#table').DataTable({ 
 
        "processing": true,
        "serverSide": true, 
        "order": [], 
        "ajax": {
            "url":baseurl+"cclientes/ajax_list",
            "type": "POST"
        },

        "columnDefs": [
        { 
            "targets": [ -1 ],
            "orderable": false,
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
function ver_cliente(id){
    $.ajax({
        url: baseurl+'cclientes/ajax_edit/' + id,
        type: 'GET',
        dataType: 'JSON',
        success:function(data){

          html ="<p><strong>Codigo: </strong>"+data.codigo+"</p>"
          html +="<p><strong>Nombre: </strong>"+data.nombre+"</p>"
          html +="<p><strong>Apellido P.: </strong>"+data.appaterno+"</p>"
          html +="<p><strong>Apellido M.: </strong>"+data.apmaterno+"</p>"
          html +="<p><strong>Direccion: </strong>"+data.direccion+"</p>"
          html +="<p><strong>Celular: </strong>"+data.celular+"</p>"
           html +="<p><strong>Email: </strong>"+data.email+"</p>"
          html +="<p><strong>Fecha: </strong>"+data.fecha_registro+"</p>"
          ;
          $("#modal-default .modal-body").html(html);
            }
        })
    
    
}
function list_pacientes(id){
    $.ajax({
        url: baseurl+'cpacientes/getpaciente_cli/' + id,
        type: 'GET',
        dataType: 'JSON',
        success:function(data){
           
        if (data===null) {
                html='<tr><td colspan="7">No existen registros...</td></tr>';
            }else {
                html='';
                $.each(data, function(item, val) {
                  html +='<tr><td>'+val.nombre+'</td>';
                  html +='<td>'+val.especie+'</td>';
                  html +='<td>'+val.raza+'</td>';
                  html +='<td>'+val.edad+'</td>';
                  html +='<td>'+val.sexo+'</td>';
                  html +='<td>'+val.color+'</td>';
                  html +='<td><a class="btn btn-sm btn-info" href="'+baseurl+'cficha/nuevo/'+val.id+'"  ><i class="fa fa-stethoscope"></i>Atencion</a></td>';
                  html +='<td><a class="btn btn-sm btn-primary" href="'+baseurl+'cficha/ver_ficha/'+val.id+'"  ><i class="fa fa-hospital-o custom"></i>Historia</a></td></tr>';
               
                });     
            }
          $("#modal-tabla .modal-body tbody").html(html);
            }
        })
}

function edit_person(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
 
    //Ajax Load data from ajax
    $.ajax({
        url :baseurl+'cclientes/ajax_edit/' + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
 
            $('[name="id"]').val(data.id);
            $('[name="txtcodigo"]').val(data.codigo);
            $('[name="txtnombre"]').val(data.nombre);
            $('[name="txtappaterno"]').val(data.appaterno);
            $('[name="txtapmaterno"]').val(data.apmaterno);
            $('[name="txtdireccion"]').val(data.direccion);
            $('[name="txtcelular"]').val(data.celular);
            $('[name="txtemail"]').val(data.email);
            $('[name="txtfecha"]').val(data.fecha_registro);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Editar Cliente'); // Set title to Bootstrap modal title
 
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
        url = baseurl+"cclientes/ajax_add";
    } else {
        url = baseurl+"cclientes/ajax_update";
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
            url : baseurl+'cclientes/ajax_delete/'+id,
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
////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////ELIMINAR///////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

