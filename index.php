<?php
session_start();

$db = new PDO('mysql:host=db; dbname=coin_app', 'root', 'password');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$query = $db->prepare('SELECT `id`, `issuer`, `type`, `obverse`, `reverse`, `grade`, `value`, `image` FROM `coins`;');
$query->execute();

$result = $query->fetchAll();

?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <title>My Mint</title>
    <link rel="stylesheet" href="stylesheet.css"/>
    <link rel="icon" type="image/x-icon" href="images/favIconFinal.png">
</head>
<body>

<div class = "aboutAndTopFiveTitle">
    <div class ="aboutDiv"><a href="#About"> ABOUT </a></div>
    <div class=siteTitle><img id="siteLogo" src="images/siteLogo1.png"></div>
    <div class="topFive"><a href="topFiveEmperors.php">TOP FIVE EMPERORS</a></div>
</div>
<div class="navBar">

            <div class="navSubmitButton">
                <a href="addNewCoin.php">
                    <button>ADD A COIN TO MY MINT!</button>
                </a>
            </div>
<!--                <div class="formDiv">-->
                    <div class="coinSort">
                        <form action="sortCoin.php" name="sort" method="post">
                            <select class="sortDropDown" name="order">
<!--                                <option value="choose">Sort By</option>-->
                                <option value="issuer">Issuer</option>
                                <option value="type">Type</option>
                                <option value="grade">Grade</option>
                                <option value="value">Value</option>
                            </select>
                            <input class="sortButton" type="submit" value=" - SORT - " />
                        </form>
                    </div>
<!--                </div>-->

</div>

<div class="coinsDiv">
    <?php
    if(isset($_SESSION['sort']) && isset($_GET['sort'])){
        $result = $_SESSION['sort'];
    }
    foreach ($result as $output)
    {
        $id = $output['id'];
        ?>
        <div class="singleCoin">
        <div class="coinTitle"><?php echo $output ['issuer'] . ", " . $output ['type']; ?></div>
        <div class="coinText"><?php
            echo '<span><b>Issuer: </b>' . $output ['issuer'] . '</span>';
            echo '<span><b>Type: </b>' . $output ['type'] . '</span>';
            echo '<span><b>Obverse: </b>' . $output ['obverse'] . '</span>';
            echo '<span><b>Reverse: </b>' . $output ['reverse'] . '</span>';
            echo '<span><b>Grade: </b>' . $output ['grade'] . '</span>';
            echo '<span><b>Value:</b> £' . $output ['value'] . '</span>';
            ?></div>
        <?php echo '<img class="coinImage" src="' . $output ['image'] . '">'; ?>
            <form  action="removeCoin.php" method="post"><input type="hidden" name=id value="<?php echo $id; ?>"><input class="deleteButton" type="submit" name="delete" value="Remove Coin"></form>
        </div> <?php
    }


    ?>
    <div class="about" id="About">About:
        Welcome to My Mint, an app especially designed to collate your coin collection! Add them to your homepage and remove with the click of a button.
    </div>
</div>
<a href="#top" class="top">back to top</a>
<p>&#169 2024 Harry Keeling</p>
</body>



