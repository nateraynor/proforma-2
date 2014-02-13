var a = 0;
var i = 0;
var c = -1;
var colors = ['red', 'blue', 'yellow', 'green', 'purple'];

jQuery(document).ready(function() {
	$('#customer-add-field').click(function() {
		var field_name  	  = $('#customer-field-name').val();
		var field_type_value  = $('#customer-field-type').val();
		var field_type_name   = $('#customer-field-type').find(":selected").html();
		var field_description = $('#customer-field-type').find(":selected").attr('title');

		if (field_name === '') {
			$('#customer-field-name').attr('style', 'border: 1px solid red');
			return false;
		} else {
			$('#customer-field-name').attr('style', 'border: 1px solid #e5e5e5;');
		}

		html  = '<div class="form-group">';
		html +=	'	<label class="control-label col-md-3">' + field_name + '</label>';
		html += '	<div class="col-md-4">';
		html += '		<span class="help-block">' + field_type_name + '<small> ' + field_description + '</small></span>';
		html += '		<input type="hidden" name="customer[' + i + '][field_type]" value="' + field_type_value + '">';
		html += '		<input type="hidden" name="customer[' + i + '][field_name]" value="' + field_name + '">';

		if (field_type_value == 'select') {
			html += '<span class="help-block col-md-1">Değer</span>';
			html += '<div class="col-md-5"><input name="customer[' + i + '][option_value][0]" type="text" class="form-control"></div>';
			html += '<span class="help-block col-md-1">Değer Adı</span>';
			html += '<div class="col-md-5"><input name="customer[' + i + '][option_name][0]" type="text" class="form-control"></div>';
			html += '<div class="col-md-6"><a href="#" class="btn green" onclick="addOption(this); return false;" field-id="' + i + '" last-option-id="0">Değer Ekle <i class="fa fa-plus"></i></a></div>';
		}

		html += '	</div>';
		html += '</div>';

		$('#customer-field-name').val('');
		$('#customer-field-name').focus();
		$('#customer-field-holder').before(html);

 		i++;

	    return false;
	});

	$('#add-action').click(function(){
		var action_name = $('#action-name').val();

		if (action_name === '') {
			$('#action-name').attr('style', 'border: 1px solid red');
			return false;
		} else {
			$('#action-name').attr('style', 'border: 1px solid #e5e5e5;');
		}

		c++;
 
		if (c == 5) 
			c = 0;

		var color = colors[c];

		html  = '<div class="portlet box ' + color + '">';
		html += '	<div class="portlet-title">';
		html += '		<div class="caption">' + action_name + ' İşlemi</div>';
		html += '	</div>';
		html += '	<div class="portlet-body form">';
		html += '	<div class="form-body">';
		html += '		<div class="form-group">';
		html += '			<label class="control-label col-md-3">İşlem Uygulanan Kişi - Şirket</label>';
		html += '			<div class="col-md-4"><span class="help-block">Statik Alan</span></div>';
		html += '		</div>';
		html += '		<div class="form-group">';
		html += '			<label class="control-label col-md-3">İşlem Notları</label>';
		html += '			<div class="col-md-4"><span class="help-block">Statik Alan 255 Karakter Metin</span></div>';
		html += '		</div>';
		html += '		<div class="form-group">';
		html += '			<label class="control-label col-md-3">İşlem Durumları</label>';
		html += '			<div class="col-md-4"><span class="help-block">Dinamik Alan - Yöneticinin ekleyeceği işlem durumları kullanılır</span></div>';
		html += '		</div>';
		html += '		<div class="form-group">';
		html += '			<label class="control-label col-md-3">İşlem Ürün  İlişkisi</label>';
		html += '			<div class="col-md-4"><input type="radio" value="true" name="action[' + a + '][product_related]" checked>Evet<br><input type="radio" value="false" name="action[' + a + '][product_related]">Hayır</div>';
		html += '		</div>';
		html += '<div class="form-group" id="action-field-holder-' + a + '">';
		html += '    <label class="control-label col-md-3">Alan Ekle</label>';
		html += '    <div class="col-md-4">';
		html += '        <span class="help-block">';
		html += '            <div class="col-md-6"><input class="form-control" type="text" id="action-field-name-' + a + '"></div>';
		html += '            <div class="col-md-6">';
		html += '                <select class="form-control" id="action-field-type-' + a + '">';

		for (var z = 0; z < variable_types.length; z++) {
			html += '<option value="' + variable_types[z].variable_value + '" title="' + variable_types[z].variable_description + '">' + variable_types[z].variable_name + '</option>';
		};

		html += '                </select>';
		html += '            </div>';
		html += '        </span>';
		html += '    </div>';
		html += '    <div class="col-md-2">';
		html += '    	 <input type="hidden" name="action[' + a + '][action_name]" value="' + action_name + '">';
		html += '        <a href="#" class="btn green" variable-counter="0"  action-counter="' + a + '" onclick="addActionVariable(this); return false;">Ekle <i class="fa fa-plus"></i></a>';
		html += '    </div>';
		html += '</div>';
		html += '	</div>';
		html += '	</div>';
		html += '</div>';
		

		a++;

		$('#tab3').append(html);
		$('#action-name').val("");

		return false;
	});
});

function addActionVariable(element) {
	var a = $(element).attr('action-counter');
	var x = parseInt($(element).attr('variable-counter'));

	var field_name  	  = $('#action-field-name-' + a).val();
	var field_type_value  = $('#action-field-type-' + a).val();
	var field_type_name   = $('#action-field-type-' + a).find(":selected").html();
	var field_description = $('#action-field-type-' + a).find(":selected").attr('title');

	if (field_name === '') {
		$('#action-field-name-' + a).attr('style', 'border: 1px solid red');
		return false;
	} else {
		$('#action-field-name-' + a).attr('style', 'border: 1px solid #e5e5e5;');
	}

	html  = '<div class="form-group">';
	html +=	'	<label class="control-label col-md-3">' + field_name + '</label>';
	html += '	<div class="col-md-4">';
	html += '		<span class="help-block">' + field_type_name + '<small> ' + field_description + '</small></span>';
	html += '		<input type="hidden" name="action[' + a + '][variables][' + x + '][field_type]" value="' + field_type_value + '">';
	html += '		<input type="hidden" name="action[' + a + '][variables][' + x + '][field_name]" value="' + field_name + '">';

	if (field_type_value == 'select') {
		html += '<span class="help-block col-md-1">Değer</span>';
		html += '<div class="col-md-5"><input name="action[' + a + '][variables][' + x + '][option_value][0]" type="text" class="form-control"></div>';
		html += '<span class="help-block col-md-1">Değer Adı</span>';
		html += '<div class="col-md-5"><input name="action[' + a + '][variables][' + x + '][option_name][0]" type="text" class="form-control"></div>';
		html += '<div class="col-md-6"><a href="#" class="btn green" onclick="addActionOption(this, ' + x + ', ' + a + '); return false;" field-id="' + a + '" last-option-id="0">Değer Ekle <i class="fa fa-plus"></i></a></div>';
	}

	html += '	</div>';
	html += '</div>';

	$(element).attr('variable-counter', x + 1);

	$('#action-field-name-' + a).val('');
	$('#action-field-name-' + a).focus();
	$('#action-field-holder-' + a).before(html);

    return false;
}

function addActionOption(element, x, action_id) {
	var field_id = $(element).attr('field-id');
	var field_option_id = $(element).attr('last-option-id');
	field_option_id++;

	html  = '<div class="clearfix"></div><span class="help-block col-md-1">Değer</span>';
	html += '<div class="col-md-5"><input name="action[' + action_id + '][variables][' + x + '][option_value][' + field_option_id + ']" type="text" class="form-control"></div>';
	html += '<span class="help-block col-md-1">Değer Adı</span>';
	html += '<div class="col-md-5"><input name="action[' + action_id + '][variables][' + x + '][option_name][' + field_option_id + ']" type="text" class="form-control"></div>';

	$(element).attr('last-option-id', field_option_id);
	$(element).parent().before(html);
}

function addOption(element) {
	var field_id = $(element).attr('field-id');
	var field_option_id = $(element).attr('last-option-id');
	field_option_id++;

	html  = '<div class="clearfix"></div><span class="help-block col-md-1">Değer</span>';
	html += '<div class="col-md-5"><input name="customer[' + field_id + '][option_value][' + field_option_id + ']" type="text" class="form-control"></div>';
	html += '<span class="help-block col-md-1">Değer Adı</span>';
	html += '<div class="col-md-5"><input name="customer[' + field_id + '][option_name][' + field_option_id + ']" type="text" class="form-control"></div>';

	$(element).attr('last-option-id', field_option_id);
	$(element).parent().before(html);
}