<?php
     $servername = "localhost";
     $username = "root";
     $password = "";
     $database = "db_rigel";

     //Create connection
     $connection = new mysqli($servername, $username, $password, $database);

    $nama ="";
    $alamat ="";
    $pekerjaan="";

    $errorMessage = "";
    $successMessage = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nama = $_POST["nama"];
        $alamat = $_POST["alamat"];
        $pekerjaan = $_POST["pekerjaan"];
        

        do {
            if (empty($nama) || empty($alamat) || empty($pekerjaan) ) {
                $errorMessage = "All the field are required";
                break;
            }

            // add  new client to database
            $sql =  "INSERT INTO pengguna (nama, alamat, pekerjaan) " .
                    "VALUES ('$nama','$alamat', '$pekerjaan')";
            $result = $connection->query($sql);

            if (!$result) {
                $errorMessage = "Invalid Query: " . $connection->error;
                break;
            }


            $nama ="";
            $alamat ="";
            $pekerjaan ="";

            $successMessage = "Client add corectly";

            header("location: /pekerjaan/index.php");
            exit;
 
        } while (false);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data warga</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2>Tambahkan data</h2>

        <?php
            if ( !empty($errorMessage) ) {
                echo "
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>$errorMessage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
                ";
                }
        ?>

        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nama</label>
                <div class="col-sm-6">
                    <input type ="text" class="form-control" name="nama" value="<?php echo $nama; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Alamat</label>
                <div class="col-sm-6">
                    <input type ="text" class="form-control" name="alamat" value="<?php echo $alamat; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Pekerjaan</label>
                <div class="col-sm-6">
                    <input type ="text" class="form-control" name="pekerjaan" value="<?php echo $pekerjaan; ?>">
                </div>
            </div>
           

            <?php
            if ( !empty($successMessage)) {
                echo "
                <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6'>
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>$successMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                    </div>
                </div>
                ";
            }

            ?>


            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/pekerjaan/index.php" role="button">Cancel</a>
                </div>
            </div>
            
        </form>
    </div>



    
</body>
</html>