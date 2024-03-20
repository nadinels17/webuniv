<?php 
require "connection.php";

function mahasiswa($data) {
    global $conn;

    $nim = $data["nim"];
    $nama = $data["nama"];
    $alamat = $data["alamat"];
    $tingkat = $data["tingkat"];
    $password = $data["pass"];

    $foto= imgmhs();


    $query = "INSERT INTO mahasiswas VALUES ('$nim', '$nama', '$tingkat','$password', '$alamat', '$foto') ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


function imgmhs() {

    $filename = $_FILES["fotomhs"]["name"];
    $size = $_FILES["fotomhs"]["size"];
    $error = $_FILES["fotomhs"]["error"];
    $temp = $_FILES["fotomhs"]["tmp_name"];

    $validExtension = ['png', 'jpg', 'jpeg'];
    $fileExtension = pathinfo($filename, PATHINFO_EXTENSION);


    if ($error == 4) {
        echo "<script>alert('Wajib upload foto!')</script>";
        return false;
    } elseif (!in_array($fileExtension, $validExtension)) {
        echo "<script>alert('file hanya boleh berupa png, jpg, dan jpeg!')</script>";
        return false;
    } elseif ($size > 1000000) {
        echo "<script>alert('Max ukuran file adalah 1 MB!')</script>";
        return false;
    }

    // MOVE UPLOADED FILE
    $filename = pathinfo($filename, PATHINFO_FILENAME) . '_' . uniqid() . '.' . $fileExtension;
    move_uploaded_file($temp, 'img/imgmhs/' . $filename);

    return $filename;

}



function dosen($data) {
    global $conn;

    $id = $data["id_dosen"];
    $nama = $data["nama_dosen"];
    $matkul = $data["mata_kuliah"];

    $image= imgdosen();


    $query = "INSERT INTO dosen VALUES ('$id', '$nama', '$matkul', '$image') ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function imgdosen() {

    $filename = $_FILES["fotodosen"]["name"];
    $size = $_FILES["fotodosen"]["size"];
    $error = $_FILES["fotodosen"]["error"];
    $temp = $_FILES["fotodosen"]["tmp_name"];

    $validExtension = ['png', 'jpg', 'jpeg'];
    $fileExtension = pathinfo($filename, PATHINFO_EXTENSION);


    if ($error == 4) {
        echo "<script>alert('Wajib upload foto!')</script>";
        return false;
    } elseif (!in_array($fileExtension, $validExtension)) {
        echo "<script>alert('file hanya boleh berupa png, jpg, dan jpeg!')</script>";
        return false;
    } elseif ($size > 1000000) {
        echo "<script>alert('Max ukuran file adalah 1 MB!')</script>";
        return false;
    }

    // MOVE UPLOADED FILE
    $filename = pathinfo($filename, PATHINFO_FILENAME) . '_' . uniqid() . '.' . $fileExtension;
    move_uploaded_file($temp, 'img/imgdosen/' . $filename);

    return $filename;

}


function jadwal($data) {
    global $conn;

    $dosen = $data["dosen"];
    $ruangan = $data["ruangan"];
    $matkul = $data["mata_kuliah"];
    $hari = $data["hari"];
    $jam_masuk = $data["jammasuk"];
    $jam_keluar = $data["jamkeluar"];

    $query = "INSERT INTO jadwal VALUES (null, '$dosen', '$matkul', '$ruangan', '$hari', '$jam_masuk', '$jam_keluar')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function ruang($data) {
    global $conn;

    $nama_ruang = $data["nama_ruangan"];
    $dosen = $data["dosen"];

    $query = "INSERT INTO ruangan VALUES (null,'$nama_ruang', '$dosen') ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapusdata_ruang($ruang){
    global $conn;
    mysqli_query($conn, "DELETE FROM ruangan WHERE id_ruangan= '$ruang'");
    return mysqli_affected_rows($conn);
}

function matkul($data) {

    global $conn;

    $nama_matkul= $data["nm_matkul"];
    $sks = $data["sks"];
    $semester =$data["semester"];

    $qry = "INSERT INTO mata_kuliah VALUES (null,'$nama_matkul','$sks','$semester')";
    mysqli_query($conn,$qry);
    return mysqli_affected_rows($conn);
}

function hapusdata_matkul($matkul){
    global $conn;
    mysqli_query($conn, "DELETE FROM mata_kuliah WHERE id_matkul= '$matkul'");
    return mysqli_affected_rows($conn);
}


function nilai($data) {
    global $conn;

    $matkul = $data["mata_kuliah"];
    $nim = $data["nim"];
    $nilai = $data["nilai"];

    $query = "INSERT INTO nilai VALUES (null, '$matkul', '$nim', '$nilai') ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function updatenilai($data){
    global $conn;

    $nilai = $_GET["id"];
    $matkul = $data["mata_kuliah"];
    $nim = $data["nim"];
    $nilai = $data["nilai"];

    mysqli_query($conn, "UPDATE nilai SET id_matkul='$matkul',
                                           nim='$nim',
                                           nilai ='$nilai' WHERE id_nilai= '$nilai' ");


    return mysqli_affected_rows($conn);
}

function hapusdata_nilai($idnilai){
    global $conn;
    mysqli_query($conn, "DELETE FROM nilai WHERE id_nilai= '$idnilai'");
    return mysqli_affected_rows($conn);
}


function hapusdata_dosen($id){
    global $conn;

    mysqli_query($conn, "DELETE FROM dosen WHERE id_dosen= '$id'");
    return mysqli_affected_rows($conn);
}

function updatedosen($data){
    global $conn;

    $id = $_GET["id"];
    $id_dosen = $data["id_dosen"];
    $nama = $data["nama_dosen"];

    mysqli_query($conn, "UPDATE dosen SET id_dosen= '$id_dosen', nama_dosen='$nama' WHERE id_dosen= $id");


    return mysqli_affected_rows($conn);
}

function hapusjadwal($id){
    global $conn;

    mysqli_query($conn, "DELETE FROM jadwal WHERE id_jadwal= '$id'");
    return mysqli_affected_rows($conn);
}

function updatejadwal($data){
    global $conn;

    $id = $_GET["id"];
    $dosen = $data["dosen"];
    $ruangan = $data["ruangan"];
    $matkul = $data["mata_kuliah"];
    $hari = $data["hari"];
    $jam_masuk = $data["jammasuk"];
    $jam_keluar = $data["jamkeluar"];

    mysqli_query($conn, "UPDATE jadwal SET id_dosen='$dosen',
                                           id_ruangan='$ruangan',
                                           id_matkul='$matkul',
                                           hari='$hari',
                                           jam_masuk='$jam_masuk',
                                           jam_kaluar='$jam_keluar'  WHERE id_jadwal= $id");


    return mysqli_affected_rows($conn);
}

function updatemhs($data){
    global $conn;

    $id = $_GET["nim"];
    $nim = $data["nim"];
    $nama = $data["nama"];
    $alamat = $data["alamat"];
    $tingkat = $data["tingkat"];
    $password = $data["pass"];

    mysqli_query($conn, "UPDATE mahasiswas SET nim='$nim', 
                                                nama_mhs ='$nama', 
                                                alamat='$alamat', 
                                                tingkat='$tingkat', 
                                                password='$password' 
                                                WHERE nim= $id");


    return mysqli_affected_rows($conn);
}

function hapusdata_mhs($nimmhs){
    global $conn;
    // $id=$_GET["id_transaksi"];
    mysqli_query($conn, "DELETE FROM mahasiswas WHERE nim= '$nimmhs'");
    return mysqli_affected_rows($conn);
}


function updateruang($data){
    global $conn;

    $id = $_GET["id"];
    $nama = $data["nama_ruangan"];

    mysqli_query($conn, "UPDATE ruangan SET nama_ruangan='$nama' WHERE id_ruangan= $id");


    return mysqli_affected_rows($conn);
}

function updatematkul($data){
    global $conn;

    $id = $_GET["id"];
    $nama_matkul= $data["nm_matkul"];
    $sks = $data["sks"];
    $semester =$data["semester"];

    mysqli_query($conn, "UPDATE mata_kuliah SET nama_matkul='$nama_matkul',
                                                sks_matkul='$sks',
                                                semester='$semester' WHERE id_matkul= $id");


    return mysqli_affected_rows($conn);
}



?>