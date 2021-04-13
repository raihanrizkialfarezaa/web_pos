<?php 


    $kode2 = $_GET['id'];

	$sql = $koneksi->query("delete  from tb_barang where kode_barcode ='$kode2'");



if($sql){


    ?>


        <script type="text/javascript">
    	    alert("Data Berhasil Dihapus");
    		window.location.href="?page=barang";
    	</script>

    <?php


}



?>