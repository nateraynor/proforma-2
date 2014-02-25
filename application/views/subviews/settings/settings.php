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
						<a href="#">Ayarlar</a>
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
							<i class="fa fa-cogs"></i>Genel Ayarlar
						</div>
						<div class="tools">
							<a href="javascript:;" class="collapse"></a>
							<a href="#portlet-config" data-toggle="modal" class="config"></a>
						</div>
					</div>
					<div class="portlet-body">
						<ul class="nav nav-tabs">
							<li class="active">
								<a href="#meta_setting" data-toggle="tab">Meta Ayarları</a>
							</li>
							<li class="">
								<a href="#email_setting" data-toggle="tab">E-posta Ayarları</a>
							</li>
							<li class="">
								<a href="#company_setting" data-toggle="tab">Şirket Ayarları</a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="meta_setting">
								<div class="portlet-body form">
									<form action="<?php echo base_url() . 'settings/generalSetting'; ?>" enctype="multipart/form-data" method="post" class="horizontal-form">
										<div class="form-body">
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<input type="hidden" name="key" value="meta">
														<label class="control-label">Başlık</label>
														<input type="text"  maxlength="70" name="title" class="maxlength_textarea form-control" value="<?php echo isset($metaInfo['title']) ? $metaInfo['title'] : '' ?>">
														<span class="help-block">
														Tekrarlayan kelimeler kullanılmamalıdır . En fazla 70 karakter olmalıdır. 
														</span>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Meta Açıklamalar</label>
														<textarea class="maxlength_textarea form-control" maxlength="160" rows="3" name="description"><?php echo isset($metaInfo['description']) ? $metaInfo['description'] : '' ?></textarea>
														<span class="help-block">
														İçeriği anlatan cümleler kullanılmalıdır. En fazla 160 karkater olmalıdır.
														</span>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Meta Anahatar Kelimeler</label>
														<textarea class="maxlength_textarea form-control" class="form-control" maxlength="225" rows="4" name="keyword"><?php echo isset($metaInfo['keyword']) ? $metaInfo['keyword'] : '' ?></textarea>
														<span class="help-block">
														Anahtar kelimeler kullanılmalıdır. En fazla 225 karkater olmalıdır.
														</span>
													</div>
												</div>
											</div>
										</div>
										<div class="form-actions right">
											<a type="button" class="btn default" href="<?php echo base_url() ?>">İptal</a>
											<button type="submit" class="btn green"><i class="fa fa-check"></i> Kaydet</button>
										</div>
									</form>
								</div>
							</div>
							<div class="tab-pane fade" id="email_setting">
								<div class="portlet-body form">
									<form action="<?php echo base_url() . 'settings/generalSetting'; ?>" enctype="multipart/form-data" method="post" class="horizontal-form">
										<div class="form-body">
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<input type="hidden" name="key" value="email">
														<label class="control-label">Host</label>
														<input type="text" class="form-control" name="host" value="<?php echo isset($emailInfo['host']) ? $emailInfo['host'] : '' ;?>">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Port</label>
														<input type="text" class="form-control" name="port" value="<?php echo isset($emailInfo['port']) ? $emailInfo['port'] : '' ;?>">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Kullanıcı Adı</label>
														<input type="text" class="form-control" name="user_name" value="<?php echo isset($emailInfo['user_name']) ? $emailInfo['user_name'] : '' ;?>">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Şifre</label>
														<input type="text" class="form-control" name="password" value="<?php echo isset($emailInfo['password']) ? $emailInfo['password']  : '' ;?>">
													</div>
												</div>
											</div>
										</div>
										<div class="form-actions right">
											<a type="button" class="btn default" href="<?php echo base_url() ?>">İptal</a>
											<button type="submit" class="btn green"><i class="fa fa-check"></i> Kaydet</button>
										</div>
									</form>
								</div>
							</div>
							<div class="tab-pane fade" id="company_setting">
								<div class="portlet-body form">
									<form action="<?php echo base_url() . 'settings/companyInfo'; ?>" enctype="multipart/form-data" method="post" class="horizontal-form">
										<div class="form-body">
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<input type="hidden" name="key" value="company_info">
														<label class="control-label">Şirket Adı</label>
														<input type="text" name="company_name" class="form-control" col-type="varchar" placeholder="Şirket Adı" value="<?php echo isset($company['company_name']) ? $company['company_name'] : ''; ?>" required>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Şirket Yetkili Adı</label>
														<input type="text" name="company_entitled_name" class="form-control" col-type="varchar" placeholder="Şirket Yetkili Adı" value="<?php echo isset($company['company_entitled_name']) ? $company['company_entitled_name'] : ''; ?>" required>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Şirket Telefon</label>
														<input type="text" name="company_phone" class="form-control" col-type="varchar" placeholder="Şirket Telefon" value="<?php echo isset($company['company_phone']) ? $company['company_phone'] : ''; ?>">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Şirket Adres</label>
														<input type="text" name="company_address" class="form-control" col-type="varchar" placeholder="Şirket Adres" value="<?php echo isset($company['company_address']) ? $company['company_address'] : ''; ?>">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Şirket E-posta</label>
														<input type="text" name="company_email" class="form-control" col-type="varchar" placeholder="Şirket E-posta" value="<?php echo isset($company['company_email']) ? $company['company_email'] : ''; ?>">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Şirket Websitesi</label>
														<input type="text" name="company_website" class="form-control" col-type="varchar" placeholder="Şirket Websitesi" value="<?php echo isset($company['company_website']) ? $company['company_website'] : ''; ?>">
													</div>
												</div>
												<div class="form-group last col-md-6">
													<label class="control-label col-md-3">Resim Seçiniz</label>
													<div class="col-md-6">
														<div class="fileupload fileupload-new" data-provides="fileupload">
															<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
																<?php if(!isset($company['company_image'])): ?>
																<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=resim+yok" alt=""/>
																<?php else: ?>
																<img src="<?php echo base_url().'uploads/'.$company['company_image']; ?>">
																<?php endif; ?>
															</div>
															<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
															</div>
															<div>
																<span class="btn default btn-file">
																<span class="fileupload-new">
																<i class="fa fa-paper-clip"></i> Dosya Seçiniz
																</span>
																<span class="fileupload-exists">
																<i class="fa fa-undo"></i> Değiştir
																</span>
																<input type="file" name="company_image" class="default"/>
																</span>
																<a href="#" class="btn red fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Kaldır</a>
															</div>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label col-md-0">Şirket Kısa Açıklama</label><br>
														<div class="col-md-12">
															<textarea class="wysihtml5 form-control" name="company_description" rows="10" ><?php echo isset($company['company_description']) ? $company['company_description'] : '' ;?></textarea>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="form-actions right">
											<a type="button" class="btn default" href="<?php echo base_url() ?>">İptal</a>
											<button type="submit" class="btn green"><i class="fa fa-check"></i> Kaydet</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
