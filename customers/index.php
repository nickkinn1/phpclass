<?php
    include "../includes/db.php";
    $con = getDbConnection();
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
    <main class="customers-page">
        <h2>Customer List</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Address</th>
                <th>City</th>
                <th>State</th>
                <th>Zip</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Password</th>
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
        <a class="button" href="addCustomer.php">Add a New Customer</a>
    </main>
</div>

<?php include "../includes/footer.php"; ?>
</body>
</html>