var FIELD_FORM = {
	'room_id' : $( '#room_id' ),
	'name' : $( 'input[name=name]' ),
	'address' : $( 'input[name=address]' ),
	'internal_code' : $( 'input[name=internal_code]' ),
	'description' : $( 'input[name=description]' ),
	'price' : $( 'input[name=price]' ),
	'number_room' : $( 'input[name=number_room]' ),
	'typerooms_id' : $( 'select[name=typerooms_id]' )
}
var url = 'rooms';
var typeSend = '';
var concatUrl = '';
$(document).ready(function(){
	getAll();
})
function save()
{
	var formData = $('#form-data').serializeArray();
	if (  $('#form-data').parsley().validate() )
	{
		$.ajax({
			url : url+concatUrl,
			 headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	   		 },
			type : typeSend,
			data : formData,
			success : function( response )
			{
				getAll();
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
		typeSend = 'POST';
		concatUrl = '';
		$('#modal-title').text('Crear Tipo de Propiedad');
		return;
	}
	typeSend = 'PUT';
	$('#modal-title').text('Modificar Tipo de Propiedad');
}
function getDataRoomTypeById( id )
{
	$.ajax({
		url : url+'/'+id+'/edit',
		type : 'GET',
		success : function( response )
		{
			$( FIELD_FORM.room_id ).val( response.data[0]['id']  );
			for (var key in response.data[0])
			{
				$( FIELD_FORM[key] ).val( response.data[0][key] );
			}
			concatUrl = '/'+response.data[0]['id'];
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
function getAll()
{
	$('#dataTable').DataTable().destroy();
	var DTbody = $('#tbody');

	DTbody.empty();
	$.ajax({
		url : 'getRoomAll',
		type : 'GET',
		success : function(res)
		{
			var data = res.data;
			$.each(data, function(index, value){
				DTbody.append( '<tr><td>'+value.id +'<td>'+value.name+'<td>'+value.description +'<td>'+value.price+'<td>'+value.address+'<td>'+
					value.number_room+'<td>'+value.type_room.name+
					'<td><button class="btn btn-primary btn-sm" onclick="openModal(1);getDataRoomTypeById('+value.id+')">Modificar</button>'+
					'<button class="btn btn-danger btn-sm" onclick="deleted('+value.id+')">Eliminar</button></td>');
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

function deleted(id)
{
	$.ajax({
		url: url+'/'+id,
		type: 'DELETE',
		headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	   	},
		success : function(response)
		{
			getAll();
			return true;
		}
	});
}