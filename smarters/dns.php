<?php
ini_set("display_errors", 0);
error_reporting(0);
$functionsFile = "../includes/functions.php";
include($functionsFile);
$smartersInfo = loadSmartersOptions();
if ($smartersInfo['proxyTraffic'] == 1  || $smartersInfo['proxyTraffic'] == 2) {
	$subfolder = "proxy";
	$dns = $GLOBALS['panelroot'] . $subfolder .  "";
} else {
	$dnsInfo = loadAllDNS(true);
	foreach ($dnsInfo as $thisDns) {
		if($dns)
		{
			$dns .= ',';
		}
		$dns .= $thisDns['portal'];
	}
}
$aes = "NB!@#12ZKWd";
$key = $_POST['r'];
$sc = md5(str_replace('\\', '', $dns) . '*' . $aes . '*' . $key);
if (isset($_POST['m']) && isset($_POST['k']) && isset($_POST['sc']) && isset($_POST['u']) && isset($_POST['pw']) && isset($_POST['r']) && isset($_POST['av']) && isset($_POST['dt']) && isset($_POST['d']) && isset($_POST['do'])) {
	echo '{"ftg":true,"status":true,"su":"' . $dns . '","sc":"' . $sc . '","ndd":""}';
} else {
	echo '{"ftg":true,"status":true,"su":"' . $dns . '","sc":"","ndd":""}';
}
