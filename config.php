<?php
global $foldername,$file_path,$model_file_path,
       $view_file_path,$controller_file_path,
       $database_path,$view_path;
$foldername = "php_yataw/onlineshopping/";
$file_path = $_SERVER['DOCUMENT_ROOT']."/$foldername";
$model_file_path = $file_path."models/";
$view_file_path = $file_path."views/";
$controller_file_path = $file_path."controllers/";
$database_path = $file_path."db_connect.php";
$view_path ='http://'.$_SERVER['HTTP_HOST']."/$foldername";

/*var_dump($file_path); echo "<br>";
var_dump($foldername); echo "<br>";
var_dump($view_file_path); echo "<br>";
var_dump($controller_file_path); echo "<br>";
var_dump($database_path); echo "<br>";
var_dump($modle_file_path); echo "<br>";
var_dump($view_path); echo "<br>";*/




