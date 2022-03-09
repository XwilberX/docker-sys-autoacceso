<?php 
require_once "../config/SERVER.php";

try{
$mbd=new PDO (SGBD, USER, PASS);

}
catch(PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}

 ?>