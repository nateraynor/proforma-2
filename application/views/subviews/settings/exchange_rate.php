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
							<i class="fa fa-cogs"></i>Döviz Kurları
						</div>
					</div>
					<div class="portlet-body">
						<form action="<?php echo base_url() ?>settings/exchangeRates" method="post">
							<div class="form-body" id="exchange-rate-list">
								<div class="row">
									<div class="form-group">
										<label class="col-md-2">Döviz Adı</label>
										<label class="col-md-2">Döviz Kodu</label>
										<label class="col-md-2">&nbsp;</label>
										<label class="col-md-2">Döviz Oranı</label>
										<a class="col-md-2 btn green" id="add-exchange-rate" style="margin-bottom: 10px;">Ekle</a>
										<a class="col-md-2 btn default" data-target="#full-width" data-toggle="modal">Döviz kurlarının isbn kodları</a>
									</div>
									<div id="full-width" class="modal container fade" tabindex="-1">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Döviz kurlarının isbn kodları</h4>
										</div>
										<div class="modal-body">
											<div class="portlet-body">
												<div class="table-responsive">
													<table class="table table-hover">
													<thead>
													<tr>
														<th>
															<strong>Döviz Adı</strong>
														</th>
														<th>
															<strong>Döviz Kodu</strong>
														</th>
													</tr>
													</thead>
													<tbody>
													<tr>
														<td>
															ABD DOLARI
														</td>
														<td>
															USD
														</td>
													</tr>
													<tr>
														<td>
															AVUSTRALYA DOLARI
														</td>
														<td>
															AUD
														</td>
													</tr>
													<tr>
														<td>
															EURO
														</td>
														<td>
															EUR
														</td>
													</tr>
													<tr>
														<td>
															İNGİLİZ STERLİNİ
														</td>
														<td>
															GBP
														</td>
													</tr>
													</tbody>
													</table>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" data-dismiss="modal" class="btn btn-default">Kapat</button>
										</div>
									</div>
								</div>
								<div class="clearfix"></div>
								<div><?php $exchange_rate_row = 0; ?>
								<?php if ($exchange_rates): ?>
								<?php foreach ($exchange_rates['exchange_rate'] as $exchange_rate): ?></div>
								<div class="row">
									<div class="form-group">
										<div class="col-md-2 ids">
											<input type="text" value="<?php echo $exchange_rate['name'] ?>" class="form-control" name="exchange_rate[<?php echo $exchange_rate_row ?>][name]">
											<input type="hidden"  value="<?php echo $exchange_rate['exchange_rate_id'] ?>" name="exchange_rate[<?php echo $exchange_rate_row ?>][exchange_rate_id]">
										</div>
										<div class="col-md-2 values">
											<input type="text" value="<?php echo $exchange_rate['code'] ?>" class="form-control code" name="exchange_rate[<?php echo $exchange_rate_row ?>][code]" style="margin-bottom: 10px;">
										</div>
										<div class="col-md-1"><a class="btn red" onclick="calculateExchange(this, <?php echo $exchange_rate['exchange_rate_id']; ?>); return false;" >Hesapla</a></div>
										<div class="col-md-2 rates">
											<input type="text" value="<?php echo $exchange_rate['rate'] ?>" class="form-control result" name="exchange_rate[<?php echo $exchange_rate_row ?>][rate]" style="margin-bottom: 10px;" id="result-<?php echo $exchange_rate['exchange_rate_id'] ?>">
										</div>
										<div class="col-md-1"><a class="btn red" onclick="removeRow(this).parent().parent(); return false;">Kaldır</a></div>
									</div>
								</div>
								<div class="clearfix"></div>
								<div>
								<?php $exchange_rate_row++; ?>
								<?php endforeach ;?>
								<?php endif ?></div>
							</div>
							<div class="clearfix"></div>
							<div class="row">
								<div class="col-md-12">
									<input type="submit" class="btn green" value="Kaydet" />
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			
		</div>

</div>
</div>
<div class="main"></div>
<script type="text/javascript">
var exchange_rate_row = <?php echo $exchange_rate_row; ?>;
</script>
<script src="<?php echo ASSETS ?>plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script type="text/javascript">
	function calculateExchange(element, result_id) {
		var currency = $(element).parent().siblings('div.col-md-2.values').children('.form-control.code').val();
		
		jQuery.ajax({
			type: "POST",
			url: base_url + 'settings/getExchangeRate',
			data: {currency: currency}
		}).done(function(result){
			$('#result-' + result_id).val(result);
	  	}); 
	}
			
</script>
