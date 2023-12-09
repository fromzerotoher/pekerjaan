<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pekerjaan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2>List Pekerjaan warga</h2>
        <a class="btn btn-primary" href="/pekerjaan/create.php" role="button">Tambahkan Data</a>
        <br>
        <table class="table">
            <thread>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Pekerjaan</th>
                    
                </tr>
            </thread>
            <tbody>
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "db_rigel";

                    //Create connection
                    $connection = new mysqli($servername, $username, $password, $database);
                    // Check connection
                    if ($connection->connect_error) {
                        die("Connection failed : ". $connection->connect_error);
                    }

                    //read all  row from database table 
                    $sql = "SELECT * FROM pengguna";
                    $result = $connection->query($sql);

                    if (!$result) {
                        die("Invalid Query : " . $connection->error);
                    }

                    // read data of each row
                    while($row = $result->fetch_assoc()){
                        echo " 
                        <tr>
                        <td>$row[id]</td>
                        <td>$row[nama]</td>
                        <td>$row[alamat]</td>
                        <td>$row[pekerjaan]</td>
                        <td>
                            <a class='btn btn-primary btn-sm' href='/pekerjaan/edit.php?id=$row[id]'>Edit</a>
                            <a class='btn btn-danger btn-sm' href='/pekerjaan/delete.php?id=$row[id]'>Delete</a>
                        </td>
                    </tr>
                        ";
                    }

                ?>


            </tbody>
    
</body>
</html>