<?php
    session_start();

    include "../includes/db.php";
    $con = getDbConnection();

    $err = "";
    $success = "";

    if(!isset($_SESSION["UID"])){
       header("Location: index.php");
    }

    if(isset($_POST["btnSubmit"])){
        $username = $_POST["txtUsername"];
        $email = $_POST["txtEmail"];
        $password = $_POST["txtPassword"];
        $password2 = $_POST["txtPassword2"];
        $role = $_POST["selectRole"];

        if(count(array_filter($_POST)) == 6){
            $atPos = strpos($email, "@");
            $strStartingAt = substr($email, $atPos);

            if(!$atPos || !str_contains($strStartingAt, ".")){
                $err = "Invalid Email.";
            }

            if(strlen($password) <= 3){
                $err = "Password must be at least 4 Characters.";
            }

            if(strlen($username) <= 3){
                $err = "Username must be at least 4 Characters.";
            }


            if($password !== $password2){
                $err = "Passwords do not match.";
            }
        } else {
            $err ="Please complete all fields.";
        }

        if($err == ""){
            $userKey = "xxxxxxxxx";

            try {
                $query = "INSERT INTO users (username, email, password, roleID, userKey) VALUES (?,?,?,?,?);";
                $stmt = mysqli_prepare($con, $query);
                mysqli_stmt_bind_param($stmt, "sssis", $username, $email, $password, $role, $userKey);
                mysqli_stmt_execute($stmt);

                $username = $email = $password = $password2 = "";
                $success = "User Created!";
            } catch (mysqli_sql_exception $err){
                echo $err;
            }
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
        <h2>Create User</h2>
        <form class="main-form" action="" method="post">
            <div class="input-div">
                <label for="txtUsername">Username</label>
                <input type="text" name="txtUsername" id="txtUsername" value="<?=$username?>" autocomplete="off">
            </div>

            <div class="input-div closer-div">
                <label for="txtEmail">Email</label>
                <input type="email" name="txtEmail" id="txtEmail" value="<?=$email?>" autocomplete="off">
            </div>

            <div class="form-spacer"></div>

            <div class="input-div">
                <label for="txtPassword">Password</label>
                <input type="password" name="txtPassword" id="txtPassword" value="<?=$password?>" autocomplete="off">
            </div>

            <div class="input-div closer-div">
                <label for="txtPassword2">Retype Password</label>
                <input type="password" name="txtPassword2" id="txtPassword2" value="<?=$password2?>" autocomplete="off">
            </div>

            <div class="form-spacer"></div>

            <div class="input-div">
                <label for="selectRole">Role</label>
                <select name="selectRole" id="selectRole">
                    <option value="" disabled selected></option>
                    <?php
                    $result = mysqli_query($con,"SELECT * FROM roles");

                    while ($role = mysqli_fetch_array($result)){
                        $value = $role["value"];
                        $ID = $role["ID"];
                        echo "<option value='$ID'>$value</option>";
                    }
                    ?>
                </select>
            </div>

            <p id="err"><?=$err?></p>
            <p id="success"><?=$success?></p>

            <div class="buttons-div">
                <button class="button" type="submit" name="btnSubmit" value="createUser">Create</button>
            </div>
        </form>
    </main>
</div>

<?php include "../includes/footer.php"; ?>
</body>
</html>