<?php
ini_set("display_errors",0);
error_reporting(0);
$functionsFile = "../includes/functions.php";
include($functionsFile);
$notificationInfo = loadAllNotifications(true);
$returnable = array();
foreach($notificationInfo as $notification)
{
	$toAdd = new stdClass();
	$toAdd->id = $notification['id'];
	$toAdd->notification = $notification['text'];
	$returnable[] = $toAdd;
}
echo json_encode($returnable);