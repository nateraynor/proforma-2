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
						<a href="#">Müşteriler</a>
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
							<i class="fa fa-group"></i>Müşteri Listesi
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
								<a class="btn red" href="<?php echo base_url() ?>customers/customer">Ekle <i class="fa fa-plus"></i></a>
							</div>
							<div class="btn-group pull-right">
								<button class="btn dropdown-toggle" data-toggle="dropdown">Araçlar <i class="fa fa-angle-down"></i></button>
								<ul class="dropdown-menu pull-right">
									<li><a href="javascript:window.print();">Sayfayı Yazdır</a></li>
									<li><a href="<?php echo base_url() ?>customers/excelOutput">Excel Çıktısı</a></li>
								</ul>
							</div>
						</div>
						<table class="table table-striped table-bordered table-hover table-full-width sample_2">
						<thead>
						<tr>
							<th>Müşteri No</th>
							<th>Müşteri Adı</th>
							<th>Müşteri Soyadı</th>
							<th>Müşteri E-posta</th>
							<th>Müşteri Şirket</th>
							<th>Müşteri Telefon</th>
							<th>Müşteri Adres</th>
							<th>Müşteri Durum</th>
							<th>Müşteri Eklenme Tarihi</th>
							<th>Müşteri Güncellenme Tarihi</th>
							<th>İşlemler</th>
						</tr>
						</thead>
						<tbody>
							<?php foreach ($customers as $customer): ?>

								<tr>
									<td><?php echo $customer['customer_id'] ;?></td>
									<td><?php echo $customer['customer_name']; ?></td>
									<td><?php echo $customer['customer_surname']; ?></td>
									<td><?php echo $customer['customer_email']; ?></td>
									<td><?php echo $customer['customer_company']; ?></td>
									<td><?php echo $customer['customer_phone']; ?></td>
									<td><?php echo $customer['customer_address']; ?></td>
									<td>
										<?php if($customer['customer_status'] == 1 ): ?>
											<?php echo 'Aktif'; ?>
										<?php else :?>
											<?php echo 'Pasif'; ?>
										<?php endif ;?>
									</td>
									<td><?php echo $customer['customer_date_added'] ?></td>
									<td><?php echo $customer['customer_date_updated'] ?></td>

									<td>
										
										<a href="<?php echo base_url() . 'customers/customer/' . $customer['customer_id']; ?>" class="btn default btn-xs yellow"><i class="fa fa-edit"></i> Güncelle</a>
										<a href="#" location="<?php echo base_url() . 'customers/deletecustomer/' . $customer['customer_id']; ?>" class="btn default btn-xs black validate-delete"><i class="fa fa-trash-o"></i> Sil</a>
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
