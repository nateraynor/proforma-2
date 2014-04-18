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
							<i class="fa fa-cogs"></i>Vergi Oranları
						</div>
					</div>
					<div class="portlet-body">
						<form action="<?php echo base_url() ?>settings/taxRates" method="post">
							<div class="form-body" id="tax-rate-list">
								<div class="row">
									<div class="form-group">
										<label class="col-md-3">Vergi Oran Adı</label>
										<label class="col-md-3">Vergi Oranı</label>
										<a class="col-md-2 btn green" id="add-tax-rate" style="margin-bottom: 10px;">Ekle</a>
									</div>
								</div>
								<div class="clearfix"></div>
								<?php $tax_rate_row = 0; ?>
								<?php if ($tax_rates): ?>
								<?php foreach ($tax_rates['tax_rate'] as $tax_rate): ?>
								<div class="row">
									<div class="form-group">
										<div class="col-md-3">
											<input type="text" value="<?php echo $tax_rate['name'] ?>" class="form-control" name="tax_rate[<?php echo $tax_rate_row ?>][name]">
											<input type="hidden" value="<?php echo $tax_rate['tax_rate_id'] ?>" name="tax_rate[<?php echo $tax_rate_row ?>][tax_rate_id]">
										</div>
										<div class="col-md-3"><input type="text" value="<?php echo $tax_rate['rate'] ?>" class="form-control" name="tax_rate[<?php echo $tax_rate_row ?>][rate]" style="margin-bottom: 10px;"></div>
										<div class="col-md-1"><a class="btn red" onclick="removeRow(this).parent(); return false;">Kaldır</a></div>
									</div>
								</div>
								<div class="clearfix"></div>
								<?php $tax_rate_row++; ?>
								<?php endforeach ?>
								<?php endif ?>
							</div>
							<div class="clearfix"></div>
							<div class="row">
								<div class="col-md-12">
									<input type="submit" class="btn green" value="Kaydet" />
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
var tax_rate_row = <?php echo $tax_rate_row; ?>;
</script>
