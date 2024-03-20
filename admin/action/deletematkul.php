<?php 

require "../config/function.php";


$matkul=$_GET["id"];


if (hapusdata_matkul($matkul)>0) {
    echo "<script>
        alert('Data Mata Kuliah Berhasil Dihapus')
        document.location.href = '../daftar-matkul.php'
    </script>";                                          
} else{
    echo "<script>
    alert('Data Mata Kuliah Gagal Dihapus')
    document.location.href = '../daftar-matkul.php'
</script>";   
}

?>