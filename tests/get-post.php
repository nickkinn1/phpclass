<?php
    $firstName = $_POST["firstName"] ?? "";
    $lastName = $_POST["lastName"] ?? "";
?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Testing Get and Post</title>
</head>
<body>
    <h2>Welcome <?=$firstName?> <?=$lastName?></h2>
    <form method="post">
        <input type="text" name="firstName" id="firstName" value="<?=$firstName?>" placeholder="First Name">
        <input type="text" name="lastName" id="lastName" value="<?=$lastName?>" placeholder="Last Name">
        <input type="submit" value="Submit Data">
    </form>
</body>
</html>