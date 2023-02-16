<?php
$functionsFile = "../includes/functions.php";
include($functionsFile);
error_reporting(0);
if(!is_dir("tmp"))
{
	mkdir ("tmp");
}
else{
	$files = glob('tmp/*'); // get all file names
	foreach($files as $file){ // iterate files
	  if(is_file($file)) {
		unlink($file); // delete file
	  }
}
}
if (file_exists('ovpn.zip')) {
	unlink('ovpn.zip');
}
$vpnInfo = loadAllVpn(true);
foreach($vpnInfo as $thisVpn)
{
	//First check the extension!
	$ext = pathinfo($thisVpn['path'], PATHINFO_EXTENSION);
	if(strtolower($ext) == "ovpn")
	{
		if(strpos($thisVpn['path'], "://") !== false){
			//already a full URL
			$url = $thisVpn['path'];
		}
		else{
			$url = "https://andyhax.uk/onepanel/ovpn-files/" . $thisVpn['path'];
		}
		file_put_contents("tmp/" . $thisVpn['location'] . ".ovpn",file_get_contents($url));
	}
}
$rootPath = realpath('tmp');
$zip = new ZipArchive();
$zip->open('ovpn.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);
$filesToDelete = [];
$files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($rootPath), RecursiveIteratorIterator::LEAVES_ONLY);

foreach ($files as $name => $file) {
	if (!$file->isDir()) {
		$filePath = $file->getRealPath();
		$relativePath = substr($filePath, strlen($rootPath) + 1);
		$zip->addFile($filePath, $relativePath);
	}
}

$zip->close();
$filename = 'ovpn.zip';

if (file_exists($filename)) {
	header('Content-Type: application/zip');
	header('Content-Disposition: attachment; filename="' . basename($filename) . '"');
	header('Content-Length: ' . filesize($filename));
	flush();
	readfile($filename);
	unlink($filename);
	$files = glob('tmp/*');
	foreach($files as $file){ 
	  if(is_file($file)) {
		unlink($file); 
	  }
}
}
else {
	exit();
}
