<div class="header navbar navbar-inverse navbar-fixed-top">
	<div class="header-inner">
		<a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo ASSETS; ?>img/ICM-Mars-Logo-transparent.png" alt="logo" class="img-responsive"/></a>
		<a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><img src="<?php echo ASSETS ?>img/menu-toggler.png" alt=""/></a>
		<ul class="nav navbar-nav pull-right">
			<li class="dropdown user">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<span class="username"><?php echo $this->session->userdata['name']; ?></span>
				<i class="fa fa-angle-down"></i>
				</a>
				<ul class="dropdown-menu">
					<li>
						<a href="<?php echo base_url() . 'users/user/' . $this->session->userdata['user_id']; ?>"><i class="fa fa-user"></i> Profilim</a>
					</li>
					<!--
					<li>
						<a href="page_calendar.html"><i class="fa fa-calendar"></i> My Calendar</a>
					</li>
					<li>
						<a href="inbox.html"><i class="fa fa-envelope"></i> My Inbox
						<span class="badge badge-danger">
							3
						</span>
						</a>
					</li>
					<li>
						<a href="#"><i class="fa fa-tasks"></i> My Tasks
						<span class="badge badge-success">
							7
						</span>
						</a>
					</li>
					<li>
						<a href="extra_lock.html"><i class="fa fa-lock"></i> Lock Screen</a>
					</li>
					<li class="divider">
					</li>-->
					<li>
						<a href="javascript:;" id="trigger_fullscreen"><i class="fa fa-move"></i> Tam Ekran</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>login/logout"><i class="fa fa-key"></i> Çıkış</a>
					</li>
				</ul>
			</li>
		</ul>
	</div>
</div>
<div class="clearfix">
</div>
<div class="page-container">
	<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse">
			<ul class="page-sidebar-menu">
				<li class="sidebar-toggler-wrapper">
					<div class="sidebar-toggler hidden-phone">
					</div>
				</li>
				<li class="start <?php echo $menu == 'dashboard' ? "active" : ''; ?>">
					<a href="<?php echo base_url(); ?>">
					<i class="fa fa-home"></i>
					<span class="title">Anasayfa</span>
					</a>
				</li>
				<li class="<?php echo $menu == 'products' ? "active" : ''; ?>">
					<a href="javascript:;">
					<i class="fa fa-group"></i>
					<span class="title">Ürünler</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="<?php echo base_url() ?>products">Ürün Listesi</a>
						</li>
						<li>
							<a href="<?php echo base_url() ?>products/product">Ürün Ekle</a>
						</li>
						<li>
							<a href="<?php echo base_url() ?>categorys">Ürün Kategori Listesi</a>
						</li>
						<li>
							<a href="<?php echo base_url() ?>categorys/category">Ürün Kategori Ekle</a>
						</li>
						<li>
							<a href="<?php echo base_url() ?>brands">Ürün Marka Listesi</a>
						</li>
						<li>
							<a href="<?php echo base_url() ?>brands/brand">Ürün Marka Ekle</a>
						</li>

					</ul>
				</li>
				<li class="<?php echo $menu == 'customers' ? "active" : ''; ?>">
					<a href="javascript:;">
					<i class="fa fa-group"></i>
					<span class="title">Müşteriler</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="<?php echo base_url() ?>customers">Müşteri Listesi</a>
						</li>
						<li>
							<a href="<?php echo base_url() ?>customers/customer">Müşteri Ekle</a>
						</li>
					</ul>
				</li>
				<li class="<?php echo $menu == 'reports' ? "active" : ''; ?>">
					<a href="<?php echo base_url() ?>reports">
					<i class="fa fa-bar-chart-o"></i>
					<span class="title">Raporlar</span>
					</a>
				</li>
				<li class="<?php echo $menu == 'users' ? "active" : ''; ?>">
					<a href="<?php echo base_url() ?>users">
					<i class="fa fa-male"></i>
					<span class="title">Kullanıcılar</span>
					</a>
				</li>
				<li class="last <?php echo $menu == 'settings' ? 'active' : '' ?>">
					<a href="javascript:;">
					<i class="fa fa-cogs"></i>
					<span class="title">Ayarlar</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li><a href="<?php echo base_url() ?>settings/companyInfo">Şirket Bilgileri</a></li>
						<li><a href="<?php echo base_url() ?>settings/templates">Şablonlar</a></li>
						<li><a href="<?php echo base_url() ?>settings/settings">Genel Ayarlar</a></li>
					</ul>
				</li>
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->