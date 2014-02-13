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
						<a href="<?php echo base_url() ?>actionStatuses">İşlem Durumları</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">İşlem Durumu Formu</a>
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
							<i class="fa fa-pencil-square-o"></i>İşlem Durumu Ekle
						</div>
					</div>
					<div class="portlet-body form">
						<form action="<?php echo base_url() . 'actionStatuses/actionStatus/' . $action_status_id; ?>" enctype="multipart/form-data" method="post" class="horizontal-form">
							<div class="form-body">
								<?php $i = 1; ?>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">İşlem Durum Adı</label>
											<input type="text" name="content" class="form-control" placeholder="İşlem Durum Adı" value="<?php echo isset($action_status['content']) ? $action_status['content'] : ''; ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">İşlem Durum Değeri</label>
											<input type="text" name="value" class="form-control" placeholder="İşlem Durum Değeri" value="<?php echo isset($action_status['value']) ? $action_status['value'] : ''; ?>">
										</div>
									</div>
								</div>
							</div>
							<div class="form-actions right">
								<a type="button" class="btn default" href="<?php echo base_url() ?>actionStatuses">İptal</a>
								<button type="submit" class="btn green"><i class="fa fa-check"></i> Kaydet</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>