<div class="page-content-wrapper">
	<div class="page-content">
		<div class="row">
			<div class="col-md-12">
				<ul class="page-breadcrumb breadcrumb">
					<li><i class="fa fa-home"></i><a href="<?php echo base_url() ?>">Anasayfa</a><i class="fa fa-angle-right"></i></li>
					<li><a href="#">Teklifler</a></li>
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
							<i class="fa fa-edit"></i>Teklifler
						</div>
						<div class="actions">
							<div class="btn-group pull-right">
								<button class="btn dropdown-toggle" data-toggle="dropdown">Araçlar <i class="fa fa-angle-down"></i></button>
								<ul class="dropdown-menu pull-right">
									<li><a href="javascript:window.print();">Sayfayı Yazdır</a></li>
									<li><a href="#" id="filter_excel_button" >Excel Çıktısı</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="portlet-body">
						<div class="table-toolbar">
							<div class="btn-group">
								<a class="btn red" href="<?php echo base_url() ?>proposals/proposal">Teklif Ekle <i class="fa fa-plus"></i></a>

							</div>
							<div class="btn-group">
								<a class="btn red" href="<?php echo base_url() ?>proposals/proposalDraft">Taslaklar <i class="fa fa-file-text-o"></i></a>

							</div>
							<div class="pull-right">
								<label>Göster :</label>
								<select class="input-xsmall" onchange="get_limit(this.options[this.selectedIndex].value);" style = "height:30px;">
									<option value="10" <?php echo $this->session->userdata['limit'] == '10' ? 'selected' : ''; ?>>10</option>
									<option value="25" <?php echo $this->session->userdata['limit'] == '25' ? 'selected' : ''; ?>>25</option>
									<option value="40" <?php echo $this->session->userdata['limit'] == '40' ? 'selected' : ''; ?>>40</option>
								</select>
							
							</div>
						</div>
						<table class="table table-striped table-bordered table-hover table-full-width">
						<thead>
						<tr class="sorts">
							<th><a class="sort" href="#" sort="p.proposal_id">Teklif No</a></th>
							<th><a class="sort" href="#" sort="p.proposal_name">Teklif Adı</a></th>
							<th><a class="sort" href="#" sort="c.customer_name">Teklif Müşterileri</a></th>
							<th><a class="sort" href="#" sort="p.proposal_total">Teklif Toplamı</a></th>
							<th><a class="sort" href="#" sort="p.proposal_status">Teklif Durumu</a></th>
							<th><a class="sort" href="#" sort="p.proposal_date_added">Teklif Eklenme Tarihi</a></th>
							<th style='min-width: 202px;'>İşlemler</th>
						</tr>
						</thead>
						<tbody>
							<tr class="filters">
								<td><input class="form-control input-inline" type="text" id="filter_proposal_id" value="<?php echo $filters['filter_proposal_id'] ?>"></td>
								<td><input class="form-control input-inline" type="text" id="filter_proposal_name" value="<?php echo $filters['filter_proposal_name'] ?>"></td>
								<td><input class="form-control input-inline" type="text" id="filter_customer_name" value="<?php echo $filters['filter_customer_name'] ?>"></td>
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
								<td>
									<div class="input-group input-medium date date-picker" data-date="2014-04-14" data-date-format="yyyy-mm-dd" data-date-viewmode="years">
										<input type="text" id="filter_proposal_date_added" value="<?php echo $filters['filter_proposal_date_added'] ?>" class="form-control" readonly>
										<span class="input-group-btn">
											<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
										</span>
									</div>
								</td>
								<td><a class="btn blue pull-right w100" href="#" id="filter_button">Ara <i class="fa fa-search"></i></a></td>
							</tr>
							<?php foreach ($proposals as $proposal): ?>
								<tr>
									<td><?php echo $proposal['proposal_id'] ?></td>
									<td><?php echo $proposal['proposal_name'] ?></td>
									<td><?php echo $proposal['proposal_customers'] ?></td>
									<td><?php echo $proposal['proposal_total'] ?> <i class="fa fa-try"></i></td>
									<td><?php echo $proposal['proposal_status'] ?></td>
									<td><?php echo $proposal['proposal_date_added'] ?></td>
									<td>
	          							<a style='margin-left:4px;' href="#" location="<?php echo base_url() . 'proposals/deleteProposal/' . $proposal['proposal_id']; ?>" class="btn default btn-xs black validate-delete pull-right"><i class="fa fa-trash-o"></i> Sil</a>
										<a style='margin-left:4px;' href="<?php echo base_url() . 'proposals/proposal/' . $proposal['proposal_id']; ?>" class="btn default btn-xs yellow pull-right"><i class="fa fa-edit"></i> Güncelle</a>
										<a style='margin-left:4px;' href="<?php echo base_url() . 'proposals/preview/' . $proposal['proposal_id']; ?>" class="btn default btn-xs blue pull-right"><i class="fa fa-search"></i> Önizle</a>
	      							</td>
								</tr>
							<?php endforeach ?>
						</tbody>
						<tfoot>
							<tr><td colspan="12"><?php echo $pagination; ?></td></tr>
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
	var excel_url = '<?php echo $excel_url; ?>';
	var sort = '<?php echo $sort ?>';
	var order = '<?php echo $sort_order ?>';
</script>