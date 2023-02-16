<?php
ini_set("display_errors", 0);
error_reporting(0);
$functionsFile = "../includes/functions.php";
include($functionsFile);
$femtoInfo = loadFemtoOptions();
if ($femtoInfo['proxyTraffic'] == 1  || $femtoInfo['proxyTraffic'] == 2) {
	$subfolder = "proxy";
	$dns = $GLOBALS['panelroot'] . $subfolder .  "/";
} else {
	$dnsInfo = loadAllDNS(true);
	foreach ($dnsInfo as $thisDns) {

		$dns = $thisDns['portal'];
		break;
	}
}
$showLive = $femtoInfo['showLive'] ? 1 : 0;
$showSeries = $femtoInfo['showSeries'] ? 1 : 0;
$showVOD = $femtoInfo['showVOD'] ? 1 : 0;
$showEPG = $femtoInfo['showEPG'] ? 1 : 0;
$showContentUpdate = $femtoInfo['showContentUpdate'] ? 1 : 0;
echo '{"latest_version":"true","update_url":"https://google.com","rate_url":"https://carpatic.com","force_update":"false","host":"' . $dns . '","enabled":"1","live":"' . $showLive . '","vod":"' . $showVOD . '","series":"' . $showSeries . '","epg":"' . $showEPG . '","content_update":"' . $showContentUpdate . '"}';
