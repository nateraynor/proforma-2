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
            <div class="row">
                <div class="col-md-12">
                    <h3 class="page-title">
                    CRM Kurulum <small>ICM Yazılım</small>
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box blue" id="form_wizard_1">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-reorder"></i> Kurulum Sihirbazı -
                                <span class="step-title">
                                    CRM Kurulum
                                </span>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <form action="<?php echo base_url() ?>install/startInstall" class="form-horizontal" id="submit_form" method="post">
                                <div class="form-wizard">
                                    <div class="form-body">
                                        <ul class="nav nav-pills nav-justified steps">
                                            <li>
                                                <a href="#tab1" data-toggle="tab" class="step">
                                                    <span class="number">1</span>
                                                    <span class="desc"><i class="fa fa-check"></i> Yönetici - Firma Ayarları</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#tab2" data-toggle="tab" class="step">
                                                    <span class="number">2</span>
                                                    <span class="desc"><i class="fa fa-check"></i> Müşteri Profili</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#tab3" data-toggle="tab" class="step active">
                                                    <span class="number">3</span>
                                                    <span class="desc"><i class="fa fa-check"></i> İşlem Profili</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#tab4" data-toggle="tab" class="step">
                                                    <span class="number">4</span>
                                                    <span class="desc"><i class="fa fa-check"></i> Özet ve Onay</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <div id="bar" class="progress progress-striped" role="progressbar">
                                            <div class="progress-bar progress-bar-success">
                                            </div>
                                        </div>
                                        <div class="tab-content">
                                            <div class="alert alert-danger display-none">
                                                <button class="close" data-dismiss="alert"></button>
                                                Form'da hata bulundu. Lütfen kontrol ediniz.
                                            </div>
                                            <div class="alert alert-success display-none">
                                                <button class="close" data-dismiss="alert"></button>
                                                Your form validation is successful!
                                            </div>
                                            <div class="tab-pane active" id="tab1">
                                                <h3 class="block">Kullanıcı ve firma bilgilerini doldurunuz</h3>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Kullanıcı adı<span class="required">*</span></label>
                                                    <div class="col-md-4"><input type="text" class="form-control" required name="admin_username"/></div>
                                                </div>
                                                <div class="form-group password-strength">
                                                    <label class="control-label col-md-3">Şifre<span class="required">*</span></label>
                                                    <div class="col-md-4"><input type="password" id="admin_password" class="form-control" required name="admin_password"/></div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Şifre tekrar<span class="required">*</span></label>
                                                    <div class="col-md-4"><input type="password" class="form-control" required name="admin_rpassword"/></div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">E-posta<span class="required">*</span></label>
                                                    <div class="col-md-4"><input type="text" class="form-control" required name="admin_email"/></div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Firma Adı</label>
                                                    <div class="col-md-4"><input type="text" class="form-control" name="admin_company_name"/></div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Yönetici Adı - Soyadı</label>
                                                    <div class="col-md-4"><input type="text" class="form-control" name="admin_name_surname"/></div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="tab2">
                                                <h3 class="block">Müşteri Profili</h3>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Müşteri Ad</label>
                                                    <div class="col-md-4"><span class="help-block">Statik Alan 75 Karakter Metin</span></div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Müşteri Soyad</label>
                                                    <div class="col-md-4"><span class="help-block">Statik Alan 75 Karakter Metin</span></div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Müşteri E-posta</label>
                                                    <div class="col-md-4"><span class="help-block">Statik Alan 120 Karakter Metin</span></div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Müşteri Adres</label>
                                                    <div class="col-md-4"><span class="help-block">Statik Alan 255 Karakter Metin</span></div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Müşteri Telefon</label>
                                                    <div class="col-md-4"><span class="help-block">Statik Alan 30 Rakam</span></div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Müşteri Durum</label>
                                                    <div class="col-md-4">
                                                        <span class="help-block">
                                                            Statik Alan Müşteri Tipi Seçenekleri<br />
                                                            Seçenekler:
                                                            <ul>
                                                                <li>Aktif Müşteri</li>
                                                                <li>Potansiyel Müşteri</li>
                                                                <li>Aday Müşteri</li>
                                                                <li>Kaybedilmiş Müşteri</li>
                                                                <li>Karaliste</li>
                                                            </ul>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Şirket</label>
                                                    <div class="col-md-4"><span class="help-block">Dinamik Alan - Müşteri Şirketleri<small>Gireceğiniz şirketler ile müşterilerin ilişkilendiriliği alan</small></span></div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Müşteri Tipi</label>
                                                    <div class="col-md-4"><span class="help-block">Dinamik Alan - Müşteri Tipleri<small>Gireceğiniz müşteri tipleri ile müşterilerin ilişkilendiriliği alan</small></span></div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Müşteri Grubu</label>
                                                    <div class="col-md-4"><span class="help-block">Dinamik Alan - Müşteri Grupları<small>Gireceğiniz müşteri grupları ile müşterilerin ilişkilendiriliği alan</small></span></div>
                                                </div>
                                                <div class="form-group" id="customer-field-holder">
                                                    <label class="control-label col-md-3">Alan Ekle</label>
                                                    <div class="col-md-4">
                                                        <span class="help-block">
                                                            <div class="col-md-6"><input class="form-control" type="text" id="customer-field-name"></div>
                                                            <div class="col-md-6">
                                                                <select class="form-control" id="customer-field-type">
                                                                <?php foreach ($variable_types as $variable_type): ?>
                                                                    <option value="<?php echo $variable_type['variable_value']; ?>" title="<?php echo $variable_type['variable_description'] ?>"><?php echo $variable_type['variable_name']; ?></option>
                                                                <?php endforeach ?>
                                                                </select>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <a href="#" class="btn green" id="customer-add-field">Ekle <i class="fa fa-plus"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="tab3">
                                                <h3 class="block">İşlem Profili</h3>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">İşlem Adı<span class="required">*</span></label>
                                                    <div class="col-md-4"><input type="text" class="form-control" id="action-name"/></div>
                                                    <div class="col-md-2"><a href="#" class="btn green" id="add-action">Ekle <i class="fa fa-plus"></i></a></div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="tab4">
                                                <h3 class="block">Onay</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions fluid">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <a href="javascript:;" class="btn default button-previous">
                                                    <i class="m-icon-swapleft"></i> Geri </a>
                                                    <a href="javascript:;" class="btn blue button-next">
                                                    İleri <i class="m-icon-swapright m-icon-white"></i>
                                                    </a>
                                                    <a href="javascript:;" class="btn green button-submit">
                                                    Kurulumu Başlat <i class="m-icon-swapright m-icon-white"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var variable_types = <?php echo json_encode($variable_types); ?>;
</script>