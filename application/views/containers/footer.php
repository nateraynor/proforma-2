<div class="footer">
  <div class="footer-inner">
     2014 &copy; ICM MARS | CRM.
  </div>
  <div class="footer-tools">
    <span class="go-top">
      <i class="fa fa-angle-up"></i>
    </span>
  </div>
</div>
<script src="<?php echo ASSETS ?>plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="<?php echo ASSETS ?>plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="<?php echo ASSETS ?>plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo ASSETS ?>plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?php echo ASSETS ?>plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo ASSETS ?>plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo ASSETS ?>plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?php echo ASSETS ?>plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo ASSETS ?>plugins/jquery-validation/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo ASSETS ?>plugins/jquery-validation/dist/additional-methods.min.js"></script>
<script type="text/javascript" src="<?php echo ASSETS ?>plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<?php if ($page == 'wizard'): ?>
<script type="text/javascript" src="<?php echo ASSETS ?>plugins/select2/select2.min.js"></script>
<script src="<?php echo ASSETS ?>plugins/jquery.pwstrength.bootstrap/src/pwstrength.js" type="text/javascript"></script>
<script src="<?php echo ASSETS ?>scripts/app.js"></script>
<script src="<?php echo ASSETS ?>scripts/form-wizard.js"></script>
<script src="<?php echo ASSETS ?>scripts/custom-install.js"></script>
<script>
jQuery(document).ready(function() {
   App.init();
   FormWizard.init();
});
</script>
<?php elseif ($page == 'forms'): ?>
<script type="text/javascript" src="<?php echo ASSETS ?>plugins/fuelux/js/spinner.min.js"></script>
<script type="text/javascript" src="<?php echo ASSETS ?>ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo ASSETS ?>plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<script type="text/javascript" src="<?php echo ASSETS ?>plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="<?php echo ASSETS ?>plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="<?php echo ASSETS ?>plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
<script type="text/javascript" src="<?php echo ASSETS ?>plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo ASSETS ?>plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="<?php echo ASSETS ?>plugins/clockface/js/clockface.js"></script>
<script type="text/javascript" src="<?php echo ASSETS ?>plugins/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="<?php echo ASSETS ?>plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="<?php echo ASSETS ?>plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="<?php echo ASSETS ?>plugins/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
<script type="text/javascript" src="<?php echo ASSETS ?>plugins/jquery-inputmask/jquery.inputmask.bundle.min.js"></script>
<script type="text/javascript" src="<?php echo ASSETS ?>plugins/jquery.input-ip-address-control-1.0.min.js"></script>
<script type="text/javascript" src="<?php echo ASSETS ?>plugins/jquery-multi-select/js/jquery.multi-select.js"></script>
<script type="text/javascript" src="<?php echo ASSETS ?>plugins/jquery-multi-select/js/jquery.quicksearch.js"></script>
<script src="<?php echo ASSETS ?>plugins/jquery.pwstrength.bootstrap/src/pwstrength.js" type="text/javascript"></script>
<script src="<?php echo ASSETS ?>plugins/bootstrap-switch/static/js/bootstrap-switch.min.js" type="text/javascript"></script>
<script src="<?php echo ASSETS ?>plugins/jquery-tags-input/jquery.tagsinput.min.js" type="text/javascript"></script>
<script src="<?php echo ASSETS ?>plugins/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
<script src="<?php echo ASSETS ?>plugins/bootstrap-markdown/lib/markdown.js" type="text/javascript"></script>
<script src="<?php echo ASSETS ?>plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
<script src="<?php echo ASSETS ?>plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script>
<script src="<?php echo ASSETS ?>plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
<script src="<?php echo ASSETS ?>scripts/ui-bootbox.js" type="text/javascript"></script>
<script src="<?php echo ASSETS ?>scripts/app.js"></script>
<script src="<?php echo ASSETS ?>scripts/form-components.js"></script>
<script src="<?php echo ASSETS ?>scripts/custom-forms.js"></script>
<script>
jQuery(document).ready(function() {
   App.init();
   FormComponents.init();
   UIBootbox.init();
});
</script>
<?php elseif ($page == 'dashboard'): ?>
<script src="<?php echo ASSETS; ?>plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
<script src="<?php echo ASSETS; ?>plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
<script src="<?php echo ASSETS; ?>plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
<script src="<?php echo ASSETS; ?>plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
<script src="<?php echo ASSETS; ?>plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
<script src="<?php echo ASSETS; ?>plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
<script src="<?php echo ASSETS; ?>plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
<script src="<?php echo ASSETS; ?>plugins/flot/jquery.flot.js" type="text/javascript"></script>
<script src="<?php echo ASSETS; ?>plugins/flot/jquery.flot.resize.js" type="text/javascript"></script>
<script src="<?php echo ASSETS; ?>plugins/jquery.pulsate.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo ASSETS ?>plugins/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="<?php echo ASSETS ?>plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?php echo ASSETS; ?>plugins/gritter/js/jquery.gritter.js" type="text/javascript"></script>
<script src="<?php echo ASSETS; ?>plugins/fullcalendar/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="<?php echo ASSETS; ?>plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.js" type="text/javascript"></script>
<script src="<?php echo ASSETS; ?>plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="<?php echo ASSETS; ?>scripts/app.js" type="text/javascript"></script>
<script src="<?php echo ASSETS; ?>scripts/index.js" type="text/javascript"></script>
<script src="<?php echo ASSETS; ?>scripts/tasks.js" type="text/javascript"></script>
<script>
jQuery(document).ready(function() {
  App.init();
  Index.init();
  Index.initCalendar(); // init index page's custom scripts
  Index.initCharts(); // init index page's custom scripts
  Index.initChat();
  Index.initMiniCharts();
  Index.initDashboardDaterange();
  Index.initIntro();
  Tasks.initDashboardWidget();
});
</script>
<?php elseif ($page == 'advancedtables'): ?>
<script type="text/javascript" src="<?php echo ASSETS ?>plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="<?php echo ASSETS ?>plugins/data-tables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo ASSETS ?>plugins/data-tables/DT_bootstrap.js"></script>
<script src="<?php echo ASSETS ?>plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
<script src="<?php echo ASSETS ?>scripts/ui-bootbox.js" type="text/javascript"></script>
<script src="<?php echo ASSETS ?>scripts/app.js"></script>
<script src="<?php echo ASSETS ?>scripts/table-advanced.js"></script>
<script src="<?php echo ASSETS ?>scripts/custom-tables.js"></script>
<script>
jQuery(document).ready(function() {
  App.init();
  TableAdvanced.init();
  UIBootbox.init();
});
</script>
<?php endif; ?>
