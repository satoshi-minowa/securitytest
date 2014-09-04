<?php

namespace libs;

use mysqli;

class Db {

	private static $instance = null;
	
	private static $connect = null;
	
	/**
	 * コンストラクタ
	 * privateにして、外部からインスタンスを生成できないようにしておく
	 */
	private function __construct() {
		try{
			$dsn = 'mysql:host=localhost;dbname=security_test';
			$user = 'user';
			$password = 'pass';
			
			self::$connect = new \PDO($dsn, $user, $password);
			
			if (self::$connect == null){
				throw new \PDOException("接続に失敗しました。");
			}
		 }catch (\PDOException $e){
    		die('接続失敗です。'.$e->getMessage());
		}
	}
	
	/**
	 * DBインスタンス作成
	 */
	public static function getInstance() {
		if (!self::$instance) {
			// まだインスタンスが生成されていない場合はnewする
			self::$instance = new Db();
		}
		return self::$instance;
	}
	
	/**
	 * SELECT文を実行する
	 * @param  string $sql SELECT文
	 * @param  array  $prameter パラメータ値
	 * @return array  SELECTのプリペアドステートメントの実行結果
	 */
	public function selectQuery($sql, $prameter) {

		$pdo = self::$connect;
		
		$stm = $pdo->prepare($sql);
		
		foreach ($prameter as $key => $value) {
			$stm->bindValue($key + 1, $value);
		}
		$stm->execute();

		return $stm;
	}
	
	/**
	 * UPDATE文を実行する
	 * @param string $sql UPDATE文
	 * @param  array  $prameter パラメータ値
	 * @return void
	 */
	public function updateQuery($sql, $prameter) {
	
		$pdo = self::$connect;
		
		$stm = $pdo->prepare($sql);
		
		foreach ($prameter as $key => $value) {
			$stm->bindValue($key + 1, $value);
		}
		$flag = $stm->execute();

		if (!$flag) {
			die('UPDATEクエリーが失敗しました。');
		}
	}
}