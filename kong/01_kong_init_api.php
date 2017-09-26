<?php

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"http://localhost:8001/apis/");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,"name=example-api&hosts=example.com&upstream_url=http://httpbin.org");

// in real life you should use something like:
// curl_setopt($ch, CURLOPT_POSTFIELDS,
//          http_build_query(array('postvar1' => 'value1')));

// receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec ($ch);

curl_close ($ch);

// further processing ....
var_dump($server_output);