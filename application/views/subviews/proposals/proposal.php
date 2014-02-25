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
							<i class="fa fa-group"></i> Teklif
						</div>
					</div>
					<div class="portlet-body form">
						<form action="<?php echo base_url() . 'proposals/proposal/' . $proposal_id; ?>" class="horizontal-form" method="post">
							<div class="form-body">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Teklif Adı</label>
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
											<select name="proposal_customers" class="multi-select" multiple="" id="customers-select" style="position: absolute; left: -9999px;">
												<?php foreach ($customers as $customer): ?>
													<option value="<?php echo $customer['customer_id'] ?>"><?php echo $customer['customer_name']; ?></option>
												<?php endforeach ?>
											</select>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label class="control-label">Ürünler</label>
											<select name="proposal_products" class="multi-select" multiple="" id="products-select" style="position: absolute; left: -9999px;">
												<?php foreach ($products as $product): ?>
													<option value="<?php echo $product['product_id'] ?>" price="<?php echo $product['product_price']; ?>"><?php echo $product['product_name']; ?></option>
												<?php endforeach ?>
											</select>
										</div>
										<div class="form-group col-md-12" style="display: none;" id="product-details-form">
											<div class="col-md-2">
												<label class="control-label">Ürün</label>
												<input id="product-name" readonly="" class="form-control" value="" type="text">
											</div>
											<div class="col-md-2">
												<label class="control-label">Ürün Fiyatı</label>
												<input id="product-price" readonly="" class="form-control" value="" type="text">
											</div>
											<div class="col-md-2">
												<label class="control-label">Adet</label>
												<input id="product-quantity" class="form-control" value="1" type="number">
											</div>
											<div class="col-md-6">
												<label class="control-label">Ürün Ekleri</label>
												<div id="product-files">

												</div>
											</div>
										</div>
										<div class="clearfix"></div>
										<div class="form-actions right" id="product-details-button" style="display: none;">
											<a href="#" class="btn green">Ekle</a>
										</div>
										<hr />
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Teklif Toplamı</label>
											<div class="input-group">
												<input type="text" name="proposal_name" class="form-control" id="proposal-total" col-type="varchar" placeholder="Teklif Toplamı" value="<?php echo isset($proposal['proposal_name']) ? $proposal['proposal_name'] : ''; ?>" required>
												<span class="input-group-addon"><i class="fa fa-try"></i></span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Teklif İndirim Oranı</label>
											<div class="input-group">
												<input type="text" name="proposal_name" class="form-control" id="proposal-discount" col-type="varchar" placeholder="Teklif İndirim Oranı" value="<?php echo isset($proposal['proposal_name']) ? $proposal['proposal_name'] : ''; ?>" required>
												<span class="input-group-addon">%</span>
											</div>
										</div>
									</div>
									<div class="col-md-12" style="padding: 0;">
										<div class="form-group col-md-6">
											<label class="control-label">Teklif Vergi Oranı</label>
											<div class="input-group">
												<input type="text" name="proposal_name" class="form-control" col-type="varchar" placeholder="Teklif Vergi Oranı" value="<?php echo isset($proposal['proposal_name']) ? $proposal['proposal_name'] : ''; ?>" required>
												<span class="input-group-addon">%</span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Teklif Üst Açıklama</label>
											<textarea id="proposal-content-top" name="content" data-provide="markdown" rows="10"></textarea>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Teklif Alt Açıklama</label>
											<textarea id="proposal-content-bottom" name="content" data-provide="markdown" rows="10"></textarea>
										</div>
									</div>
									<hr />
									<div class="preview col-md-12" style="padding: 0;">
										<div class="form-group col-md-6">
											<label class="control-label">Şablon Seçin</label>
											<select class="form-control select2me" name="proposal_template" id="proposal-template" data-placeholder="Seçiniz...">
												<?php foreach ($templates as $template): ?>
													<option value="<?php echo $template['template_id']; ?>" <?php echo isset($proposal['proposal_template_id']) && $proposal['proposal_template_id'] == $template_id ? 'selected' : ''; ?>><?php echo $template['template_name']; ?></option>
												<?php endforeach ?>
											</select>
										</div>
										<div class="col-md-6">
											<h2>test</h2>
										</div>
										<div class="clearfix"></div>
										<?php foreach ($templates as $template): ?>
											<div class="template col-md-12" id="template-<?php echo $template['template_id'] ?>" style="display: none;">
											<?php echo $template['template_html']; ?>
											</div>
										<?php endforeach ?>
									</div>
								</div>
							</div>
							<div class="form-actions right">
								<a href="<?php echo base_url() ?>proposals" class="btn default">İptal</a>
								<button type="submit" class="btn green"><i class="fa fa-check"></i> Kaydet</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>