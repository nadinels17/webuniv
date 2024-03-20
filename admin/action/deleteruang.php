<?php 

require "../config/function.php";


$ruang=$_GET["id"];


if (hapusdata_ruang($ruang)>0) {
    echo "<script>
        alert('Data Ruangan Berhasil Dihapus')
        document.location.href = '../daftar-ruangan.php'
    </script>";                                          
} else{
    echo "<script>
    alert('Data Ruangan Gagal Dihapus')
    document.location.href = '../daftar-ruangan.php'
</script>";   
}

?>