<?php

namespace user;

use libs\Db;

class Input {
	public function handle() {
		
		$response = $_POST;
		
		session_start();
		if (!isset($_SESSION['id'])) {
			// �����O�C��
			header('Location: /index.html?next='.rawurlencode('user/inputl.html'));
		}
		
		$id = $_SESSION['id'];
		
		$pdo = Db::getInstance();
		
		$sql = "SELECT * FROM M_USER WHERE ID= ? ";
		
		$result = $pdo->selectQuery($sql, array($id));
		$row = $result->fetch();
		$user = (object)$row;

		$result->closeCursor();	// �ڑ����N���[�Y����
		
		$response['user'] = $user;
		
		return $response;
	}
}