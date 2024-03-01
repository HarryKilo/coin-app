<?php
session_start();

$db = new PDO('mysql:host=db; dbname=coin_app', 'root', 'password');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);


$sort = $_POST['order'];
if (!empty($sort)) {
    $query=$db->prepare("SELECT id, issuer, type, obverse, reverse, `value`, grade, image FROM `coins` ORDER BY " . $sort . " ASC");
    $query->execute();
    $_SESSION['sort'] = $query->fetchAll();
    header("Location: index.php?sort=true");

} else {
    $query=$db->prepare("SELECT id, issuer, type, obverse, reverse, `value`, grade, image FROM `coins` ORDER BY issuer ASC");
    $query->execute();
    $_SESSION['sort'] = $query->fetchAll();
    header("Location: index.php?sort=true");
}
