var FIELD_FORM = {
	'client_id' : $( '#client_id' ),
	'name' : $( 'input[name=name]' ),
	'lastname' : $( 'input[name=lastname]' ),
	'email' : $( 'input[name=email]' ),
	'celphone' : $( 'input[name=celphone]' ),
	'direccion' : $( 'input[name=name]' ),
	'cedula_identidad' : $( 'input[name=cedula_identidad]' ),
	'extension_cedula' : $( 'input[name=extension_cedula]' )
}
$(document).ready(function(){
	getClientAll();
})
function saveClient()
{
	var formData = $('#form-data').serializeArray();
	if (  $('#form-data').parsley().validate() )
	{
		$.ajax({
			url : 'clients',
			 headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	   		 },
			type : 'POST',
			data : formData,
			success : function( response )
			{

				getClientAll();
				closeModal();
			}
		});
	}
}
function openModal( type )
{
	cleanForm();
	$('#myModal').modal('show');
	if(  type == 'save' )
	{
		$('#modal-title').text('Crear Cliente');
		return;
	}
	$('#modal-title').text('Modificar Cliente');
}
function getDataClienteById( idClient )
{
	$.ajax({
		url : 'clients/'+idClient+'/edit',
		type : 'GET',
		success : function( response )
		{
			$( FIELD_FORM.client_id ).val( response.data[0]['id']  );
			for (var key in response.data[0])
			{
				$( FIELD_FORM[key] ).val( response.data[0][key] );
			}
		}
	});
}
function closeModal()
{
	$('#myModal').modal('hide');
}
function cleanForm()
{
	$('input[name]').val('');
}
var url = 'clients';
function getClientAll()
{
	$('#dataTable').DataTable().destroy();
	var DTbody = $('#tbody');

	DTbody.empty();
	$.ajax({
		url : 'getClientAll',
		type : 'GET',
		success : function(res)
		{
			var data = res.data;
			$.each(data, function(index, value){
				DTbody.append( '<tr><td>'+value.id +'<td>'+value.name+'<td>'+value.lastname+'<td>'+value.address+'<td>'+value.email+
					'<td><button class="btn btn-primary btn-sm" onclick="openModal(1);getDataClienteById('+value.id+')">Modificar</button>'+
					'<button class="btn btn-danger btn-sm" onclick="deletedClient('+value.id+')">Eliminar</button></td>');
			})
			initDataTable();
		},
	});
}

function initDataTable()
{
$('#dataTable').DataTable({
        "pagingType": "full_numbers",
        "destroy": true,
        "order": [[0, "asc"]],
        "scrollY": "418px",
        "scrollCollapse": true,
        "paging": false,
        retrieve: true
    });
}

function deletedClient(id)
{
	$.ajax({
		url: url+'/'+id,
		type: 'DELETE',
		headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	   	},
		success : function(response)
		{
			getClientAll();
			return true;
		}
	});
}