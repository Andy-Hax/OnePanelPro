<?php
ini_set("display_errors",0);
error_reporting(0);

$functionsFile = "../includes/functions.php";
include($functionsFile);
$introInfo = loadIntro();
if($introInfo['active'] && $introInfo['path'] != "")
{
	header('Location: ../intro-videos/' . $introInfo['path']);
	exit;
}
else {
	header('Location: ../intro-videos/blank.mp4');
	exit;
}
