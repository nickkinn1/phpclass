<?php
if(count(array_filter($_POST)) == 10){
    include "../includes/db.php";
    $con = getDbConnection();

    $txtID = $_POST["ID"];
    $txtFName = $_POST["fName"];
    $txtLName = $_POST["lName"];
    $txtPhone = $_POST["phone"];
    $txtEmail = $_POST["email"];
    $txtPassword = $_POST["password"];
    $txtAddress = $_POST["address"];
    $txtCity = $_POST["city"];
    $txtState = $_POST["state"];
    $txtZip = $_POST["zip"];

    try {
        $query = "UPDATE customers SET fName = ?, lName = ?, phone = ?, email = ?, password = ?, address = ?, city = ?, state = ?, zip=? WHERE ID = ?;";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "ssssssssss", $txtFName, $txtLName, $txtPhone, $txtEmail, $txtPassword, $txtAddress, $txtCity, $txtState, $txtZip, $txtID);
        mysqli_stmt_execute($stmt);

        header("Location:index.php");
    } catch (mysqli_sql_exception $err){
        echo $err;
    }
};

if(!empty($_GET["id"])){
    $id = $_GET["id"];

    include "../includes/db.php";
    $con = getDbConnection();

    try {
        $query = "SELECT * FROM customers WHERE ID = ?";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "s", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_array($result);

        $fName = $row["fName"];
        $lName = $row["lName"];
        $phone = $row["phone"];
        $email = $row["email"];
        $password = $row["password"];
        $address = $row["address"];
        $city = $row["city"];
        $state = $row["state"];
        $zip = $row["zip"];
    } catch (mysqli_sql_exception $err){
        echo $err;
    }
} else {
    header("Location:index.php");
    exit();
}

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
    <script type="text/javascript">
        function deleteMovie(fName, lName, id){
            if(confirm(`DELETE ${fName} ${lName}?`)){
                document.location.href = `customerDelete.php?id=${id}`
            }
        }
    </script>
</head>
<body>
<div class="content">
    <?php include "../includes/navigation.php"; ?>
    <main class="add-movie-page">
        <h2>Add a New Customer</h2>
        <form class="large-form" action="" method="post">
            <div class="group-inputs-div">
                <div class="input-div">
                    <label for="fName">First name</label>
                    <input value="<?=$fName?>" type="text" name="fName" id="fName" autocomplete="off">
                </div>

                <div class="input-div">
                    <label for="lName">Last Name</label>
                    <input value="<?=$lName?>" type="text" name="lName" id="lName" autocomplete="off">
                </div>
            </div>

            <div class="group-inputs-div">
                <div class="input-div">
                    <label for="phone">Phone</label>
                    <input value="<?=$phone?>" type="tel" name="phone" id="phone" autocomplete="off">
                </div>
            </div>

            <div class="group-inputs-div">
                <div class="input-div">
                    <label for="email">Email</label>
                    <input value="<?=$email?>" type="email" name="email" id="email" autocomplete="off">
                </div>
            </div>

            <div class="group-inputs-div">
                <div class="input-div">
                    <label for="password">Password</label>
                    <input value="<?=$password?>" type="password" name="password" id="password" autocomplete="off">
                </div>
            </div>

            <div class="group-inputs-div">
                <div class="input-div">
                    <label for="address">Address</label>
                    <input value="<?=$address?>" type="text" name="address" id="address" autocomplete="off">
                </div>
            </div>

            <div class="group-inputs-div">
                <div class="input-div">
                    <label for="city">City</label>
                    <input value="<?=$city?>" type="text" name="city" id="city" autocomplete="off">
                </div>
                <div class="input-div">
                    <label for="state">State</label>
                    <input value="<?=$state?>" maxlength="2" size="2" type="text" name="state" id="state" autocomplete="off">
                </div>
                <div class="input-div">
                    <label for="zip">Zip</label>
                    <input value="<?=$zip?>" maxlength="10" size="10" type="text" name="zip" id="zip" autocomplete="off">
                </div>
            </div>

            <button class="button" type="submit">Save</button>
            <button id="large-form-delete" type="button" class="button" onclick="deleteMovie('<?=$fName?>', '<?=$lName?>','<?=$id?>')"><?=$svg["delete"]?></button>
            <input name="ID" id="ID" type="hidden" value="<?=$id?>">
        </form>
    </main>
</div>

<?php include "../includes/footer.php"; ?>
</body>
</html>