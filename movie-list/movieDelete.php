<?php
if(!empty($_GET["id"])){
    $id = $_GET["id"];

    include "../includes/db.php";
    $con = getDbConnection();

    try {
        $query = "DELETE FROM movielist WHERE movieID = ?";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "s", $id);
        mysqli_stmt_execute($stmt);
    } catch (mysqli_sql_exception $err){
        echo $err;
    }
}

header("Location:index.php");
exit();
