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
<title>Houston Kuaför | ICM MARS CRM</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<meta name="MobileOptimized" content="320">
<link href="<?php echo ASSETS; ?>plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo ASSETS; ?>plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo ASSETS; ?>plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="<?php echo ASSETS; ?>plugins/select2/select2_metro.css"/>
<link href="<?php echo ASSETS; ?>css/style-metronic.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo ASSETS; ?>css/style.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo ASSETS; ?>css/style-responsive.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo ASSETS; ?>css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo ASSETS; ?>css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="<?php echo ASSETS; ?>css/pages/login-soft.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo ASSETS; ?>css/custom.css" rel="stylesheet" type="text/css"/>
<link rel="shortcut icon" href="favicon.ico"/>
<style type="text/css">
html {
	background: url('<?php echo ASSETS ?>img/red-planet.jpg') no-repeat center center fixed;
	-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
	background-size: cover;
}
</style>
</head>
<body class="login" style="background: none !important;">
<div class="logo">
	<img src="<?php echo ASSETS; ?>img/ICM-Venus-login-Logo.png" alt="" style="width: 27%; min-width: 220px; max-width: 360px;";/>
</div>
<div class="content">
	<form class="login-form" action="<?php echo base_url() ?>login" method="post">
		<?php if (!empty($errors)): ?>
		<div class="alert alert-danger">
			<button class="close" data-close="alert"></button>
			<span>
				<?php foreach ($errors as $error): ?>
					<?php echo $error; ?><br />
				<?php endforeach ?>
			</span>
		</div>
		<?php endif; ?>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Kullanıcı adı</label>
			<div class="input-icon">
				<i class="fa fa-user"></i>
				<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Kullanıcı adı" name="username_" required/>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Şifre</label>
			<div class="input-icon">
				<i class="fa fa-lock"></i>
				<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Şifre" name="password_" required/>
			</div>
		</div>
		<div class="form-actions">
			<label class="checkbox">
			<input type="checkbox" name="remember" value="1"/> Beni hatırla </label>
			<button type="submit" class="btn red pull-right">
			Giriş <i class="m-icon-swapright m-icon-white"></i>
			</button>
		</div>
		<!--<div class="forget-password">
			<h4>Şifremi Unuttum</h4>
			<p>
				yeni şifre almak için, <a href="javascript:;" id="forget-password">buraya </a> tıklayın.
			</p>
		</div>-->
	</form>
	<form class="forget-form" action="http://www.keenthemes.com/preview/metronic_admin/index.html" method="post">
		<h3>Şifremi Unuttum</h3>
		<p>
			Şifrenizi sıfırlamak için aşağıdaki alanı e-posta adresinizi girin
		</p>
		<div class="form-group">
			<div class="input-icon">
				<i class="fa fa-envelope"></i>
				<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="E-posta" name="email"/>
			</div>
		</div>
		<div class="form-actions">
			<button type="button" id="back-btn" class="btn">
			<i class="m-icon-swapleft"></i> Geri </button>
			<button type="submit" class="btn blue pull-right">
			Gönder <i class="m-icon-swapright m-icon-white"></i>
			</button>
		</div>
	</form>
	<!-- END FORGOT PASSWORD FORM -->
	<!-- BEGIN REGISTRATION FORM -->
	<form class="register-form" action="http://www.keenthemes.com/preview/metronic_admin/index.html" method="post">
		<h3>Sign Up</h3>
		<p>
			 Enter your personal details below:
		</p>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Full Name</label>
			<div class="input-icon">
				<i class="fa fa-font"></i>
				<input class="form-control placeholder-no-fix" type="text" placeholder="Full Name" name="fullname"/>
			</div>
		</div>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Email</label>
			<div class="input-icon">
				<i class="fa fa-envelope"></i>
				<input class="form-control placeholder-no-fix" type="text" placeholder="Email" name="email"/>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Address</label>
			<div class="input-icon">
				<i class="fa fa-check"></i>
				<input class="form-control placeholder-no-fix" type="text" placeholder="Address" name="address"/>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">City/Town</label>
			<div class="input-icon">
				<i class="fa fa-location-arrow"></i>
				<input class="form-control placeholder-no-fix" type="text" placeholder="City/Town" name="city"/>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Country</label>
			<select name="country" id="select2_sample4" class="select2 form-control">
				<option value=""></option>
				<option value="AF">Afghanistan</option>
				<option value="AL">Albania</option>
				<option value="DZ">Algeria</option>
				<option value="AS">American Samoa</option>
				<option value="AD">Andorra</option>
				<option value="AO">Angola</option>
				<option value="AI">Anguilla</option>
				<option value="AQ">Antarctica</option>
				<option value="AR">Argentina</option>
				<option value="AM">Armenia</option>
				<option value="AW">Aruba</option>
				<option value="AU">Australia</option>
				<option value="AT">Austria</option>
				<option value="AZ">Azerbaijan</option>
				<option value="BS">Bahamas</option>
				<option value="BH">Bahrain</option>
				<option value="BD">Bangladesh</option>
				<option value="BB">Barbados</option>
				<option value="BY">Belarus</option>
				<option value="BE">Belgium</option>
				<option value="BZ">Belize</option>
				<option value="BJ">Benin</option>
				<option value="BM">Bermuda</option>
				<option value="BT">Bhutan</option>
				<option value="BO">Bolivia</option>
				<option value="BA">Bosnia and Herzegowina</option>
				<option value="BW">Botswana</option>
				<option value="BV">Bouvet Island</option>
				<option value="BR">Brazil</option>
				<option value="IO">British Indian Ocean Territory</option>
				<option value="BN">Brunei Darussalam</option>
				<option value="BG">Bulgaria</option>
				<option value="BF">Burkina Faso</option>
				<option value="BI">Burundi</option>
				<option value="KH">Cambodia</option>
				<option value="CM">Cameroon</option>
				<option value="CA">Canada</option>
				<option value="CV">Cape Verde</option>
				<option value="KY">Cayman Islands</option>
				<option value="CF">Central African Republic</option>
				<option value="TD">Chad</option>
				<option value="CL">Chile</option>
				<option value="CN">China</option>
				<option value="CX">Christmas Island</option>
				<option value="CC">Cocos (Keeling) Islands</option>
				<option value="CO">Colombia</option>
				<option value="KM">Comoros</option>
				<option value="CG">Congo</option>
				<option value="CD">Congo, the Democratic Republic of the</option>
				<option value="CK">Cook Islands</option>
				<option value="CR">Costa Rica</option>
				<option value="CI">Cote d'Ivoire</option>
				<option value="HR">Croatia (Hrvatska)</option>
				<option value="CU">Cuba</option>
				<option value="CY">Cyprus</option>
				<option value="CZ">Czech Republic</option>
				<option value="DK">Denmark</option>
				<option value="DJ">Djibouti</option>
				<option value="DM">Dominica</option>
				<option value="DO">Dominican Republic</option>
				<option value="EC">Ecuador</option>
				<option value="EG">Egypt</option>
				<option value="SV">El Salvador</option>
				<option value="GQ">Equatorial Guinea</option>
				<option value="ER">Eritrea</option>
				<option value="EE">Estonia</option>
				<option value="ET">Ethiopia</option>
				<option value="FK">Falkland Islands (Malvinas)</option>
				<option value="FO">Faroe Islands</option>
				<option value="FJ">Fiji</option>
				<option value="FI">Finland</option>
				<option value="FR">France</option>
				<option value="GF">French Guiana</option>
				<option value="PF">French Polynesia</option>
				<option value="TF">French Southern Territories</option>
				<option value="GA">Gabon</option>
				<option value="GM">Gambia</option>
				<option value="GE">Georgia</option>
				<option value="DE">Germany</option>
				<option value="GH">Ghana</option>
				<option value="GI">Gibraltar</option>
				<option value="GR">Greece</option>
				<option value="GL">Greenland</option>
				<option value="GD">Grenada</option>
				<option value="GP">Guadeloupe</option>
				<option value="GU">Guam</option>
				<option value="GT">Guatemala</option>
				<option value="GN">Guinea</option>
				<option value="GW">Guinea-Bissau</option>
				<option value="GY">Guyana</option>
				<option value="HT">Haiti</option>
				<option value="HM">Heard and Mc Donald Islands</option>
				<option value="VA">Holy See (Vatican City State)</option>
				<option value="HN">Honduras</option>
				<option value="HK">Hong Kong</option>
				<option value="HU">Hungary</option>
				<option value="IS">Iceland</option>
				<option value="IN">India</option>
				<option value="ID">Indonesia</option>
				<option value="IR">Iran (Islamic Republic of)</option>
				<option value="IQ">Iraq</option>
				<option value="IE">Ireland</option>
				<option value="IL">Israel</option>
				<option value="IT">Italy</option>
				<option value="JM">Jamaica</option>
				<option value="JP">Japan</option>
				<option value="JO">Jordan</option>
				<option value="KZ">Kazakhstan</option>
				<option value="KE">Kenya</option>
				<option value="KI">Kiribati</option>
				<option value="KP">Korea, Democratic People's Republic of</option>
				<option value="KR">Korea, Republic of</option>
				<option value="KW">Kuwait</option>
				<option value="KG">Kyrgyzstan</option>
				<option value="LA">Lao People's Democratic Republic</option>
				<option value="LV">Latvia</option>
				<option value="LB">Lebanon</option>
				<option value="LS">Lesotho</option>
				<option value="LR">Liberia</option>
				<option value="LY">Libyan Arab Jamahiriya</option>
				<option value="LI">Liechtenstein</option>
				<option value="LT">Lithuania</option>
				<option value="LU">Luxembourg</option>
				<option value="MO">Macau</option>
				<option value="MK">Macedonia, The Former Yugoslav Republic of</option>
				<option value="MG">Madagascar</option>
				<option value="MW">Malawi</option>
				<option value="MY">Malaysia</option>
				<option value="MV">Maldives</option>
				<option value="ML">Mali</option>
				<option value="MT">Malta</option>
				<option value="MH">Marshall Islands</option>
				<option value="MQ">Martinique</option>
				<option value="MR">Mauritania</option>
				<option value="MU">Mauritius</option>
				<option value="YT">Mayotte</option>
				<option value="MX">Mexico</option>
				<option value="FM">Micronesia, Federated States of</option>
				<option value="MD">Moldova, Republic of</option>
				<option value="MC">Monaco</option>
				<option value="MN">Mongolia</option>
				<option value="MS">Montserrat</option>
				<option value="MA">Morocco</option>
				<option value="MZ">Mozambique</option>
				<option value="MM">Myanmar</option>
				<option value="NA">Namibia</option>
				<option value="NR">Nauru</option>
				<option value="NP">Nepal</option>
				<option value="NL">Netherlands</option>
				<option value="AN">Netherlands Antilles</option>
				<option value="NC">New Caledonia</option>
				<option value="NZ">New Zealand</option>
				<option value="NI">Nicaragua</option>
				<option value="NE">Niger</option>
				<option value="NG">Nigeria</option>
				<option value="NU">Niue</option>
				<option value="NF">Norfolk Island</option>
				<option value="MP">Northern Mariana Islands</option>
				<option value="NO">Norway</option>
				<option value="OM">Oman</option>
				<option value="PK">Pakistan</option>
				<option value="PW">Palau</option>
				<option value="PA">Panama</option>
				<option value="PG">Papua New Guinea</option>
				<option value="PY">Paraguay</option>
				<option value="PE">Peru</option>
				<option value="PH">Philippines</option>
				<option value="PN">Pitcairn</option>
				<option value="PL">Poland</option>
				<option value="PT">Portugal</option>
				<option value="PR">Puerto Rico</option>
				<option value="QA">Qatar</option>
				<option value="RE">Reunion</option>
				<option value="RO">Romania</option>
				<option value="RU">Russian Federation</option>
				<option value="RW">Rwanda</option>
				<option value="KN">Saint Kitts and Nevis</option>
				<option value="LC">Saint LUCIA</option>
				<option value="VC">Saint Vincent and the Grenadines</option>
				<option value="WS">Samoa</option>
				<option value="SM">San Marino</option>
				<option value="ST">Sao Tome and Principe</option>
				<option value="SA">Saudi Arabia</option>
				<option value="SN">Senegal</option>
				<option value="SC">Seychelles</option>
				<option value="SL">Sierra Leone</option>
				<option value="SG">Singapore</option>
				<option value="SK">Slovakia (Slovak Republic)</option>
				<option value="SI">Slovenia</option>
				<option value="SB">Solomon Islands</option>
				<option value="SO">Somalia</option>
				<option value="ZA">South Africa</option>
				<option value="GS">South Georgia and the South Sandwich Islands</option>
				<option value="ES">Spain</option>
				<option value="LK">Sri Lanka</option>
				<option value="SH">St. Helena</option>
				<option value="PM">St. Pierre and Miquelon</option>
				<option value="SD">Sudan</option>
				<option value="SR">Suriname</option>
				<option value="SJ">Svalbard and Jan Mayen Islands</option>
				<option value="SZ">Swaziland</option>
				<option value="SE">Sweden</option>
				<option value="CH">Switzerland</option>
				<option value="SY">Syrian Arab Republic</option>
				<option value="TW">Taiwan, Province of China</option>
				<option value="TJ">Tajikistan</option>
				<option value="TZ">Tanzania, United Republic of</option>
				<option value="TH">Thailand</option>
				<option value="TG">Togo</option>
				<option value="TK">Tokelau</option>
				<option value="TO">Tonga</option>
				<option value="TT">Trinidad and Tobago</option>
				<option value="TN">Tunisia</option>
				<option value="TR">Turkey</option>
				<option value="TM">Turkmenistan</option>
				<option value="TC">Turks and Caicos Islands</option>
				<option value="TV">Tuvalu</option>
				<option value="UG">Uganda</option>
				<option value="UA">Ukraine</option>
				<option value="AE">United Arab Emirates</option>
				<option value="GB">United Kingdom</option>
				<option value="US">United States</option>
				<option value="UM">United States Minor Outlying Islands</option>
				<option value="UY">Uruguay</option>
				<option value="UZ">Uzbekistan</option>
				<option value="VU">Vanuatu</option>
				<option value="VE">Venezuela</option>
				<option value="VN">Viet Nam</option>
				<option value="VG">Virgin Islands (British)</option>
				<option value="VI">Virgin Islands (U.S.)</option>
				<option value="WF">Wallis and Futuna Islands</option>
				<option value="EH">Western Sahara</option>
				<option value="YE">Yemen</option>
				<option value="ZM">Zambia</option>
				<option value="ZW">Zimbabwe</option>
			</select>
		</div>
		<p>
			 Enter your account details below:
		</p>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Username</label>
			<div class="input-icon">
				<i class="fa fa-user"></i>
				<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username"/>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<div class="input-icon">
				<i class="fa fa-lock"></i>
				<input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password" placeholder="Password" name="password"/>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Re-type Your Password</label>
			<div class="controls">
				<div class="input-icon">
					<i class="fa fa-check"></i>
					<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Re-type Your Password" name="rpassword"/>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label>
			<input type="checkbox" name="tnc"/> I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>
			</label>
			<div id="register_tnc_error">
			</div>
		</div>
		<div class="form-actions">
			<button id="register-back-btn" type="button" class="btn">
			<i class="m-icon-swapleft"></i> Back </button>
			<button type="submit" id="register-submit-btn" class="btn blue pull-right">
			Sign Up <i class="m-icon-swapright m-icon-white"></i>
			</button>
		</div>
	</form>
</div>
<div class="copyright">
	 <a href="http://icmyazilim.com"></a>2014 &copy; ICM Software.
</div>
<script src="<?php echo ASSETS; ?>plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="<?php echo ASSETS; ?>plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="<?php echo ASSETS; ?>plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo ASSETS; ?>plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?php echo ASSETS; ?>plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo ASSETS; ?>plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo ASSETS; ?>plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?php echo ASSETS; ?>plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?php echo ASSETS; ?>plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?php echo ASSETS; ?>plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo ASSETS; ?>plugins/select2/select2.min.js"></script>
<script src="<?php echo ASSETS; ?>scripts/app.js" type="text/javascript"></script>
<script src="<?php echo ASSETS; ?>scripts/login-soft.js" type="text/javascript"></script>
<script>
		jQuery(document).ready(function() {
		  App.init();
		  Login.init();
		});
	</script>
<script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-37564768-1']);  _gaq.push(['_setDomainName', 'keenthemes.com']);  _gaq.push(['_setAllowLinker', true]);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script></body>
</html>