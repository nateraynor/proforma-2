<div class="page-content-wrapper">
	<div class="page-content">
		<div class="row">
			<div class="col-md-12">
				<ul class="page-breadcrumb breadcrumb">
					<li class="btn-group">
						<a href="<?php echo base_url() . 'customers/customerActions/' . $customer_id; ?>" class="btn dark">
						<span>
							Müşteri İşlemleri
						</span>
						</a>
						<button type="button" class="btn red dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
						<span>
							İşlemler
						</span>
						<i class="fa fa-angle-down"></i>
						</button>
						<ul class="dropdown-menu pull-right" role="menu">
							<li><a href="javascript:window.print();">Sayfayı Yazdır</a></li>
						</ul>
					</li>
					<li>
						<i class="fa fa-home"></i>
						<a href="<?php echo base_url() ?>">Anasayfa</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="<?php echo base_url() ?>customers">Müşteriler</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Müşteri</a>
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
							<i class="fa fa-group"></i> Müşteri Ekle
						</div>
					</div>
					<div class="portlet-body form">
						<form action="<?php echo base_url() . 'customers/customer/' . $customer_id; ?>" class="horizontal-form" method="post">
							<div class="form-body">
								<?php $i = 1; ?>
								<div class="row">
								<?php foreach ($columns as $column): ?>
									<?php if ($column['column_key'] == 'PRI'): ?>
										<?php continue; ?>
									<?php endif ?>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label"><?php echo $column['column_name']; ?></label>
												<?php if ($column['column_value'] == 'customer_company_id' || $column['column_value'] == 'customer_group_id' || $column['column_value'] == 'customer_status_id'): ?>
													<?php if ($column['column_value'] == 'customer_company_id'): ?>
														<select name="<?php echo $column['column_value'] ?>" class="form-control select2me" data-placholder="Seçiniz">
														<?php foreach ($customer_companies as $company): ?>
															<option value="<?php echo $company['customer_company_id'] ?>" <?php echo $company['customer_company_id'] == $column['customer_value'] ? 'selected' : ''; ?>><?php echo $company['customer_company_name']; ?></option>
														<?php endforeach ?>
														</select>
													<?php elseif ($column['column_value'] == 'customer_status_id'): ?>
														<select name="<?php echo $column['column_value'] ?>" class="form-control select2me" data-placholder="Seçiniz">
														<?php foreach ($customer_statuses as $customer_status): ?>
															<option value="<?php echo $customer_status['customer_status_id'] ?>" <?php echo $customer_status['customer_status_id'] == $column['customer_value'] ? 'selected' : ''; ?> title="<?php echo $customer_status['customer_status_description']; ?>"><?php echo $customer_status['customer_status_content']; ?></option>
														<?php endforeach ?>
														</select>
													<?php elseif ($column['column_value'] == 'customer_group_id'): ?>
															<select name="<?php echo $column['column_value'] ?>" class="form-control select2me" data-placholder="Seçiniz">
															<?php foreach ($customer_groups as $customer_group): ?>
																<option value="<?php echo $customer_group['customer_group_id'] ?>" <?php echo $customer_group['customer_group_id'] == $column['customer_value'] ? 'selected' : ''; ?> title="<?php echo $customer_group['customer_group_description']; ?>"><?php echo $customer_group['customer_group_content']; ?></option>
															<?php endforeach ?>
															</select>
													<?php endif ?>
												<?php elseif($column['subset']): ?>
													<select name="<?php echo $column['column_value'] ?>" class="form-control select2me">
														<?php foreach ($column['subset'] as $subset_column): ?>
															<option value="<?php echo $subset_column['value'] ?>" <?php echo $subset_column['value'] == $column['customer_value'] ? 'selected' : ''; ?>><?php echo $subset_column['content']; ?></option>
														<?php endforeach ?>
													</select>
												<?php elseif ($column['column_type'] == 'varchar'): ?>
												<input type="text" name="<?php echo $column['column_value']; ?>" class="form-control" col-type="<?php echo $column['column_type']; ?>" placeholder="<?php echo $column['column_name'] ?>" value="<?php echo $column['customer_value']; ?>">
												<?php elseif ($column['column_type'] == 'text'): ?>
												<textarea name="<?php echo $column['column_value']; ?>" class="form-control" col-type="<?php echo $column['column_type']; ?>" placeholder="<?php echo $column['column_name'] ?>">
												<?php echo $column['customer_value']; ?>
												</textarea>
												<?php elseif ($column['column_type'] == 'datetime'): ?>
													<div class="input-group date form_datetime" data-date="2014-02-01T00:00:00Z" >
														<input type="text" class="form-control" col-type="<?php echo $column['column_type']; ?>" <?php echo $column['column_value'] == 'customer_date_added' || $column['column_value'] == 'customer_date_updated' ? 'readonly' : ''; ?> name="<?php echo $column['column_value']; ?>" value="<?php echo $column['customer_value']; ?>">
														<?php if ($column['column_value'] == 'customer_date_added' || $column['column_value'] == 'customer_date_updated'): ?>
															<span class="input-group-btn" style="display:none;">
																<button class="form-control btn default date-reset" type="button"><i class="fa fa-times"></i></button>
															</span>
															<span class="input-group-btn" style="display:none;">
																<button class="form-control btn default date-set" type="button"><i class="fa fa-calendar"></i></button>
															</span>
														<?php endif ?>
													</div>
												<?php elseif ($column['column_type'] == 'date'): ?>
													<div class="input-group date date-picker" data-date="1980-01-01T00:00:00Z" data-date-format="yyyy-mm-dd" data-date-viewmode="years">
														<input type="text" class="form-control" col-type="<?php echo $column['column_type']; ?>" name="<?php echo $column['column_value']; ?>" value="<?php echo $column['customer_value']; ?>">
														<span class="input-group-btn">
															<button class="form-control btn default date-reset" type="button"><i class="fa fa-times"></i></button>
														</span>
														<span class="input-group-btn">
															<button class="form-control btn default date-set" type="button"><i class="fa fa-calendar"></i></button>
														</span>
													</div>
												<?php endif ?>
											</div>
										</div>
									<?php $i++; ?>
								<?php endforeach ?>
								</div>
							</div>
							<div class="form-actions right">
								<a href="<?php echo base_url() ?>customers" class="btn default">İptal</a>
								<button type="submit" class="btn green"><i class="fa fa-check"></i> Kaydet</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>