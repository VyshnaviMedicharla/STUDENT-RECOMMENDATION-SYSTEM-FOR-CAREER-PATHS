<?php 
session_start();
if(isset($_SESSION['email'])){
session_destroy();}
$ref= @$_GET['q'];

header("location:$ref");
?>

<h1>hello</h1>