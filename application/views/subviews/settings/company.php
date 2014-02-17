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
							<a href="<?php echo base_url() ?>companys">Ürünler</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">Ürün</a>
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
									<i class="fa fa-reorder"></i> Şirket
								</div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									<a href="#portlet-config" data-toggle="modal" class="config"></a>
								</div>
							</div>
						<div class="portlet-body">
							<div class="portlet-body form">
								<form action="<?php echo base_url() . 'settings/companyInfo'; ?>" class="horizontal-form" method="post" enctype="multipart/form-data">
									<div class="form-body">
										<div class="row">
												<div class="col-md-6">
													<div class="form-group">
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
										<a href="<?php echo base_url() ?>home" class="btn default">İptal</a>
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