<?php

namespace user;

use stdClass;

class Confirm {
	public function handle() {
		
		$response = $_POST;
		
		session_start();
		if (!isset($_SESSION['id'])) {
			// 未ログイン
			header('Location: /index.html?next='.rawurlencode('user/input.html'));
		}
		
		//変更後のアカウントとパスワード
		$_SESSION['afterId']       = $response['id'];
		$_SESSION['afterPassword'] = $response['password'];

		$user = new stdClass();
		$user->id = $response['id'];
		
		$response['user'] = $user;
		

		return $response;
	}
}