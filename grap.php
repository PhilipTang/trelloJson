<?php

$listId = '58220749534c0d69766c5bac';
$output = 'output.md';
$html = 'output.html';
$key = $argv[1];
$token = $argv[2];

$url = sprintf('https://api.trello.com/1/lists/58220749534c0d69766c5bac?cards=open&card_fields=name,desc&fields=name&key=%s&token=%s', $key, $token);

$json = file_get_contents($url);
$data = json_decode($json, true);
$cards = $data['cards'];

$writeIn = '';

foreach($cards as $row) {
	$writeIn .= '## ' . $row['name'] . "\n\n";
	$writeIn .= $row['desc'] . "\n\n";
	$writeIn .= "\n-------------------\n";
}

file_put_contents($output, $writeIn);

$head =<<<EOF
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="zh-CN">
<head>
	<meta charset="UTF-8" />
</head>
<body>
EOF;
$bottom = '</body></html>';

$body = '';
exec("markdown $output", $sysout);
foreach($sysout as $value) {
	$body .= $value . "\n";
}

file_put_contents($html, $head . $body . $bottom);

