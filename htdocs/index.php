<?php

// オートロード設定
spl_autoload_register();

// ディスパッチ
if (!isset($_GET['url'])) {
	$url = 'index.html';
} else {
	$url = $_GET['url'];
}
$include_path = strstr($url, '.', true);

// モデル呼び出し
include('./models/' . $include_path . '.php');
$list = explode('/', $include_path);
array_push($list, ucfirst(array_pop($list)));
$class = implode('\\', $list);
$instance = new $class();
$ret = $instance->handle();

// ビュー呼び出し
extract($ret);
include('./views/' . $include_path . '.php');