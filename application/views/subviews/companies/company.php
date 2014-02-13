<div class="page-content-wrapper">
	<div class="page-content">
		<div class="row">
			<div class="col-md-12">
				<ul class="page-breadcrumb breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?php echo base_url(); ?>">Anasayfa</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="<?php echo base_url() ?>companies">Şirketler</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Şirket</a>
					</li>
				</ul>
				<!-- END PAGE TITLE & BREADCRUMB-->
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
							<i class="fa fa-building"></i>Şirket Ekle
						</div>
					</div>
					<div class="portlet-body form">
						<form action="<?php echo base_url() . 'companies/company/' . $company_id; ?>" enctype="multipart/form-data" method="post" ect class="horizontal-form">
							<div class="form-body">
								<?php $i = 1; ?>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Şirket Adı</label>
											<input type="text" name="customer_company_name" class="form-control" placeholder="Şirket Adı" value="<?php echo isset($company['customer_company_name']) ? $company['customer_company_name'] : ''; ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Şirket E-posta</label>
											<input type="text" name="customer_company_email" class="form-control" placeholder="Şirket E-posta" value="<?php echo isset($company['customer_company_email']) ? $company['customer_company_email'] : ''; ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group last">
											<label class="control-label">Şirket Logo</label>
											<?php if (isset($company['customer_company_logo']) && $company['customer_company_logo'] != NULL): ?>
												<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
													<img src="<?php echo $company['customer_company_logo']; ?>" alt="">
												</div>
												<a href="#" class="btn default change-pic">Değiştir</a>
												<div class="fileupload fileupload-new" style="display: none;" data-provides="fileupload">
													<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
														<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=resim+yok" alt="">
													</div>
													<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
													</div>
													<div>
														<span class="btn default btn-file">
															<span class="fileupload-new">
																<i class="fa fa-paper-clip"></i> Gözat
															</span>
															<span class="fileupload-exists">
																<i class="fa fa-undo"></i> Değişir
															</span>
															<input type="file" class="default" name="customer_company_logo">
														</span>
														<a href="#" class="btn red fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Kaldır</a>
													</div>
												</div>
											<?php else: ?>
												<div class="fileupload fileupload-new" data-provides="fileupload">
													<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
														<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=resim+yok" alt="">
													</div>
													<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
													</div>
													<div>
														<span class="btn default btn-file">
															<span class="fileupload-new">
																<i class="fa fa-paper-clip"></i> Gözat
															</span>
															<span class="fileupload-exists">
																<i class="fa fa-undo"></i> Değişir
															</span>
															<input type="file" class="default" name="customer_company_logo">
														</span>
														<a href="#" class="btn red fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Kaldır</a>
													</div>
												</div>
											<?php endif; ?>
										</div>
									</div>
								</div>
							</div>
							<div class="form-actions right">
								<a type="button" class="btn default" href="<?php echo base_url() ?>companies">İptal</a>
								<button type="submit" class="btn green"><i class="fa fa-check"></i> Kaydet</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>