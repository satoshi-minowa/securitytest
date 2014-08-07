<?php

namespace libs;

use mysqli;

class Db {

	private static $instance = null;

	private $mysqli;
	
	/**
	 * コンストラクタ
	 * privateにして、外部からインスタンスを生成できないようにしておく
	 */
	private function __construct() {
		$this->mysqli = new mysqli('localhost', 'user', 'pass', 'security_test');
		if ($this->mysqli->connect_error) {
    		die('接続失敗です。'.$this->mysqli->connect_error);
		}
		
	}
	
	/**
	 * DBコネクションを返す
	 */
	public static function getConnection() {
		if (!self::$instance) {
			// まだインスタンスが生成されていない場合はnewする
			self::$instance = new Db();
		}
		return self::$instance;
	}
	
	/**
	 * SELECT文を実行する
	 * @param string $sql SELECT文
	 * @return array SELECTの結果セット
	 */
	public function selectQuery($sql) {	
		$result = $this->mysqli->query($sql);
		if (!$result) {
			die('クエリーが失敗しました。'.$this->mysqli->error);
		}
		
		return $result;
	}
	
	/**
	 * UPDATE文を実行する
	 * @param string $sql UPDATE文
	 * @return void
	 */
	public function updateQuery($sql) {
		$result = $this->mysqli->query($sql);
		if (!$result) {
			die('クエリーが失敗しました。'.$this->mysqli->error);
		}
	}
}