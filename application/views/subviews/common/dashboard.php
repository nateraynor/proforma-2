<div class="page-content-wrapper">
		<div class="page-content">
			<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Modal title</h4>
						</div>
						<div class="modal-body">
							 Widget settings form goes here
						</div>
						<div class="modal-footer">
							<button type="button" class="btn blue">Save changes</button>
							<button type="button" class="btn default" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
			<!--<div class="theme-panel hidden-xs hidden-sm">
				<div class="toggler">
				</div>
				<div class="toggler-close">
				</div>
				<div class="theme-options">
					<div class="theme-option">
						<span>
							Sayfa Yerleşimi
						</span>
						<select class="layout-option form-control input-small">
							<option value="fluid" selected="selected">Tam Sayfa</option>
							<option value="boxed">Ortalanmış</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
							Başlık Alanı
						</span>
						<select class="header-option form-control input-small">
							<option value="fixed" selected="selected">Bağlı</option>
							<option value="default">Sabit</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
							Yan Menü
						</span>
						<select class="sidebar-option form-control input-small">
							<option value="fixed">Bağlı</option>
							<option value="default" selected="selected">Sabit</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
							Yan Menü Yerleşimi
						</span>
						<select class="sidebar-pos-option form-control input-small">
							<option value="left" selected="selected">Sol</option>
							<option value="right">Sağ</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
							Sayfa Altlığı
						</span>
						<select class="footer-option form-control input-small">
							<option value="fixed">Bağlı</option>
							<option value="default" selected="selected">Sabit</option>
						</select>
					</div>
				</div>
			</div>-->
			<div class="row">
				<div class="col-md-12">
					<ul class="page-breadcrumb breadcrumb">
						<li class="btn-group">
					        <a class="btn red" style="color: white;"><span>
					        Houston Kuaför
					    	</span></a>
					    </li>
						<li>
							<i class="fa fa-home"></i>
							<a href="#">Anasayfa</a>
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
						<a class="more" href="<?php echo base_url() ?>customers/customer">
						Müşteri Ekle <i class="fa fa-plus"></i>
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
						<a class="more" href="<?php echo base_url() ?>actions/action/genel_islemler">
						İşlem Ekle <i class="fa fa-plus"></i>
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
						<a class="more" href="<?php echo base_url() ?>users/user">
						Kullanıcı Ekle <i class="fa fa-plus"></i>
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
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->