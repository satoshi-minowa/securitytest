<?php

namespace user;

use libs\Db;

class Input {
	public function handle() {
		
		$response = $_POST;
		
		session_start();
		if (!isset($_SESSION['id'])) {
			// 未ログイン
			header('Location: /index.html?next='.rawurlencode('user/inputl.html'));
		}
		
		$id = $_SESSION['id'];
		
		$pdo = Db::getInstance();
		
		$sql = "SELECT * FROM M_USER WHERE ID= ? ";
		
		$result = $pdo->selectQuery($sql, array($id));
		$row = $result->fetch();
		$user = (object)$row;

		$result->closeCursor();	// 接続をクローズする
		
		$response['user'] = $user;
		
		return $response;
	}
}