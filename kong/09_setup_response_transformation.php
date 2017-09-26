<?php
/**
 * Created by PhpStorm.
 * User: Flo
 * Date: 26.09.2017
 * Time: 18:50
 */

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"http://localhost:8001/apis/example-api/plugins");
curl_setopt($ch, CURLOPT_POST, 1);


// in real life you should use something like:
curl_setopt($ch, CURLOPT_POSTFIELDS,
    http_build_query(array('name' => 'response-transformer',
                            'config.add.headers[1]'=>'x-new-header:some,value',
                            'config.add.headers[2]' => 'x-another-header:some,value',
                            'config.add.json' => 'new-json-key:some_value, another-json-key:some_value'
        )));

// receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec ($ch);

curl_close ($ch);

// further processing ....
var_dump($server_output);