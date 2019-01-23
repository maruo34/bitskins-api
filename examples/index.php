<?php
require 'vendor/autoload.php';

use Bitskins\BitskinsApi;
use GuzzleHttp\Client;
use ParagonIE\ConstantTime\Base32;
use OTPHP\TOTP;

$bitskinsSecret = 'XKU4EM4KYRJDT4XF';
$api_key = 'c7b372ec-72be-4bfd-adeb-c9361d43fcd0';

$code = TOTP::create($bitskinsSecret)->now();

$api = new BitskinsApi(new Client, $api_key);

$response = $api->getAllItemPrices($code, 570);