<?php

namespace user;

use libs\Db;

class Input {
	public function handle() {
		
		$response = $_REQUEST;
		
		session_start();
		if (!isset($_SESSION['id'])) {
			// –¢ƒƒOƒCƒ“
			header('Location: /index.html?next='.rawurlencode('user/inputl.html'));
		}
		
		$id = $_SESSION['id'];
		$sql = "SELECT * FROM M_USER WHERE ID='$id'";
		$conn = Db::getConnection();
		$result = $conn->selectQuery($sql);
		$user = $result->fetch_object();
		$response['user'] = $user;
		
		return $response;
	}
}