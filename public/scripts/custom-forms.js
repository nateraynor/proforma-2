var images = ['jpg', 'jpeg', 'png', 'gif'];
var product_row = 1;
var e = null;
var total = 0;

function getExchange(element, result_id, rate) {
	var value = $(element).parents('.input-group-addon').siblings('input').attr('baseprice');
	var result = Math.round(value / rate * 100) / 100;
	$(element).parents('.input-group-addon').siblings('input').val(result);
	$(element).parents('.dropdown-menu').siblings('input').val($(element).html());
	$(element).parents('.dropdown-menu').siblings('.hidden-id').val($(element).html());
	$(element).parents('.input-group-addon').siblings('input').trigger('change');
}



function calculatePrice(type) {
	var total = 0;

	$('.total-product-price').each(function() {

		if ($(this).val() === '')
			$(this).val(0);

		var quantity = $(this).parents('.form-group').find('.product-quantity').val();
		var price 	 = $(this).parents('.form-group').find('.product-price').val();
		var discount_type 	= $(this).parents('.form-group').find('.product-discount-type').val();
		var discount_amount = $(this).parents('.form-group').find('.product-discount').val();

		if (quantity == '')
			quantity = 1;

		price = price.replace(/\,/g,'');


		var temp_total = parseFloat(quantity * price);

		if (discount_type !== null) {
			var discounted_price = 0;

			if (discount_type == '1') {
				discounted_price = temp_total - (temp_total * discount_amount / 100);
			} else {
				discounted_price = temp_total - (discount_amount * quantity);
			}

			temp_total = parseFloat(discounted_price);
		}

		$(this).parents('.form-group').find('.product-price').formatCurrency();
		$(this).siblings('span').html(temp_total);
		$(this).siblings('span').formatCurrency();
		$(this).siblings('span').prepend('Toplam: ');
		$(this).siblings('span').append(' TRY');
		total += parseFloat(temp_total);
	});

	$('#proposal-total').val(total);
	$('#proposal-total').formatCurrency();
}

function autocompleteResult(element, product_id, price, tax_rate_id) {
	price = price.toFixed(2);

	$(element).parents('.autocomplete-results').siblings('.autocomplete-input').val($(element).html());
	$(element).parents('.autocomplete-results').siblings('.hidden-id').val(product_id);

	$(element).parents('.form-group').find('.product-price').val(price);
	$(element).parents('.form-group').find('.product-quantity').val(1);

	$(element).parents('.form-group').find('.product-price').attr("baseprice", price);
	$(element).parents('.form-group').find('.total-text').html("Toplam: " + price + " TRY");
	$(element).parents('.form-group').find('.total-product-price').val(price);

	$(element).parents('.form-group').find('.product-price').trigger('change');
	$(element).parents('.autocomplete-results').fadeOut(300);

	$(element).parents('.form-group').find('.product-tax-rate option').each(function() {
		if ($(this).val() == tax_rate_id)
			$(this).attr('selected', 'true');
	});
}

function removeRow(element) {
	$(element).parents('.row').first().parent().remove();
	$(element).parents('.row').find('.product-price').first().trigger('change');
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
	$('.currency').blur(function() {
		$(this).formatCurrency();
	});
/*
	console.log(typeof $('.total-text'));

	if (typeof $('.total-text') !== 'object') {
		$('.product-price').formatCurrency();
		$('.total-text').html().replace('Toplam: ', '');
		$('.total-text').html().replace(' TRY', '');
		$('.total-text').formatCurrency();
		$('.total-text').append(' TRY');
		$('.total-text').prepend('Toplam :');
	}
*/
	$('#add-tax-rate').click(function() {
		html  = '<div class="row">';
		html += '	<div class="form-group">';
		html += '		<div class="col-md-3"><input type="text" value="" class="form-control" name="tax_rate[' + tax_rate_row + '][name]"><input type="hidden" value="' + tax_rate_row + '" name="tax_rate[' + tax_rate_row + '][tax_rate_id]"></div>';
		html += '		<div class="col-md-3"><input type="text" value="" class="form-control" name="tax_rate[' + tax_rate_row + '][rate]" style="margin-bottom: 10px;"></div>';
		html += '		<div class="col-md-1"><a class="btn red" onclick="removeRow(this); return false;">Kaldır</a></div>';
		html += '	</div>';
		html += '</div>';
		html += '<div class="clearfix"></div>';

		$('#tax-rate-list').append(html);
		tax_rate_row++;
	});

	$('#add-exchange-rate').click(function() {
		html  = '<div class="row">';
		html  += '	<div class="form-group">';

		html += '		<div class="col-md-2"><input type="text" value="" class="form-control" name="exchange_rate[' + exchange_rate_row + '][name]"><input type="hidden" value="' + exchange_rate_row + '" name="exchange_rate[' + exchange_rate_row + '][exchange_rate_id]"></div>';
		html += '		<div class="col-md-2 values"><input type="text" value="" class="form-control code" name="exchange_rate[' + exchange_rate_row + '][code]" style="margin-bottom: 10px;"></div>';
		html += '		<div class="col-md-1"><a class="btn red" onclick="calculateExchange(this, ' + exchange_rate_row + '); return false;">Hesapla</a></div>';
		html += '		<div class="col-md-2 rates"><input type="text" value="" id="result-' + exchange_rate_row + '" class="form-control result" name="exchange_rate[' + exchange_rate_row + '][rate]" style="margin-bottom: 10px;"></div>';
		html += '		<div class="col-md-1"><a class="btn red" onclick="removeRow(this); return false;">Kaldır</a></div>';
		html += '	</div>';
		html += '</div>';
		html += '<div class="clearfix"></div>';

		$('#exchange-rate-list').append(html);
		exchange_rate_row++;
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
		html +=	'		<div class="col-md-2">';
		html +=	'			<div class="input-group">';
		html +=	'				<input class="form-control autocomplete-input" autocomplete="off" onkeyup="product_autocomplete(this);" placeholder="Ürün" type="text" value="" name="proposal_product[' + proposal_product_row + '][name]">';
		html +=	'				<div class="autocomplete-results"></div>';
		html +=	'				<input type="hidden" class="hidden-id" value="-1" name="proposal_product[' + proposal_product_row + '][product_id]">';
		html +=	'				<span class="input-group-addon"><a onclick="removeRow(this).parent().parent(); return false;"><i class="fa fa-times"></i></a></span>';
		html +=	'			</div>';
		html +=	'		</div>';
		html +=	'		<div class="col-md-1 quantity"><input class="product-quantity form-control"  onchange="calculatePrice();" value="" type="number" name="proposal_product[' + proposal_product_row + '][product_quantity]" placeholder="Adet" value=""></div>';
		html +=	'		<div class="col-md-2 price">';
		html +=	'			<div class="input-group">';
		html +=	'				<input class="product-price form-control currency" id="currencyField" onchange="calculatePrice();" baseprice="" id="price-' + proposal_product_row + '" type="text" value="" name="proposal_product[' + proposal_product_row + '][product_price]" placeholder="Birim Fiyat">';
		html +=	'				<span class="input-group-addon" style="padding: 0px; border: 1px;"></span>';
		html +=	'			</div>';
		html +=	'		</div>';
		html +=	'		<div class="col-md-2 discount"><input class="product-discount form-control" onchange="calculatePrice(); "type="text" name="proposal_product[' + proposal_product_row + '][product_discount]" value="" placeholder="İndirim"></div>';
		html +=	'		<div class="col-md-1">';
		html +=	'			<select class="product-discount-type form-control disc" onChange="calculatePrice();" name="proposal_product[' + proposal_product_row + '][product_discount_type]">';
		html +=	'				<option disabled readonly selected="true">İndirim Tipi</option>';
		html +=	'				<option value="1">%</option>';
		html +=	'				<option value="2">Miktar</option>';
		html +=	'			</select>';
		html +=	'		</div>';
		html +=	'		<div class="col-md-2">';
		html +=	'			<select class="product-tax-rate form-control" name="proposal_product[' + proposal_product_row + '][product_tax_rate]"><option disabled readonly selected="true">Vergi Oranı</option>' + tax_rates +'</select>';
		html +=	'		</div>';
		html += '		<div class="col-md-2">';
		html += '			<span style="border: none;" class="form-control total-text">Toplam: 0 TRY</span>';
		html += '			<input type="hidden" class="total-product-price" value="0">';
		html += '		</div>';
		html +=	'	</div>';
		html +=	'</div>';
		html +=	'</div>';

		$(this).parents('.col-md-12').first().before(html);

		proposal_product_row++;

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

