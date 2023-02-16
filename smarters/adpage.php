<?php
$functionsFile = "../includes/functions.php";
include($functionsFile);
$adInfo = loadAllAds(true);
$output = '{
        "result":"success",
        "data":{
            "vertical":{
                "adds":[';
$prefixUrl = $GLOBALS['panelroot'] . "ad-images/";

foreach ($adInfo as $thisAd) 
{
    $path = $prefixUrl . $thisAd['path'];
    $orignal = $path;
    $thumbpath = $path;
    {
			$output.='{
                        "id":"' . $thisAd['id'] . '",
                        "title":"theprogram_test",
                        "type":"url",
                        "link":"https:\/\/google.com",
                        "description":"theprogram_test",
                        "orderby":"0",
                        "position":"vertical",
                        "extension":"png",
                        "createdon":"2022-03-31 05:11:38",
                        "path": "'.$path.'",
                        "orignal": "'.$orignal.'",
                        "thumbpath": "'.$thumbpath.'"
                        },';
    }
}
$x = substr($output, -1);
if($x == ",")
{
    $output=substr_replace($output,"",-1);
}
$output.='],
                    "count":1
        }
    }
}
';
echo $output;
