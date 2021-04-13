 <script>
function sum() {
    var harga_beli = document.getElementById('harga_beli').value;
    var harga_jual = document.getElementById('harga_jual').value;
    var result =parseInt(harga_jual) - parseInt(harga_beli);
    if (!isNaN(result)) {
         document.getElementById('untung').value = result;
    }
}
</script>



<?php 


	$kode2 = $_GET['id'];

	$sql = $koneksi->query("select * from tb_barang where kode_barcode ='$kode2'");
	$tampil = $sql->fetch_assoc();

    $satuan = $tampil['satuan'];

 ?>


<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                UBAH BARANG
                                
                            </h2>

                        </div>

                            <div class="body">

                          <form method="POST">

                          	<label for="">Kode Batang</label>

                            <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="kode" value="<?php echo $tampil['kode_barcode']; ?>" class="form-control"  />
                                        </div>
                                    </div>

                                    <label for="">Nama Barang</label>
                          	
                            <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="nama" value="<?php echo $tampil['nama_barang']; ?>" class="form-control"  />
                                        </div>
                                    </div>

                                     <label for="">Satuan</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                    <select name="satuan" class="form-control show-tick">
                                        
                                        <option value="LUSIN" <?php if ($satuan=='LUSIN') { echo "selected";  } ?>>LUSIN</option>
                                        <option value="PACK" <?php if ($satuan=='PACK') { echo "selected";  } ?>>PACK</option>
                                        <option value="PCS" <?php if ($satuan=='PCS') { echo "selected";  } ?>>PCS</option>
                                        <option value="TABLET" <?php if ($satuan=='TABLET') { echo "selected";  } ?>>TABLET</option>
                                        <option value="STRIP" <?php if ($satuan=='STRIP') { echo "selected";  } ?>>STRIP</option>
                                    </select>
                              </div>
                          </div>

                              
                              <label for="">Stok</label>
                          	
                            <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="stok" value="<?php echo $tampil['stok']; ?>" class="form-control"  />
                                        </div>
                                    </div>


                              <label for="">Harga Beli</label>
                          	
                            <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="hbeli" id="harga_beli" onkeyup="sum()" value="<?php echo $tampil['harga_beli']; ?>" class="form-control"  />
                                        </div>
                                    </div>

                              <label for="">Harga Jual</label>
                          	
                            <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="hjual" id="harga_jual" onkeyup="sum()" value="<?php echo $tampil['harga_jual']; ?>" class="form-control"  />
                                        </div>
                                    </div>

                              <label for="">Keuntungan</label>
                          	
                            <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="untung" id="untung" value="<?php echo $tampil['untung']; ?>" readonly="" style="background-color: #e7e3e9;" value="0" class="form-control"  />
                                        </div>
                                    </div>

                                    <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">


                                 </form>



    <?php 


    		if (isset($_POST['simpan'])) {
    			
    			$kode = $_POST['kode'];
    			$nama = $_POST['nama'];
    			$satuan = $_POST['satuan'];
    			$stok = $_POST['stok'];
    			$hbeli = $_POST['hbeli'];
    			$hjual = $_POST['hjual'];
    			$untung = $_POST['untung'];


    			$sql2 = $koneksi->query("update  tb_barang set nama_barang='$nama', satuan='$satuan', harga_beli='$hbeli', stok='$stok', harga_jual='$hjual', keuntungan='$untung' where kode_barcode='$kode2'");


    			if ($sql2) {
    				?>

    					<script type="text/javascript">
    						alert("Data Berhasil Diubah");
    						window.location.href="?page=barang";
    					</script>

    				<?php
    			}
    		}

     ?>