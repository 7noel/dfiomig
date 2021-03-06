$(document).ready(function(){
	$('.btn-delete').click(function(e){
		if (!confirm("Seguro que desea eliminar el Registro?")) {
			e.preventDefault();
			return;
		}
		
		e.preventDefault();
		var row = $(this).parents('tr');
		var id = row.data('id');
		var form = $('#form-delete');
		var url = form.attr('action').replace(':_ID', id);
		var data = form.serializeArray();
		/*var array = {p1:{cod:'0001', price:'15.4', unit:'lt'},p2:{cod:'0501', price:'75.4', unit:'lt'}};
		//var array = {p1:'lt'};
		data.push({name: "param2", value: array});
		data.push({param3: false});
		console.log(data);*/
		row.fadeOut();

		$.post(url, data, function(result){
			alert(result.message);
		}).fail(function(result){
			alert('El registro no fue eliminado');
			row.show();
			console(result);
		});
	});

	$('#tableStocks').on('click','.btn-delete-stock',function(e){
		if (!confirm("Seguro que desea eliminar el Registro?")) {
			e.preventDefault();
			return;
		}
		e.preventDefault();
		var row = $(this).parents('tr');
		row.fadeOut();
		row.remove();
	});

});