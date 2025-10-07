<?php
    if(!empty($_GET["txtTitle"]) && !empty($_GET["txtRating"])){
        include "../includes/db.php";
        $con = getDbConnection();

        $txtTitle = $_GET["txtTitle"];
        $txtRating = $_GET["txtRating"];

        try {
            $query = "INSERT INTO movielist (movieTitle, movieRating) VALUES (?,?);";
            $stmt = mysqli_prepare($con, $query);
            mysqli_stmt_bind_param($stmt, "ss", $txtTitle, $txtRating);
            mysqli_stmt_execute($stmt);

            header("Location:index.php");
        } catch (mysqli_sql_exception $err){
            echo $err;
        }
    }
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
    <main class="add-movie-page">
        <h2>Add a New Movie</h2>
        <form class="main-form" action="" method="get">
            <div class="input-div">
                <label for="txtTitle">Movie Title</label>
                <input type="text" name="txtTitle" id="txtTitle" autocomplete="off">
            </div>

            <div class="input-div">
                <label for="txtRating">Movie Rating</label>
                <input type="text" name="txtRating" id="txtRating" autocomplete="off">
            </div>

            <button class="button" type="submit">Add Movie</button>
        </form>
    </main>
</div>

<?php include "../includes/footer.php"; ?>
</body>
</html>