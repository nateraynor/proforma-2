<?php $this->load->view('containers/head'); ?>
<?php //$this->load->view('containers/header'); ?>
<div id="content">
 	<?php $this->load->view('subviews/' . $subview); ?>
</div>
<?php $this->load->view('containers/footer'); ?>