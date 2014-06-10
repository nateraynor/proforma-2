<div class="page-container">

	

	<!-- BEGIN CONTENT -->

	<div class="page-content-wrapper">

		<div class="page-content">

			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->

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

					<!-- /.modal-content -->

				</div>

				<!-- /.modal-dialog -->

			</div>

			<!-- /.modal -->

			<!-- END STYLE CUSTOMIZER -->

			<!-- BEGIN PAGE HEADER-->

			<div class="row">

				<div class="col-md-12">

					<!-- BEGIN PAGE TITLE & BREADCRUMB-->

					<h3 class="page-title">

					<?php echo $product['product_name']; ?> <small></small>

					</h3>

					

					<!-- END PAGE TITLE & BREADCRUMB-->

				</div>

			</div>

			<!-- END PAGE HEADER-->

			<!-- BEGIN PAGE CONTENT-->

			<div class="row profile">

				<div class="col-md-12">

					<!--BEGIN TABS-->

					<div class="tabbable tabbable-custom tabbable-full-width">

						<ul class="nav nav-tabs">

							<li class="active">

								<a href="#tab_1_1" data-toggle="tab">Genel Bakış</a>

							</li>

							<li>

								<a href="#tab_1_3" data-toggle="tab">Dosyalar</a>

							</li>

							<!--li>

								<a href="#tab_1_4" data-toggle="tab">Projects</a>

							</li>

							<li>

								<a href="#tab_1_6" data-toggle="tab">Help</a>

							</li-->

						</ul>

						<div class="tab-content">

							<div class="tab-pane active" id="tab_1_1">

								<div class="row">

									<div class="col-md-3">

										<ul class="list-unstyled profile-nav">

											<li>

												<img src="<?php echo base_url().'uploads/'.$product['product_image']; ?>" class="img-responsive" alt=""/>

												<!--a href="#" class="profile-edit">edit</a-->

											</li>

											<!--li>

												<a href="#">Projects</a>

											</li>

											<li>

												<a href="#">Messages

												<span>

													3

												</span>

												</a>

											</li>

											<li>

												<a href="#">Friends</a>

											</li>

											<li>

												<a href="#">Settings</a>

											</li-->

										</ul>

									</div>

									<div class="col-md-9">

										<div class="row">

											<div class="col-md-8 profile-info">

												<!--h1>John Doe</h1-->

												<p>

													<?php echo $product['product_description']; ?>

												</p>

												<?php if($product['product_link']): ?>

												<p>

													<a href="<?php echo $product['product_link'] ?>">Ürün / Hizmet Link</a>

												</p>

												<?php endif; ?>

												<!--ul class="list-inline">

													<li>

														<i class="fa fa-map-marker"></i> Spain

													</li>

													<li>

														<i class="fa fa-calendar"></i> 18 Jan 1982

													</li>

													<li>

														<i class="fa fa-briefcase"></i> Design

													</li>

													<li>

														<i class="fa fa-star"></i> Top Seller

													</li>

													<li>

														<i class="fa fa-heart"></i> BASE Jumping

													</li>

												</ul-->

											</div>

											<!--end col-md-8-->

											<div class="col-md-4">

												<div class="portlet sale-summary">

													<div class="portlet-title">

														<!--div class="caption">

															Sales Summary

														</div-->

														

													</div>

													<div class="portlet-body">

														<ul class="list-unstyled">

															<li>

																<span class="sale-info">

																	ÜRÜN / HİZMET FİYAT

																</span>

																<span class="sale-num">

																	<?php echo $product['product_price']; ?> <i class="fa fa-try"></i>

																</span>

															</li>

															<li>

																<span class="sale-info">

																	ÜRÜN / HİZMET VERGİ ORANI <i class="fa fa-img-down"></i>

																</span>

																<span class="sale-num">

																	<?php echo $product['product_tax_rate'] ?>

																</span>

															</li>

															

														</ul>

													</div>

												</div>

											</div>

											<!--end col-md-4-->

										</div>

										<!--end row-->

										<!--div class="tabbable tabbable-custom tabbable-custom-profile">

											<ul class="nav nav-tabs">

												<li class="active">

													<a href="#tab_1_11" data-toggle="tab">Latest Customers</a>

												</li>

												<li>

													<a href="#tab_1_22" data-toggle="tab">Feeds</a>

												</li>

											</ul>

											<div class="tab-content">

												<div class="tab-pane active" id="tab_1_11">

													<div class="portlet-body">

														<table class="table table-striped table-bordered table-advance table-hover">

														<thead>

														<tr>

															<th>

																<i class="fa fa-briefcase"></i> Company

															</th>

															<th class="hidden-xs">

																<i class="fa fa-question"></i> Descrition

															</th>

															<th>

																<i class="fa fa-bookmark"></i> Amount

															</th>

															<th>

															</th>

														</tr>

														</thead>

														<tbody>

														<tr>

															<td>

																<a href="#">Pixel Ltd</a>

															</td>

															<td class="hidden-xs">

																Server hardware purchase

															</td>

															<td>

																52560.10$

																<span class="label label-success label-sm">

																	Paid

																</span>

															</td>

															<td>

																<a class="btn default btn-xs green-stripe" href="#">View</a>

															</td>

														</tr>

														<tr>

															<td>

																<a href="#">

																Smart House </a>

															</td>

															<td class="hidden-xs">

																Office furniture purchase

															</td>

															<td>

																5760.00$

																<span class="label label-warning label-sm">

																	Pending

																</span>

															</td>

															<td>

																<a class="btn default btn-xs blue-stripe" href="#">View</a>

															</td>

														</tr>

														<tr>

															<td>

																<a href="#">

																FoodMaster Ltd </a>

															</td>

															<td class="hidden-xs">

																Company Anual Dinner Catering

															</td>

															<td>

																12400.00$

																<span class="label label-success label-sm">

																	Paid

																</span>

															</td>

															<td>

																<a class="btn default btn-xs blue-stripe" href="#">View</a>

															</td>

														</tr>

														<tr>

															<td>

																<a href="#">

																WaterPure Ltd </a>

															</td>

															<td class="hidden-xs">

																Payment for Jan 2013

															</td>

															<td>

																610.50$

																<span class="label label-danger label-sm">

																	Overdue

																</span>

															</td>

															<td>

																<a class="btn default btn-xs red-stripe" href="#">View</a>

															</td>

														</tr>

														<tr>

															<td>

																<a href="#">Pixel Ltd</a>

															</td>

															<td class="hidden-xs">

																Server hardware purchase

															</td>

															<td>

																52560.10$

																<span class="label label-success label-sm">

																	Paid

																</span>

															</td>

															<td>

																<a class="btn default btn-xs green-stripe" href="#">View</a>

															</td>

														</tr>

														<tr>

															<td>

																<a href="#">

																Smart House </a>

															</td>

															<td class="hidden-xs">

																Office furniture purchase

															</td>

															<td>

																5760.00$

																<span class="label label-warning label-sm">

																	Pending

																</span>

															</td>

															<td>

																<a class="btn default btn-xs blue-stripe" href="#">View</a>

															</td>

														</tr>

														<tr>

															<td>

																<a href="#">

																FoodMaster Ltd </a>

															</td>

															<td class="hidden-xs">

																Company Anual Dinner Catering

															</td>

															<td>

																12400.00$

																<span class="label label-success label-sm">

																	Paid

																</span>

															</td>

															<td>

																<a class="btn default btn-xs blue-stripe" href="#">View</a>

															</td>

														</tr>

														</tbody>

														</table>

													</div>

												</div>

												<div class="tab-pane" id="tab_1_22">

													<div class="tab-pane active" id="tab_1_1_1">

														<div class="scroller" data-height="290px" data-always-visible="1" data-rail-visible1="1">

															<ul class="feeds">

																<li>

																	<div class="col1">

																		<div class="cont">

																			<div class="cont-col1">

																				<div class="label label-success">

																					<i class="fa fa-bell-o"></i>

																				</div>

																			</div>

																			<div class="cont-col2">

																				<div class="desc">

																					 You have 4 pending tasks.

																					<span class="label label-danger label-sm">

																						 Take action <i class="fa fa-share"></i>

																					</span>

																				</div>

																			</div>

																		</div>

																	</div>

																	<div class="col2">

																		<div class="date">

																			 Just now

																		</div>

																	</div>

																</li>

																<li>

																	<a href="#">

																	<div class="col1">

																		<div class="cont">

																			<div class="cont-col1">

																				<div class="label label-success">

																					<i class="fa fa-bell-o"></i>

																				</div>

																			</div>

																			<div class="cont-col2">

																				<div class="desc">

																					 New version v1.4 just lunched!

																				</div>

																			</div>

																		</div>

																	</div>

																	<div class="col2">

																		<div class="date">

																			 20 mins

																		</div>

																	</div>

																	</a>

																</li>

																<li>

																	<div class="col1">

																		<div class="cont">

																			<div class="cont-col1">

																				<div class="label label-danger">

																					<i class="fa fa-bolt"></i>

																				</div>

																			</div>

																			<div class="cont-col2">

																				<div class="desc">

																					 Database server #12 overloaded. Please fix the issue.

																				</div>

																			</div>

																		</div>

																	</div>

																	<div class="col2">

																		<div class="date">

																			 24 mins

																		</div>

																	</div>

																</li>

																<li>

																	<div class="col1">

																		<div class="cont">

																			<div class="cont-col1">

																				<div class="label label-info">

																					<i class="fa fa-bullhorn"></i>

																				</div>

																			</div>

																			<div class="cont-col2">

																				<div class="desc">

																					 New order received. Please take care of it.

																				</div>

																			</div>

																		</div>

																	</div>

																	<div class="col2">

																		<div class="date">

																			 30 mins

																		</div>

																	</div>

																</li>

																<li>

																	<div class="col1">

																		<div class="cont">

																			<div class="cont-col1">

																				<div class="label label-success">

																					<i class="fa fa-bullhorn"></i>

																				</div>

																			</div>

																			<div class="cont-col2">

																				<div class="desc">

																					 New order received. Please take care of it.

																				</div>

																			</div>

																		</div>

																	</div>

																	<div class="col2">

																		<div class="date">

																			 40 mins

																		</div>

																	</div>

																</li>

																<li>

																	<div class="col1">

																		<div class="cont">

																			<div class="cont-col1">

																				<div class="label label-warning">

																					<i class="fa fa-plus"></i>

																				</div>

																			</div>

																			<div class="cont-col2">

																				<div class="desc">

																					 New user registered.

																				</div>

																			</div>

																		</div>

																	</div>

																	<div class="col2">

																		<div class="date">

																			 1.5 hours

																		</div>

																	</div>

																</li>

																<li>

																	<div class="col1">

																		<div class="cont">

																			<div class="cont-col1">

																				<div class="label label-success">

																					<i class="fa fa-bell-o"></i>

																				</div>

																			</div>

																			<div class="cont-col2">

																				<div class="desc">

																					 Web server hardware needs to be upgraded.

																					<span class="label label-inverse label-sm">

																						Overdue

																					</span>

																				</div>

																			</div>

																		</div>

																	</div>

																	<div class="col2">

																		<div class="date">

																			 2 hours

																		</div>

																	</div>

																</li>

																<li>

																	<div class="col1">

																		<div class="cont">

																			<div class="cont-col1">

																				<div class="label label-default">

																					<i class="fa fa-bullhorn"></i>

																				</div>

																			</div>

																			<div class="cont-col2">

																				<div class="desc">

																					 New order received. Please take care of it.

																				</div>

																			</div>

																		</div>

																	</div>

																	<div class="col2">

																		<div class="date">

																			 3 hours

																		</div>

																	</div>

																</li>

																<li>

																	<div class="col1">

																		<div class="cont">

																			<div class="cont-col1">

																				<div class="label label-warning">

																					<i class="fa fa-bullhorn"></i>

																				</div>

																			</div>

																			<div class="cont-col2">

																				<div class="desc">

																					 New order received. Please take care of it.

																				</div>

																			</div>

																		</div>

																	</div>

																	<div class="col2">

																		<div class="date">

																			 5 hours

																		</div>

																	</div>

																</li>

																<li>

																	<div class="col1">

																		<div class="cont">

																			<div class="cont-col1">

																				<div class="label label-info">

																					<i class="fa fa-bullhorn"></i>

																				</div>

																			</div>

																			<div class="cont-col2">

																				<div class="desc">

																					 New order received. Please take care of it.

																				</div>

																			</div>

																		</div>

																	</div>

																	<div class="col2">

																		<div class="date">

																			 18 hours

																		</div>

																	</div>

																</li>

																<li>

																	<div class="col1">

																		<div class="cont">

																			<div class="cont-col1">

																				<div class="label label-default">

																					<i class="fa fa-bullhorn"></i>

																				</div>

																			</div>

																			<div class="cont-col2">

																				<div class="desc">

																					 New order received. Please take care of it.

																				</div>

																			</div>

																		</div>

																	</div>

																	<div class="col2">

																		<div class="date">

																			 21 hours

																		</div>

																	</div>

																</li>

																<li>

																	<div class="col1">

																		<div class="cont">

																			<div class="cont-col1">

																				<div class="label label-info">

																					<i class="fa fa-bullhorn"></i>

																				</div>

																			</div>

																			<div class="cont-col2">

																				<div class="desc">

																					 New order received. Please take care of it.

																				</div>

																			</div>

																		</div>

																	</div>

																	<div class="col2">

																		<div class="date">

																			 22 hours

																		</div>

																	</div>

																</li>

																<li>

																	<div class="col1">

																		<div class="cont">

																			<div class="cont-col1">

																				<div class="label label-default">

																					<i class="fa fa-bullhorn"></i>

																				</div>

																			</div>

																			<div class="cont-col2">

																				<div class="desc">

																					 New order received. Please take care of it.

																				</div>

																			</div>

																		</div>

																	</div>

																	<div class="col2">

																		<div class="date">

																			 21 hours

																		</div>

																	</div>

																</li>

																<li>

																	<div class="col1">

																		<div class="cont">

																			<div class="cont-col1">

																				<div class="label label-info">

																					<i class="fa fa-bullhorn"></i>

																				</div>

																			</div>

																			<div class="cont-col2">

																				<div class="desc">

																					 New order received. Please take care of it.

																				</div>

																			</div>

																		</div>

																	</div>

																	<div class="col2">

																		<div class="date">

																			 22 hours

																		</div>

																	</div>

																</li>

																<li>

																	<div class="col1">

																		<div class="cont">

																			<div class="cont-col1">

																				<div class="label label-default">

																					<i class="fa fa-bullhorn"></i>

																				</div>

																			</div>

																			<div class="cont-col2">

																				<div class="desc">

																					 New order received. Please take care of it.

																				</div>

																			</div>

																		</div>

																	</div>

																	<div class="col2">

																		<div class="date">

																			 21 hours

																		</div>

																	</div>

																</li>

																<li>

																	<div class="col1">

																		<div class="cont">

																			<div class="cont-col1">

																				<div class="label label-info">

																					<i class="fa fa-bullhorn"></i>

																				</div>

																			</div>

																			<div class="cont-col2">

																				<div class="desc">

																					 New order received. Please take care of it.

																				</div>

																			</div>

																		</div>

																	</div>

																	<div class="col2">

																		<div class="date">

																			 22 hours

																		</div>

																	</div>

																</li>

																<li>

																	<div class="col1">

																		<div class="cont">

																			<div class="cont-col1">

																				<div class="label label-default">

																					<i class="fa fa-bullhorn"></i>

																				</div>

																			</div>

																			<div class="cont-col2">

																				<div class="desc">

																					 New order received. Please take care of it.

																				</div>

																			</div>

																		</div>

																	</div>

																	<div class="col2">

																		<div class="date">

																			 21 hours

																		</div>

																	</div>

																</li>

																<li>

																	<div class="col1">

																		<div class="cont">

																			<div class="cont-col1">

																				<div class="label label-info">

																					<i class="fa fa-bullhorn"></i>

																				</div>

																			</div>

																			<div class="cont-col2">

																				<div class="desc">

																					 New order received. Please take care of it.

																				</div>

																			</div>

																		</div>

																	</div>

																	<div class="col2">

																		<div class="date">

																			 22 hours

																		</div>

																	</div>

																</li>

															</ul>

														</div>

													</div>

												</div>

											</div>

										</div-->

									</div>

								</div>

							</div>

							<!--tab_1_2-->

							<div class="tab-pane" id="tab_1_3">

								<div class="row">

									<div class="col-md-12">

										<div class="tabbable ">

											<div class="tab-content">

												<div class="tab-pane active">

													<!-- BEGIN FILTER -->

													<div class="margin-top-10">

														<div class="row mix-grid">

														<?php foreach ($product_files as $file): ?>

															<div class="col-md-3 col-sm-4 mix">

																<div class="mix-inner">

																	<?php if(strstr($file['image_path'],'pdf')): ?>

																	<a class="mix-preview fancybox-button" href="<?php echo base_url(); ?>public/img/pdf_image.jpg"  data-rel="fancybox-button">

																	<img class="img-responsive" src="<?php echo base_url(); ?>public/img/pdf_image.jpg" style="height: 350px;width: 350px;"></a>

																	<div class="mix-details">

																		<a class="mix-link" href="<?php echo base_url().'uploads/'.$file['image_path']; ?>"><i class="fa fa-link"></i></a>

																	</div>

																	<?php elseif(strstr($file['image_path'],'docx')): ?>

																	<a class="mix-preview fancybox-button" href="<?php echo base_url(); ?>public/img/docx_image.jpg"  data-rel="fancybox-button">

																	<img class="img-responsive" src="<?php echo base_url(); ?>public/img/docx_image.jpg" style="height: 350px;width: 350px;"></a>

																	<div class="mix-details">

																		<a class="mix-link" href="<?php echo base_url().'uploads/'.$file['image_path']; ?>"><i class="fa fa-link"></i></a>

																	</div>

																	<?php else: ?>

																	<a class="mix-preview fancybox-button" href="<?php echo base_url() . 'uploads/' . $file['image_path']; ?>"  data-rel="fancybox-button">

																	<img class="img-responsive" src="<?php echo base_url() . 'uploads/' . $file['image_path']; ?>" style="height: 350px;width: 350px;"></a>

																	<?php endif; ?>

																</div>

															</div>

														<?php endforeach; ?>



														</div>

													</div>

													<!-- END FILTER -->

												</div>

											

											</div>

										</div>

									</div>

								</div>

							</div>

							<!--end tab-pane-->

							

						</div>

					</div>

					<!--END TABS-->

				</div>

			</div>

			<!-- END PAGE CONTENT-->

		</div>

	</div>

	<!-- END CONTENT -->

</div>