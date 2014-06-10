<div class="page-content-wrapper">
	<div class="page-content">
		<div class="row">
			<div class="col-md-12">
				<ul class="page-breadcrumb breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?php echo base_url() ?>">Anasayfa</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="<?php echo base_url() ?>users">Kullanıcılar</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">
						<?php if($user_id != -1): ?>
							Güncelle
						<?php else: ?>
							Ekle
						<?php endif; ?>
						</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<?php if (!empty($errors)): ?>
				<div class="alert alert-danger">
					<button class="close" data-close="alert"></button>
					<span>
						<?php foreach ($errors as $error): ?>
							<?php echo $error; ?><br />
						<?php endforeach ?>
					</span>
				</div>
				<?php endif; ?>
				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success">
					<button class="close" data-close="alert"></button>
					<span><?php echo $this->session->flashdata('success') ?></span>
				</div>
				<?php endif; ?>
				<?php if ($this->session->flashdata('error')): ?>
				<div class="alert alert-danger">
					<button class="close" data-close="alert"></button>
					<span><?php echo $this->session->flashdata('error') ?></span>
				</div>
				<?php endif; ?>
			 	<div class="portlet box grey">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-reorder"></i>Kullanıcı Ekle
						</div>
					</div>
					<div class="portlet-body form">
						<form action="<?php echo base_url() . 'users/user/' . $user_id; ?>" enctype="multipart/form-data" method="post" class="horizontal-form">
							<div class="form-body">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Kullanıcı Ad</label>
											<input type="text" name="user_name" class="form-control" placeholder="Kullanıcı Ad" value="<?php echo isset($user['user_name']) ? $user['user_name'] : ''; ?>" required >
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Kullanıcı Soyad</label>
											<input type="text" name="user_surname" class="form-control" placeholder="Kullanıcı Soyad" value="<?php echo isset($user['user_surname']) ? $user['user_surname'] : ''; ?>" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Kullanıcı Rumuz</label>
											<input type="text" name="user_username" class="form-control" placeholder="Kullanıcı Rumuz" value="<?php echo isset($user['user_username']) ? $user['user_username'] : ''; ?>" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Kullanıcı E-posta</label>
											<input type="text" name="user_email" class="form-control" placeholder="Kullanıcı E-posta" value="<?php echo isset($user['user_email']) ? $user['user_email'] : ''; ?>" required >
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Kullanıcı Şifre</label>
											<input type="password" name="user_password" class="form-control" placeholder="Kullanıcı Şifre" value="" >
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">İzin Verilen Sayfalar</label>
												<select name="user_allowed_pages[]" id="select2_sample2" class="form-control select2" multiple placeholder="Seçiniz">
													<?php echo $user['user_allowed_pages']; ?>
													<optgroup label="Ayarlar">
													<option value="settings/generalSetting" <?php echo isset($user['user_allowed_pages']) && (strstr($user['user_allowed_pages'],'settings/generalSetting' )) ? 'selected' : ' ' ;?>>Genel Ayarlar</option>
													<option value="settings/tax_rates" <?php echo isset($user['user_allowed_pages']) && (strstr($user['user_allowed_pages'],'settings/tax_rates' )) ? 'selected' : ' ' ;?>>Vergi Oranları</option>
													<option value="setting/templates" <?php echo isset($user['user_allowed_pages']) && (strstr($user['user_allowed_pages'],'setting/templates'))  ? 'selected' : '';?>>Şablonlar</option>
													<option value="setting/exchangeRates" <?php echo isset($user['user_allowed_pages']) && (strstr($user['user_allowed_pages'],'setting/exchangeRates'))  ? 'selected' : '';?>>Döviz Kurları</option>
													</optgroup>
													<optgroup label="Teklifler">
													<option value="proposalslist" <?php echo isset($user['user_allowed_pages']) && (strstr($user['user_allowed_pages'],'proposalslist')) ? 'selected' : '' ?>>Teklifler</option>
													<option value="proposals/proposal" <?php echo isset($user['user_allowed_pages']) && (strstr($user['user_allowed_pages'],'proposals/proposal')) ? 'selected' : ''?>>Teklif İşlemleri</option>
													<option value="proposals/proposalDraft" <?php echo isset($user['user_allowed_pages']) && (strstr($user['user_allowed_pages'],'proposals/proposalDraft')) ? 'selected' : ''?>>Taslak Teklifler</option>
													<option value="proposals/preview" <?php echo isset($user['user_allowed_pages']) && (strstr($user['user_allowed_pages'],'proposals/preview')) ? 'selected' : ''?>>Önizleme</option>
													
													</optgroup>
													<optgroup label="Müşteriler">
													<option value="customerslist" <?php echo isset($user['user_allowed_pages']) && (strstr($user['user_allowed_pages'],'customerslist')) ? 'selected' : '' ;?>>Müşteriler</option>
													<option value="customers/customer" <?php echo isset($user['user_allowed_pages']) && (strstr($user['user_allowed_pages'],'customers/customer'))  ? 'selected' : '';?>>Müşteri İşlemleri</option>
													</optgroup>
													<optgroup label="Ürünler">
													<option value="productslist" <?php echo isset($user['user_allowed_pages']) && (strstr($user['user_allowed_pages'],'productslist'))  ? 'selected' : '';?>>Ürünler</option>
													<option value="products/product" <?php echo isset($user['user_allowed_pages']) && (strstr($user['user_allowed_pages'],'products/product'))  ? 'selected' : '';?>>Ürün İşlemleri</option>
													</optgroup>
													<optgroup label="Kategoriler">
													<option value="categorieslist" <?php echo isset($user['user_allowed_pages']) && (strstr($user['user_allowed_pages'],'categorieslist'))  ? 'selected' : '';?>>Kategoriler</option>
													<option value="categories/category" <?php echo isset($user['user_allowed_pages']) && (strstr($user['user_allowed_pages'],'categories/category'))  ? 'selected' : '';?> >Kategori İşlemleri</option>
													</optgroup>
													<optgroup label="Markalar">
													<option value="brandslist" <?php echo isset($user['user_allowed_pages']) && (strstr($user['user_allowed_pages'],'brandslist'))  ? 'selected' : '';?>>Markalar</option>
													<option value="brands/brand" <?php echo isset($user['user_allowed_pages']) && (strstr($user['user_allowed_pages'],'"brands/brand'))  ? 'selected' : '';?>>Marka İşlemleri</option>
													</optgroup>
													<optgroup label="Kullanıcılar">
													<option value="userslist" <?php echo isset($user['user_allowed_pages']) && (strstr($user['user_allowed_pages'],'userslist'))  ? 'selected' : '';?>>Kullanıcılar</option>
													<option value="users/user" <?php echo isset($user['user_allowed_pages']) && (strstr($user['user_allowed_pages'],'"users/user'))  ? 'selected' : '';?>>Kullanıcı İşlemleri</option>
													</optgroup>
													<optgroup label="Raporlar">
													<option value="reports" <?php echo isset($user['user_allowed_pages']) && (strstr($user['user_allowed_pages'],'reports'))  ? 'selected' : '';?>>Raporlar</option>
													</optgroup>
												</select>
										</div>
									</div>
									<div class="col-md-6" style="display: none;">
										<div class="form-group">
											<label class="control-label">Kullanıcı Durum</label>
											<select name="user_status" class="form-control" placeholder="Kullanıcı Durum">
												<option value="1" <?php echo isset($user['user_status']) && $user['user_status'] == 1 ? 'selected' : ''; ?>>Aktif</option>
												<option value="0" <?php echo isset($user['user_status']) && $user['user_status'] == 0 ? 'selected' : ''; ?>>Pasif</option>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="form-actions right">
								<a type="button" class="btn default" href="<?php echo base_url() ?>users">İptal</a>
								<button type="submit" class="btn green"><i class="fa fa-check"></i> Kaydet</button>
							</div>
						</form>
					</div>
				</div>
				<?php if(isset($user)): ?>
					<?php if ($this->session->flashdata('errorPass')): ?>
					<div class="alert alert-danger">
						<button class="close" data-close="alert"></button>
						<span><?php echo $this->session->flashdata('errorPass') ?></span>
					</div>
					<?php endif; ?>
					<div class="portlet box grey">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-reorder"></i>Kullanıcı Şifre Değişikliği
						</div>
					</div>
					<div class="portlet-body form">
						<form action="<?php echo base_url() . 'users/userChangePassword/' . $user_id; ?>" enctype="multipart/form-data" method="post" class="horizontal-form">
							<div class="form-body">
								<div class="row">

									<!--div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Eski Şifre</label>
											<input type="text" name="past_pass" class="form-control" placeholder="Eski Şifre">
										</div>
									</div-->
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Yeni Şifre</label>
											<input type="text" name="new_pass" class="form-control" placeholder="Yeni Şifre">
										</div>
									</div>
									<div class="col-md-6 pull-right">
										<div class="form-group">
											<label class="control-label">Tekrar Yeni Şifre</label>
											<input type="password" name="repeat_new_pass" class="form-control" placeholder="Tekrar Yeni Şifre" >
										</div>
									</div>

							</div>
							<div class="form-actions right">
								<a type="button" class="btn default" href="<?php echo base_url() ?>users">İptal</a>
								<button type="submit" class="btn green"><i class="fa fa-check"></i> Kaydet</button>
							</div>
						</form>
					</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>