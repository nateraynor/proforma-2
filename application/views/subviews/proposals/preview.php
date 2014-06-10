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
							<h4>Teklif Resmi Yazısı:</h4>
							<?php echo $proposal['proposal_statement_top']; ?>
						</div>
					</div>
					<hr/>
					<div class="row">
						<div class="col-xs-12">
							<table class="table table-striped table-hover">
							<?php if (isset($proposal_products)) { ?>
								<thead>
								<tr>
									<th>#</th>
									<th>Ürün / Hizmet Adı</th>
									<th>Adet</th>
									<th>Birim Fiyat</i></th>
									<?php $discount = 0; ?>
									<?php  foreach ($proposal_products as $product): ?>
									<?php if ($product['product_discount'] != 0.00) $discount = 1;  ?>
									<?php endforeach ?>
									<?php if($discount==1) { ?>
										<th>İndirim</th>
									<?php } ?>
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
											<a data-toggle="modal" onclick="getProduct(this, <?php echo $product['product_id']; ?>,'<?php echo $product['product_name']; ?>');" href="#full-width"> <span class="small">Ürün Detayları <i style="font-size: 13px;" class="fa fa-search"></i></span></a>
											<?php endif ?>
										</td>
										<td><?php echo $product['product_quantity']; ?></td>
										<td><?php echo $product['product_price']; ?>  <i class="fa fa-try"></i></td>
										<?php if($discount==1){
											echo "<td>".$product['product_discount']." <i class='fa fa-try'></i></td>";
										}?>
										<td><?php echo $product['product_tax_name']; ?></td>


										<td style="text-align: right; font-weight: bold;"><?php echo $product['product_total'] ?>  <i class="fa fa-try"></td>
									</tr>
								<?php endforeach ?>
								</tbody>
								<?php } else { ?>
									<tr>
										<td colspan="10">Teklife herhangi bir ürün eklenmedi</td>
									</tr>
								<?php } ?>
							</table>
						</div>
					</div>
					<div class="row">
						<div class="col-md-8">
							<?php if ($proposal['proposal_date_delivery']): ?>
								<h5><b>Ürünün / Hizmetin Teslimat Tarihi:</b> <?php echo $proposal['proposal_date_delivery'] ?></h5>
							<?php endif ?>
							<?php if ($proposal['proposal_date_expiration']): ?>
								<h5><b>Teklif Geçerlilik Tarihi:</b> <?php echo $proposal['proposal_date_expiration'] ?></h5>
							<?php endif ?>
							<?php if ($proposal['proposal_statement_bottom']): ?>
								<h5><b>Teklife Eklemek İstediğiniz Notlar</b></h5>
								<p><?php echo $proposal['proposal_statement_bottom'] ?></p>
							<?php endif ?>
						</div>
						<div class="col-xs-4 invoice-block">
							<ul class="list-unstyled amounts">
								<li><strong>Ara Toplam:</strong> <?php echo $subtotal ?> <i class="fa fa-try"></i></li>
								<?php if (isset($discount) && $discount == 1) { ?>
								<li><strong>İndirim Tutarı:</strong> <?php echo $proposal_total_discount ?> <i class="fa fa-try"></i></li>
								<?php } ?>
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
									<strong><?php echo $this->session->userdata['name'] . " " . $this->session->userdata['surname']; ?></strong><br/>
									<a href="mailto:#"><?php echo $this->session->userdata['email'] ?></a>
								</address>
							</div>
						</div>
						<div class="col-md-5 message" style="text-align: right;">
							<a class="btn btn-lg blue hidden-print" onclick="javascript:window.print();">Yazdır <i class="fa fa-print"></i></a>
							<?php if($proposal['proposal_status'] == '2') :?>
							<a class="btn btn-lg green hidden-print validate-repeat-send" id="<?php echo $proposal['proposal_id'] ;?>" href="#">Müşterilere Gönder <i class="fa fa-check"></i></a>
							<?php else: ?>
							<a class="btn btn-lg green hidden-print" href="<?php echo base_url() . 'proposals/sendProposal/' . $proposal['proposal_id']  ?>">Müşterilere Gönder <i class="fa fa-check"></i></a>
							<?php endif; ?>
							<a class="btn btn-lg yellow hidden-print" href="<?php echo base_url() . 'proposals/proposal/' . $proposal['proposal_id']  ?>">Teklifi Güncelle <i class="fa fa-edit"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="full-width" class="modal container fade" tabindex="-1">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		<h4 class="modal-title"></h4>
	</div>
	<div class="modal-body">
		<div class="tabbable tabbable-custom tabbable-full-width">
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#tab_1_1" data-toggle="tab">Genel Bakış</a>
				</li>
				<li>
					<a href="#tab_1_3" data-toggle="tab">Dosyalar</a>
				</li>
			
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="tab_1_1">
					<div class="row">
						<div class="col-md-3">
							<ul class="list-unstyled profile-nav">
								<li>
									
									<!--a href="#" class="profile-edit">edit</a-->
								</li>
							
							</ul>
						</div>
						<div class="col-md-9">
							<div class="row">
								<div class="col-md-8 profile-info">
									<!--h1>John Doe</h1-->
								
							
								</div>
								<!--end col-md-8-->
								<div class="col-md-4">
									<div class="portlet sale-summary">
										<div class="portlet-title">
											<!--div class="caption">
												Sales Summary
											</div-->
											
										</div>
										<div class="portlet-body">
											<ul class="list-unstyled">
												<li>
													<span class="sale-info">
														ÜRÜN / HİZMET FİYAT
													</span>
													<span class="sale-num">
													</span>
												</li>
												<li>
													<span class="sale-info">
														ÜRÜN / HİZMET VERGİ ORANI <i class="fa fa-img-down"></i>
													</span>
													<span class="sale-num">
													</span>
												</li>
												
											</ul>
										</div>
									</div>
								</div>
								<!--end col-md-4-->
							</div>
							
						</div>
					</div>
				</div>
				<!--tab_1_2-->
				<div class="tab-pane" id="tab_1_3">
					<div class="row">
						<div class="col-md-12">
							<div class="tabbable ">
								<div class="tab-content">
									<div class="tab-pane active">
										<!-- BEGIN FILTER -->
										<div class="margin-top-10">
											<div class="row mix-grid">
												<div class="col-md-3 col-sm-4 mix">
													<div class="mix-inner">
													
													</div>
												</div>
											</div>
										</div>
										<!-- END FILTER -->
									</div>
								
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end tab-pane-->
				
			</div>
		</div>

	</div>
	<div class="modal-footer">
		<button type="button" data-dismiss="modal" class="btn btn-default">Kapat</button>
	</div>
</div>
<script type="text/javascript">
function getProduct(element, id, name) {
			$.ajax({
				type: "POST",
				url : base_url + 'proposals/getProduct/',
				data: {id : id},
				success: function(product,product_files){
					console.log(product);
					//console.log(product[10]["0"]);
					//var json_data_object = eval("(" + product + ")");
					var pro = product.
					var data = $.parseJSON(product);
					console.log(data);
                	//var jsonData = Ext.util.JSON.decode(product);
		
                	//var datap=jsondata["product_name"];
                	//console.log(datap);
					html  = '<div id="full-width" class="modal container fade" tabindex="-1">';
					html += '	<div class="modal-header">';
					html += '		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>';
					html += '		<h4 class="modal-title"></h4>';
					html += '	</div>';
					html += '	<div class="modal-body">';
					html += '		<div class="tabbable tabbable-custom tabbable-full-width">';
					html += '			<ul class="nav nav-tabs">';
					html += '				<li class="active"><a href="#tab_1_1" data-toggle="tab">Genel Bakış</a></li>';
					html += '				<li><a href="#tab_1_3" data-toggle="tab">Dosyalar</a></li>';
					html += '			</ul>';
					html += '			<div class="tab-content">';
					html += '				<div class="tab-pane active" id="tab_1_1">';
					html += '					<div class="row">';
					html += '						<div class="col-md-3">';
					html += '							<ul class="list-unstyled profile-nav">';
					html += '							<li></li>';
					html += '							</ul>';
					html += '						</div>';
					html += '						<div class="col-md-9">';
					html += '							<div class="row">';
					html += '								<div class="col-md-8 profile-info"></div>';
					html += '								<div class="col-md-4">';
					html += '									<div class="portlet sale-summary">';
					html += '										<div class="portlet-title"></div>';
					html += '										<div class="portlet-body">';
					html += '											<ul class="list-unstyled">';
					html += '												<li><span class="sale-info">ÜRÜN / HİZMET FİYAT</span><span class="sale-num"></span></li>';
					html += '												<li><span class="sale-info">ÜRÜN / HİZMET VERGİ ORANI <i class="fa fa-img-down"></i></span><span class="sale-num"></span></li>';
					html += '											</ul>';
					html += '										</div>';
					html += '									</div>';
					html += '								</div>';
					html += '							</div>';
					html += '						</div>';
					html += '					</div>';
					html += '				</div>';
					html += '				<div class="tab-pane" id="tab_1_3">';
					html += '					<div class="row">';
					html += '						<div class="col-md-12">';
					html += '							<div class="tabbable ">';
					html += '								<div class="tab-content">';
					html += '									<div class="tab-pane active">';
					html += '										<div class="margin-top-10">';
					html += '											<div class="row mix-grid">';
					html += '												<div class="col-md-3 col-sm-4 mix">';
					html += '													<div class="mix-inner">';
					html += '													</div>';
					html += '												</div>';
					html += '											</div>';
					html += '										</div>';
					html += '									</div>';
					html += '								</div>';
					html += '							</div>';
					html += '						</div>';
					html += '					</div>';
					html += '				</div>';
					html += '			</div>';
					html += '		</div>';
					html += '	</div>';
					html += '	<div class="modal-footer">';
					html += '		<button type="button" data-dismiss="modal" class="btn btn-default">Kapat</button>';
					html += '	</div>';
					html += '</div>';
				}

			});

  }

</script>
