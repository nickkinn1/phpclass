<?php
    $svg = array("");
    include $_SERVER['DOCUMENT_ROOT']."/images/svgs.php"
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
    <?php include "../includes/navigation.php"; ?>
    <main class="movie-list-page">
        <h2>My Movie List</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Rating</th>
            </tr>
            <?php
            include "../includes/db.php";
            $con = getDbConnection();
            $result = mysqli_query($con,"SELECT * FROM movielist");

            while ($row = mysqli_fetch_array($result)){
                $movieID = $row["movieID"];
                $movieTitle = $row["movieTitle"];
                $movieRating = $row["movieRating"];

                echo "<tr>";
                echo "    <td>$movieID</td>";
                echo "    <td><a href='updateMovie.php?id=$movieID'>$movieTitle</a></td>";
                echo "    <td>$movieRating</td>";
                echo "</tr>";
            }
            ?>
        </table>
        <a class="button" href="addmovie.php">Add a New Movie</a>
    </main>
</div>
<?php include "../includes/footer.php"; ?>
</body>
</html>