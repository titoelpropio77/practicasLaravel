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
				return true;
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

function cleanForm()
{
	$('input[name]').val('');
}