<?php
require 'vendor/autoload.php';
require 'config.php';

use Curl\Curl;

$curl = new Curl();

function sendMessage(array $dta)
{
	global $curl, $url;
	$curl->setHeader('Content-Type', 'application/json');
	$curl->post($url . '/send-message', [
		'number' => $dta['number'],
		'message' => $dta['message']
	]);
	return json_encode($curl->response);
}

function sendButton(array $dta)
{
	global $curl, $url;
	$curl->setHeader('Content-Type', 'application/json');
	$curl->post($url . '/send-button', $dta);
	return json_encode($curl->response);
}

function sendList(array $dta)
{
	global $curl, $url;
	$curl->setHeader('Content-Type', 'application/json');
	$curl->post($url . '/send-list', $dta);
	return json_encode($curl->response);
}

function sendMedia(array $dta)
{
	global $curl, $url;
	if (!filter_var($dta['path'], FILTER_VALIDATE_URL)) {
		$path = $dta['path'];
		$type = pathinfo($path);
		$data = file_get_contents($path);
		$base64 = base64_encode($data);
		$dta['path'] = $base64;
		$dta['ext'] = $type['extension'];
	}

	$curl->setHeader('Content-Type', 'application/json');
	$curl->post($url . '/send-media', $dta);
	return json_encode($curl->response);
}
