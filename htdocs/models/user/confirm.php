<?php

namespace user;

use stdClass;

class Confirm {
	public function handle() {
		
		$response = $_POST;
		
		session_start();
		if (!isset($_SESSION['id'])) {
			// �����O�C��
			header('Location: /index.html?next='.rawurlencode('user/input.html'));
		}
		
		//�ύX��̃A�J�E���g�ƃp�X���[�h
		$_SESSION['afterId']       = $response['id'];
		$_SESSION['afterPassword'] = $response['password'];

		$user = new stdClass();
		$user->id = $response['id'];
		
		$response['user'] = $user;
		

		return $response;
	}
}