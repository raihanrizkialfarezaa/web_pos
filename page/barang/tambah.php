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

<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                TAMBAHKAN BARANG BARU
                                
                            </h2>

                        </div>

                            <div class="body">

                          <form method="POST">

                          	<label for="">Kode Batang</label>

                            <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="kode" class="form-control"  />
                                        </div>
                                    </div>

                                    <label for="">Nama Barang</label>
                          	
                            <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="nama" class="form-control"  />
                                        </div>
                                    </div>

                                     <label for="">Satuan</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                    <select name="satuan" class="form-control show-tick">
                                        <option value="">-- Pilih Satuan --</option>
                                        <option value="LUSIN">LUSIN</option>
                                        <option value="PACK">PACK</option>
                                        <option value="PCS">PCS</option>
                                        <option value="TABLET">TABLET</option>
                                        <option value="STRIP">STRIP</option>
                                    </select>
                              </div>
                          </div>

                              
                              <label for="">Stok</label>
                          	
                            <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="stok" class="form-control"  />
                                        </div>
                                    </div>


                              <label for="">Harga Beli</label>
                          	
                            <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="hbeli" id="harga_beli" onkeyup="sum()" class="form-control"  />
                                        </div>
                                    </div>

                              <label for="">Harga Jual</label>
                          	
                            <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="hjual" id="harga_jual" onkeyup="sum()" class="form-control"  />
                                        </div>
                                    </div>

                              <label for="">Keuntungan</label>
                          	
                            <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="untung" id="untung" readonly="" style="background-color: #e7e3e9;" value="0" class="form-control"  />
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


    			$sql = $koneksi->query("insert into tb_barang values('$kode', '$nama', '$satuan', '$hbeli', '$stok', '$hjual', '$untung' )");


    			if ($sql) {
    				?>

    					<script type="text/javascript">
    						alert("Data Berhasil Disimpan");
    						window.location.href="?page=barang";
    					</script>

    				<?php
    			}
    		}

     ?>