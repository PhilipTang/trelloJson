<?php

$list = '英雄榜【完成】';
$file = 'export.json';
$output = 'output'.date('Ymd').'.md';

$json = file_get_contents($file);

$data = json_decode($json, true);

$lists = $data['lists'];
$cards = $data['cards'];

$listId = '';
foreach($lists as $row) {
	if ($row['name'] == $list) {
		$listId = $row['id'];
	}
}

$writeIn = '';

foreach($cards as $row) {
	if ($row['idList'] == $listId) {
		$writeIn .= '### ' . $row['name'] . "\n\n";
		$writeIn .= $row['desc'] . "\n\n";
	}
}

file_put_contents($output, $writeIn);


