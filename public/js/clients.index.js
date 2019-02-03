var FIELD_FORM = {
	'client_id' : $( '#client_id' ),
	'name' : $( 'input[name=name]' ),
	'lastname' : $( 'input[name=lastname]' ),
	'email' : $( 'input[name=email]' ),
	'celphone' : $( 'input[name=celphone]' ),
	'address' : $( 'input[name=address]' ),
	'cedula_identidad' : $( 'input[name=cedula_identidad]' ),
	'extension_cedula' : $( 'input[name=extension_cedula]' )
}
var url = 'clients';
$(document).ready(function(){
	getAll();
	cerrarCargando();
})

var url = 'clients';
function getAll()
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
					'<td><button class="btn btn-primary btn-sm" onclick="openModal(1);getDataByIdInputs('+value.id+')">Modificar</button>'+
					'<button class="btn btn-danger btn-sm" onclick="deletedClient('+value.id+')">Eliminar</button></td>');
			})
			initDataTable();
		},
	});
}
