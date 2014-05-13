<div class="page-content-wrapper">
	<div class="page-content">
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
				<div class="invoice">
					<div class="row invoice-logo">
						<div class="col-xs-6 invoice-logo-space">
							<img style="max-width: 15%;" src="<?php echo base_url() . "uploads/" . $company_info['company_image']; ?>" alt=""/>
						</div>
						<div class="col-xs-6">
							<p>
								<?php echo $proposal['proposal_name'] ?> / <?php echo $proposal['proposal_date_added']; ?>
								<span class="muted">Son güncellenme tarihi: <?php echo $proposal['proposal_date_updated']; ?></span>
							</p>
						</div>
					</div>
					<hr/>
					<div class="row">
						<div class="col-xs-6">
							<h4>Müşteriler:</h4>
							<?php foreach ($proposal_customers as $customer): ?>
							<div class="col-md-3" style="border-left: 1px solid #eee; min-height: 90px;">
								<ul class="list-unstyled">
									<li><b><?php echo $customer['customer_name']; ?></b></li>
									<li><?php echo $customer['customer_email'] ?></li>
									<li><?php echo $customer['customer_company'] ?></li>
								</ul>
							</div>
							<?php endforeach ?>
						</div>
						<div class="col-xs-6">
							<h4>Teklif Hakkında:</h4>
							<?php echo $proposal['proposal_statement_top']; ?>
						</div>
					</div>
					<hr/>
					<div class="row">
						<div class="col-xs-12">
							<table class="table table-striped table-hover">
								<thead>
								<tr>
									<th>#</th>
									<th>Ürün Adı</th>
									<th>Adet</th>
									<th>Birim Fiyat</th>
									<th>İndirim</th>
									<th>Vergi Oranı</th>
									<th style="text-align: right; font-weight: bold;">Toplam</th>
								</tr>
								</thead>
								<tbody>
								<?php $sub_total = 0; ?>
								<?php foreach ($proposal_products as $product): ?>
									<tr>
										<td><?php echo $product['product_id']; ?></td>
										<td>
											<?php echo $product['product_name']; ?>
											<?php if ($product['product_link']): ?>
												<a href="<?php echo $product['product_link'] ?>" target="_blank"><i class="fa fa-search"></i></a>
											<?php endif ?>
										</td>
										<td><?php echo $product['product_quantity']; ?></td>
										<td><?php echo $product['product_price']; ?></td>
										<td><?php echo $product['product_discount']; ?></td>
										<td>% <?php echo $product['product_tax_rate']; ?></td>
										<td style="text-align: right; font-weight: bold;"><?php echo $product['product_total'] ?></td>
									</tr>
								<?php endforeach ?>
								</tbody>
							</table>
						</div>
					</div>
					<div class="row">
						<div class="col-md-8">
							<?php if ($proposal['proposal_date_delivery']): ?>
								<h5><b>Teslimat Tarihi:</b> <?php echo $proposal['proposal_date_delivery'] ?></h5>
							<?php endif ?>
							<?php if ($proposal['proposal_date_expiration']): ?>
								<h5><b>Teklif Geçerlilik Tarihi:</b> <?php echo $proposal['proposal_date_expiration'] ?></h5>
							<?php endif ?>
							<?php if ($proposal['proposal_statement_bottom']): ?>
								<h5><b>Teklif Notları</b></h5>
								<p><?php echo $proposal['proposal_statement_bottom'] ?></p>
							<?php endif ?>
						</div>
						<div class="col-xs-4 invoice-block">
							<ul class="list-unstyled amounts">
								<li><strong>Ara Toplam:</strong> <?php echo $subtotal ?> <i class="fa fa-try"></i></li>
								<li><strong>İndirim Tutarı:</strong> <?php echo $proposal_total_discount ?> <i class="fa fa-try"></i></li>
								<li><strong>Vergi Tutarı:</strong> <?php echo $tax_total; ?> <i class="fa fa-try"></i></li>
								<li><strong>Genel Toplam:</strong> <?php echo $proposal_total; ?> <i class="fa fa-try"></i></li>
							</ul>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-7">
							<div class="well">
								<address>
									<strong><?php echo $company_info['company_name']; ?></strong><br/>
									<?php echo $company_info['company_address']; ?><br/>
									<?php echo $company_info['company_phone']; ?>
								</address>
								<address>
									<strong><?php echo $proposal['user_name'] . " " . $proposal['user_surname'] ?></strong><br/>
									<a href="mailto:#"><?php echo $proposal['user_email'] ?></a>
								</address>
							</div>
						</div>
						<div class="col-md-5 message" style="text-align: right;">
							<a class="btn btn-lg blue hidden-print" onclick="javascript:window.print();">Yazdır <i class="fa fa-print"></i></a>
							<a class="btn btn-lg red hidden-print validate-rejected" id="<?php echo $proposal['proposal_id'] ;?>" href="#">Red Et<i class="fa fa-times"></i></a>
							<!--a class="btn btn-lg yellow hidden-print" href="<?php //echo base_url() . 'proposals/sendProposal/' . $proposal['proposal_id']  ?>">Pazarlık Et <i class="fa fa-edit"></i></a-->
							<a class="btn btn-lg green hidden-print validate-approval" id="<?php echo $proposal['proposal_id'] ;?>" href="#">Onayla <i class="fa fa-check"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
