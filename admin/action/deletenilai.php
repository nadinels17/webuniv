<?php 

require "../config/function.php";


$idnilai=$_GET["id"];


if (hapusdata_nilai($idnilai)>0) {
    echo "<script>
        alert('Data Nilai Berhasil Dihapus')
        document.location.href = '../daftar-nilai.php'
    </script>";                                          
} else{
    echo "<script>
    alert('Data Nilai Gagal Dihapus')
    document.location.href = '../daftar-nilai.php'
</script>";   
}

?>