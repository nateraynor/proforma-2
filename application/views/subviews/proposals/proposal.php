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
						<a href="<?php echo base_url() ?>proposals">Teklifler</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Teklif</a>
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
							<i class="fa fa-reorder"></i> Teklif
						</div>
					</div>
					<div class="portlet-body form">
						<form action="<?php echo base_url() . 'proposals/proposal/' . $proposal_id; ?>" class="horizontal-form" method="post">
							<div class="form-body">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Teklif Adı</label>
											<input type="hidden" value="<?php echo time() . rand(0, 100); ?>" name="proposal_temporary_id" id="proposal-temporary-id">
											<input type="text" name="proposal_name" class="form-control" col-type="varchar" placeholder="Teklif Adı" value="<?php echo isset($proposal['proposal_name']) ? $proposal['proposal_name'] : ''; ?>" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Teklif Durumu</label>
											<select class="form-control select2me" name="proposal_status" data-placeholder="Seçiniz...">
												<option value="0">İptal</option>
												<option value="1">Taslak</option>
												<option value="2">Gönderildi</option>
												<option value="3">Onaylandı</option>
												<option value="4">Değişiklik Yapıldı</option>
												<option value="4">Red Edildi</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Müşteriler</label>
											<select name="proposal_customers[]" class="multi-select" multiple="" id="customers-select" style="position: absolute; left: -9999px;">
												<?php foreach ($customers as $customer): ?>
													<option value="<?php echo $customer['customer_id'] ?>"><?php echo $customer['customer_name']; ?></option>
												<?php endforeach ?>
											</select>
										</div>
									</div>
									<div class="col-md-12">
										<div class="row">
											<div class="form-group">
												<div class="col-md-3">
													<div class="input-group">
														<input class="form-control autocomplete-input" onkeyup="product_autocomplete(this);" placeholder="Ürün" type="text" value="">
														<div class="autocomplete-results"></div>
														<input type="hidden" class="hidden-id" value="" name="product[0][product_id]">
														<span class="input-group-addon"><i class="fa fa-cross"></i></span>
													</div>
												</div>
												<div class="col-md-1"><input class="product-quantity form-control" type="number" name="product[0][quantity]" placeholder="Adet" value=""></div>
												<div class="col-md-2">
													<div class="input-group">
														<input class="product-price form-control" type="text" value="" name="product[0][price]" placeholder="Birim Fiyat">
														<span class="input-group-addon"><i class="fa fa-try"></i></span>
													</div>
												</div>
												<div class="col-md-2"><input class="product-discount form-control" type="text" name="product[0][discount]" value="" placeholder="İndirim"></div>
												<div class="col-md-2">
													<select class="product-discount-type form-control" name="product[0][discount_type]">
														<option disabled readonly selected="true">İndirim Tipi</option>
														<option>%</option>
														<option>TRL</option>
													</select>
												</div>
												<div class="col-md-2">
													<select class="product-tax-rate form-control" name="product[0][tax_rate]">
														<option disabled readonly selected="true">Vergi Oranı</option>
														<?php if ($tax_rates): ?>
														<?php foreach ($tax_rates['tax_rate'] as $tax_rate): ?>
															<option value="<?php echo $tax_rate['tax_rate_id']; ?>"><?php echo $tax_rate['name'] . " -> %" . $tax_rate['rate']  ?></option>
														<?php endforeach ?>
														<?php endif ?>
													</select>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="row">
											<div class="form-group">
												<div class="col-md-3">
													<a href="#" id="add-product" class="btn green form-control" style="margin-top: 10px; margin-bottom: 10px;">Ürün/Hizmet Ekle</a>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-6" style="text-align: right; padding-top: 5px;">Toplam:</label>
												<div class="input-group col-md-3" style="padding-right: 15px;">
													<input type="text" readonly="" name="proposal_total" class="form-control" id="proposal-total" col-type="varchar" placeholder="Teklif Toplamı" value="<?php echo isset($proposal['proposal_total']) ? $proposal['proposal_total'] : ''; ?>" required>
													<span class="input-group-addon"><i class="fa fa-try"></i></span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Teklif Üst Açıklama</label>
											<textarea id="proposal-content-top" name="proposal_statement_top" data-provide="markdown" rows="10"><?php echo isset($proposal['proposal_statement_top']) ? $proposal['proposal_statement_top'] : ''; ?></textarea>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Teklif Alt Açıklama</label>
											<textarea id="proposal-content-bottom" name="proposal_statement_bottom" data-provide="markdown" rows="10"><?php echo isset($proposal['proposal_statement_bottom']) ? $proposal['proposal_statement_bottom'] : ''; ?></textarea>
										</div>
									</div>
									<hr />
								</div>
							</div>
							<div class="form-actions right">
								<a href="<?php echo base_url() ?>proposals" class="btn default">İptal</a>
								<button type="submit" class="btn green"><i class="fa fa-check"></i> Kaydet ve Önizle</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	var tax_rates_array = array[];
</script>