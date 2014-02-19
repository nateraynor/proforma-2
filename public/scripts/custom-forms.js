$(document).ready(function(){
	var total = 0;

	$('#template-' + $('#proposal-template').val()).fadeIn(800);

	$('.change-pic').click(function(){
		$(this).siblings('.thumbnail').fadeOut(200);
		$(this).siblings('.fileupload').fadeIn(600);
		$(this).remove();
		return false;
	});

	$('#proposal-template').change(function() {
		var id = $(this).val();

		$('.template').fadeOut(300);
		$('#template-' + id).fadeIn(600);
	});

	$('.save-template').click(function() {
		var html = $('div.active').children('.template').html();
		var template_id = $('div.active').find('.template-id').val();
		var template_name = $('div.active').find('.template-name').val();
		$.ajax({
			type: "POST",
			url: base_url + 'settings/saveTemplate/' + template_id,
			data: '&template_html=' + html + '&template_name=' + template_name,
			success: function(){
				bootbox.alert(template_name + " şablonu başarıyla değiştirilmiştir.");
	        },
	       	error:function(){
	        }
		});
	});

	$('#products-select').change(function() {
		total = 0

		$('#products-select :selected').each(function(){
			total += parseFloat($(this).attr('price'));
		});

		$('#proposal-total').val(total);
	});

	$('#proposal-total').change(function() {
		var difference = total - $(this).val();
		var rate = difference * 100 / total;

		$('#proposal-discount').val(rate);
	});

	$('#proposal-discount').change(function() {
		$('#proposal-total').val(total - (total * $(this).val() / 100));
	});

	$('.remove-file').click(function(){
		var file_id = $(this).attr('file');
		var preview = $(this).parent();
		$.ajax({
			type: "POST",
			url: base_url + 'products/removeFile/' + file_id,
			success: function(){
				bootbox.alert("Resim başarıyla silinmiştir.");
				preview.fadeOut(500);
	        },
	       	error:function(){
				bootbox.alert("<strong style='color: red;'>Dikkat! Resim silinemedi. Lütfen tekrar deneyin.</strong>");
	        }
		});
	});
});