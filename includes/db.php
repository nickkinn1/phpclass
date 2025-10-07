<?php
function getDbConnection()
{
    return mysqli_connect("localhost", "dbuser", "dbdev123","phpclass");
}
