<?php
ini_set("display_errors", 0);
error_reporting(0);
$functionsFile = "../includes/functions.php";
include($functionsFile);
$imInfo = loadImPlayerOptions();
$allDns = array();
if ($imInfo['proxyTraffic'] == 1  || $imInfo['proxyTraffic'] == 2) {
    $subfolder = "proxy";
	$dns = $GLOBALS['panelroot'] . $subfolder .  "/";
    $allDns[] = $dns;
} else {
    $dnsInfo = loadAllDNS(true);
    foreach ($dnsInfo as $thisDns) {

        $allDns[] = $thisDns['portal'];
    }
}
if (@$_REQUEST['f'] == "a") {
    $count = 0;
    echo '{"status":"true", "data":[ ';
    foreach ($allDns as $thisDns) {
        if ($count) {
            echo ",";
        }
        echo '{"portal_type":"xc","baseUrl":"' . $thisDns . '"}';
        $count++;
    }
    echo ']}';
}
