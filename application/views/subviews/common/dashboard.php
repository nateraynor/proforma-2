<div class="page-content-wrapper">
		<div class="page-content">
			<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Modal title</h4>
						</div>
						<div class="modal-body">
							 Widget settings form goes here
						</div>
						<div class="modal-footer">
							<button type="button" class="btn blue">Save changes</button>
							<button type="button" class="btn default" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
			<?php if ($this->session->flashdata('error')): ?>
				<div class="alert alert-danger">
					<button class="close" data-close="alert"></button>
					<span><?php echo $this->session->flashdata('error') ?></span>
				</div>
			<?php endif; ?>
			<div class="row">
				<!--div class="col-md-12">
					<ul class="page-breadcrumb breadcrumb">
						<li class="btn-group">
					        <a class="btn red" style="color: white;"><span>
					        ICM Proforma
					    	</span></a>
					    </li>
						<li>
							<i class="fa fa-home"></i>
							<a href="<?php echo base_url(); ?>home">Anasayfa</a>
						</li>
					</ul>
				</div-->
			</div>
			<div class="row" style='border-bottom: solid 1px #DDD;margin-bottom: 16px;'>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<a href="<?php echo base_url() ?>customers/customer"><div class='mask'></div></a>	
					<div class="dashboard-stat blue">
						<div class="visual">
							<i class="fa fa-group"></i>
						</div>
						<div class="details">
							<div class="number">
								<?php echo $total_customers; ?>
							</div>
							<div class="desc">
								 Müşteri
							</div>
						</div>
						<a class="more" href="<?php echo base_url() ?>customers/customer">
						Müşteri Ekle <i class="fa fa-plus"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat yellow">
						<a href="<?php echo base_url() ?>products/product"><div class='mask'></div></a>	
						<div class="visual">
							<i class="fa fa-barcode"></i>
						</div>
						<div class="details">
							<div class="number">
								<?php echo $total_products; ?>
							</div>
							<div class="desc">
								Ürün / Hizmet
							</div>
						</div>
						<a class="more" href="<?php echo base_url() ?>products/product">
						Ürün / Hizmet Ekle <i class="fa fa-plus"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<a href="<?php echo base_url() ?>users/user"><div class='mask'></div></a>	
					<div class="dashboard-stat purple">
						<div class="visual">
							<i class="fa fa-male"></i>
						</div>
						<div class="details">
							<div class="number">
								<?php echo $total_users; ?>
							</div>
							<div class="desc">
								Kullanıcı
							</div>
						</div>
						<a class="more" href="<?php echo base_url() ?>users/user">
						Kullanıcı Ekle <i class="fa fa-plus"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<a href="<?php echo base_url() ?>proposals/proposal"><div class='mask'></div></a>	
					<div class="dashboard-stat green">
						<div class="visual">
							<i class="fa fa-money"></i>
						</div>
						<div class="details">
							<div class="number">
								<?php echo $total_proposals; ?>
							</div>
							<div class="desc">
								Teklifler
							</div>
						</div>
						<a class="more" href="<?php echo base_url() ?>proposals/proposal">
						Teklif Ekle <i class="fa fa-plus"></i>
						</a>
					</div>
				</div>
			</div>
		<div class="clearfix">
		</div>

		<div>
			<ul class="timeline">

			<?php 
				foreach ($timeline as $activity) {
					$phpdate = strtotime( $activity['added_date'] );
					$phpdate = explode(" ",date( 'Y/m/d H:i', $phpdate));
			switch ($activity['type']) {
				case '1':
						echo "<li class='timeline-yellow'>"
						  ."<div class='timeline-time'>"
							."<span class='date'>"
							.$phpdate[0]."</span>"
							."<span class='time'>"
							.$phpdate[1]."</span>"	
						."</div>"
						."<div class='timeline-icon'>"
							."<i class='fa fa-archive'></i>"
						."</div>"
						."<div class='timeline-body'>"
							."<!--<h2>Yeni Ürün / Hizmet Eklendi</h2>-->"
							."<div class='timeline-content'>"
								."<img class='timeline-img pull-left' src='".base_url().'uploads/'.$activity["image_path"]."'>"
								."Yeni ürün / hizmet <strong><a class='btn btn-default' style='margin-top: 0px' href='".base_url()."products?sort=p.product_id&sort_order=desc&filter_product_id=".$activity['dataID']."&filter_product_name=&filter_category_name=&filter_brand_name=&filter_product_price=&filter_product_status='>".$activity['product_name']."</a></strong> başarıyla eklendi.<br><br>"
								."Ürün / Hizmet Açıklaması : ".$activity['product_description']."<br>"
								."Ürün Hizmet Fiyatı : ".$activity['product_price']." TL"
							."</div>"
						."</div>"
					."</li>";
					break;

					case '2':
						echo "<li class='timeline-grey'>"
						  ."<div class='timeline-time'>"
							."<span class='date'>"
							.$phpdate[0]."</span>"
							."<span class='time'>"
							.$phpdate[1]."</span>"	
						."</div>"
						."<div class='timeline-icon'>"
							."<i class='fa fa-edit'></i>"
						."</div>"
						."<div class='timeline-body'>"
							."<!--<h2>Ürün / Hizmet bilgileri güncellendi</h2>-->"
							."<div class='timeline-content'>"
								."<img class='timeline-img pull-left' src='".base_url().'uploads/'.$activity["image_path"]."'>"
								."<strong><a class='btn btn-default' style='margin-top: 0px' href='".base_url()."products?sort=p.product_id&sort_order=desc&filter_product_id=".
								$activity['dataID']."&filter_product_name=&filter_category_name=&filter_brand_name=&filter_product_price=&filter_product_status='>".
								$activity['product_name']."</a></strong> bilgileri başarıyla güncellendi.<br><br>"

								."Ürün / Hizmet Açıklaması : ".$activity['product_description']."<br>"
								."Ürün / Hizmet Fiyatı : ".$activity['product_price']." TL"
							."</div>"
						."</div>"
					."</li>";
					break;
					case '3':
						echo "<li class='timeline-green'>"
						  ."<div class='timeline-time'>"
							."<span class='date'>"
							.$phpdate[0]."</span>"
							."<span class='time'>"
							.$phpdate[1]."</span>"	
						."</div>"
						."<div class='timeline-icon'>"
							."<i class='fa fa-plus-square'></i>"
						."</div>"
						."<div class='timeline-body'>"
							."<!--<h2>Yeni teklif eklendi</h2>-->"
							."<div class='timeline-content'>"
								."<i class='fa fa-plus-square'></i>"
								."Yeni teklif <strong><a class='btn btn-default' style='margin-top: 0px' href='".base_url()."proposals/preview/".$activity['dataID']."'>".$activity['proposal_name']."</a></strong> başarıyla eklendi.<br><br>"
								."Teklif açıklaması : ".$activity['proposal_statement_top']."<br>"
								."Teklif toplam fiyatı : ".$activity['proposal_total']."<br>"
								."Teklif durumu : ";
								switch ($activity['proposal_status']) {
									case '1':
									echo "Taslak";
										break;
									case '2':
									echo "Gönderildi";
										break;
									case '3':
									echo "Onaylandı";
										break;
									case '4':
									echo "Değişiklik Yapıldı";
										break;
									case '5':
									echo "Red Edildi.";
										break;
									default:
										break;
								}
							echo "</div>"
						."</div>"
					."</li>";
					break;
					case '4':
						echo "<li class='timeline-yellow'>"
						  ."<div class='timeline-time'>"
							."<span class='date'>"
							.$phpdate[0]."</span>"
							."<span class='time'>"
							.$phpdate[1]."</span>"	
						."</div>"
						."<div class='timeline-icon'>"
							."<i class='fa fa-cog'></i>"
						."</div>"
						."<div class='timeline-body'>"
							."<!--<h2>Teklif durumu değişti</h2>-->"
							."<div class='timeline-content'>"
								."<i class='fa fa-cog'></i>"
								."Teklif <strong><a class='btn btn-default' style='margin-top: 0px' href='".base_url()."proposals/preview/".$activity['dataID']."'>".$activity['proposal_name']."</a></strong> durumu değişti.<br><br>"
								."Teklif açıklaması : ".$activity['proposal_statement_top']."<br>"
								."Teklif toplam fiyatı : ".$activity['proposal_total']."<br>"
								."Teklif durumu : ";
								switch ($activity['proposal_status']) {
									case '1':
									echo "Taslak";
										break;
									case '2':
									echo "Gönderildi";
										break;
									case '3':
									echo "Onaylandı";
										break;
									case '4':
									echo "Değişiklik Yapıldı";
										break;
									case '5':
									echo "Red Edildi.";
										break;
									default:
										break;
								}
							echo "</div>"
						."</div>"
					."</li>";
					break;
					case '5':
						echo "<li class='timeline-grey'>"
						  ."<div class='timeline-time'>"
							."<span class='date'>"
							.$phpdate[0]."</span>"
							."<span class='time'>"
							.$phpdate[1]."</span>"	
						."</div>"
						."<div class='timeline-icon'>"
							."<i class='fa fa-edit'></i>"
						."</div>"
						."<div class='timeline-body'>"
							."<!--<h2>Teklif bilgileri güncellendi</h2>-->"
							."<div class='timeline-content'>"
								."<i class='fa fa-edit'></i>"
								."Teklif <strong><a class='btn btn-default' style='margin-top: 0px' href='".base_url()."proposals/preview/".$activity['dataID']."'>".$activity['proposal_name']."</a></strong> bilgileri yeniden düzenlendi ve başarıyla değiştirildi.<br><br>"
								."Teklif açıklaması : ".$activity['proposal_statement_top']."<br>"
								."Teklif toplam fiyatı : ".$activity['proposal_total']."<br>"
								."Teklif durumu : ";
								switch ($activity['proposal_status']) {
									case '1':
									echo "Taslak";
										break;
									case '2':
									echo "Gönderildi";
										break;
									case '3':
									echo "Onaylandı";
										break;
									case '4':
									echo "Değişiklik Yapıldı";
										break;
									case '5':
									echo "Red Edildi.";
										break;
									default:
										break;
								}
							echo "</div>"
						."</div>"
					."</li>";
					break;
					case '6':
						if ($activity['customer_company_image']) {
							$src = "<img class='timeline-img pull-left' src='".base_url().'uploads/'.$activity['customer_company_image']."'>";
						} else {
							$src = "<i class='fa fa-plus-square'></i>";
						}
						echo "<li class='timeline-purple'>"
						  ."<div class='timeline-time'>"
							."<span class='date'>"
							.$phpdate[0]."</span>"
							."<span class='time'>"
							.$phpdate[1]."</span>"	
						."</div>"
						."<div class='timeline-icon'>"
							."<i class='fa fa-plus-square'></i>"
						."</div>"
						."<div class='timeline-body'>"
							."<!--<h2>Yeni müşteri eklendi</h2>-->"
							."<div class='timeline-content'>"
								.$src
								."Yeni müşteri <strong><a class='btn btn-default' style='margin-top: 0px' href='".base_url()."customers?sort=c.customer_id&sort_order=desc&filter_customer_id=".$activity['dataID']."&filter_customer_name=&filter_customer_surname=&filter_customer_email=&filter_customer_status="."'>".$activity['customer_name']."</a></strong> başarıyla kayıt edildi."
							."</div>"
						."</div>"
					."</li>";
					break;
					case '7':
					if ($activity['customer_company_image']) {
							$src = "<img class='timeline-img pull-left' src='".base_url().'uploads/'.$activity['customer_company_image']."'>";
						} else {
							$src = "<i class='fa fa-edit'></i>";
						}
						echo "<li class='timeline-grey'>"
						  ."<div class='timeline-time'>"
							."<span class='date'>"
							.$phpdate[0]."</span>"
							."<span class='time'>"
							.$phpdate[1]."</span>"	
						."</div>"
						."<div class='timeline-icon'>"
							."<i class='fa fa-edit'></i>"
						."</div>"
						."<div class='timeline-body'>"
							."<!--<h2>Müşteri bilgileri düzenlendi</h2>-->"
							."<div class='timeline-content'>"
								.$src
								."<strong><a class='btn btn-default' style='margin-top: 0px' href='".base_url()."customers?sort=c.customer_id&sort_order=desc&filter_customer_id=".$activity['dataID']."&filter_customer_name=&filter_customer_surname=&filter_customer_email=&filter_customer_status="."'>".$activity['customer_name']."</a></strong> Müşteri bilgileri yeniden düzenlendi ve başarıyla değiştirildi."
							."</div>"
						."</div>"
					."</li>";
					break;
				
				default:
					# code...
					break;
				}
			} ?>
			</ul>
		</div>

	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->