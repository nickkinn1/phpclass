<?php
if(!empty($_POST["txtTitle"]) && !empty($_POST["txtRating"])){
    include "../includes/db.php";
    $con = getDbConnection();

    $txtTitle = $_POST["txtTitle"];
    $txtRating = $_POST["txtRating"];
    $txtID = $_POST["txtID"];

    try {
        $query = "UPDATE movielist SET movieTitle = ?, movieRating = ? WHERE movieID = ?;";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "sss", $txtTitle, $txtRating, $txtID);
        mysqli_stmt_execute($stmt);

        header("Location:index.php");
    } catch (mysqli_sql_exception $err){
        echo $err;
    }
}

if(!empty($_GET["id"])){
    $id = $_GET["id"];

    include "../includes/db.php";
    $con = getDbConnection();

    try {
        $query = "SELECT * FROM movielist WHERE movieID = ?";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "s", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_array($result);

        $txtTitle = $row["movieTitle"];
        $txtRating = $row["movieRating"];
    } catch (mysqli_sql_exception $err){
        echo $err;
    }
} else {
    header("Location:index.php");
    exit();
}
?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nick's Website</title>
    <script type="text/javascript">
        function deleteMovie(title, id){
            if(confirm(`DELETE ${title}?`)){
                document.location.href = `movieDelete.php?id=${id}`
            }
        }
    </script>
    <link rel="stylesheet" href="/css/base.css">
</head>
<body>
<div class="content">
    <?php include "../includes/navigation.php"; ?>
    <main class="add-movie-page">
        <h2>Update Movie</h2>
        <form class="main-form" action="" method="post">
            <div class="input-div">
                <label for="txtTitle">Movie Title</label>
                <input value="<?=$txtTitle?>" type="text" name="txtTitle" id="txtTitle" autocomplete="off">
            </div>

            <div class="input-div">
                <label for="txtRating">Movie Rating</label>
                <input value="<?=$txtRating?>" type="text" name="txtRating" id="txtRating" autocomplete="off">
            </div>

            <input type="hidden" name="txtID" id="txtID" value="<?=$id?>">

            <div class="buttons-div">
                <button class="button" type="submit">Save</button>
                <button type="button" class="button" onclick="deleteMovie('<?=$txtTitle?>', '<?=$id?>')">x</button>
            </div>
        </form>
    </main>
</div>

<?php include "../includes/footer.php"; ?>
</body>
</html>