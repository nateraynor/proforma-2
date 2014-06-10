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
						<a href="<?php echo base_url() ?>customers">Müşteriler</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">
							<?php if($customer_id != -1): ?>
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
							<i class="fa fa-reorder"></i> Müşteri
						</div>
					</div>
					<div class="portlet-body">
						<!--ul class="nav nav-tabs">
								<li class="active">
									<a href="#customer_info" data-toggle="tab">Müşteri Bilgileri</a>
								</li>
								<li class="">
									<a href="#tax_info" data-toggle="tab">Vergi Bilgileri</a>
								</li>
						</ul-->
						<div class="tab-content">
							<div class="tab-pane fade active in" id="customer_info">
								<div class="portlet-body form">
									<form action="<?php echo base_url() . 'customers/customer/' . $customer_id; ?>" class="horizontal-form" method="post" enctype="multipart/form-data">
										<div class="form-body">
											<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Adı</label>
															<input type="text" name="customer_name" class="form-control" col-type="varchar" placeholder="Adı" value="<?php echo isset($customer['customer_name']) ? $customer['customer_name'] : ''; ?>" required>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Soyadı</label>
															<input type="text" name="customer_surname" class="form-control" col-type="varchar" placeholder="Soyadı" value="<?php echo isset($customer['customer_surname']) ? $customer['customer_surname'] : '' ;?>" required>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">E-Posta</label>
															<input type="text" name="customer_email" class="form-control" col-type="varchar" placeholder="E-Posta" value="<?php echo isset($customer['customer_email']) ? $customer['customer_email'] : '' ;?>" required>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Şirket</label>
															<input type="text" name="customer_company" class="form-control" col-type="varchar" placeholder="Şirket Adı" value="<?php echo isset($customer['customer_company']) ? $customer['customer_company'] : '' ;?>" required>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-2">Şirket Logosu Seçiniz</label>
														<div class="col-md-4">
															<div class="fileupload fileupload-new" data-provides="fileupload">
																<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
																	<?php if(!isset($customer['customer_company_image']) || empty($customer['customer_company_image'])): ?>
																		<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=resim+yok" alt=""/>
																	<?php else: ?>
																		<img src="<?php echo base_url().'uploads/'.$customer['customer_company_image']; ?>">
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
																		<?php if(isset($customer['customer_company_image'])): ?>
																		<input type="file" name="customer_company_image" class="default"/>
																		<?php else: ?>
																		<input type="file" name="customer_company_image" class="default" required/>
																		<?php endif; ?>
																	</span>
																	<a href="#" class="btn red fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Kaldır</a>
																</div>
															</div>
														</div>
												
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Vergi Dairesi </label>
															<input type="text" name="customer_tax_office" class="form-control" col-type="varchar" placeholder="Vergi Dairesi" value="<?php echo isset($customer['customer_tax_office']) ? $customer['customer_tax_office'] : ''; ?>" >
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Vergi No </label>
															<input type="text" name="customer_tax_no" class="form-control" col-type="varchar" placeholder="Vergi No" value="<?php echo isset($customer['customer_tax_no']) ? $customer['customer_tax_no'] : '' ;?>" >
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Telefon</label>
																<input class="form-control" id="mask_phone" type="text" name="customer_phone" value="<?php echo isset($customer['customer_phone']) ? $customer['customer_phone'] : '' ;?>"/>
																<span class="help-block">
																	(532) 000-0000
																</span>
															<!--input type="text" name="customer_phone" class="form-control" col-type="varchar" placeholder="Telefon" value="<?php echo isset($customer['customer_phone']) ? $customer['customer_phone'] : '' ;?>"-->
														</div>
													</div>
													<div class="col-md-6"></div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Adres</label>
															<input type="text" name="customer_address" class="form-control" col-type="varchar" placeholder="Adres" value="<?php echo isset($customer['customer_address']) ? $customer['customer_address'] : '' ;?>">
														</div>
													</div>
													<div class="col-md-6" style="display: none;">
														<div class="form-group">
															<label class="control-label">Durumu</label>
																<select class="form-control select2me" name="customer_status" data-placeholder="Seçiniz...">
																	<option value="1" <?php echo isset($customer['customer_status']) && $customer['customer_status'] == 1 ? 'selected ' : '' ;?>>Aktif</option>
																	<option value="0" <?php echo isset($customer['customer_status']) && $customer['customer_status'] == 0 ? ' selected' : '' ;?>>Pasif</option>
																</select>
														</div>
													</div>
											</div>
										</div>
										<div class="form-actions right">
											<a href="<?php echo base_url() ?>customers" class="btn default">İptal</a>
											<button type="submit" class="btn green"><i class="fa fa-check"></i> Kaydet</button>
										</div>
									</form>
								</div>
							</div>
							<!--div class="tab-pane fade" id="tax_info">
								<div class="portlet-body form">
									<form action="<?php //echo base_url() . 'customers/customer/' . $customer_id; ?>" class="horizontal-form" method="post">
										<div class="form-body">
											<div class="row">
												
											</div>
										</div>
										<div class="form-actions right">
											<a href="<?php //echo base_url() ?>customers" class="btn default">İptal</a>
											<button type="submit" class="btn green"><i class="fa fa-check"></i> Kaydet</button>
										</div>
									</form>
								</div>
							</div-->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>