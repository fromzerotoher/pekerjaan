<?php
    if ( isset( $_GET["id"] ) ) {
        $id = $_GET["id"];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "db_rigel";

        //Create connection
        $connection = new mysqli($servername, $username, $password, $database);

        $sql = "DELETE FROM pengguna WHERE id=$id";
        $connection->query($sql);
    }

header("location: /pekerjaan/index.php");
exit;
?>