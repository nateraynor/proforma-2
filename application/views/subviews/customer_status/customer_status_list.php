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
							<a href="<?php echo base_url() ?>customers">Müşteriler</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">Müşteri Durumları</a>
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
								<i class="fa fa-star-half-o"></i>Müşteri Durumları
							</div>
						</div>
						<div class="portlet-body">
							<div class="table-toolbar">
								<div class="btn-group">
									<a class="btn red" href="<?php echo base_url() ?>customerStatuses/customerStatus">Ekle <i class="fa fa-plus"></i></a>
								</div>
								<div class="btn-group pull-right">
									<button class="btn dropdown-toggle" data-toggle="dropdown">Araçlar <i class="fa fa-angle-down"></i></button>
									<ul class="dropdown-menu pull-right">
										<li>
											<a href="#">Print</a>
										</li>
										<li>
											<a href="#">Save as PDF</a>
										</li>
										<li>
											<a href="#">Export to Excel</a>
										</li>
									</ul>
								</div>
							</div>
							<table class="table table-striped table-bordered table-hover table-full-width" id="sample_2">
							<thead>
								<tr>
									<th>Müşteri Durum No</th>
									<th>Müşteri Durum Adı</th>
									<th>Müşteri Durum Açıklama</th>
									<th class="sorting_disabled">İşlemler</th>
								</tr>
							</thead>
							<tbody>
							<?php foreach ($customer_statuses as $customer_status): ?>
								<tr>
									<td><?php echo $customer_status['customer_status_id'] ?></td>
									<td><?php echo $customer_status['customer_status_content'] ?></td>
									<td><?php echo $customer_status['customer_status_description'] ?></td>
									<td>
										<a href="<?php echo base_url() . 'customerStatuses/customerStatus/' . $customer_status['customer_status_id']; ?>" class="btn default btn-xs yellow"><i class="fa fa-edit"></i> Güncelle</a>
										<a href="#" location="<?php echo base_url() . 'customerStatuses/deleteCustomerStatus/' . $customer_status['customer_status_id']; ?>" class="btn default btn-xs black validate-delete"><i class="fa fa-trash-o"></i> Sil</a>
									</td>
								</tr>
							<?php endforeach ?>
							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
</div>