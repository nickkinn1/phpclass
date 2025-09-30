<?php
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
<div class="content">
    <?php include "../includes/header.php"; ?>

    <div id="three-column">
        <?php include "../includes/navigation.php"; ?>
        <main>
            <h2>My Movie List</h2>
            <table>
                <?php
                $con = mysqli_connect("localhost", "dbuser", "dbdev123","phpclass");
                $result = mysqli_query($con,"SELECT * FROM movielist");

                while ($row = mysqli_fetch_array($result)){
                    $movieID = $row["movieID"];
                    $movieTitle = $row["movieTitle"];
                    $movieRating = $row["movieRating"];

                    echo "<tr>";
                    echo "    <td>$movieID</td>";
                    echo "    <td>$movieTitle</td>";
                    echo "    <td>$movieRating</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </main>
    </div>
</div>

<?php include "../includes/footer.php"; ?>
</body>
</html>