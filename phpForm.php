<!DOCTYPE html>
<html lang='en'>
<head>
    <title>Thank You</title>
    <link rel="stylesheet" href="phpFormStylesheet.css"/>
    <link rel="icon" type="image/x-icon" href="images/favIconFinal.png">
</head>
<body>
<?php

if(isset($_POST)) {
    $db = new PDO('mysql:host=db; dbname=coin_app', 'root', 'password');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    $query = $db->prepare('INSERT INTO `coins`(`type`, `issuer`, `obverse`, `reverse`, `image`) 
                                    VALUES (:type, :issuer, :obverse, :reverse, :image);');
    $query->bindParam(':type', $_POST['type']);
    $query->bindParam(':issuer', $_POST['issuer']);
    $query->bindParam(':obverse', $_POST['obverse']);
    $query->bindParam(':reverse', $_POST['reverse']);
    $query->bindParam(':image', $_POST['image']);
    $query->execute();
}

$message = true;
if (!isset($_POST["type"]) || $_POST["type"] == "") {
    $message = false;
    echo 'You need to include a type!';
    echo '<br>';
}
if (!isset($_POST["issuer"]) || $_POST["issuer"] == "") {
    $message = false;
    echo 'You need to include an issuer!';
    echo '<br>';

}
if (!isset($_POST["obverse"]) || $_POST["obverse"] == "") {
    $message = false;
    echo 'You need to include an obverse type!';
    echo '<br>';

}
if (!isset($_POST["reverse"]) || $_POST["reverse"] == "") {
    $message = false;
    echo 'You need to include a reverse type!';
    echo '<br>';
}
if (!isset($_POST["image"]) || $_POST["image"] == "") {
    $message = false;
    echo 'You need to include an image!';
    echo '<br>';
}
if($message===false)
{
    echo "<img src='images/joaquin-phoenix-commodus.gif' class='submitGif'/>";
}
if ($message===true){
    echo "Thank you for submitting a coin to MY MINT!";
    echo '<br>';
    echo "<img src='images/gladiator-joaquin-phoenix-slow-thumbs-up.gif' class='submitGif'/>";
}

?>
<div class="backToHomeButton">
    <a href="index.php">
        <button class="button">HOME</button>
    </a>
</div>
</body>
</html>

<!--        '<span class="submitMessage"> </span>'-->