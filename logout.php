<?php
//Code extracted from http://www.smarttutorials.net/ and altered
ob_start();
session_start();
require_once 'config.php';
$user_obj = new Cl_User();
$data = $user_obj->logout();