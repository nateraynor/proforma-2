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
						<a href="#">İşlemler</a>
					</li>
				</ul>
			</div>
		</div>
		<?php $i = 0; ?>
		<!--<div class="row">
			<div class="col-md-12">
				<?php foreach ($action_types as $action_type): ?>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="dashboard-stat <?php echo $colors[$i]; ?>">
							<div class="visual">
								<i class="fa <?php echo $icons[$i]; ?>"></i>
							</div>
							<div class="details">
								<div class="number"><?php echo $action_type['total_acts'] ?></div>
								<div class="desc"><?php echo $action_type['action_name'] ?></div>
							</div>
							<a class="more">Detaylı liste<i class="m-icon-swapright m-icon-white"></i></a>
						</div>
					</div>
					<?php $i++; ?>
				<?php endforeach ?>
			</div>
		</div>-->
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
				<?php $i = 0; ?>
				<?php foreach ($action_types as $action_type): ?>
					<div class="col-md-12">
						<div class="portlet box grey">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa <?php echo $icons[$i]; ?>"></i> <?php echo $action_type['action_name'] ?> Listesi
								</div>
								<div class="actions">
									<div class="btn-group">
										<a class="btn default" href="#" data-toggle="dropdown">
										Kolonlar <i class="fa fa-angle-down"></i>
										</a>
										<div id="" class="sample_2_column_toggler dropdown-menu hold-on-click dropdown-checkboxes pull-right">
											<?php $i = 0; ?>
											<?php foreach ($action_type['columns'] as $column): ?>
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
										<a class="btn red" href="<?php echo base_url() . 'actions/action/' . $action_type['action_value']; ?>">Ekle <i class="fa fa-plus"></i></a>
									</div>
									<div class="btn-group pull-right">
										<button class="btn dropdown-toggle" data-toggle="dropdown">Araçlar <i class="fa fa-angle-down"></i></button>
										<ul class="dropdown-menu pull-right">
											<li><a href="javascript:window.print();">Sayfayı Yazdır</a></li>
											<li><a href="<?php echo base_url() . 'actions/excelOutput/' . $action_type['action_value']; ?>">Excel Çıktısı</a></li>
										</ul>
									</div>
								</div>
								<table class="table table-striped table-bordered table-hover table-full-width sample_2" >
									<thead>
									<tr>
										<?php foreach ($action_type['columns'] as $column): ?>
											<th><?php echo $column['column_name']; ?></th>
										<?php endforeach ?>
										<th>İşlemler</th>
									</tr>
									</thead>
									<tbody>
										<?php foreach ($action_type['actions'] as $action): ?>
											<tr>
												<?php foreach ($action as $key => $value): ?>
													<td>
													<?php if (substr($key, -3) == '_id' && $key != ($action_type['action_value'] . '_id') && $key != 'action_id'): ?>
														<?php echo $this->action_model->getActionColumnValue($key, $value); ?>
													<?php else: ?>
														<?php echo $value; ?>
													<?php endif ?>
													</td>
												<?php endforeach ?>
												<td>
													<a href="<?php echo base_url() . 'actions/action/' . $action_type['action_value'] . '/' . $action['action_id']; ?>" class="btn default btn-xs yellow"><i class="fa fa-edit"></i> Güncelle</a>
													<a href="#" location="<?php echo base_url() . 'actions/deleteAction/'. $action_type['action_value'] . '/' . $action['action_id']; ?>" class="btn default btn-xs black validate-delete"><i class="fa fa-trash-o"></i> Sil</a>
												</td>
											</tr>
										<?php endforeach ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<?php $i++; ?>
				<?php endforeach ?>
			</div>
		</div>
	</div>
</div>
