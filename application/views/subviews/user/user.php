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
						<a href="<?php echo base_url() ?>users">Kullanıcılar</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Kullanıcı</a>
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
							<i class="fa fa-reorder"></i>Kullanıcı Ekle
						</div>
					</div>
					<div class="portlet-body form">
						<form action="<?php echo base_url() . 'users/user/' . $user_id; ?>" enctype="multipart/form-data" method="post" class="horizontal-form">
							<div class="form-body">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Kullanıcı Rumuz</label>
											<input type="text" name="user_username" class="form-control" placeholder="Kullanıcı Rumuz" value="<?php echo isset($user['user_username']) ? $user['user_username'] : ''; ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Kullanıcı E-posta</label>
											<input type="text" name="user_email" class="form-control" placeholder="Kullanıcı E-posta" value="<?php echo isset($user['user_email']) ? $user['user_email'] : ''; ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Kullanıcı Ad - Soyad</label>
											<input type="text" name="user_name" class="form-control" placeholder="Kullanıcı Ad - Soyad" value="<?php echo isset($user['user_name']) ? $user['user_name'] : ''; ?>">
										</div>
									</div>
									<!--<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Yetkili Sayfalar</label>
											<select multiple="multiple" class="multi-select" id="my_multi_select1" name="my_multi_select1[]" style="position: absolute; left: -9999px;">
												<option>Dallas Cowboys</option>
												<option>New York Giants</option>
												<option selected="">Philadelphia Eagles</option>
												<option selected="">Washington Redskins</option>
												<option>Chicago Bears</option>
												<option>Detroit Lions</option>
												<option>Green Bay Packers</option>
												<option>Minnesota Vikings</option>
												<option selected="">Atlanta Falcons</option>
												<option>Carolina Panthers</option>
												<option>New Orleans Saints</option>
												<option>Tampa Bay Buccaneers</option>
												<option>Arizona Cardinals</option>
												<option>St. Louis Rams</option>
												<option>San Francisco 49ers</option>
												<option>Seattle Seahawks</option>
											</select>
											<div class="ms-container" id="ms-my_multi_select1"><div class="ms-selectable"><ul class="ms-list" tabindex="-1"><li class="ms-elem-selectable" id="Dallas_Cowboys-selectable"><span>Dallas Cowboys</span></li><li class="ms-elem-selectable" id="New_York_Giants-selectable"><span>New York Giants</span></li><li selected="" class="ms-elem-selectable ms-selected" id="Philadelphia_Eagles-selectable" style="display: none;"><span>Philadelphia Eagles</span></li><li selected="" class="ms-elem-selectable ms-selected" id="Washington_Redskins-selectable" style="display: none;"><span>Washington Redskins</span></li><li class="ms-elem-selectable" id="Chicago_Bears-selectable"><span>Chicago Bears</span></li><li class="ms-elem-selectable ms-selected" id="Detroit_Lions-selectable" style="display: none;"><span>Detroit Lions</span></li><li class="ms-elem-selectable ms-selected" id="Green_Bay_Packers-selectable" style="display: none;"><span>Green Bay Packers</span></li><li class="ms-elem-selectable" id="Minnesota_Vikings-selectable"><span>Minnesota Vikings</span></li><li selected="" class="ms-elem-selectable ms-selected" id="Atlanta_Falcons-selectable" style="display: none;"><span>Atlanta Falcons</span></li><li class="ms-elem-selectable" id="Carolina_Panthers-selectable"><span>Carolina Panthers</span></li><li class="ms-elem-selectable" id="New_Orleans_Saints-selectable"><span>New Orleans Saints</span></li><li class="ms-elem-selectable ms-hover" id="Tampa_Bay_Buccaneers-selectable"><span>Tampa Bay Buccaneers</span></li><li class="ms-elem-selectable" id="Arizona_Cardinals-selectable"><span>Arizona Cardinals</span></li><li class="ms-elem-selectable" id="St_Louis_Rams-selectable"><span>St. Louis Rams</span></li><li class="ms-elem-selectable" id="San_Francisco_49ers-selectable"><span>San Francisco 49ers</span></li><li class="ms-elem-selectable" id="Seattle_Seahawks-selectable"><span>Seattle Seahawks</span></li></ul></div><div class="ms-selection"><ul class="ms-list" tabindex="-1"><li class="ms-elem-selection" id="Dallas_Cowboys-selection" style="display: none;"><span>Dallas Cowboys</span></li><li class="ms-elem-selection" id="New_York_Giants-selection" style="display: none;"><span>New York Giants</span></li><li selected="" class="ms-elem-selection ms-selected" id="Philadelphia_Eagles-selection" style=""><span>Philadelphia Eagles</span></li><li selected="" class="ms-elem-selection ms-selected" id="Washington_Redskins-selection" style=""><span>Washington Redskins</span></li><li class="ms-elem-selection" id="Chicago_Bears-selection" style="display: none;"><span>Chicago Bears</span></li><li class="ms-elem-selection ms-selected" id="Detroit_Lions-selection" style=""><span>Detroit Lions</span></li><li class="ms-elem-selection ms-selected" id="Green_Bay_Packers-selection" style=""><span>Green Bay Packers</span></li><li class="ms-elem-selection" id="Minnesota_Vikings-selection" style="display: none;"><span>Minnesota Vikings</span></li><li selected="" class="ms-elem-selection ms-selected" id="Atlanta_Falcons-selection" style=""><span>Atlanta Falcons</span></li><li class="ms-elem-selection" id="Carolina_Panthers-selection" style="display: none;"><span>Carolina Panthers</span></li><li class="ms-elem-selection" id="New_Orleans_Saints-selection" style="display: none;"><span>New Orleans Saints</span></li><li class="ms-elem-selection" id="Tampa_Bay_Buccaneers-selection" style="display: none;"><span>Tampa Bay Buccaneers</span></li><li class="ms-elem-selection" id="Arizona_Cardinals-selection" style="display: none;"><span>Arizona Cardinals</span></li><li class="ms-elem-selection" id="St_Louis_Rams-selection" style="display: none;"><span>St. Louis Rams</span></li><li class="ms-elem-selection" id="San_Francisco_49ers-selection" style="display: none;"><span>San Francisco 49ers</span></li><li class="ms-elem-selection" id="Seattle_Seahawks-selection" style="display: none;"><span>Seattle Seahawks</span></li></ul></div></div>
										</div>
									</div>-->
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Kullanıcı Durum</label>
											<select name="user_status" class="form-control" placeholder="Kullanıcı Durum">
												<option value="0">Pasif</option>
												<option value="1" <?php echo isset($user['user_status']) && $user['user_status'] == 1 ? 'selected' : ''; ?>>Aktif</option>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="form-actions right">
								<a type="button" class="btn default" href="<?php echo base_url() ?>customerStatuses">İptal</a>
								<button type="submit" class="btn green"><i class="fa fa-check"></i> Kaydet</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>