<?php
class Db{
	public static function getConnection(){
		$dbname="kursach";
		$user='root';
		$password='';
		$dbn= new PDO('mysql:host=127.0.0.1;dbname=kursach',$user,$password);
        $dbn->exec("set names utf8");
return $dbn;
	}
}