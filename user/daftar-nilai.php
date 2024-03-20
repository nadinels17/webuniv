<?php
session_start();
require "config/connection.php";
require "config/function.php";

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

    <title>Mahasiswa</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include 'sidebar.php';?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column vh-100 overflow-y-auto">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include 'navbar.php';?>
                <!-- End of Topbar -->


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Daftar Nilai Akademis</h1>
                    </div>


                    <b><br>
                    <!-- Content Row -->

                    <?php 
                    
                    require 'config/connection.php';
                    $query = mysqli_query($conn, "SELECT * FROM nilai JOIN mahasiswas ON nilai.nim = mahasiswas.nim JOIN mata_kuliah
                                                                                      ON nilai.id_matkul = mata_kuliah.id_matkul
                                                                                    WHERE nilai.nim= '$_SESSION[nim]'");
                                                                        
                        $no=1;

                        $nilai = mysqli_query($conn, "SELECT * FROM nilai where nilai = '$_SESSION[nim]' ");

                        // $jumlah = array_sum($nilai);
                    ?>

                    <button class="btn btn-success" onclick="pdf()">EXPORT TO PDF</button>

                    <div class="row">

                    <div class="card container"><br>
                        <div class="card-body">
                                    <table class="table">
                                        <thead class="table-danger">
                                            <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Mata Kuliah</th>
                                            <th scope="col">Nilai</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach( $query as $data): ?>
                                            <tr>
                                            <th scope="row"><?=$no++;?></th>
                                            <td><?=$data["nama_matkul"];?></td>
                                            <td><?=$data["nilai"];?></td>
                                            </tr>
                                            <?php endforeach ; ?>

                                        </tbody>
                                    </table>

                                    <!-- Jumlah IPK :  -->
                        </div>
                    </div>

                    </div>

            

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>


    <script>
        function pdf(){
            window.print();
        }
    </script>
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