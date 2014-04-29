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

function mail_header() {
    $header  = '
    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8"><!-- /Added by HTTrack -->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>ICM Yazılım - Proforma</title>
        <style type="text/css">
        #outlook a{padding:0}body{width:100%!important;-webkit-text-size-adjust:none;margin:0;padding:0}img{border:0;height:auto;line-height:100%;outline:0;text-decoration:none}table td{border-collapse:collapse}#backgroundTable{height:100%!important;margin:0;padding:0;width:100%!important}@import url(http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700);#backgroundTable,body{background-color:#FFF}.TopbarLogo{padding:10px;text-align:left;vertical-align:middle}.h1,h1{color:#444;display:block;font-family:Open Sans;font-size:35px;font-weight:400;line-height:100%;margin-top:2%;margin-right:0;margin-bottom:1%;margin-left:0;text-align:left}.h2,h2{color:#444;display:block;font-family:Open Sans;font-size:30px;font-weight:400;line-height:100%;margin-top:2%;margin-right:0;margin-bottom:1%;margin-left:0;text-align:left}.h3,h3{color:#444;display:block;font-family:Open Sans;font-size:24px;font-weight:400;margin-top:2%;margin-right:0;margin-bottom:1%;margin-left:0;text-align:left}.h4,h4{color:#444;display:block;font-family:Open Sans;font-size:18px;font-weight:400;line-height:100%;margin-top:2%;margin-right:0;margin-bottom:1%;margin-left:0;text-align:left}.h5,h5{color:#444;display:block;font-family:Open Sans;font-size:14px;font-weight:400;line-height:100%;margin-top:2%;margin-right:0;margin-bottom:1%;margin-left:0;text-align:left}.textdark{color:#444;font-family:Open Sans;font-size:13px;line-height:150%;text-align:left}.textwhite{color:#fff;font-family:Open Sans;font-size:13px;line-height:150%;text-align:left}.fontwhite{color:#fff}.btn{background-color:#e5e5e5;background-image:none;filter:none;border:0;box-shadow:none;padding:7px 14px;text-shadow:none;font-family:"Segoe UI",Helvetica,Arial,sans-serif;font-size:14px;color:#333;cursor:pointer;outline:0;-webkit-border-radius:0!important;-moz-border-radius:0!important;border-radius:0!important}.btn.active,.btn.disabled,.btn:active,.btn:focus,.btn:hover,.btn[disabled]{font-family:"Segoe UI",Helvetica,Arial,sans-serif;color:#333;box-shadow:none;background-color:#d8d8d8}.btn.red{color:#fff;text-shadow:none;background-color:#d84a38}.btn.red.active,.btn.red.disabled,.btn.red:active,.btn.red:focus,.btn.red:hover,.btn.red[disabled]{background-color:#bb2413!important;color:#fff!important}.btn.green{color:#fff;text-shadow:none;background-color:#35aa47}.btn.green.active,.btn.green.disabled,.btn.green:active,.btn.green:focus,.btn.green:hover,.btn.green[disabled]{background-color:#1d943b!important;color:#fff!important}
        </style>
    </head>';
    $header .= '
            <body>
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color:#1f1f1f; height:52px;">
                <tbody><tr>
                    <td align="center">
                        <center>
                        <table border="0" cellpadding="0" cellspacing="0" width="600px" style="height:100%;">
                        <tbody><tr>
                            <td align="left" valign="middle" style="padding-left:20px;">
                                <a href="index-2.html">
                                <img src="../../../keenthemes.com/assets/img/emailtemplate/logo.png" width="86px" height="14px" alt="Metronic logo">
                                </a>
                            </td>
                            <td align="right" valign="middle" style="padding-right:20px;">
                            </td>
                        </tr>
                        </tbody></table>
                        </center>
                    </td>
                </tr>
                </tbody>
            </table>
            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tbody><tr>
                    <td style="padding-bottom:20px;">
                        <center>
                        <table border="0" cellpadding="0" cellspacing="0" width="600px" style="height:100%;">
                        <tbody><tr>
                            <td valign="top" class="bodyContent">
                                <table border="0" cellpadding="20" cellspacing="0" width="100%">
                                <tbody><tr>
                                    <td valign="top">';
        return $header;
}

function mail_footer() {
    $footer = '
                                    </td>
                                </tr>
                                </tbody></table>
                            </td>
                        </tr>
                        </tbody></table>
                        </center>
                    </td>
                </tr>
            </tbody>
        </table>
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color:#1f1f1f;">
            <tbody><tr>
                <td align="center">
                    <center>
                    <table border="0" cellpadding="0" cellspacing="0" width="600px" style="height:100%;">
                    <tbody><tr>
                        <td align="right" valign="middle" class="textwhite" style="font-size:12px;padding:20px;">
                             <br><br>
                            © 2014 ICM Yazılım.
                        </td>
                    </tr>
                    </tbody></table>
                    </center>
                </td>
            </tr>
            </tbody>
        </table>';

        return $footer;
}

function proposal_mail($data = array()) {
    $header = mail_header();
    $footer = mail_footer();
    $body = "<h2>" . $data['company_name'] . "'den bir teklif aldınız</h2> Teklif detaylarına <a href='" . $data['proposal_link'] . "'><b>buradan</b></a> ulaşabilirsiniz.";

    return $header . $body . $footer;
}

function send_mail($to, $subject, $message) {
    $ci =& get_instance();
    $ci->email->from('server@depodakaldi.com', 'Proforma');
    $ci->email->reply_to('server@depodakaldi.com', 'Proforma');
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