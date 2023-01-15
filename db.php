<?php

error_reporting(E_ALL & ~E_NOTICE);
define("DB_HOST", "localhost");
define("DB_NAME", "news");
define("DB_CHARSET", "utf8");
define("DB_USER", "root");
define("DB_PASSWORD", "");
  if(isset($_GET['state'])){
$id_new=$_GET['state'];
  }


try {
  $pdo = new PDO(
    "mysql:host=" . DB_HOST . ";charset=" . DB_CHARSET . ";dbname=" . DB_NAME, 
    DB_USER, DB_PASSWORD
  );
} catch (Exception $ex) { exit($ex->getMessage()); }


$stmt = $pdo->prepare("SELECT * FROM `news` where id='".$id_new."'");
$stmt->execute();
$news = $stmt->fetchAll();
echo json_encode($news);
$pdo = null;
$stmt = null;
?>