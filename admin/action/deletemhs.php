<?php 

require "../config/function.php";


$nimmhs=$_GET["nim"];


if (hapusdata_mhs($nimmhs)>0) {
    echo "<script>
        alert('Data mahasiswa Berhasil Dihapus')
        document.location.href = '../datamahasiswa.php'
    </script>";                                          
} else{
    echo "<script>
    alert('Data Mahasiswa Gagal Dihapus')
    document.location.href = '../datamahasiswa.php'
</script>";   
}

?>