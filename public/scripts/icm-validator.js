/**
 * Created by Efe Naci Giray
 * 6 - 2014
 */

$(document).ready(function() {
	$('.input-currency').on('keypress keyup keydown change', function(evt) {
		var decimals = $(this).attr('input-decimals');
		var formattedValue = formatMoney($(this).val(), decimals);

		var charCode = (evt.which) ? evt.which : event.keyCode;
		if (charCode > 31 && (charCode < 48 || charCode > 57)) {
	        return false;
	    }

		$(this).val(formattedValue);
	});

	$('.input-number-only').on('keypress keyup keydown change', function(evt) {
		var charCode = (evt.which) ? evt.which : event.keyCode;
		var positive = $(this).attr('input-positive');

	    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
	        return false;
	    }

	    if (positive) {
	    	if ($(this).val() < 0) {
	    		$(this).val() = 0;
	    	}
	    }

	    return true;
	});

	$('.input-text-only').on('keypress keyup keydown change', function(evt) {
		var code;

		if (!evt) {
			var evt = window.event;
		}

		if (evt.keyCode)  {
			code = evt.keyCode;
		} else if (evt.which) {
			code = evt.which;
		}

		var character = String.fromCharCode(code);
	    var AllowRegex  = /^[\ba-zA-Z\s-]$/;

	    if (AllowRegex.test(character))  {
	    	return true;
	    }

	    return false;
	});

	$('.input-no-punc').on('keypress keyup keydown change', function() {

	});

	function formatMoney(n, c, d, t){
	var n = this,
	    c = isNaN(c = Math.abs(c)) ? 2 : c,
	    d = d == undefined ? "." : d,
	    t = t == undefined ? "," : t,
	    s = n < 0 ? "-" : "",
	    i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "",
	    j = (j = i.length) > 3 ? j % 3 : 0;
	   return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
	 };
});