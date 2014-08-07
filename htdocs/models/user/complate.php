<?php

namespace user;

use libs\Db;

class Complate {
	public function handle() {
		
		$response = $_REQUEST;
		
		session_start();
		if (!isset($_SESSION['id'])) {
			// 未ログイン
			header('Location: /index.html?next='.rawurlencode('user/input.html'));
		}
		
		// DB更新
		$id =  $response['id'];
		$pass = $response['password'];
		$sid = $_SESSION['id'];
		$sql = "UPDATE M_USER SET id = '$id', password = '$pass' WHERE id = '$sid';";
		$con = Db::getConnection();
		$con->updateQuery($sql);
		
		// セッション情報更新
		$_SESSION['id'] = $id;
		
		return $response;
	}
}