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
						<a href="#">Ayarlar</a>
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
							<i class="fa fa-pencil-square-o"></i> Şablonlar
						</div>
					</div>
					<div class="portlet-body form">
						<div class="form-body">
							<ul class="nav nav-tabs">
								<?php foreach ($templates as $template): ?>
									<li>
										<a href="#template-<?php echo $template['template_id']; ?>" data-toggle="tab"><?php echo $template['template_name']; ?></a>
									</li>
								<?php endforeach ?>
							</ul>
							<div class="tab-content">
								<?php $i = 0; ?>
								<?php foreach ($templates as $template): ?>
									<div class="tab-pane <?php echo $i == 0 ? 'active' : ''; ?>" id="template-<?php echo $template['template_id'] ?>">
										<div class="form-body">
											<div class="form-group">
												<label class="col-md-2 control-label">Şablon Adı</label>
												<div class="col-md-4">
													<input type="text" value="<?php echo $template['template_name']; ?>" class="template-name form-control">
													<input type="hidden" class="template-id" value="<?php echo $template['template_id']; ?>">
												</div>
											</div>
										</div>
										<div class="clearfix"></div>
										<div class="template" style="margin-top: 20px;">
											<?php echo $template['template_html']; ?>
										</div>
									</div>
									<?php $i++; ?>
								<?php endforeach ?>
							</div>
						</div>
						<div class="form-actions right">
							<a type="button" class="btn default" href="<?php echo base_url() ?>">İptal</a>
							<button type="submit" class="btn green save-template"><i class="fa fa-check"></i> Kaydet</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>