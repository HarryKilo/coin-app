<!DOCTYPE html>
<html lang='en'>
<head>
    <title>Submit a Coin</title>
    <link rel="stylesheet" href="addNewStylesheet.css"/>
    <link rel="icon" type="image/x-icon" href="images/favIconFinal.png">
</head>

<body>
<p class="submitTitle">SUBMIT A COIN TO MY MINT</p>

<form class="addForm2" action="phpForm.php" method="post">
    <label for="issuer">Coin Issuer</label>
    <input class="addInput" type="text" id="issuer" name="issuer" placeholder="Issuer name...">
    <label for="type">Type</label>
    <input class="addInput" type="text" id="type" name="type" placeholder="Coin type...">
    <label for="obverse">Obverse</label>
    <input class="addInput" type="text" id="obverse" name="obverse" placeholder="The obverse type...">
    <label for="reverse">Reverse</label>
    <input class="addInput" type="text" id="reverse" name="reverse" placeholder="The reverse type...">
    <label for="reverse">Image</label>
    <input class="addInput" type="text" id="image" name="image" placeholder="Image URL...">

    <div class="buttonPosition">
        <input class="button-89" type="submit" value="Submit New Coin!">
    </div>
</form>
<div class="backToHomeButton">
    <a href="index.php">
        <button class="button">HOME</button>
    </a>
</div>
<p>&#169 2024 Harry Keeling</p>
</body>


