<?php
$functionsFile = "../includes/functions.php";
include($functionsFile);
$notificationInfo = loadAllNotifications(true);
foreach ($notificationInfo as $note) {
	$data[] = ['id' => $note['id'], 'title' => $note['title'], 'description' => $note['text'], 'backdrop' => null, 'reference' => null];
}

echo json_encode($data);
