<?php
require 'function.php';

$data = json_decode($_POST['data'], true);

$type = $data['type'];
$from = $data['from'];
$pesan = $data['pesan'];


if ($data) {
	if ($type == 'chat') {
		switch ($pesan) {
			case '!ping':
				echo "Pong";
				break;
			case 'pesan1':
				$datanya = [
					'type' => 'message',
					'number' => $from,
					'message' => 'Hellohhhh'
				];
				sendMessage($datanya);
				break;
			case 'list':
				$datanya = [
					"number" => $from,
					"SectionTitle" => "Section title",
					"list" => [
						[
							"title" => "List item 1",
							"description" => "Description 1"
						],
						[
							"title" => "List item 2"
						]
					],
					"ListBody" => "Body list",
					"btnText" => "Button",
					"title" => "Titlenya",
					"footer" => "Footernya"
				];
				sendList($datanya);
				break;
			case 'image':
				$datanya = [
					'type' => 'image',
					'number' => $from,
					'path' => 'https://i.picsum.photos/id/822/536/354.jpg?hmac=9SpWynDccCitrWhlYnRoAmb-sYoLNpUVQHmLsbbOLm4',
					'caption' => 'Test image'
				];
				sendMedia($datanya);
				break;
			case 'audio':
				$datanya = [
					'type' => 'audio',
					'number' => $from,
					'path' => 'https://lgbmarket.my.id/song.mp3'
				];
				sendMedia($datanya);
				break;
			case 'document':
				$datanya = [
					'type' => 'document',
					'number' => $from,
					'path' => 'http://lgbmarket.my.id/whatsapp_bot/document/asabri_link.pdf'
				];
				sendMedia($datanya);
				break;
			case 'video':
				$datanya = [
					'type' => 'video',
					'number' => $from,
					'path' => 'https://lgbmarket.my.id/sample.mp4'
				];
				sendMedia($datanya);
				break;
			case 'button':
				$datanya = [
					'number' => $from,
					'message' => 'Ok test',
					'title' => 'Title nya',
					'button' => [
						[
							'body' => 'btn1'
						],
						[
							'body' => 'btn2'
						],
					],
					'footer' => 'footer nya'
				];

				echo sendButton($datanya);
				break;
		}
	}

	if ($type == 'list_response') {
		echo "Ok list nya " . $pesan;
	}
}
