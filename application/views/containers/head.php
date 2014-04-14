<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta charset="utf-8"/>
<title><?php echo isset($metaInfo['title']) ? $metaInfo['title'] : ' ' ;?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta name="description" content="<?php echo isset($metaInfo['description']) ? $metaInfo['description'] : '' ;?>"/>
<meta name="keywords" content="<?php echo isset($metaInfo['keyword']) ? $metaInfo['keyword'] : '' ;?>"/>
<meta content="" name="author"/>
<meta name="MobileOptimized" content="320">
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="<?php echo ASSETS ?>plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo ASSETS ?>plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo ASSETS ?>plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<?php if ($page == 'advancedtables'): ?>
<link rel="stylesheet" type="text/css" href="<?php echo ASSETS ?>plugins/select2/select2_metro.css"/>
<link rel="stylesheet" href="<?php echo ASSETS; ?>plugins/data-tables/DT_bootstrap.css"/>
<?php elseif ($page == 'forms'): ?>
<link rel="stylesheet" type="text/css" href="<?php echo ASSETS ?>plugins/bootstrap-fileupload/bootstrap-fileupload.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo ASSETS ?>plugins/gritter/css/jquery.gritter.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo ASSETS ?>plugins/select2/select2_metro.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo ASSETS ?>plugins/clockface/css/clockface.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo ASSETS ?>plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo ASSETS ?>plugins/bootstrap-datepicker/css/datepicker.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo ASSETS ?>plugins/bootstrap-timepicker/compiled/timepicker.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo ASSETS ?>plugins/bootstrap-colorpicker/css/colorpicker.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo ASSETS ?>plugins/bootstrap-daterangepicker/daterangepicker-bs3.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo ASSETS ?>plugins/bootstrap-datetimepicker/css/datetimepicker.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo ASSETS ?>plugins/jquery-multi-select/css/multi-select.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo ASSETS ?>plugins/bootstrap-switch/static/stylesheets/bootstrap-switch-metro.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo ASSETS ?>plugins/jquery-tags-input/jquery.tagsinput.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo ASSETS ?>plugins/bootstrap-markdown/css/bootstrap-markdown.min.css">
<link href="<?php echo ASSETS ?>plugins/dropzone/css/dropzone.css" rel="stylesheet"/>
<link href="<?php echo ASSETS ?>/css/pages/invoice.css" rel="stylesheet" type="text/css"/>
<?php endif; ?>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->
<link href="<?php echo ASSETS ?>css/style-metronic.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo ASSETS ?>css/style.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo ASSETS ?>css/style-responsive.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo ASSETS ?>css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo ASSETS ?>css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="<?php echo ASSETS ?>css/custom.css" rel="stylesheet" type="text/css"/>
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<script type="text/javascript">
	var base_url = '<?php echo base_url() ?>';
</script>
<body class="page-header-fixed">