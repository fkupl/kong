<?php
/**
 * Created by PhpStorm.
 * User: Flo
 * Date: 26.09.2017
 * Time: 18:25
 */

// create curl resource
$ch = curl_init();

// set url
curl_setopt($ch, CURLOPT_URL, "http://localhost:8000/ip");
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Host: example.com'
));

//return the transfer as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// $output contains the output string
$output = curl_exec($ch);
echo $output;
// close curl resource to free up system resources
curl_close($ch);
