<?php
$urlParts = explode("/", $_SERVER['REQUEST_URI']);
$build = false;
$forwardPath = "";
foreach ($urlParts as $part) {
	if ($build) {
		$forwardPath .= "/" . $part;
	}
	if ($part == "forward" || $part == "proxy") {
		$build = true;
	}
}
$proxy = true;
include "../apicall.php";
