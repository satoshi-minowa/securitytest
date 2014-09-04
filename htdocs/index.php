<?php
// オートロード設定
spl_autoload_register();

// ディスパッチ
if (!isset($_GET['url'])) {
	$url = 'index.html';
} else {
	$url = $_GET['url'];
}

//ディレクトリ・トラバーサル対策*****************************************************************************

//ディレクトリ名リスト(ホワイトリスト形式でチェックする為)
$dir_list = array("user");

//ディレクトリパスを取得
$dir = dirname($url);

//ファイル名を取得
$file_name = basename($url);

//$url内にディレクトリパスが無い場合、$dirには「.」が入っているので除去
if ($dir == ".") {
    $dir="";
}

//想定していないディレクトリ名の場合
if(!empty($dir) && !in_array($dir, $dir_list)){
   die('URLをお確かめ下さい。');
}

//ファイル名から拡張子を除く
$file_path = strstr($file_name, '.', true);

//ファイル名を英数字に限定(ヌルバイト等の対策)
if (!preg_match('/\A[a-z0-9]+\z/ui', $file_path)) {
    die('ファイル名には英数字のみ指定できます');
}

if(!empty($dir)) {
    $include_path = $dir . "/" . $file_path;
} else {
    $include_path = $file_path;
}
//ディレクトリ・トラバーサル対策*****************************************************************************

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