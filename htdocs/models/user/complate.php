<?php

namespace user;

use libs\Db;

class Complate {
	public function handle() {
		
		session_start();
		if (!isset($_SESSION['id'])) {
			// 未ログイン
			header('Location: /index.html?next='.rawurlencode('user/input.html'));
		}
		
		// DB更新
		$id   = $_SESSION['afterId'];
		$pass = $_SESSION['afterPassword'];
		$sid  = $_SESSION['id'];
		
		$pdo = Db::getInstance();
		$sql = "UPDATE M_USER SET id = ? , password = ? WHERE id = ?;";
		
		$result = $pdo->selectQuery($sql, array($id, $pass, $sid));
		
		// セッション情報更新
		$_SESSION['id'] = $id;

		return array();
	}
}