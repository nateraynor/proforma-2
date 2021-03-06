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
						<a href="#">Ürün / Hizmet Markaları</a>
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
							<i class="fa fa-sitemap"></i>Ürün / Hizmet Marka Listesi
						</div>
						<div class="actions">
							<div class="btn-group">
								<a class="btn default" href="#" data-toggle="dropdown">
								Kolonlar <i class="fa fa-angle-down"></i>
								</a>
								<div id="" class="sample_2_column_toggler dropdown-menu hold-on-click dropdown-checkboxes pull-right">
									<?php $i = 0; ?>
									<?php foreach ($columns as $column): ?>
										<label><input type="checkbox" <?php echo $column['column_display']  == 1 ? 'checked' : 'data-onload="setDisplay(this);"'; ?> data-column="<?php echo $i; ?>" data-column-value="<?php echo $column['column_value']; ?>" class="column-toggler"><?php echo $column['column_name']; ?></label>
										<?php $i++; ?>
									<?php endforeach; ?>
								</div>
							</div>
						</div>
					</div>
					<div class="portlet-body">
						<div class="table-toolbar">
							<div class="btn-group">
								<a class="btn red" href="<?php echo base_url() ?>brands/brand">Ürün / Hizmet Marka Ekle <i class="fa fa-plus"></i></a>
							</div>
							<div class="btn-group pull-right">
								<button class="btn dropdown-toggle" data-toggle="dropdown">Araçlar <i class="fa fa-angle-down"></i></button>
								<ul class="dropdown-menu pull-right">
									<li><a href="javascript:window.print();">Sayfayı Yazdır</a></li>
									<li><a href="<?php echo base_url() ?>category/excelOutput">Excel Çıktısı</a></li>
								</ul>
							</div>
						</div>
						<table class="table table-striped table-bordered table-hover table-full-width sample_2">
						<thead>
						<tr>
							<th>Marka No</th>
							<th>Marka Adı</th>
							<th style='width: 124px !important;'>İşlemler</th>
						</tr>
						</thead>
						<tbody>
							<?php foreach ($brands as $brand): ?>
								<tr>
									<td><?php echo $brand['brand_id'] ;?></td>
									<td><?php echo $brand['brand_name']; ?></td>
									
									<td style='padding-right:4px;'>
										<a href="#" location="<?php echo base_url() . 'brands/deleteBrand/' . $brand['brand_id']; ?>" class="btn default btn-xs black validate-delete pull-right"><i class="fa fa-trash-o"></i> Sil</a>
										<a style='margin-right: 6px;' href="<?php echo base_url() . 'brands/brand/' . $brand['brand_id']; ?>" class="btn default btn-xs yellow pull-right"><i class="fa fa-edit"></i> Güncelle</a>
										
									</td>
								</tr>
							<?php endforeach ?>
						</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
