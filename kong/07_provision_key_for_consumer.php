<?php
/**
 * Created by PhpStorm.
 * User: Flo
 * Date: 26.09.2017
 * Time: 18:50
 */

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"http://localhost:8001/consumers/Jason/key-auth");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,"key=ENTER_KEY_HERE");

// in real life you should use something like:
// curl_setopt($ch, CURLOPT_POSTFIELDS,
//          http_build_query(array('postvar1' => 'value1')));

// receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec ($ch);

curl_close ($ch);

// further processing ....
var_dump($server_output);