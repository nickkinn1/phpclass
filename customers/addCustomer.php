<?php
    if(count(array_filter($_GET)) == 9){
        include "../includes/db.php";
        $con = getDbConnection();

        $fName = $_GET["fName"];
        $lName = $_GET["lName"];
        $phone = $_GET["phone"];
        $email = $_GET["email"];
        $password = $_GET["password"];
        $address = $_GET["address"];
        $city = $_GET["city"];
        $state = $_GET["state"];
        $zip = $_GET["zip"];

        try {
            $query = "INSERT INTO customers (fName, lName, phone, email, password, address, city, state, zip) VALUES (?,?,?,?,?,?,?,?,?);";
            $stmt = mysqli_prepare($con, $query);
            mysqli_stmt_bind_param($stmt, "sssssssss", $fName, $lName, $phone, $email, $password, $address, $city, $state, $zip);
            mysqli_stmt_execute($stmt);

            header("Location:index.php");
        } catch (mysqli_sql_exception $err){
            echo $err;
        }
    };

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
        <h2>Add a New Customer</h2>
        <form class="large-form" action="" method="get">
            <div class="group-inputs-div">
                <div class="input-div">
                    <label for="fName">First name</label>
                    <input type="text" name="fName" id="fName" autocomplete="off">
                </div>

                <div class="input-div">
                    <label for="lName">Last Name</label>
                    <input type="text" name="lName" id="lName" autocomplete="off">
                </div>
            </div>

            <div class="group-inputs-div">
                <div class="input-div">
                    <label for="phone">Phone</label>
                    <input type="tel" name="phone" id="phone" autocomplete="off">
                </div>
            </div>

            <div class="group-inputs-div">
                <div class="input-div">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" autocomplete="off">
                </div>
            </div>

            <div class="group-inputs-div">
                <div class="input-div">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off">
                </div>
            </div>

            <div class="group-inputs-div">
                <div class="input-div">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" autocomplete="off">
                </div>
            </div>

            <div class="group-inputs-div">
                <div class="input-div">
                    <label for="city">City</label>
                    <input type="text" name="city" id="city" autocomplete="off">
                </div>
                <div class="input-div">
                    <label for="state">State</label>
                    <input maxlength="2" size="2" type="text" name="state" id="state" autocomplete="off">
                </div>
                <div class="input-div">
                    <label for="zip">Zip</label>
                    <input maxlength="10" size="10" type="text" name="zip" id="zip" autocomplete="off">
                </div>
            </div>


            <button class="button" type="submit">Add Customer</button>

        </form>
    </main>
</div>

<?php include "../includes/footer.php"; ?>
</body>
</html>