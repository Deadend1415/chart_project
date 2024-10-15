<?php
function connect()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $DBname = "chart_project";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$DBname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
        echo "Connected successfully";
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
?>