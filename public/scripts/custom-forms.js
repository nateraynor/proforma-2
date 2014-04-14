var images = ['jpg', 'jpeg', 'png', 'gif'];
var product_row = 1;
var e = null;

function autocompleteResult(element, product_id, price, tax_rate_id) {
	$(element).parents('.autocomplete-results').siblings('.autocomplete-input').val($(element).html());
	$(element).parents('.autocomplete-results').siblings('.hidden-id').val(product_id);
	$(element).parents('.form-group').find('.product-price').val(price);
	$(element).parents('.autocomplete-results').fadeOut(300);
	$(element).parents('.form-group').find('.product-tax-rate option').each(function() {
		if ($(this).val() == tax_rate_id)
			$(this).attr('selected', 'true');
	});
}

function removeRow(element) {
	$(element).parents('.row').first().remove();
}

function product_autocomplete(element) {
	var value = $(element).val();

	if (element.keyCode != 13 && element.keyCode != 8 && element.keyCode != 37 && element.keyCode != 38 && element.keyCode != 39 && element.button != 1 && element.button != 2 && element.button != 3) {
        $(element).siblings(".autocomplete-results").fadeOut(300);
        $(element).siblings(".autocomplete-results").empty();

        if (e) clearTimeout(e);

        e = setTimeout(function () {
            var e = value;
            $.ajax({
                url: base_url + 'products/getProductsAjax/' + encodeURIComponent(value),
                success: function (e) {
                    $(element).siblings(".autocomplete-results").append(e);
                    $(element).siblings(".autocomplete-results").fadeIn(300)
                }
            });
        }, 500);
    }
}

$(document).on('blur', '.autocomplete-input', function() {
	$(this).siblings(".autocomplete-results").fadeOut(300);
});

$(document).on('focus', '.autocomplete-input', function() {
	$(this).siblings(".autocomplete-results").fadeIn(300);
});

$(document).ready(function(){
	var total = 0;

	$('#add-tax-rate').click(function() {
		html  = '<div class="row">';
		html  = '	<div class="form-group">';
		html += '		<div class="col-md-3"><input type="text" value="" class="form-control" name="tax_rate[' + tax_rate_row + '][name]"><input type="hidden" value="' + tax_rate_row + '" name="tax_rate[' + tax_rate_row + '][tax_rate_id]"></div>';
		html += '		<div class="col-md-3"><input type="text" value="" class="form-control" name="tax_rate[' + tax_rate_row + '][rate]" style="margin-bottom: 10px;"></div>';
		html += '		<div class="col-md-1"><a class="btn red" onclick="removeRow(this); return false;">Kaldır</a></div>';
		html += '	</div>';
		html += '</div>';
		html += '<div class="clearfix"></div>';

		$('#tax-rate-list').append(html);
		tax_rate_row++;
	});


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

	$('#add-product').click(function(){
		var html = '';

		html  = '<div class="col-md-12" style="margin-top: 10px;">';
		html += '<div class="row">';
		html +=	'	<div class="form-group">';
		html +=	'		<div class="col-md-3">';
		html +=	'			<div class="input-group">';
		html +=	'				<input class="form-control autocomplete-input" onkeyup="product_autocomplete(this);" placeholder="Ürün" type="text" value="">';
		html +=	'				<div class="autocomplete-results"></div>';
		html +=	'				<input type="hidden" class="hidden-id" value="" name="product[' + product_row + '][product_id]">';
		html +=	'				<span class="input-group-addon"><i class="fa fa-cross"></i></span>';
		html +=	'			</div>';
		html +=	'		</div>';
		html +=	'		<div class="col-md-1"><input class="product-quantity form-control" type="number" name="product[' + product_row + '][quantity]" placeholder="Adet" value=""></div>';
		html +=	'		<div class="col-md-2">';
		html +=	'			<div class="input-group">';
		html +=	'				<input class="product-price form-control" type="text" value="" name="product[' + product_row + '][price]" placeholder="Birim Fiyat">';
		html +=	'				<span class="input-group-addon"><i class="fa fa-try"></i></span>';
		html +=	'			</div>';
		html +=	'		</div>';
		html +=	'		<div class="col-md-2"><input class="product-discount form-control" type="text" name="product[' + product_row + '][discount]" value="" placeholder="İndirim"></div>';
		html +=	'		<div class="col-md-2">';
		html +=	'			<select class="product-discount-type form-control" name="product[' + product_row + '][discount_type]">';
		html +=	'				<option disabled readonly selected="true">İndirim Tipi</option>';
		html +=	'				<option>%</option>';
		html +=	'				<option>TRL</option>';
		html +=	'			</select>';
		html +=	'		</div>';
		html +=	'		<div class="col-md-2">';
		html +=	'			<select class="product-tax-rate form-control" name="product[' + product_row + '][tax_rate]">';
		html +=	'				<option disabled readonly selected="true">Vergi Oranı</option>';
		html +=	'				<option>%0</option>';
		html +=	'				<option>%1</option>';
		html +=	'				<option>%8</option>';
		html +=	'				<option>%18</option>';
		html +=	'			</select>';
		html +=	'		</div>';
		html +=	'	</div>';
		html +=	'</div>';
		html +=	'</div>';

		$(this).parents('.col-md-12').first().before(html);

		product_row++;

		return false;
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