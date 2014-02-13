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
						<a href="<?php echo base_url() ?>customerGroups">Müşteri Grupları</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Müşteri Grubu</a>
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
							<i class="fa fa-reorder"></i> Müşteri Grubu Ekle
						</div>
					</div>
					<div class="portlet-body form">
						<form action="<?php echo base_url() . 'customerGroups/customerGroup/' . $customer_group_id; ?>" enctype="multipart/form-data" method="post" class="horizontal-form">
							<div class="form-body">
								<?php $i = 1; ?>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Müşteri Grup Adı</label>
											<input type="text" name="customer_group_content" class="form-control" placeholder="Müşteri Grup Adı" value="<?php echo isset($customer_group['customer_group_content']) ? $customer_group['customer_group_content'] : ''; ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Müşteri Grup Açıklama</label>
											<textarea name="customer_group_description" data-provide="markdown" class="form-control" placeholder="Müşteri Grup Açıklama"><?php echo isset($customer_group['customer_group_description']) ? $customer_group['customer_group_description'] : ''; ?></textarea>
										</div>
									</div>
								</div>
							</div>
							<div class="form-actions right">
								<a type="button" class="btn default" href="<?php echo base_url() ?>customerGroups">İptal</a>
								<button type="submit" class="btn green"><i class="fa fa-check"></i> Kaydet</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>