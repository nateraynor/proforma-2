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
						<a href="#">Teklifler</a>
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
							<i class="fa fa-money"></i>Teklifler
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
								<a class="btn red" href="<?php echo base_url() ?>proposals/proposal">Ekle <i class="fa fa-plus"></i></a>
							</div>
							<div class="btn-group pull-right">
								<button class="btn dropdown-toggle" data-toggle="dropdown">Araçlar <i class="fa fa-angle-down"></i></button>
								<ul class="dropdown-menu pull-right">
									<li><a href="javascript:window.print();">Sayfayı Yazdır</a></li>
									<li><a href="<?php echo base_url() ?>proposals/excelOutput">Excel Çıktısı</a></li>
								</ul>
							</div>
						</div>
						<table class="table table-striped table-bordered table-hover table-full-width">
						<thead>
						<tr class="sorts">
							<th><a href="" sort="p.proposal_id">Teklif No</a></th>
							<th><a href="" sort="p.proposal_name">Teklif Adı</a></th>
							<th>Teklif Müşterileri</th>
							<th><a href="" sort="p.proposal_total">Teklif Toplamı</a></th>
							<th><a href="" sort="p.proposal_status">Teklif Durumu</a></th>
							<th>İşlemler</th>
						</tr>
						</thead>
						<tbody>
							<tr class="filters">
								<td><input class="form-control input-inline" type="text" id="filter_proposal_id" value="<?php echo $filters['filter_proposal_id'] ?>"></td>
								<td><input class="form-control input-inline" type="text" id="filter_proposal_name" value="<?php echo $filters['filter_proposal_name'] ?>"></td>
								<td>&nbsp;</td>
								<td><input class="form-control input-inline" type="text" id="filter_proposal_total" value="<?php echo $filters['filter_proposal_total'] ?>"></td>
								<td><select class="form-control input-inline" id="filter_proposal_status">
									<option value=""  <?php echo empty($filters['filter_proposal_status']) ? 'selected' : '' ?>>Hepsi</option>
									<option value="0" <?php echo $filters['filter_proposal_status'] == '0' ? 'selected' : ''?>>İptal</option>
									<option value="1" <?php echo $filters['filter_proposal_status'] == '1' ? 'selected' : ''?>>Taslak</option>
									<option value="2" <?php echo $filters['filter_proposal_status'] == '2' ? 'selected' : ''?>>Gönderildi</option>
									<option value="3" <?php echo $filters['filter_proposal_status'] == '3' ? 'selected' : ''?>>Onaylandı</option>
									<option value="4" <?php echo $filters['filter_proposal_status'] == '4' ? 'selected' : ''?>>Değişiklik Yapıldı</option>
									<option value="5" <?php echo $filters['filter_proposal_status'] == '5' ? 'selected' : ''?>>Red Edildi</option>
								</select></td>
								<td><a class="btn blue pull-right" href="#" id="filter_button">Ara <i class="fa fa-search"></i></a></td>
							</tr>
						<?php foreach ($proposals as $proposal): ?>
							<tr>
								<td><?php echo $proposal['proposal_id'] ?></td>
								<td><?php echo $proposal['proposal_name'] ?></td>
								<td><?php echo $proposal['proposal_customers'] ?></td>
								<td><?php echo $proposal['proposal_total'] ?></td>
								<td><?php echo $proposal['proposal_status'] ?></td>
								<td>
          							<a href="#" location="<?php echo base_url() . 'proposals/deleteProposal/' . $proposal['proposal_id']; ?>" class="btn default btn-xs black validate-delete pull-right"><i class="fa fa-trash-o"></i> Sil</a>
									<a href="<?php echo base_url() . 'proposals/proposal/' . $proposal['proposal_id']; ?>" class="btn default btn-xs yellow pull-right"><i class="fa fa-edit"></i> Güncelle</a>
      							</td>
							</tr>
						<?php endforeach ?>
						</tbody>
						<tfoot>
							<tr><td colspan="6"><?php echo $pagination; ?></td></tr>
						</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	var page_url = '<?php echo $page_url; ?>';
	var sort = '<?php echo $sort ?>';
	var order = '<?php echo $sort_order ?>';
</script>