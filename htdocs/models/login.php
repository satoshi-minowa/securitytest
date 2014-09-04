<?php

use libs\Db;

class Login {

	public function handle() {
	
		$response = $_POST;
		
		$id       = $response['id'];
		$password = $response['password'];
		
		//接続
		$pdo = Db::getInstance();
		$sql = "SELECT * FROM M_USER WHERE ID= ? AND password= ?";

		$result = $pdo->selectQuery($sql, array($id, $password));
		
		//件数を取得
		$cnt = $result->rowCount();
		if ($cnt != 1) {
			// ログイン失敗
			$response['errors'] = "アカウントまたはパスワードが異なります。";
			$response['include_path'] = 'index';
			return $response;
		}
		$row = $result->fetch();

		$user = (object)$row;
		
		$result->closeCursor();	// 接続をクローズする
		
		// ログイン成功
		session_start();
		$_SESSION['id'] = $user->id;
		
		// ログイン後画面に飛ばす(遷移先が指定されていればそこへ飛ばす)
		if (empty($_POST['next'])) {
			$next = '/top.html';
		} else {
			$next = $_POST['next'];
		}
		
		//改行を除去
		$next = str_replace( array( "\r", "\n" ), "", $next);
		
		//自サイトのホスト名取得
		$server_name = $_SERVER["SERVER_NAME"];
		
		header('Location: http://' .$server_name. $next);
		exit;
	}
}