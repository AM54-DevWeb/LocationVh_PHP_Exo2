<?php 

$bdd = new PDO("mysql:host=localhost:3306;dbname=locationVh", "root", "");
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>