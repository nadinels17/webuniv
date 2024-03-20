<?php 
session_start();
require "../config/connection.php";
require "../config/function.php";

if(!isset($_SESSION["login"])){
  echo "<script>
  alert('harus login')
  document.location.href = 'login.php'
  </script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Universitas</title>
    <link rel="icon" href="img/loubriyneunivv.png">

</head>

<style> 

table {
        border-collapse: collapse;
    }
    table th, table td {
        border: 3px solid black;
        padding: 10px 30px;
    }


</style>

<body id="page-top">

     
                    <?php
                    

                        $query = mysqli_query($conn, "SELECT * FROM dosen INNER JOIN mata_kuliah ON 
                                                                            dosen.id_matkul = mata_kuliah.id_matkul");

                        $no= 1;


                        header("Content-type: application/vnd-ms-excel");
                        header("Content-Disposition: attachment; filename=Data Dosen.xls");


                    
                    ?>

                    <br><br>


                    <div class="card">
                        <div class="card-body">
                            
                        <table>
                            <thead>
                                <trstyle="color: black;">
                                <th scope="col">No</th>
                                <th scope="col">Id Dosen</th>
                                <th scope="col">Nama Dosen</th>
                                <th scope="col">Mata Kuliah yang diajar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($query as $data): ?>
                                <tr  style="color: black;">
                                <th scope="row"><?=$no++;?></th>
                                <td><?=$data["id_dosen"];?></td>
                                <td><?=$data["nama_dosen"];?></td>
                                <td><?=$data["nama_matkul"];?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                        </div>
                     </div>
                   
                

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>