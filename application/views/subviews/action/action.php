<div class="page-content-wrapper">
	<div class="page-content">
		<div class="row">
			<div class="col-md-12">
				<ul class="page-breadcrumb breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?php echo base_url(); ?>">Anasayfa</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="<?php echo base_url() ?>actions">İşlemler</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#"><?php echo $action_name ?></a>
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
							<i class="fa fa-reorder"></i><?php echo $action_name ?> Ekle
						</div>
					</div>
					<div class="portlet-body form">
						<form action="<?php echo base_url() . 'actions/action/' . $action_type . '/' . $action_id; ?>" class="horizontal-form" method="post">
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
												<?php if($column['subset']): ?>
													<select name="<?php echo $column['column_value'] ?>" class="form-control select2me">
														<?php foreach ($column['subset'] as $subset_column): ?>
															<option value="<?php echo $subset_column['value'] ?>" <?php echo $subset_column['value'] == $column['action_value'] && $subset_column['value'] != NULL ? 'selected' : ''; ?>><?php echo $subset_column['content']; ?></option>
														<?php endforeach ?>
													</select>
												<?php elseif ($column['column_type'] == 'varchar'): ?>
												<input type="text" name="<?php echo $column['column_value']; ?>" class="form-control" col-type="<?php echo $column['column_type']; ?>" placeholder="<?php echo $column['column_name'] ?>" value="<?php echo $column['action_value']; ?>">
												<?php elseif ($column['column_type'] == 'text'): ?>
												<textarea name="<?php echo $column['column_value']; ?>" class="form-control" col-type="<?php echo $column['column_type']; ?>" placeholder="<?php echo $column['column_name'] ?>">
												<?php echo $column['action_value']; ?>
												</textarea>
												<?php elseif ($column['column_type'] == 'datetime'): ?>
													<div class="input-group date form_datetime" data-date="2014-02-01T00:00:00Z">
														<input type="text" class="form-control" col-type="<?php echo $column['column_type']; ?>" <?php echo  $column['column_value'] == 'action_date_updated' && $action_id == -1 ? 'readonly' : ''; ?> name="<?php echo $column['column_value']; ?>" value="<?php echo $column['action_value']; ?>">
														<?php if ($column['column_value'] == 'action_date_updated' && $action_id == -1): ?>
															<span class="input-group-btn" style="display: none;">
																<button class="form-control btn default date-reset" type="button"><i class="fa fa-times"></i></button>
															</span>
															<span class="input-group-btn" style="display: none;">
																<button class="form-control btn default date-set" type="button"><i class="fa fa-calendar"></i></button>
															</span>
														<?php else: ?>
															<span class="input-group-btn">
																<button class="form-control btn default date-reset" type="button"><i class="fa fa-times"></i></button>
															</span>
															<span class="input-group-btn">
																<button class="form-control btn default date-set" type="button"><i class="fa fa-calendar"></i></button>
															</span>
														<?php endif ?>
													</div>
												<?php elseif ($column['column_type'] == 'decimal'): ?>
													<input type="text" name="<?php echo $column['column_value']; ?>" class="form-control" col-type="<?php echo $column['column_type']; ?>" placeholder="<?php echo $column['column_name'] ?>" value="<?php echo $column['action_value']; ?>">
												<?php endif ?>
											</div>
										</div>
									<?php $i++; ?>
								<?php endforeach ?>
								</div>
							</div>
							<div class="form-actions right">
								<a href="<?php echo base_url(); ?>actions" class="btn default">İptal</a>
								<button type="submit" class="btn green"><i class="fa fa-check"></i> Kaydet</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>