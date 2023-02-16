<?php
ini_set("display_errors", 0);
error_reporting(0);

$functionsFile = "../includes/functions.php";
include($functionsFile);
$tiviInfo = loadTiviOptions();
if ($tiviInfo['proxyTraffic'] == 1  || $tiviInfo['proxyTraffic'] == 2) {
	$subfolder = "forward";
	if ($tiviInfo['proxyTraffic'] == 2) {
		$subfolder = "proxy";
	}
	$dns = $GLOBALS['panelroot'] . $subfolder .  "/";
} else {
	$dnsInfo = loadAllDNS(true);
	foreach ($dnsInfo as $thisDns) {
		
		$dns = $thisDns['portal'];
		break;
	}
}
echo $dns;