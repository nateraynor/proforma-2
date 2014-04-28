<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
$ci =& get_instance();

$config['protocol']       = 'smtp';
$config['smtp_host']      = 'smtp.mandrillapp.com';
$config['smtp_user']      = 'depodakaldi@gmail.com';
$config['smtp_pass']      = 'Ar_pS2yApICY7ltfTpVXlw';
$config['smtp_port']      = '587';
$config['smtp_timeout']   = '5';
$config['wordwrap']       = TRUE;
$config['wrapchars']      = 76;
$config['mailtype']       = 'html';
$config['charset']        = 'utf-8';
$config['validate']       = FALSE;
$config['priority']       = 3;
$config['crlf']           = "\r\n";
$config['newline']        = "\r\n";
$config['bcc_batch_mode'] = FALSE;
$config['bcc_batch_size'] = 200;

$ci->load->library('email');
$ci->email->initialize($config);

function proposal_mail($data = array()) {
  $body = $data['company_name'] . "'den bir teklif aldınız. Teklif detaylarına <a href='" . $data['proposal_link'] . "'><b>buradan</b></a> ulaşabilirsiniz.";

  return $body;
}

function send_mail($to, $subject, $message) {
    $ci =& get_instance();
    $ci->email->from('server@depodakaldi.com', 'Depodakaldı');
    $ci->email->reply_to('server@depodakaldi.com', 'Depodakaldı');
    $ci->email->to($to);
    $ci->email->subject($subject);
    $ci->email->message($message);

    if (!$ci->email->send()) {
        return false;
    } else {
        return true;
    }
}
?>