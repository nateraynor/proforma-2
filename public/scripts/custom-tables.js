$(document).ready(function() {

	$('[data-onload]').each(function(){
    	eval($(this).data('onload'));
	});

	$('.column-toggler').click(function() {
		var column_name = $(this).attr('data-column-value');
		console.log(column_name);
		$.ajax({

			type: "POST",

			url: base_url + 'home/updateColumnDisplayAjax/' + column_name,
			success: function(){
	        },
	        error:function(){
	        }
		});

	});
});

function setDisplay(element) {
	var oTable = $('.sample_2').dataTable();

	var iCol = parseInt($(element).attr("data-column"));

    var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;

    oTable.fnSetColumnVis(iCol, (bVis ? false : true));
}