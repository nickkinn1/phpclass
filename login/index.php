<?php
    session_start();

    if(!empty($_POST["txtUsername"]) && !empty($_POST["txtPassword"])){
        include "../includes/db.php";
        $con = getDbConnection();

        $username = $_POST["txtUsername"];
        $password = $_POST["txtPassword"];

        $query = "SELECT password, userKey, roleID, ID FROM users WHERE username = ?";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_array($result);

        if ($row != null) {
            $dbPassword = $row["password"];
            $dbUserKey = $row["userKey"];
            $dbRoleID = $row["roleID"];
            $dbUserID = $row["ID"];

            if ($dbPassword == md5($password . $dbUserKey)){
                $_SESSION["roleID"] = $dbRoleID;
                $_SESSION["UID"] = $dbUserID;

                switch ($dbRoleID){
                    case 3:
                        header("Location: admin_page.php");
                        break;
                    default:
                        header("Location: member.php");
                }

            } else {
                $msg = "Incorrect Credentials...";
            }
        } else {
            $msg = "Incorrect Credentials...";
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
        <h2>Welcome</h2>
        <form class="main-form" action="" method="post">
            <div class="input-div">
                <label for="txtUsername">Username</label>
                <input type="text" name="txtUsername" id="txtUsername" autocomplete="off">
            </div>

            <div class="input-div">
                <label for="txtPassword">Password</label>
                <input type="password" name="txtPassword" id="txtPassword" autocomplete="off">
            </div>

            <p id="err"><?=$msg?></p>

            <div class="buttons-div">
                <button class="button" type="submit">Login</button>
            </div>
        </form>
    </main>
</div>

<?php include "../includes/footer.php"; ?>
</body>
</html>