<?php
$url = 'https://rest.nexmo.com/sms/json?' . http_build_query(
    [
      'api_key' =>  'edd67578',
      'api_secret' => 'f04d3ea883cbf242',
      'to' => '2347038988434',
      'from' => 'Novapay',
      'text' => 'Hello from Novapay'
    ]
);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);

echo $response;