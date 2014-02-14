<div class="page-content-wrapper">
	<div class="page-content">
		<div class="row">
			<div class="col-md-12">
				<ul class="page-breadcrumb breadcrumb">
					<li class="btn-group">
						<a href="<?php echo base_url() . 'customers/customerActions/' . $customer_id; ?>" class="btn dark">
						<span>
							Müşteri İşlemleri
						</span>
						</a>
						<button type="button" class="btn red dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
						<span>
							İşlemler
						</span>
						<i class="fa fa-angle-down"></i>
						</button>
						<ul class="dropdown-menu pull-right" role="menu">
							<li><a href="javascript:window.print();">Sayfayı Yazdır</a></li>
						</ul>
					</li>
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
						<a href="#">Müşteri</a>
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
							<i class="fa fa-group"></i> Müşteri Ekle
						</div>
					</div>
					<div class="portlet-body form">
						<form action="<?php echo base_url() . 'customers/customer/' . $customer_id; ?>" class="horizontal-form" method="post">
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
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Telefon</label>
												<input type="text" name="customer_phone" class="form-control" col-type="varchar" placeholder="Telefon" value="<?php echo isset($customer['customer_phone']) ? $customer['customer_phone'] : '' ;?>">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Adres</label>
												<input type="text" name="customer_address" class="form-control" col-type="varchar" placeholder="Adres" value="<?php echo isset($customer['customer_address']) ? $customer['customer_address'] : '' ;?>">
											</div>
										</div>
										<div class="col-md-6">
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
			</div>
		</div>
	</div>
</div>