<?php 
ob_start();
session_start();
define("BASEURL", "http://localhost/fanconnect-praktikan");
define("BASEPATH", $_SERVER["DOCUMENT_ROOT"]."/fanconnect-praktikan");
$GLOBALS["db"] = mysqli_connect("localhost","root","","fanconnect-praktikan");