<?php
$db = new PDO('mysql:host=db; dbname=coin_app', 'root', 'password');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$coinId = $_POST['id'];
$query=$db->prepare('DELETE FROM `coins` WHERE `id`=' . $coinId);

$query->execute();

header("Location: index.php");
exit();


