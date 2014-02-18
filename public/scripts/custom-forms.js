$(document).ready(function(){
	var total = 0;

	$('#template-' + $('#proposal-template').val()).fadeIn(800);

	$('.change-pic').click(function(){
		$(this).siblings('.thumbnail').fadeOut(200);
		$(this).siblings('.fileupload').fadeIn(600);
		$(this).remove();
		return false;
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
});