<?php $this->load->view('containers/customer_head'); ?>
<?php $this->load->view('containers/customer_header'); ?>
<div id="content">
 	<?php $this->load->view('subviews/' . $subview); ?>
</div>
<?php $this->load->view('containers/customer_footer'); ?>