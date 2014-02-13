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
                <div class="col-md-6">
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
                            <table class="table table-condensed table-hover">
                                <thead>
                                    <tr>
                                        <th>İşlem</th>
                                        <th>Sonuç</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($results as $key => $result): ?>
                                    <?php $result = ($result == '1') ? '<span class="badge badge-success">Başarılı</span>' : 'Hata'; ?>
                                    <tr>
                                        <td><?php echo $key; ?></td>
                                        <td><?php echo $result; ?></td>
                                    </tr>
                                <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <a href="<?php echo base_url(); ?>login" class="btn dark">Giriş Yap</a>
                </div>
            </div>
        </div>
    </div>
</div>