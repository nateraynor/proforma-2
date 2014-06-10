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
							<div class="btn-group pull-right">
								<button class="btn dropdown-toggle" data-toggle="dropdown">Araçlar <i class="fa fa-angle-down"></i></button>
								<ul class="dropdown-menu pull-right">
									<li><a href="javascript:window.print();">Sayfayı Yazdır</a></li>
									<li><a href="#" id="filter_excel_customer_button">Excel Çıktısı</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="portlet-body">
						<div class="table-toolbar">
							<div class="btn-group">
								<a class="btn red" href="<?php echo base_url() ?>customers/customer">Müşteri Ekle <i class="fa fa-plus"></i></a>
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
							<th><a class="customer-sort" href="#" sort="c.customer_id">Müşteri No</a></th>
							<th><a class="customer-sort" href="#" sort="c.customer_name">Müşteri Adı</a></th>
							<th><a class="customer-sort" href="#" sort="c.customer_surname">Müşteri Soyadı</a></th>
							<th><a class="customer-sort" href="#" sort="c.customer_email">Müşteri E-posta</a></th>
							<th style='width: 140px !important;'>İşlemler</th>
						</tr>
						</thead>
						<tbody>
							<tr class="filters">
								<td><input class="form-control input-inline" type="text" id="filter_customer_id" value="<?php echo $filters['filter_customer_id'] ?>"></td>
								<td><input class="form-control input-inline" type="text" id="filter_customer_name" value="<?php echo $filters['filter_customer_name'] ?>"></td>
								<td><input class="form-control input-inline" type="text" id="filter_customer_surname" value="<?php echo $filters['filter_customer_surname'] ?>"></td>
								<td><input class="form-control input-inline" type="text" id="filter_customer_email" value="<?php echo $filters['filter_customer_email'] ?>"></td>
					
								<td><a class="btn blue pull-right w100" href="#" id="filter_customer_button">Ara <i class="fa fa-search"></i></a></td>
							</tr>

							<?php foreach ($customers as $customer): ?>
								<tr>
									<td><?php echo $customer['customer_id'] ;?></td>
									<td><?php echo $customer['customer_name']; ?></td>
									<td><?php echo $customer['customer_surname']; ?></td>
									<td><?php echo $customer['customer_email']; ?></td>
									<td>
										<a href="#" location="<?php echo base_url() . 'customers/deletecustomer/' . $customer['customer_id']; ?>" class="btn default btn-xs black validate-delete pull-right"><i class="fa fa-trash-o"></i> Sil</a>
										<a style='margin-right: 8px;' href="<?php echo base_url() . 'customers/customer/' . $customer['customer_id']; ?>" class="btn default btn-xs yellow pull-right"><i class="fa fa-edit"></i> Güncelle</a>
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
	var excel_url = '<?php echo $excel_url; ?>';
	var sort = '<?php echo $sort ?>';
	var order = '<?php echo $sort_order ?>';
</script>
<script type="text/javascript">
	function get_limit(limit){
	var base_url = '<?php echo base_url(); ?>';
	console.log(limit);
		$.ajax({
	          type:"post",
	          url: base_url + "customers/getLimit",
	          data:"limit="+limit,
	     }).done(function(){
	        location.reload();
	     });
	}
</script>
