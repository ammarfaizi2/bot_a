<?php


$h = file_get_contents("php://input");

$h = json_decode($h, true);

$reply = "Command tidak dikenal";

if ($h["message"]["text"] === "/start") {
	$reply = "Berhasil melakukan start";
}


$ch = curl_init("https://api.telegram.org/bot631015066:AAG0bRA-xKIxxqb4qwMnk-O4rPVPFCpIV24/sendMessage");
curl_setopt_array($ch, [
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_POST => true,
	CURLOPT_POSTFIELDS => http_build_query([
		"chat_id" => $h["message"]["from"]["id"],
		"text" => "https://telegram.neon.web.id/a.txt"
	]),
	CURLOPT_SSL_VERIFYPEER => false,
	CURLOPT_SSL_VERIFYHOST => false
]);
$out = curl_exec($ch);
curl_close($ch);

file_put_contents("last_log.txt", $out);