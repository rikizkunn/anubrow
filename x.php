<?php
//Created with <3 by rzyz gavini
//inspired by bocom.js

$header = array();
$header[] = 'X-LIBRARY: okhttp+network-api';
$header[] = 'Authorization: Basic dGhlc2FpbnRzYnY6ZGdDVnlhcXZCeGdN';
$header[] = 'User-Agent: Booking.App/22.9 Android/7.1.2; Type: mobile; AppStore: google; Brand: Xiaomi; Model: Mi A1;';
$header[] = 'X-Booking-API-Version: 1';
$header[] = 'Content-Encoding: gzip';
$header[] = 'Content-Type: application/x-gzip; contains="application/json"; charset=utf-8';
$header[] = 'Host: iphone-xml.booking.com';

function add_dot($str){ 
		if ((strlen($str) > 1) && (strlen($str) < 31)) { 
			$ca = preg_split("//",$str); 
			array_shift($ca); 
			array_pop($ca); 
			$head = array_shift($ca); 
			$res = add_dot(join('',$ca)); 
			$result = array(); 
			foreach($res as $val){ 
				$result[] = $head . $val; 
				$result[] = $head . '.' .$val; 
			} 
			return $result; 
		} 
		return array($str); 
	} 



function reg($email, $password, $header){
$data = json_encode(array(
													"email" => $email,
													"password" => $password,
													"return_auth_token" => 1));		

$ngocok = rand(1000, 5000);
$url = 'https://iphone-xml.booking.com/json/mobile.createUserAccount?&user_os=7.1.2&user_version=22.9-android&device_id=83fe'.$ngocok.'-2f56-456f-9eab-a'.$ngocok.'ab7'.$ngocok.'&network_type=4g&languagecode=en-us&display=normal_xxhdpi&affiliate_id=337852';

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
	$x = curl_exec($ch);
	curl_close($ch);
	
	if(strpos($x, "auth_token")){
	return array($x, $data, "registered");	
	} else if (strpos($x, "Authentication token is invalid")){
		echo "[!] CHANGE IP ON OFF AIRPLANE MOD [+]\n";
		echo "[!] IF USE VPN CHANGE COUNTRY [!]";
			sleep(2);
	} else if (strpos($x, "USER_ALREADY_EXISTS")) {
			echo "[!] EMAIL REGISTERED\n";
			sleep(2);
	} else {
			echo "[X] FAILED REGISTER\n";
			sleep(2);
	}
		
	};


function add($token, $header, $email, $password, $save){

	$hotel = array('3342092','1102392','4984319');

	foreach($hotel as $hotelid) {

$ngocok = rand(1000, 5000);
	$url = 'https://mobile-apps.booking.com/json/mobile.Wishlist?wishlist_action=create_new_wishlist&name=Jakarta&hotel_id='.$hotelid.'&list_dest_id=city%3A%3A-2679652&use_list_details=1&checkin=2020-06-27&checkout=2020-06-28&num_rooms=1&num_adults=2&num_children=0&user_os=8.0.0&user_version=22.9-android&device_id=83fe'.$ngocok.'-2f56-456f-9eab-a36510ab7'.$ngocok.'&network_type=4g&auth_token='.$token.'&languagecode=id&display=normal_xxhdpi&affiliate_id=337862';
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
	curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
	$x = curl_exec($ch);
	curl_close($ch);
	$x1 = json_decode($x, 1);
	
	if(strpos($x, "reward_given_wallet")){				
					echo "[!] ".strip_tags($x1["gta_add_three_items_campaign_status"]["modal_body_text"])."\n";
			
				echo "[!] Check for Result on Account.txt\n";
				$fp = fopen($save, 'a+');
				fwrite($fp, $email."|".$password."\n");
				fclose($fp);
				
	}
	}
}

@@system(clear);
echo "+-NETWEZEN REVOLUTION-+\n";
echo "+-Booking.com-+\n";
echo "+-Final Support All fucking vpn-+\n";
echo "[!] use vpn for get more rewards [!]\n\n";
sleep(2);
echo "[?] Email Gmail : ";
$email = trim(fgets(STDIN));
$user = explode('@', $email);
echo "[?] Password : ";
$password = trim(fgets(STDIN));
echo "[?] Save Result (res.txt) : ";
$save = trim(fgets(STDIN));
@@system(clear);

$res = add_dot($user[0]);	   
foreach($res as $ewe){	
				$email = "$ewe@gmail.com"	;
				echo "[!] Registering : $email...\n";
				$token = reg($email, $password, $header);							
				if($token[2] == "registered"){								
				$token1 = json_decode($token[0], 1);
				$result = json_decode($token[1], 1);
		
				echo '[+] TOKEN : '.$token1["auth_token"].''."\n";
				echo "[!] Proses Klaim..\n";
				echo add($token1["auth_token"], $header, $email, $password, $save);
				echo "[+] Sukses : ".$email."|".$password."\n";
				echo "[+] CHECK $save [!]\n";
				
				echo "++++++++++++++++++++++++++++++++++++++++++\n";
										
			
} 
}

?>