<?php
$functionsFile = "../includes/functions.php";
include($functionsFile);
$notificationInfo = loadAllNotifications(true);
foreach ($notificationInfo as $note) {
	$data[] = ['Title' => $note['title'], 'Description' => $note['text'], 'CreateDate' => $note['date_added']];
}

$jdata = json_encode($data);
echo '{"status":true,' . "\r\n\t\t" . '"response":' . "\r\n\t\t" . $jdata . "\r\n\t\t" . '}';