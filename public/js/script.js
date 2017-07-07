$(document).ready(function(){
	$(document).on('click','.edit-modal',function(){

			$('#id').val($(this).data('id'));
			$('#name').val($(this).data('name'));
			$('#quantity').val($(this).data('quantity'));
			$('#price').val($(this).data('price'));
	});
	$('#add').on('click',function(e){
		$.ajaxSetup({
		headers: {
		'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
		}
		});
		e.preventDefault();
		$.ajax({
			type:'post',
			url :'/storeProduct',
			dataType:"json",
			data:{
				'_token': $('input[name=_token]').val(),
				'name':$('input[name=name]').val(),
				'quantity':$('input[name=quantity]').val(),
				'price':$('input[name=price]').val()
			},
			success:function(data){
				if(data){
					$('.msg').html('<p style="color:green;">Your Product Add successfull!</p>');
					$('#add-modal').modal('hide');	
				}else{
					$('.msg').html('<p style="color:red;">Your Product Add Unsuccessfull!</p>');
				}
				var errors = data.responseJSON;
				console.log(errors);
			},
		})
	});

	
	$('#edit').on('click',function(e){
		e.preventDefault();
		$.ajax({
			type:'post',
			url :'/editProduct',
			data:{
				'_token': $('input[name=_token]').val(),
				'id': $('#id').val(),
				'name': $('#name').val(),
				'quantity': $('#quantity').val(),
				'price': $('#price').val()
			},
			success:function(data){
				console.log(data);
				 $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.name + "</td><td>" + data.quantity + "</td><td>" + data.price + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name='" + data.name + "' data-name='" + data.quantity + "' data-name='" + data.price + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-name='" + data.name + "' data-name='" + data.quantity + "' data-name='" + data.price + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
				 $('#edit-modal').modal('hide');
				 $('.msg').html('<p style="color:green;">Your Product update successfull!</p>');
			},
		})
	});
});