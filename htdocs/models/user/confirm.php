<?php

namespace user;

use stdClass;

class Confirm {
	public function handle() {
		
		$response = $_REQUEST;
		
		session_start();
		if (!isset($_SESSION['id'])) {
			// –¢ƒƒOƒCƒ“
			header('Location: /index.html?next='.rawurlencode('user/input.html'));
		}
		
		$user = new stdClass();
		$user->id = $response['id'];
		$user->password = $response['password'];
		$response['user'] = $user;
		
		return $response;
	}
}