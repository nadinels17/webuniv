<?php 

require "../config/function.php";


$jadwal=$_GET["id"];


if (hapusjadwal($jadwal)>0) {
    echo "<script>
        alert('Data Jadwal Berhasil Dihapus')
        document.location.href = '../daftar-jadwal.php'
    </script>";                                          
} else{
    echo "<script>
    alert('Data Jadwal Gagal Dihapus')
    document.location.href = '../daftar-jadwal.php'
</script>";   
}

?>