<?php
	$data = file_get_contents("http://sms.g8ict.com/api/SendSMS?user=kibreserv&password=HuoHA1.84pj&sender=kibreservnonbrand&SMSText=hello&GSM=01719193618&SmsType=ASCII");
	print_r($data);
?>