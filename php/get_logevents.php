<?php

//This file is autogenerated. See modules.json and autogenerator.py for details

/*
    get_logevents.php

    MediaWiki API Demos
    Demo of `Logevents` module: Get the three most recent logevents.

    MIT License
*/

$endPoint = "https://en.wikipedia.org/w/api.php";
$params = [
    "action" => "query",
    "format" => "json",
    "list" => "logevents",
    "lelimit" => "3"
];

$url = $endPoint . "?" . http_build_query( $params );

$ch = curl_init( $url );
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
$output = curl_exec( $ch );
curl_close( $ch );

$result = json_decode( $output, true );

foreach( $result["query"]["logevents"] as $k => $v ) {
    echo( "There is " . $v["type"] . " log for page " . $v["title"] . "\n" );
}