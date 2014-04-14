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
						<a href="<?php echo base_url() ?>proposals">Teklifer</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="<?php echo base_url() . "proposals/proposal/" . $proposal['proposal_id']; ?>"><?php echo $proposal['proposal_name']; ?></a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Önizleme</a>
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
				<div class="invoice">
					<div class="row invoice-logo">
						<div class="col-xs-6 invoice-logo-space">
							<img style="max-width: 15%;" src="<?php echo base_url() . "uploads/" . $company_info['company_image']; ?>" alt=""/>
						</div>
						<div class="col-xs-6">
							<p>
								#<?php echo $proposal['proposal_code'] ?> / <?php echo $proposal['proposal_date_added']; ?>
								<span class="muted">
									<?php echo $proposal['proposal_name']; ?> / Son güncellenme tarihi: <?php echo $proposal['proposal_date_updated']; ?>
								</span>
							</p>
						</div>
					</div>
					<hr/>
					<div class="row">
						<div class="col-xs-4">
							<h4>Müşteri:</h4>
							<ul class="list-unstyled">
							<?php foreach ($proposal_customers as $customer): ?>
								<li><?php echo $customer['customer_name']; ?></li>
								<li><?php echo $customer['customer_email'] ?></li>
								<li><?php echo $customer['customer_company'] ?></li>
							<?php endforeach ?>
							</ul>
						</div>
						<div class="col-xs-7">
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
								<th>
									#
								</th>
								<th>
									Ürün Adı
								</th>
								<th class="hidden-480">
									Ürün Açıklaması
								</th>
								<th class="hidden-480">
									Adet
								</th>
								<th class="hidden-480">
									Birim Fiyat
								</th>
								<th>
									Toplam
								</th>
							</tr>
							</thead>
							<tbody>
							<?php $sub_total = 0; ?>
							<?php foreach ($proposal_products as $product): ?>
								<tr>
									<td><?php echo $product['product_id']; ?></td>
									<td><?php echo $product['product_name']; ?></td>
									<td><?php echo $product['product_description']; ?></td>
									<td><?php echo $product['product_quantity']; ?></td>
									<td><?php echo $product['product_price']; ?></td>
									<td><?php echo $product['product_quantity'] * $product['product_price']; ?></td>
									<?php $sub_total += $product['product_quantity'] * $product['product_price']; ?>
								</tr>
							<?php endforeach ?>
							</tbody>
							</table>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-4">
							<div class="well">
								<address>
								<strong><?php echo $company_info['company_name']; ?></strong><br/>
								<?php echo $company_info['company_address']; ?><br/>
								<abbr title="Phone">P:</abbr> <?php echo $company_info['company_phone']; ?> </address>
								<address>
								<strong><?php echo $this->session->userdata['name'] . " " . $this->session->userdata['surname']; ?></strong><br/>
								<a href="mailto:#"><?php echo $this->session->userdata['email'] ?></a>
								</address>
							</div>
						</div>
						<div class="col-xs-8 invoice-block">
							<ul class="list-unstyled amounts">
								<li>
									<strong>Ara - Toplam:</strong> <?php echo $sub_total ?> <i class="fa fa-try"></i>
								</li>
								<li>
									<strong>İndirim Oranı:</strong> <?php echo $proposal['proposal_discount_rate'] ?>%
								</li>
								<li>
									<strong>İndirim Tutarı:</strong> <?php echo $sub_total * $proposal['proposal_discount_rate'] / 100; ?> <i class="fa fa-try"></i>
								</li>
								<li>
									<strong>Vergi Oranı:</strong> <?php echo $proposal['proposal_tax_rate']; ?>%
								</li>
								<li>
									<strong>Vergi Oranı:</strong> <?php echo $sub_total * $proposal['proposal_tax_rate'] / 100; ?> <i class="fa fa-try"></i>
								</li>
								<li>
									<strong>Genel Toplam:</strong> <?php echo $sub_total - ($sub_total * $proposal['proposal_discount_rate'] / 100) + ($sub_total * $proposal['proposal_tax_rate'] / 100); ?> <i class="fa fa-try"></i>
								</li>
							</ul>
							<br/>
							<a class="btn btn-lg blue hidden-print" onclick="javascript:window.print();">Print <i class="fa fa-print"></i></a>
							<a class="btn btn-lg green hidden-print">Submit Your Invoice <i class="fa fa-check"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>