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
												<option value="0" <?php echo isset($proposal['proposal_status']) && $proposal['proposal_status'] == 0 ? 'selected' : ''?>>İptal</option>
												<option value="1" <?php echo isset($proposal['proposal_status']) && $proposal['proposal_status'] == 1 ? 'selected' : ''?>>Taslak</option>
												<option value="2" <?php echo isset($proposal['proposal_status']) && $proposal['proposal_status'] == 2 ? 'selected' : ''?>>Gönderildi</option>
												<option value="3" <?php echo isset($proposal['proposal_status']) && $proposal['proposal_status'] == 3 ? 'selected' : ''?>>Onaylandı</option>
												<option value="4" <?php echo isset($proposal['proposal_status']) && $proposal['proposal_status'] == 4 ? 'selected' : ''?>>Değişiklik Yapıldı</option>
												<option value="5" <?php echo isset($proposal['proposal_status']) && $proposal['proposal_status'] == 5 ? 'selected' : ''?>>Red Edildi</option>
											</select>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label class="control-label">Müşteriler</label>
											<select name="proposal_customers[]" class="multi-select" multiple="" id="customers-select" style="position: absolute; left: -9999px;">
												<?php foreach ($customers as $customer): ?>
													<option value="<?php echo $customer['customer_id'] ?>"  <?php echo in_array($customer['customer_id'], $proposal_customer_ids) ? 'selected' : ''; ?> ><?php echo $customer['customer_name']; ?></option>
												<?php endforeach ?>
											</select>
										</div>
									</div>
									<?php $proposal_product_row = 0 ;?>
									<?php if(isset($proposal_products)): ?>
									<?php foreach ($proposal_products as $proposal_product): ?>
									<div class="col-md-12" style="margin-top: 10px;">
										<div class="row">
											<div class="form-group">
												<div class="col-md-2">
													<div class="input-group">
														<input class="form-control autocomplete-input" autocomplete="off" onkeyup="product_autocomplete(this);" placeholder="Ürün" type="text" name="proposal_product[<?php echo $proposal_product_row ?>][name]" value="<?php echo $proposal_product['product_name']; ?>">
														<div class="autocomplete-results"></div>
														<input type="hidden" class="hidden-id" value="<?php echo $proposal_product['product_id'] ?>" name="proposal_product[<?php echo $proposal_product_row ?>][product_id]">
														<span class="input-group-addon"><a onclick="removeRow(this); return false;"><i class="fa fa-times"></i></a></span>
													</div>
												</div>
												<div class="col-md-1 quantity"><input class="product-quantity form-control" onchange="calculatePrice();" type="number" name="proposal_product[<?php echo $proposal_product_row ?>][product_quantity]" placeholder="Adet" value="<?php echo $proposal_product['product_quantity'] ?>"></div>
												<div class="col-md-2 price">
													<div class="input-group">
														<input class="product-price form-control eachPrice currency" id="currencyField" onchange="calculatePrice();" baseprice="<?php echo $proposal_product['product_price'] ?>" type="text" value="<?php echo $proposal_product['product_price'] ?>"name="proposal_product[<?php echo $proposal_product_row ?>][product_price]" placeholder="Birim Fiyat">
															<span class="input-group-addon" style="padding: 0px; border: 1px;"></span>
													</div>
												</div>
												<div class="col-md-2 discount">
													<input class="product-discount form-control" onchange="discountPrice(this);" type="text" name="proposal_product[<?php echo $proposal_product_row ?>][product_discount]" value="<?php echo $proposal_product['product_discount'] ?>" placeholder="İndirim">
												</div>
												<div class="col-md-1">
													<select class="product-discount-type form-control disc" onchange="calculatePrice();" name="proposal_product[<?php echo $proposal_product_row ?>][product_discount_type]">
														<option disabled readonly selected="true">İndirim Tipi</option>
														<option value="1" <?php echo isset($proposal_product['product_discount_type']) && $proposal_product['product_discount_type'] == '1' ? 'selected' : '' ;?>>%</option>
														<option value="2" <?php echo isset($proposal_product['product_discount_type']) && $proposal_product['product_discount_type'] == '2' ? 'selected' : ''
														?>>Miktar</option>
													</select>
												</div>
												<div class="col-md-2">
													<select class="product-tax-rate form-control" onchange="calculatePrice();" name="proposal_product[<?php echo $proposal_product_row ?>][product_tax_rate]">
														<option disabled readonly selected="true">Vergi Oranı</option>
														<?php if ($tax_rates): ?>
														<?php foreach ($tax_rates['tax_rate'] as $tax_rate): ?>
														<option value="<?php echo $tax_rate['tax_rate_id']; ?>" <?php echo isset($proposal_product['product_tax_rate']) && $proposal_product['product_tax_rate'] == $tax_rate['tax_rate_id']  ? 'selected' : '' ;?>><?php echo $tax_rate['name'] . " -> %" . $tax_rate['rate']  ?></option>
														<?php endforeach ?>
														<?php endif ?>
													</select>
												</div>
												<div class="col-md-2">
													<span style="border: none;" class="form-control total-text">Toplam: <?php echo $proposal_product['product_total'] ?> TRY</span>
													<input type="hidden" class="total-product-price" value="<?php echo $proposal_product['product_total'] ?>">
												</div>
											</div>
										</div>
									</div>
									<?php $proposal_product_row++ ;?>
									<?php endforeach; ?>
									<?php endif; ?>
									<div class="col-md-12 totalPrices">
										<div class="row">
											<div class="form-group">
												<div class="col-md-3">
													<a href="#" id="add-product" class="btn green form-control" style="margin-top: 10px; margin-bottom: 10px;">Ürün/Hizmet Ekle</a>
												</div>
											</div>
											<div class="form-group totalPrice">
												<label class="control-label col-md-6" style="text-align: right; padding-top: 5px;">Teklif Toplamı:</label>
												<div class="input-group col-md-3 ttlprice" style="padding-right: 15px;">
													<input type="text" readonly="" name="proposal_total" class="form-control" id="proposal-total" col-type="varchar" placeholder="Teklif Toplamı" value="<?php echo isset($proposal['proposal_total']) ? $proposal['proposal_total'] : ''; ?>" required>
													<span class="input-group-addon"><i class="fa fa-try"></i></span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Geçerlilik Tarihi</label>
												<div class="input-group input-medium date date-picker" data-date="12-04-2014" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
													<input type="text" name="proposal_date_expiration" value="<?php echo isset($proposal['proposal_date_expiration']) ? date('d-m-Y',strtotime($proposal['proposal_date_expiration'])) : '' ?>" class="form-control" readonly>
													<span class="input-group-btn">
														<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
													</span>
												</div>
												<!-- /input-group -->
												<span class="help-block">
													Tarih Seçiniz
												</span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Teslim Tarihi</label>
												<div class="input-group input-medium date date-picker" data-date="12-04-2014" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
													<input type="text" name="proposal_date_delivery" value="<?php echo isset($proposal['proposal_date_delivery']) ? date('d-m-Y',strtotime($proposal['proposal_date_delivery'])): '' ?>" class="form-control" readonly>
													<span class="input-group-btn">
														<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
													</span>
												</div>
												<!-- /input-group -->
												<span class="help-block">
													Tarih Seçiniz
												</span>
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
var proposal_product_row = <?php echo $proposal_product_row; ?>;
</script>
<script type="text/javascript">
	var exchange_rates = '';
	<?php foreach ($exchange_rates['exchange_rate'] as $exchange_rate) { ?>
	exchange_rates += "<?php echo '<li><a onclick=\"getExchange(this, ' . $exchange_rate['exchange_rate_id'] . ', ' . $exchange_rate['rate'] . '); return false;\" href=\"#\">' . $exchange_rate['code'] . '</a></li>'; ?>";
	<?php } ?>;
	
</script>
<script type="text/javascript">
	var tax_rates = '';
	<?php foreach ($tax_rates['tax_rate'] as $tax_rate) { ?>
	tax_rates += "<?php echo '<option value=\"' . $tax_rate['tax_rate_id'] . '\">' . $tax_rate['name'] . ' -> ' . $tax_rate['rate'] . '</option>'; ?>";
	<?php } ?>;
</script>