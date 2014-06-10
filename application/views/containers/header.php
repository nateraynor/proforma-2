<div class="header navbar navbar-inverse navbar-fixed-top">
	<div class="header-inner">
		<a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo ASSETS; ?>img/ICM-Venus-Logo1.png" alt="logo" class="img-responsive"/></a>
		
		<!--div class="hor-menu hidden-sm hidden-xs" >
			<ul class="nav navbar-nav">
				<li class="" style="margin-left: 50px;">
					<a data-toggle="dropdown" data-hover="dropdown" data-close-others="true" href="#">
					Hızlı Erişim <i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo base_url() ?>products/product">Ürün / Hizmet Ekle</a></li>
						<li><a href="<?php echo base_url() ?>categories/category">Ürün / Hizmet Kategori Ekle</a></li>
						<li><a href="<?php echo base_url() ?>brands/brand">Ürün / Hizmet Marka Ekle</a></li>
						<li><a href="<?php echo base_url() ?>customers/customer">Müşteri Ekle</a></li>
					</ul>
				</li>
			</ul>
		</div-->
		<a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><img src="<?php echo ASSETS ?>img/menu-toggler.png" alt=""/></a>
		<ul class="nav navbar-nav pull-right">
			<li class="dropdown user">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<span class="username"><?php echo $this->session->userdata['name']; ?>  <?php echo $this->session->userdata['surname']?></span>
				<i class="fa fa-angle-down"></i>
				</a>
				<ul class="dropdown-menu">
					<li>
						<a href="<?php echo base_url() . 'users/user/' . $this->session->userdata['user_id']; ?>"><i class="fa fa-user"></i> Profilim</a>
					</li>
					
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
				<?php $allowed_pages = $this->session->userdata['allowed_pages']; ?>
				<?php if(!empty($allowed_pages) && (strstr($allowed_pages, 'proposals'))): ?>
				<li class="<?php echo $menu == 'proposals' ? "active" : ''; ?>">
					<a href="<?php echo base_url() ?>proposals">
					<i class="fa fa-edit"></i>
					<span class="title">Teklifler</span>
					</a>
				</li>
				<?php endif; ?>
				<?php if(!empty($allowed_pages) && (strstr($allowed_pages, 'products'))): ?>
				<li class="<?php echo $menu == 'products' ? "active" : ''; ?>">
					<a href="javascript:;">
					<i class="fa fa-barcode"></i>
					<span class="title">Ürünler / Hizmetler</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li style="<?php echo $this->uri->segment(1) == 'products' ? 'background: #5A5656': '' ;?>">
							<a style="<?php echo $this->uri->segment(1) == 'products' ? 'color: #FDFDFD': '' ;?>" href="<?php echo base_url() ?>products">Ürün / Hizmet Listesi</a>
						</li>
						<li style="<?php echo $this->uri->segment(1) == 'categories' ? 'background: #5A5656': '' ;?>">
							<a style="<?php echo $this->uri->segment(1) == 'categories' ? 'color: #FDFDFD': '' ;?>" href="<?php echo base_url() ?>categories">Ürün / Hizmet Kategori Listesi</a>
						</li>
						<li style="<?php echo $this->uri->segment(1) == 'brands' ? 'background: #5A5656': '' ;?>">
							<a style="<?php echo $this->uri->segment(1) == 'brands' ? 'color: #FDFDFD': '' ;?>" href="<?php echo base_url() ?>brands">Ürün / Hizmet Marka Listesi</a>
						</li>
					</ul>
				</li>
				<?php endif; ?>
				<?php if(!empty($allowed_pages) && (strstr($allowed_pages, 'customers'))): ?>
				<li class="<?php echo $menu == 'customers' ? "active" : ''; ?>">
					<a href="<?php echo base_url() ?>customers">
					<i class="fa fa-group"></i>
					<span class="title">Müşteriler</span>
					</a>
				</li>
				<?php endif; ?>
				<?php if(!empty($allowed_pages) && (strstr($allowed_pages, 'reports'))): ?>
				<li class="<?php echo $menu == 'reports' ? "active" : ''; ?>">
					<a href="<?php echo base_url() ?>reports">
					<i class="fa fa-bar-chart-o"></i>
					<span class="title">İstatistikler</span>
					</a>
				</li>
				<?php endif; ?>
				<?php if(!empty($allowed_pages) && (strstr($allowed_pages, 'users'))): ?>
				<li class="<?php echo $menu == 'users' ? "active" : ''; ?>">
					<a href="<?php echo base_url() ?>users">
					<i class="fa fa-male"></i>
					<span class="title">Kullanıcılar</span>
					</a>
				</li>
			    <?php endif; ?>
				<?php if(!empty($allowed_pages) && (strstr($allowed_pages, 'settings'))): ?>
				<li class="last <?php echo $menu == 'settings' ? 'active' : '' ?>">
					<a href="javascript:;">
					<i class="fa fa-cogs"></i>
					<span class="title">Ayarlar</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li style="<?php echo $this->uri->segment(2) == 'taxRates' ? 'background: #5A5656': '' ;?>">
							<a style="<?php echo $this->uri->segment(2) == 'taxRates' ? 'color: #FDFDFD': '' ;?>" href="<?php echo base_url() ?>settings/taxRates">Vergi Oranları</a>
						</li>
						<li style="<?php echo $this->uri->segment(2) == 'exchangeRates' ? 'background: #5A5656': '' ;?>">
							<a style="<?php echo $this->uri->segment(2) == 'exchangeRates' ? 'color: #FDFDFD': '' ;?>" href="<?php echo base_url() ?>settings/exchangeRates">Döviz Kurları</a>
						</li>
						<li style="<?php echo $this->uri->segment(2) == 'templates' ? 'background: #5A5656': '' ;?>">
							<a style="<?php echo $this->uri->segment(2) == 'templates' ? 'color: #FDFDFD': '' ;?>" href="<?php echo base_url() ?>settings/templates">Şablonlar</a>
						</li>
						<li style="<?php echo $this->uri->segment(2) == 'generalSetting' ? 'background: #5A5656': '' ;?>">
							<a style="<?php echo $this->uri->segment(2) == 'generalSetting' ? 'color: #FDFDFD': '' ;?>" href="<?php echo base_url() ?>settings/generalSetting">Genel Ayarlar</a>
						</li>
					</ul>
				</li>
				<?php endif; ?>
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->