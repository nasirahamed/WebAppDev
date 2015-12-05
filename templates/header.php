<?php 
ob_start();
session_start();
error_reporting(0);
require_once 'config.php'; 
$url=strtok($_SERVER["REQUEST_URI"],'?');
$url_arr = explode("/", $url);

if(!isset($_SESSION['logged_in'])){
	header('Location: index.php');
}
?>