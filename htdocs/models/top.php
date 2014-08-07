<?php

class Top {
	public function handle() {
		
		$response = array();
		
		session_start();
		if (!isset($_SESSION['id'])) {
			// –¢ƒƒOƒCƒ“
			header('Location: /index.html');
		}
		
		return $response;
	}
}