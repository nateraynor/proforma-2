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
						<a href="#">Ürünler / Hizmetler</a>
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
							<i class="fa fa-barcode"></i>Ürün / Hizmet Listesi
						</div>
						<div class="actions">
							<div class="btn-group pull-right">
								<button class="btn dropdown-toggle" data-toggle="dropdown">Araçlar <i class="fa fa-angle-down"></i></button>
								<ul class="dropdown-menu pull-right">
									<li><a href="javascript:window.print();">Sayfayı Yazdır</a></li>
									<li><a href="#" id="filter_excel_product_button">Excel Çıktısı</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="portlet-body">
						<div class="table-toolbar">
							<div class="btn-group">
								<a class="btn red" href="<?php echo base_url() ?>products/product">Ürün / Hizmet Ekle <i class="fa fa-plus"></i></a>
							</div>
							<div class="pull-right">
								<label>Göster :</label>
								<select class="input-xsmall" onchange="get_limit(this.options[this.selectedIndex].value);" style = "height:30px;" >
									<option value="10" <?php echo $this->session->userdata['limit'] == '10' ? 'selected' : ''; ?>>10</option>
									<option value="25" <?php echo $this->session->userdata['limit'] == '25' ? 'selected' : ''; ?>>25</option>
									<option value="40" <?php echo $this->session->userdata['limit'] == '40' ? 'selected' : ''; ?>>40</option>
								</select>
								
							</div>
						</div>
						<table class="table table-striped table-bordered table-hover table-full-width">
						<thead>
						<tr class="product-sorts">
							<th><a class="product-sort" href="#" sort="p.product_id">Ürün / Hizmet No</a></th>
							<th><a class="product-sort" href="#" sort="p.product_name">Ürün / Hizmet Adı</a></th>
							<th><a class="product-sort" href="#" sort="c.category_name">Ürün / Hizmet Kategori</a></th>
							<th><a class="product-sort" href="#" sort="b.brand_name">Ürün / Hizmet Marka</a></th>
							<th style='width: 120px;'><a class="product-sort" href="#" sort="p.product_price">Ürün / Hizmet Fiyat</a></th>

							<th style='width: 201px;'>İşlemler</th>
						</tr>
						</thead>
						<tbody>
							<tr class="filters">
								<td><input class="form-control input-inline" type="text" id="filter_product_id" value="<?php echo $filters['filter_product_id'] ?>"></td>
								<td><input class="form-control input-inline" type="text" id="filter_product_name" value="<?php echo $filters['filter_product_name'] ?>"></td>
								<td><input class="form-control input-inline" type="text" id="filter_category_name" value="<?php echo $filters['filter_category_name'] ?>"></td>
								<td><input class="form-control input-inline" type="text" id="filter_brand_name" value="<?php echo $filters['filter_brand_name'] ?>"></td>
								<td><input class="form-control input-inline" type="text" id="filter_product_price" value="<?php echo $filters['filter_product_price'] ?>"></td>
								<td><a class="btn blue pull-right w100" href="#" id="filter_product_button">Ara <i class="fa fa-search"></i></a></td>
							</tr>

							<?php foreach ($products as $product): ?>
								<tr>
									<td><?php echo $product['product_id'] ;?></td>
									<td><?php echo $product['product_name']; ?></td>
									<td>
										<?php foreach ($categories as $category): ?>
												<?php if($category['category_id'] == $product['category_id']): ?>
													<?php echo $category['category_name']; ?>
												<?php endif; ?>
										<?php endforeach ?>
									</td>
									<td>
										<?php foreach ($brands as $brand): ?>
											<?php if($brand['brand_id'] == $product['brand_id']) :?>
												<?php echo $brand['brand_name']; ?>
											<?php endif; ?>
										<?php endforeach ?>
									</td>
									<td>
										<?php echo $product['product_price']; ?> <i class="fa fa-try"></i>
									</td>
									<td>
										<a style='margin-left: 4px;' href="#" location="<?php echo base_url() . 'products/deleteProduct/' . $product['product_id']; ?>" class="btn default btn-xs black validate-delete pull-right"><i class="fa fa-trash-o"></i> Sil</a>

										<a style='margin-left: 4px;' href="<?php echo base_url() . 'products/product/' . $product['product_id']; ?>" class="btn default btn-xs yellow pull-right"><i class="fa fa-edit"></i> Güncelle</a>
										<a style='margin-left: 4px;' href="<?php echo base_url() . 'products/product/' . $product['product_id'].'/#product_gallery'; ?>" class="btn default btn-xs blue pull-right"><i class="fa fa-paperclip"></i> Galeri</a>
										
									</td>
								</tr>
							<?php endforeach ?>
						</tbody>
						<tfoot>
							<tr><td colspan="12"><?php echo $pagination; ?></td></tr>
						</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	var page_url = '<?php echo $page_url; ?>';
	var excel_url = '<?php echo $excel_url; ?>';
	var sort = '<?php echo $sort ?>';
	var order = '<?php echo $sort_order ?>';
</script>
