<?php

$listId = '58220749534c0d69766c5bac';
$output = 'output.md';
$key = $argv[1];
$token = $argv[2];
$html= $argv[3];

$url = sprintf('https://api.trello.com/1/lists/58220749534c0d69766c5bac?cards=open&card_fields=name,desc&fields=name&key=%s&token=%s', $key, $token);

$json = file_get_contents($url);
$data = json_decode($json, true);
$cards = $data['cards'];

$writeIn = '';
$writeIn .= "# 赏花 赏月 赏规条\n\n";
$writeIn .= "\n-------------------\n";

foreach($cards as $row) {
	$writeIn .= '## ' . $row['name'] . "\n\n";
	$writeIn .= "\n-------------------\n";
	$writeIn .= $row['desc'] . "\n\n";
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
$bottom = '<br><hr><br><br>©️ 2016 雨天晴57班</body></html>';

$body = '';
exec("/usr/local/bin/markdown $output", $sysout);
foreach($sysout as $value) {
	$body .= $value . "\n";
}

file_put_contents($html, $head . $body . $bottom);

