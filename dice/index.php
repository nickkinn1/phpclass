<?php
    $p1One = rand(1, 6);
    $p1Two = rand(1, 6);
    $p1Score = $p1One + $p1Two;

    $p2One = rand(1, 6);
    $p2Two = rand(1, 6);
    $p2Three = rand(1, 6);
    $p2Score = $p2One + $p2Two + $p2Three;

    if ($p1Score == $p2Score){
        $result = "It's a Tie!";
    } else if ($p1Score > $p2Score) {
        $result = "You Win!";
    } else {
        $result = "You lose :(";
    }
?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dice</title>
    <link rel="stylesheet" href="/css/base.css">
</head>
<body>
<div class="content">
    <?php include "../includes/navigation.php"; ?>
    <main>
        <div>
            <h3>Your Score: <?=$p1Score?></h3>
            <img src="imgs/dice_<?=$p1One?>.png" alt="1">
            <img src="imgs/dice_<?=$p1Two?>.png" alt="1">
        </div>

        <div>
            <h3>Computer Score: <?=$p2Score?></h3>
            <img src="imgs/dice_<?=$p2One?>.png" alt="1">
            <img src="imgs/dice_<?=$p2Two?>.png" alt="1">
            <img src="imgs/dice_<?=$p2Three?>.png" alt="1">
        </div>

        <br />
        <h2>Result: <?=$result?></h2>
    </main>
</div>

<?php include "../includes/footer.php"; ?>
</body>
</html>