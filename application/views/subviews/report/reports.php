<div class="page-content-wrapper">
		<div class="page-content">
			<div class="row">
				<div class="col-md-12">
					<ul class="page-breadcrumb breadcrumb">
						<li>
							<i class="fa fa-home"></i>
							<a href="#">Raporlar</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="row">
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
						<a class="more" href="<?php echo base_url() ?>customers">
						Tüm müşteriler <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat green">
						<div class="visual">
							<i class="fa fa-credit-card"></i>
						</div>
						<div class="details">
							<div class="number">
								<?php echo $total_actions; ?>
							</div>
							<div class="desc">
								İşlem
							</div>
						</div>
						<a class="more" href="<?php echo base_url() ?>actions">
						Tüm işlemler <i class="m-icon-swapright m-icon-white"></i>
						</a>
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
						<a class="more" href="<?php echo base_url() ?>users">
						Tüm kullanıcılar <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<!--<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat yellow">
						<div class="visual">
							<i class="fa fa-bar-chart-o"></i>
						</div>
						<div class="details">
							<div class="number">
								12,5M$
							</div>
							<div class="desc">
								Total Profit
							</div>
						</div>
						<a class="more" href="#">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>-->
			</div>
			<div class="clearfix">
			</div>
			<div class="row">
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
		</div>
	</div>
</div>
