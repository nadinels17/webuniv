<?php 

require "../config/function.php";


$id_dosen=$_GET["id"];


if (hapusdata_dosen($id_dosen)>0) {
    echo "<script>
        alert('Data Dosen Berhasil Dihapus')
        document.location.href = '../datadosen.php'
    </script>";                                          
} else{
    echo "<script>
    alert('Data Dosen Gagal Dihapus')
    document.location.href = '../datadosen.php'
</script>";   
}

?>