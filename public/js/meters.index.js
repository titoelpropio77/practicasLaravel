var FIELD_FORM = {
	'meter_id' : $( '#meter_id' ),
	'name_owner' : $( 'input[name=name_owner]' ),
	'internalcode' : $( 'input[name=internalcode]' ),
	'type' : $( 'select[name=type]' ),
	'name_company' : $( 'input[name=name_company]' )
}
var url = 'meters';
$(document).ready(function(){
	getMeterAll();
})
function saveMeter()
{
	var formData = $('#form-data').serializeArray();
	if (  $('#form-data').parsley().validate() )
	{
		$.ajax({
			url : url,
			 headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	   		 },
			type : 'POST',
			data : formData,
			success : function( response )
			{
				getMeterAll();
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
		$('#modal-title').text('Crear Meter');
		return;
	}
	$('#modal-title').text('Modificar Meter');
}
function getDataMeterById( idMeter )
{
	$.ajax({
		url : url+'/'+idMeter+'/edit',
		type : 'GET',
		success : function( response )
		{
			$( FIELD_FORM.meter_id ).val( response.data['id']  );
			for (var key in response.data)
			{
				$( FIELD_FORM[key] ).val( response.data[key] );
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
function getMeterAll()
{
	$('#dataTable').DataTable().destroy();
	var DTbody = $('#tbody');

	DTbody.empty();
	$.ajax({
		url : 'getMeterAll',
		type : 'GET',
		success : function(res)
		{
			var data = res.data;
			$.each(data, function(index, value){
				DTbody.append( '<tr><td>'+value.internalcode +'<td>'+value.name_owner+'<td>'+value.name_company+'<td>'+value.type+
					'<td><button class="btn btn-primary btn-sm" onclick="openModal(1);getDataMeterById('+value.id+')">Modificar</button>'+
					'<button class="btn btn-danger btn-sm" onclick="deletedMeter('+value.id+')">Eliminar</button></td>');
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

function deletedMeter(id)
{
	$.ajax({
		url: url+'/'+id,
		type: 'DELETE',
		headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	   	},
		success : function(response)
		{
			getMeterAll();
			return true;
		}
	});
}