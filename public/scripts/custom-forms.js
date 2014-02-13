$(document).ready(function(){
	$('.change-pic').click(function(){
		$(this).siblings('.thumbnail').fadeOut(200);
		$(this).siblings('.fileupload').fadeIn(600);
		$(this).remove();
		return false;
	});
});