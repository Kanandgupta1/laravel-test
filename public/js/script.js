$(document).ready(function(){

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
});