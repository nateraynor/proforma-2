<div class="page-content-wrapper">
	<div class="page-content">
			<div class="row">
				<div class="col-md-12">
					<ul class="page-breadcrumb breadcrumb">
						<li><i class="fa fa-home"></i><a href="<?php echo base_url() ?>">Anasayfa</a><i class="fa fa-angle-right"></i></li>
						<li><a href="<?php echo base_url() ?>products">Ürünler / Hizmetler</a><i class="fa fa-angle-right"></i></li>
						<li><a href="#">	
						<?php if($product_id != -1): ?>
							Güncelle
						<?php else: ?>
							Ekle
						<?php endif; ?></a></li>
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
							<i class="fa fa-reorder"></i>Ürün / Hizmet
						</div>
						<div class="tools">
							<a href="javascript:;" class="collapse"></a>
							<a href="#portlet-config" data-toggle="modal" class="config"></a>
						</div>
					</div>
					<div class="portlet-body">
						<ul class="nav nav-tabs">
							<li class="active">
								<a href="#product_info" data-toggle="tab">Ürün / Hizmet Bilgileri</a>
							</li>
							<?php if(isset($product)): ?>
							<li class="">
								<a href="#product_gallery" data-toggle="tab">Ürün / Hizmet Galeri</a>
							</li>
							<?php endif; ?>
						</ul>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="product_info">
								<div class="portlet-body form">
									<form action="<?php echo base_url() . 'products/product/' . $product_id; ?>" class="horizontal-form" method="post" enctype="multipart/form-data">
										<div class="form-body">
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Ürün / Hizmet Adı</label>
														<input type="text" name="product_name" class="form-control" col-type="varchar" placeholder="Ürün Adı" value="<?php echo isset($product['product_name']) ? $product['product_name'] : ''; ?>" required>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Ürün / Hizmet Kategori Adı</label>
														<select class="form-control select2me" name="category_id" data-placeholder="Seçiniz...">
															<option value="0"></option>
															<?php foreach ($categories as $category): ?>
															<option value="<?php echo $category['category_id'] ?>" <?php echo isset($product['category_id']) && $product['category_id'] == $category['category_id'] ? 'selected' : '';?>><?php echo $category['category_name'] ;?></option>
															<?php endforeach ?>
														</select>
													</div>
												</div>
												<div class="form-group last col-md-6">
													<label class="control-label col-md-3">Ana Resim Seçiniz</label>
													<div class="col-md-6">
														<div class="fileupload fileupload-new" data-provides="fileupload">
															<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
																<?php if(!isset($product['product_image'])): ?>
																<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=resim+yok" alt=""/>
																<?php else: ?>
																<img src="<?php echo base_url().'uploads/'.$product['product_image']; ?>">
																<?php endif; ?>
															</div>
															<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
															</div>
															<div>
																<span class="btn default btn-file">
																<span class="fileupload-new">
																<i class="fa fa-paper-clip"></i> Dosya Seçiniz
																</span>
																<span class="fileupload-exists">
																<i class="fa fa-undo"></i> Değiştir
																</span>
																<?php if(!isset($product['product_image'])): ?>
																<input type="file" name="product_image" class="default" required/>
																<?php else: ?>
																<input type="file" name="product_image" class="default"/>
																<?php endif; ?>
																</span>
																<a href="#" class="btn red fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Kaldır</a>
															</div>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Ürün / Hizmet Marka Adı</label>
															<select class="form-control select2me" name="brand_id" data-placeholder="Seçiniz...">
																<option value="0"></option>
																<?php foreach ($brands as $brand): ?>
																	<option value="<?php echo $brand['brand_id'] ?>" <?php echo isset($product['brand_id']) && $product['brand_id'] == $brand['brand_id'] ? 'selected' : '';?>><?php echo $brand['brand_name'] ;?></option>
																<?php endforeach ?>
															</select>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Ürün / Hizmet Fiyat</label>
														<div class="input-group">
														<input type="text" name="product_price" class="currency form-control price" col-type="varchar" placeholder="Ürün / Hizmet Fiyat" value="<?php echo isset($product['product_price']) ? $product['product_price'] : ''; ?>"  required > 
														<span class="input-group-addon"><i class="fa fa-try"></i></span></div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Ürün / Hizmet Vergi Oranı</label>
														<select name="product_tax_rate" class="form-control">
														<option value="0"></option>
														<?php if ($tax_rates): ?>
														<?php foreach ($tax_rates['tax_rate'] as $tax_rate): ?>
															<option value="<?php echo $tax_rate['tax_rate_id']; ?>" <?php echo isset($product['product_tax_rate'] ) && $product['product_tax_rate'] == $tax_rate['tax_rate_id'] ? 'selected' : ''; ?>><?php echo $tax_rate['name'] . " -> %" . $tax_rate['rate']  ?></option>
														<?php endforeach ?>
														<?php endif ?>
														</select>
													</div>
												</div>
													<div class="col-md-6">
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label class="control-label">Ürün / Hizmet Link</label>
																<input type="text" name="product_link" class="form-control" col-type="varchar" placeholder="Ürün / Hizmet Link" value="<?php echo isset($product['product_link']) ? $product['product_link'] : ''; ?>" required>
															</div>
														</div>
												<div class="col-md-12">
													<div class="form-group">
														<label class="control-label col-md-0">Ürün / Hizmet Açıklama</label><br>
														<div class="col-md-12">
															<textarea id="editor" name="product_description"  ><?php echo isset($product['product_description']) ? $product['product_description'] : '' ;?></textarea>
														</div>
													</div>
												</div>
												<div class="col-md-6" style="display: none;">
													<div class="form-group">
														<label class="control-label">Ürün Durumu</label>
														<select class="form-control select2me" name="product_status" data-placeholder="Seçiniz...">
															<option value="1" <?php echo isset($product['product_status']) && $product['product_status'] == 1 ? 'selected ' : '' ;?>>Aktif</option>
															<option value="0" <?php echo isset($product['product_status']) && $product['product_status'] == 0 ? ' selected' : '' ;?>>Pasif</option>
														</select>
													</div>
												</div>
											</div>
										</div>
										<div class="form-actions right">
											<a href="<?php echo base_url() ?>products" class="btn default">İptal</a>
											<button type="submit" class="btn green"><i class="fa fa-check"></i> Kaydet</button>
										</div>
									</form>
								</div>
							</div>
							<?php if(isset($product)): ?>
							<div class="tab-pane fade" id="product_gallery">
								<div class="row">
									<div class="col-md-12">
										<p>
											<span class="label label-danger">
											NOT:
											</span>
											&nbsp; Bu modül yalnızca Chrome, Firefox, Safari, Opera & Internet Explorer 10 çalışır.
										</p>
										<form action="<?php echo base_url() ?>products/fileUpload/<?php echo $product_id; ?>" class="dropzone" id="my-dropzone"></form>
										<div class="gallery dropzone">
											<?php foreach ($product_files as $file): ?>
											<div class="dz-preview dz-file-preview dz-processing dz-success">
												<div class="dz-details" style="margin-bottom: 0px;">
													<div class="dz-filename">
														<span data-dz-name=""><?php echo $file['image_path']; ?></span>
													</div>
													<img src="<?php echo base_url() . 'uploads/' . $file['image_path']; ?>">
												</div>
												<button class="btn btn-sm btn-block remove-file" file="<?php echo $file['image_id']; ?>">Dosyayı Kaldır</button>
											</div>
											<?php endforeach ?>
										</div>
									</div>
								</div>
							</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
				</div>
			</div>
	</div>
</div>