$(document).ready(function() {
	$('#filter_button').click(function() {
		var filter_proposal_id = $('#filter_proposal_id').val();
		var filter_proposal_name = $('#filter_proposal_name').val();
		var filter_proposal_total = $('#filter_proposal_total').val();
		var filter_proposal_status = $('#filter_proposal_status').val();

		window.location.href = page_url + '?sort=' + sort + '&sort_order=' + order + '&filter_proposal_id=' + encodeURIComponent(filter_proposal_id) + '&filter_proposal_name=' + encodeURIComponent(filter_proposal_name) + '&filter_proposal_total=' + encodeURIComponent(filter_proposal_total) + '&filter_proposal_status=' + encodeURIComponent(filter_proposal_status);
	});

	$('.sort').click(function(){
		if (sort == $(this).attr('sort')) {
			if (order == 'desc')
				order = 'asc';
			else
				order = 'desc';
		}

		sort = $(this).attr('sort');

		var filter_proposal_id = $('#filter_proposal_id').val();
		var filter_proposal_name = $('#filter_proposal_name').val();
		var filter_proposal_total = $('#filter_proposal_total').val();
		var filter_proposal_status = $('#filter_proposal_status').val();

		window.location.href = page_url + '?sort=' + sort + '&sort_order=' + order + '&filter_proposal_id=' + encodeURIComponent(filter_proposal_id) + '&filter_proposal_name=' + encodeURIComponent(filter_proposal_name) + '&filter_proposal_total=' + encodeURIComponent(filter_proposal_total) + '&filter_proposal_status=' + encodeURIComponent(filter_proposal_status);
	});
});