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

$batas = 10;
$data = mysqli_query($conn, "SELECT * FROM dosen");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);
$halaman = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
$halaman_awal = ($batas * $halaman) - $batas;

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

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body id="page-top">

     <!-- Page Wrapper -->
     <div id="wrapper">

        <!-- Sidebar -->
        <?php include 'sidebar.php'; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column vh-100 overflow-y-auto">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include 'navbar.php'; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-grey-1000">Data Dosen</h1>
                        <a href="action/exceldosen.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> EXPORT TO EXCEL</a>
                    </div>


                    <button class="btn btn-danger" data-toggle="modal" data-target="#myModal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
                            </svg>
                            Tambah Baru
                    </button>

                    <!-- MODAL TAMBAH BARU -->

                    <!-- PHP TAMBAH DOSEN -->
                    <?php
                    
                        
                                    if(isset($_POST['send'])) {

                                        if (dosen($_POST) > 0) {
                                            echo "
                                                <script>
                                                alert('Data Dosen Terkirim')
                                                document.location.href = 'datadosen.php'
                                                </script>";
                                        } else {
                                            echo "
                                                <script>
                                                    alert('Data Dosen Tidak Terkirim')
                                                </script>";
                                        }
                                    }

                        $query = mysqli_query($conn, "SELECT * FROM dosen INNER JOIN mata_kuliah ON 
                                                                            dosen.id_matkul = mata_kuliah.id_matkul
                                                                            LIMIT $halaman_awal, $batas");

                        $no= 1;


                    
                    ?>

                    <!-- Modal -->
                        <div class="modal fade" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                
                                <!-- Header modal -->
                                <div class="modal-header" style="background-color:pink;">
                                    <h4 class="modal-title" style="color:black;">Tambah Data Dosen</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                
                                <!-- Isi modal -->
                                <div class="modal-body">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <input type="number" name="id_dosen" class="form-control" placeholder="Masukkan ID Dosen" id="exampleInputEmail1" aria-describedby="emailHelp">
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" name="nama_dosen" placeholder="Masukkan Nama Dosen" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                        </div>

                                        <!-- form group untuk matkul -->
                                        <select class="form-select" name="mata_kuliah" id="id_matkul" aria-label="Default select example">
                                        <option value="-" class="text-muted">Pilih Mata Kuliah</option>
                                            <?php
                                                $qry = mysqli_query($conn, "SELECT * FROM mata_kuliah") or die(mysqli_error($conn));
                                                while ($data = mysqli_fetch_array($qry)) {
                                            ?>
                                                <option value="<?= $data['id_matkul']; ?>"><?= $data['nama_matkul']; ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>

                                        <br>

                                        <div class="mb-3">
                                            <input type="file" name="fotodosen" placeholder="Masukkan Foto Dosen" class="form-control" >
                                        </div>

                                        <br>
                                        <button type="submit" name="send" class="btn btn-primary">Tambah</button>
                                    </form>
                                </div>
                                
                                <!-- Footer modal -->
                                <div class="modal-footer" style="background-color:pink;">
                                </div>
                                
                                </div>
                            </div>
                        </div>

                    <br><br>


                    <div class="card">
                        <div class="card-body">
                            
                        <table class="table">
                            <thead>
                                <tr class="table-danger" style="color: black;">
                                <th scope="col">No</th>
                                <th scope="col">Id Dosen</th>
                                <th scope="col">Nama Dosen</th>
                                <th scope="col">Mata Kuliah yang diajar</th>
                                <th scope="col">Update</th>
                                <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($query as $data): ?>
                                <tr  style="color: black;">
                                <th scope="row"><?=$no++;?></th>
                                <td>
                                    <a class="detaildosen" href="detaildosen.php?id=<?=$data["id_dosen"];?>" ><?=$data["id_dosen"];?> </a>
                                </td>
                                <td><?=$data["nama_dosen"];?></td>
                                <td><?=$data["nama_matkul"];?></td>
                                <td>

                                        <a href="action/updatedosen.php?id=<?= $data['id_dosen']; ?>" type="button" class="btn btn-outline-success">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                            </svg>
                                        </a>
                                </td>

                                <td>
                                        <a href="action/deletedosen.php?id=<?= $data['id_dosen']; ?>" type="button" class="btn btn-outline-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                            </svg>
                                        </a>
                                </td>

                                </tr>
                                <tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                        </div>

                        <!-- Pagination -->
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <?php if ($halaman > 1) : ?>
                                    <li class="page-item"><a class="page-link" href="?halaman=<?= $halaman - 1; ?>">Previous</a></li>
                                <?php else : ?>
                                    <li class="page-item disabled"><span class="page-link">Previous</span></li>
                                <?php endif; ?>

                                <?php for ($x = 1; $x <= $total_halaman; $x++) : ?>
                                    <?php if ($x == $halaman) : ?>
                                        <li class="page-item active" aria-current="page"><a class="page-link" href="?halaman=<?= $x; ?>"><?= $x; ?></a></li>
                                    <?php else : ?>
                                        <li class="page-item"><a class="page-link" href="?halaman=<?= $x; ?>"><?= $x; ?></a></li>
                                    <?php endif; ?>
                                <?php endfor; ?>

                                <?php if ($halaman < $total_halaman) : ?>
                                    <li class="page-item"><a class="page-link" href="?halaman=<?= $halaman + 1; ?>">Next</a></li>
                                <?php else : ?>
                                    <li class="page-item disabled"><span class="page-link">Next</span></li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                     </div>
                   


                </div>
                

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