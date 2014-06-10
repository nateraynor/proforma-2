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
						<a href="<?php echo base_url() ?>categories">Ürün / Hizmet Kategoriler</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">
							<?php if($category_id != -1): ?>
								Güncelle
							<?php else: ?>
								Ekle
							<?php endif; ?>
						</a>
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
							<i class="fa fa-reorder"></i> Kategori
						</div>
					</div>
					<div class="portlet-body form">
						<form action="<?php echo base_url() . 'categories/category/' . $category_id; ?>" class="horizontal-form" method="post">
							<div class="form-body">
								<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Kategori Adı</label>
												<input type="text" name="category_name" class="form-control" col-type="varchar" placeholder="Kategori Adı" value="<?php echo isset($category['category_name']) ? $category['category_name'] : ''; ?>" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Üst Kategori Adı</label>
													<select class="form-control select2me" name="category_parent_id" data-placeholder="Seçiniz...">
														<option value="0"></option>
														<?php foreach ($categories as $parentCategory): ?>
															<option value="<?php echo $parentCategory['category_id'] ?>" <?php echo isset($category['category_parent_id']) && $category['category_parent_id'] == $parentCategory['category_id'] ? 'selected' : '';?>><?php echo $parentCategory['category_name'] ;?></option>
														<?php endforeach ?>
													</select>
											</div>
										</div>

										<div class="col-md-6" style="display: none;">
											<div class="form-group">
												<label class="control-label">Durumu</label>
													<select class="form-control select2me" name="category_status" data-placeholder="Seçiniz...">
														<option value="1" <?php echo isset($category['category_status']) && $category['category_status'] == 1 ? 'selected ' : '' ;?>>Aktif</option>
														<option value="0" <?php echo isset($category['category_status']) && $category['category_status'] == 0 ? ' selected' : '' ;?>>Pasif</option>
													</select>
											</div>
										</div>
								</div>
							</div>
							<div class="form-actions right">
								<a href="<?php echo base_url() ?>categories" class="btn default">İptal</a>
								<button type="submit" class="btn green"><i class="fa fa-check"></i> Kaydet</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>