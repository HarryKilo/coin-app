<?php
if(isset($_POST)) {
    $db = new PDO('mysql:host=db; dbname=coin_app', 'root', 'password');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    $query = $db->prepare('DELETE FROM `coins`(`type`, `issuer`, `obverse`, `reverse`, `image`) 
                                    VALUES (:type, :issuer, :obverse, :reverse, :image);');
    $query->bindParam(':type', $_POST['type']);
    $query->bindParam(':issuer', $_POST['issuer']);
    $query->bindParam(':obverse', $_POST['obverse']);
    $query->bindParam(':reverse', $_POST['reverse']);
    $query->bindParam(':image', $_POST['image']);
    $query->execute();
}