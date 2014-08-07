<?php

use libs\Db;

class Login {

	public function handle() {
	
		$response = $_REQUEST;
		
		$id = $response['id'];
		$sql = "SELECT * FROM M_USER WHERE ID='$id';";
		$conn = Db::getConnection();
		$result = $conn->selectQuery($sql);
		if ($result->num_rows != 1) {
			// ログイン失敗
			$response['errors'] = "アカウントが存在しません";
			$response['include_path'] = 'index';
			return $response;
		}
		$user = $result->fetch_object();
		if ($user->password != $response['password']) {
			$response['errors'] = "パスワードが違います";
			$response['include_path'] = 'index';
			return $response;
		}
		
		// ログイン成功
		session_start();
		$_SESSION['id'] = $user->id;
		
		$result->close();
		
		// ログイン後画面に飛ばす(遷移先が指定されていればそこへ飛ばす)
		if (empty($_REQUEST['next'])) {
			$next = '/top.html';
		}
		header('Location: ' . $next);
		exit;
	}
}