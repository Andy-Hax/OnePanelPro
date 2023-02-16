<?php
ini_set("display_errors", 0);
error_reporting(0);
$functionsFile = "../includes/functions.php";
include($functionsFile);
$ltqInfo = loadLTQOptions();

$urlParts = explode("/", $_SERVER['REQUEST_URI']);
$build = false;
$forwardPath = "";
foreach ($urlParts as $part) {
	if ($build) {
		$forwardPath .= "/" . $part;
	}
	if ($part == "ltq") {
		$build = true;
	}
}
$proxy = true;
include "../apicall.php";