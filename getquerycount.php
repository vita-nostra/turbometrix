<?php
require 'connectdb.php';
$login = $_COOKIE ['login'];
$sql='SELECT `calcul`, `api_key`FROM `users` WHERE `login`= :login ';
$query = $pdo->prepare($sql);
$query -> execute([':login'=>$login]);
$row=$query->fetch(PDO::FETCH_OBJ);
$id=$row->id;

$api_key=$row->api_key;//ключ к акку
$global_count =$row->calcul;

$site=filter_var($_POST ['domen']);
$start_date= filter_var($_POST ['start_date']);
$end_date= filter_var($_POST ['end_date']);
$granuarity= "monthly";
$main_domain_only ="false"; //true - если значение только для домена . false - для домена и субдоменов
$format = "json";

$sql = "UPDATE `users` SET  `calcul`=:count WHERE `login`= :login";
$query = $pdo->prepare($sql);
$res=$query -> execute([':count'=>$global_count, ':login'=>$login]);

echo $global_count;

 ?>