var images = ['jpg', 'jpeg', 'png', 'gif'];

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


$(document).on('click', '.ms-elem-selectable', function(e) {
	var product_id = $(this).attr('id').replace('-selectable', '');

	$.ajax({
		type: "POST",
		url: base_url + 'products/getProductAjax/' + product_id,
		success: function(data){
			var product_info = $.parseJSON(data);
			$('#product-files').empty();
			$('#product-details-form').fadeIn(300);
			$('#product-details-button').fadeIn(300);
			$('#product-name').val(product_info.product['product_name']);
			$('#product-price').val(product_info.product['product_price'] + " TL");

			var files = product_info.product_files;

			for(i = 0; i < files.length; i++) {
				var extension = files[i].image_path.substring(files[i].image_path.lastIndexOf('.') + 1);

				if (images.indexOf(extension) != -1) {
					html =  '<div class="image-holder col-md-3" style="margin-bottom: 5px;">';
					html += '<img style="width: 50px; height: 50px;" src="' + base_url + 'uploads/' + files[i].image_path + '">';
					html += '<label class"checkbox-inline" style="margin-left: 5px;"><input type="checkbox"></label>';
					html += '</div>';

				} else {
					html =  '<div class="image-holder col-md-3" style="margin-bottom: 5px;">';
					html += '<img style="width: 50px; height: 50px; background-color: #eee;" alt="' + files[i].image_path.substring(0, 5) + '.." title="' + files[i].image_path + '"></img>';
					html += '<label class"checkbox-inline" style="margin-left: 5px; display: inline;"><input type="checkbox" value=""></label>';
					html += '</div>';
				}

				$('#product-files').append(html);
			}
        },
       	error:function(){
        }
	});
});
