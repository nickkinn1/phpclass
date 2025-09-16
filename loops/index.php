<?php
    $pageName = "loops";
?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nick's Website</title>
    <link rel="stylesheet" href="/css/base.css">
</head>
<body>

    <?php include "../includes/header.php"; ?>

    <div id="three-column">
        <?php include "../includes/navigation.php"; ?>
        <main style="text-align: center;">
            <?php
            //WHILE LOOP
            $i = 1;
            while($i<7){
                echo "<h$i>Hello World</h$i>";
                $i++;
            }
            $i=6;
            while($i>0){
                echo "<h$i>Hello World</h$i>";
                $i--;
            }
            //

            //FOR LOOP
            for($i=1;$i<7;$i++){
                echo "<h$i>Hello World</h$i>";
            }
            //

            echo "<br /><br /><hr /><br />";

            $full_name = "Nick Kinney";
            $position = strpos($full_name, " ");
            echo $position;

            echo "<br /><br /><hr /><br />";

            $stuff = "My Stuff";
            echo '<h3>$stuff</h3>';

            echo "<br /><br /><hr /><br />";

            echo strtoupper($full_name) . "<br />";
            echo strtolower($full_name) . "<br />";
            echo $full_name . "<br />";

            echo "<br /><br /><hr /><br />";

            $name_parts = explode(' ', $full_name);

            echo $name_parts[0] . "<br />";
            echo $name_parts[1] . "<br />";
            ?>
        </main>
    </div>

    <?php include "../includes/footer.php"; ?>
</body>
</html>