<div class="page-content-wrapper">
		<div class="page-content">
			<div class="row">
				<div class="col-md-12">
					<ul class="page-breadcrumb breadcrumb">
						<li>
							<i class="fa fa-home"></i>
							<a href="#">İstatistikler</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat yellow">
						<div class="visual">
							<i class="fa fa-barcode"></i>
						</div>
						<div class="details">
							<div class="number">
								<?php echo $total_products; ?>
							</div>
							<div class="desc">
								Ürün / Hizmet
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat blue">
						<div class="visual">
							<i class="fa fa-group"></i>
						</div>
						<div class="details">
							<div class="number">
								<?php echo $total_customers; ?>
							</div>
							<div class="desc">
								 Müşteri
							</div>
						</div>

					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat green">
						<div class="visual">
							<i class="fa fa-edit"></i>
						</div>
						<div class="details">
							<div class="number">
								<?php echo $total_proposals; ?>
							</div>
							<div class="desc">
								Teklif
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat purple">
						<div class="visual">
							<i class="fa fa-male"></i>
						</div>
						<div class="details">
							<div class="number">
								<?php echo $total_users; ?>
							</div>
							<div class="desc">
								Kullanıcı
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix">
			</div>
			<div class="row">
				<div class="col-md-6">
					<h4>Teklif Toplamları</h4>
					<div id="pie_chart" class="chart"></div>
				</div>
				<div class="col-md-6">
					<h4>Teklifler </h4>
					<div id="pie_chart_1" class="chart"></div>
				</div>
			</div>
			<div class="row"> <!-- chartlar -->
				<div class="col-md-12">
					<div class="portlet solid bordered light-grey">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-bar-chart-o"></i>Müşteri Kayıtları
								<small>bu ay içinde</small>
							</div>
						</div>
						<div class="portlet-body">
							<div id="site_statistics_loading">
								<img src="assets/img/loading.gif" alt="loading"/>
							</div>
							<div id="site_statistics_content" class="display-none">
								<div id="site_statistics" class="chart">

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="portlet solid bordered light-grey">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-bar-chart-o"></i>Teklif Kayıtları
								<small>bu ay içinde</small>
							</div>
						</div>
						<div class="portlet-body">
							<div id="proposal_site_statistics_loading">
								<img src="assets/img/loading.gif" alt="loading"/>
							</div>
							<div id="proposal_site_statistics_content" class="display-none">
								<div id="proposal_site_statistics" class="chart">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="portlet solid bordered light-grey">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-bar-chart-o"></i>Ürün / Hizmet Kayıtları
								<small>bu ay içinde</small>
							</div>
						</div>
						<div class="portlet-body">
							<div id="product_site_statistics_loading">
								<img src="assets/img/loading.gif" alt="loading"/>
							</div>
							<div id="product_site_statistics_content" class="display-none">
								<div id="product_site_statistics" class="chart">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>
