$(document).ready(function() {
	$('#filter_button').click(function() {
		var filter_proposal_id = $('#filter_proposal_id').val();
		var filter_proposal_name = $('#filter_proposal_name').val();
		var filter_customer_name = $('#filter_customer_name').val();
		var filter_proposal_total = $('#filter_proposal_total').val();
		var filter_proposal_status = $('#filter_proposal_status').val();
		var filter_proposal_date_added = $('#filter_proposal_date_added').val();
		var filter_proposal_date_updated = $('#filter_proposal_date_updated').val();

		window.location.href = page_url + '?sort=' + sort + '&sort_order=' + order + '&filter_proposal_id=' + encodeURIComponent(filter_proposal_id) + '&filter_proposal_name=' + encodeURIComponent(filter_proposal_name) + '&filter_customer_name=' + encodeURIComponent(filter_customer_name) + '&filter_proposal_total=' + encodeURIComponent(filter_proposal_total) +  '&filter_proposal_status=' + encodeURIComponent(filter_proposal_status) +'&filter_proposal_date_added=' + encodeURIComponent(filter_proposal_date_added) + '&filter_proposal_date_updated=' + encodeURIComponent(filter_proposal_date_updated);
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
		var filter_customer_name = $('#filter_customer_name').val();
		var filter_proposal_total = $('#filter_proposal_total').val();
		var filter_proposal_status = $('#filter_proposal_status').val();
		var filter_proposal_date_added = $('#filter_proposal_date_added').val();
		var filter_proposal_date_updated = $('#filter_proposal_date_updated').val();


		window.location.href = page_url + '?sort=' + sort + '&sort_order=' + order + '&filter_proposal_id=' + encodeURIComponent(filter_proposal_id) + '&filter_proposal_name=' + encodeURIComponent(filter_proposal_name) + '&filter_customer_name=' + encodeURIComponent(filter_customer_name) + '&filter_proposal_total=' + encodeURIComponent(filter_proposal_total) + '&filter_proposal_status=' + encodeURIComponent(filter_proposal_status) + '&filter_proposal_date_added=' + encodeURIComponent(filter_proposal_date_added) + '&filter_proposal_date_updated=' + encodeURIComponent(filter_proposal_date_updated);
	});

	$('#filter_draft_button').click(function() {
			var filter_proposal_id = $('#filter_proposal_id').val();
			var filter_proposal_name = $('#filter_proposal_name').val();
			var filter_customer_name = $('#filter_customer_name').val();
			var filter_proposal_total = $('#filter_proposal_total').val();
			var filter_proposal_date_added = $('#filter_proposal_date_added').val();

			window.location.href = page_url + '?sort=' + sort + '&sort_order=' + order + '&filter_proposal_id=' + encodeURIComponent(filter_proposal_id) + '&filter_proposal_name=' + encodeURIComponent(filter_proposal_name) + '&filter_customer_name=' + encodeURIComponent(filter_customer_name) + '&filter_proposal_total=' + encodeURIComponent(filter_proposal_total) + '&filter_proposal_date_added=' + encodeURIComponent(filter_proposal_date_added) ;
		});

	$('.draft_proposal_sort').click(function(){
		if (sort == $(this).attr('sort')) {
			if (order == 'desc')
				order = 'asc';
			else
				order = 'desc';
		}

		sort = $(this).attr('sort');

		var filter_proposal_id = $('#filter_proposal_id').val();
		var filter_proposal_name = $('#filter_proposal_name').val();
		var filter_customer_name = $('#filter_customer_name').val();
		var filter_proposal_total = $('#filter_proposal_total').val();
		var filter_proposal_date_added = $('#filter_proposal_date_added').val();
		var filter_proposal_date_updated = $('#filter_proposal_date_updated').val();

		window.location.href = page_url + '?sort=' + sort + '&sort_order=' + order + '&filter_proposal_id=' + encodeURIComponent(filter_proposal_id) + '&filter_proposal_name=' + encodeURIComponent(filter_proposal_name) + '&filter_customer_name=' + encodeURIComponent(filter_customer_name) + '&filter_proposal_total=' + encodeURIComponent(filter_proposal_total) + '&filter_proposal_date_added=' + encodeURIComponent(filter_proposal_date_added) ;
	});


	$('#filter_excel_button').click(function() {
			var filter_proposal_id = $('#filter_proposal_id').val();
			var filter_proposal_name = $('#filter_proposal_name').val();
			var filter_customer_name = $('#filter_customer_name').val();
			var filter_proposal_total = $('#filter_proposal_total').val();
			var filter_proposal_status = $('#filter_proposal_status').val();
			var filter_proposal_date_added = $('#filter_proposal_date_added').val();
			var filter_proposal_date_updated = $('#filter_proposal_date_updated').val();

			window.location.href = excel_url + '?sort=' + sort + '&sort_order=' + order + '&filter_proposal_id=' + encodeURIComponent(filter_proposal_id) + '&filter_proposal_name=' + encodeURIComponent(filter_proposal_name) + '&filter_customer_name=' + encodeURIComponent(filter_customer_name) + '&filter_proposal_total=' + encodeURIComponent(filter_proposal_total) + '&filter_proposal_status=' + encodeURIComponent(filter_proposal_status) + '&filter_proposal_date_added=' + encodeURIComponent(filter_proposal_date_added) + '&filter_proposal_date_updated=' + encodeURIComponent(filter_proposal_date_updated);
		});


	$('#filter_product_button').click(function() {
		var filter_product_id = $('#filter_product_id').val();
		var filter_product_name = $('#filter_product_name').val();
		var filter_category_name = $('#filter_category_name').val();
		var filter_brand_name = $('#filter_brand_name').val();
		var filter_product_price = $('#filter_product_price').val();

		window.location.href = page_url + '?sort=' + sort + '&sort_order=' + order + '&filter_product_id=' + encodeURIComponent(filter_product_id) + '&filter_product_name=' + encodeURIComponent(filter_product_name) + '&filter_category_name=' + encodeURIComponent(filter_category_name) + '&filter_brand_name=' + encodeURIComponent(filter_brand_name) +'&filter_product_price=' + encodeURIComponent(filter_product_price);
	});

	$('.product-sort').click(function(){
		if (sort == $(this).attr('product-sort')) {
			if (order == 'desc')
				order = 'asc';
			else
				order = 'desc';
		}

		sort = $(this).attr('product-sort');

		var filter_product_id = $('#filter_product_id').val();
		var filter_product_name = $('#filter_product_name').val();
		var filter_category_name = $('#filter_category_name').val();
		var filter_brand_name = $('#filter_brand_name').val();
		var filter_product_price = $('#filter_product_price').val();
		var filter_product_status = $('#filter_product_status').val();

		window.location.href = page_url + '?sort=' + sort + '&sort_order=' + order + '&filter_product_id=' + encodeURIComponent(filter_product_id) + '&filter_product_name=' + encodeURIComponent(filter_product_name) + '&filter_category_name=' + encodeURIComponent(filter_category_name) + '&filter_brand_name=' + encodeURIComponent(filter_brand_name) +'&filter_product_price=' + encodeURIComponent(filter_product_price) + '&filter_product_status=' + encodeURIComponent(filter_product_status);
	});


	$('#filter_excel_product_button').click(function() {
			var filter_product_id = $('#filter_product_id').val();
			var filter_product_name = $('#filter_product_name').val();
			var filter_category_name = $('#filter_category_name').val();
			var filter_brand_name = $('#filter_brand_name').val();
			var filter_product_price = $('#filter_product_price').val();
			var filter_product_status = $('#filter_product_status').val();

			window.location.href = excel_url + '?sort=' + sort + '&sort_order=' + order + '&filter_product_id=' + encodeURIComponent(filter_product_id) + '&filter_product_name=' + encodeURIComponent(filter_product_name) + '&filter_category_name=' + encodeURIComponent(filter_category_name) + '&filter_brand_name=' + encodeURIComponent(filter_brand_name) +'&filter_product_price=' + encodeURIComponent(filter_product_price) + '&filter_product_status=' + encodeURIComponent(filter_product_status);
		});

	$('#filter_customer_button').click(function() {
		var filter_customer_id = $('#filter_customer_id').val();
		var filter_customer_name = $('#filter_customer_name').val();
		var filter_customer_surname = $('#filter_customer_surname').val();
		var filter_customer_email = $('#filter_customer_email').val();

		window.location.href = page_url + '?sort=' + sort + '&sort_order=' + order + '&filter_customer_id=' + encodeURIComponent(filter_customer_id) + '&filter_customer_name=' + encodeURIComponent(filter_customer_name) + '&filter_customer_surname=' + encodeURIComponent(filter_customer_surname) + '&filter_customer_email='+ encodeURIComponent(filter_customer_email) ;
	});

	$('.customer-sort').click(function(){
		if (sort == $(this).attr('sort')) {
			if (order == 'desc')
				order = 'asc';
			else
				order = 'desc';
		}

		sort = $(this).attr('sort');

		var filter_customer_id = $('#filter_customer_id').val();
		var filter_customer_name = $('#filter_customer_name').val();
		var filter_customer_surname = $('#filter_customer_surname').val();
		var filter_customer_email = $('#filter_customer_email').val();

		window.location.href = page_url + '?sort=' + sort + '&sort_order=' + order + '&filter_customer_id=' + encodeURIComponent(filter_customer_id) + '&filter_customer_name=' + encodeURIComponent(filter_customer_name) + '&filter_customer_surname=' + encodeURIComponent(filter_customer_surname) + '&filter_customer_email=' + encodeURIComponent(filter_customer_email);
	});

	$('#filter_excel_customer_button').click(function() {
		var filter_customer_id = $('#filter_customer_id').val();
		var filter_customer_name = $('#filter_customer_name').val();
		var filter_customer_surname = $('#filter_customer_surname').val();
		var filter_customer_email = $('#filter_customer_email').val();
		var filter_customer_status = $('#filter_customer_status').val();

		window.location.href = excel_url + '?sort=' + sort + '&sort_order=' + order + '&filter_customer_id=' + encodeURIComponent(filter_customer_id) + '&filter_customer_name=' + encodeURIComponent(filter_customer_name) + '&filter_customer_surname=' + encodeURIComponent(filter_customer_surname) + '&filter_customer_email='+ encodeURIComponent(filter_customer_email)  +'&filter_customer_status=' + encodeURIComponent(filter_customer_status);
	});

});

function get_limit(limit){
	$.ajax({
          type:"post",
          url: base_url + "settings/getLimit",
          data:"limit="+limit,
     }).done(function(){
        location.reload();
     });
}