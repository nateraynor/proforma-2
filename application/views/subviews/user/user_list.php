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
						<li><a href="#">Kullanıcılar</a></li>
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
								<i class="fa fa-male"></i>Kullanıcılar
							</div>
						</div>
						<div class="portlet-body">
							<div class="table-toolbar">
								<div class="btn-group">
									<a class="btn red" href="<?php echo base_url() ?>users/user">Ekle <i class="fa fa-plus"></i></a>
								</div>
							</div>
							<table class="table table-striped table-bordered table-hover table-full-width" id="sample_2">
							<thead>
								<tr>
									<th>Kullanıcı No</th>
									<th>Kullanıcı Rumuz</th>
									<th>Kullanıcı Ad</th>
									<th>Kullanıcı Soyad</th>
									<th>Kullanıcı E-Posta</th>
									<th>Kullanıcı Durumu</th>
									<th class="sorting_disabled">İşlemler</th>
								</tr>
							</thead>
							<tbody>
							<?php foreach ($users as $user): ?>
								<tr>
									<td><?php echo $user['user_id'] ?></td>
									<td><?php echo $user['user_username'] ?></td>
									<td><?php echo $user['user_name'] ?></td>
									<td><?php echo $user['user_surname'] ?></td>
									<td><?php echo $user['user_email'] ?></td>
									<td><?php echo $user['user_status'] == 1 ? 'Aktif' : 'Pasif' ;?></td>
									<td>
										<a href="#" location="<?php echo base_url() . 'users/deleteUser/' . $user['user_id']; ?>" class="btn default btn-xs black validate-delete pull-right"><i class="fa fa-trash-o"></i> Sil</a>
										<a href="<?php echo base_url() . 'users/user/' . $user['user_id']; ?>" class="btn default btn-xs yellow pull-right"><i class="fa fa-edit"></i> Güncelle</a>
										
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