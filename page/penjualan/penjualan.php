<?php 

    $kode = $_GET['kodepj'];

    $kasir = $data['nama'];

?>

<div class="row clearfix">
                                    

                            <div class="body">

                          <form method="POST">                         	

                              <div class="col-md-2 ">
                                            <input type="text" name="kode" value="<?php echo $kode; ?>" class="form-control" readonly=""  />
                                        </div>


                                        <div class="col-md-2 ">
                                            <input type="text" name="kode_barcode"  class="form-control"  />
                                        </div>

                                        <div class="col-md-2 ">
                                            <input type="submit" name="simpan" value="Tambahkan" class="btn btn-primary">
                                       </div>


                                   </form>
                                  </div>



    <?php 
    

            if (isset($_POST['simpan'])) {

                $date = date("Y-m-d");
                $kd_pj = $_POST['kode'];

                $barcode = $_POST['kode_barcode'];


                $barang = $koneksi->query("select * from tb_barang where kode_barcode='$barcode'");

                $data_barang=$barang->fetch_assoc();

                $harga_jual = $data_barang['harga_jual'];

                $jumlah = 1;

                $total = $jumlah * $harga_jual;

                $barang2 = $koneksi->query("select * from tb_barang where kode_barcode='$barcode'");

                while ($data_barang2 = $barang2->fetch_assoc()) {
                    $sisa = $data_barang2['stok'];

                    if ($sisa == 0) {
                        ?>

                            <script type="text/javascript">
                            
                                alert("Stok Barang Habis, Tidak Dapat Melakukan Penjualan Lagi ");
                                window.location.href="?page=penjualan&kodepj=<?php echo $kode; ?>"
                            </script>

                        <?php
                    }

                    else{


                        $koneksi->query("insert into tb_penjualan (kode_penjualan, kode_barcode, jumlah, total, tgl_penjualan) values('$kd_pj', '$barcode', '$jumlah', '$total', '$date')");
                    }
                }
            }
    
    
    ?>


    <br><br><br><br>

<form method="POST">

  <div class="col-md-2">

    <label for="">Pelanggan</label>

    <select name="pelanggan" class="form-control show-tick">
      
      <?php
          $pelanggan = $koneksi->query("select * from tb_pelanggan order by kode_pelanggan");
          while ($d_pelanggan=$pelanggan->fetch_assoc()) {
            echo "
              <option value='$d_pelanggan[kode_pelanggan]'>$d_pelanggan[nama]</option>
            ";
          }
      ?>
    </select>
  
  </div>



<br><br><br><br><br>


<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DAFTAR BELANJAAN
                            </h2>
                            
                        </div>
                        <div class="body">
                            <table class="table table-striped ">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        
                                        <th>Kode Barcode</th>
                                        <th>Nama Barang</th>
                                        <th>Harga</th>
                                        
                                        <th>Jumlah </th>
                                        <th style="text-align:"right">Total </th>
                                        
                                        <th>Aksi</th>
                                    </tr>
                                </thead>


                                <tbody>

                                        <?php 

                                            $no= 1;

                                            $sql = $koneksi->query("select * from tb_penjualan, tb_barang where tb_penjualan.kode_barcode=tb_barang.kode_barcode AND kode_penjualan='$kode'");

                                            while ($data = $sql->fetch_assoc()) {
                                                
                                            
                                         ?>

                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data['kode_barcode'] ?></td>
                                        <td><?php echo $data['nama_barang'] ?></td>
                                        <td><?php echo $data['harga_jual'] ?></td>

                                        <td><?php echo $data['jumlah'] ?></td>
                                        <td><?php echo $data['total'] ?></td>
                                        <td>
                                            
                                            <a href="?page=penjualan&aksi=tambah&id=<?php echo $data['id']?>&kode_pj=<?php echo $data['kode_penjualan'] ?>&harga_jual=<?php echo $data['harga_jual'] ?>&kode_b=<?php echo $data['kode_barcode'] ?>" title="Tambah" class="btn btn-success" > <i class="material-icons">add</i></a>
                                            <a href="?page=penjualan&aksi=kurang&id=<?php echo $data['id']?>&kode_pj=<?php echo $data['kode_penjualan'] ?>&harga_jual=<?php echo $data['harga_jual'] ?>&kode_b=<?php echo $data['kode_barcode'] ?>" title="Kurangi" class="btn btn-success" > <i class="material-icons">remove</i></a>
                                            
                                            <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')" href="?page=penjualan&aksi=hapus&id=<?php echo $data['id']?>&kode_pj=<?php echo $data['kode_penjualan'] ?>&harga_jual=<?php echo $data['harga_jual'] ?>&kode_b=<?php echo $data['kode_barcode'] ?>&jumlah=<?php echo $data['jumlah']; ?>" title="Hapus" class="btn btn-danger" > <i class="material-icons">clear</i></a>

                                        </td>
                                    </tr>

                                    <?php
                                        $total_bayar = $total_bayar+$data['total'];
                                
                                        } 
                                    
                                      ?>
                                    
                                </tbody>


                                <tr>
                                    
                                    <th colspan="5" style="text-align: right;">Total</th>
                                    <td> <input type="number" readonly="" style="text-align: right;" name="total_bayar" id="total_bayar" onkeyup="hitung();" value="<?php echo $total_bayar; ?>"> </td>

                                </tr>

                                <tr>
                                    
                                    <th colspan="5" style="text-align: right;">Diskon</th>
                                    <td> <input type="number" style="text-align: right;" onkeyup="hitung();" name="diskon" id="diskon"> </td>

                                </tr>

                                <tr>
                                    
                                    <th colspan="5" style="text-align: right;">Potongan Diskon</th>
                                    <td> <input type="number" style="text-align: right;" name="potongan"  id="potongan"> </td>

                                </tr>

                                <tr>
                                    
                                    <th colspan="5" style="text-align: right;">Sub Total</th>
                                    <td> <input type="number" style="text-align: right;" name="total_b" id="total_b"> </td>

                                </tr>

                                <tr>
                                    
                                    <th colspan="5" style="text-align: right;">Bayar</th>
                                    <td> <input type="number" style="text-align: right;" onkeyup="hitung();" name="bayar" id="bayar"> </td>

                                </tr>

                                <tr>
                                    
                                    <th colspan="5" style="text-align: right;">Kembali</th>
                                    <td> <input type="number" style="text-align: right;" name="kembali" id="kembali"> 
                                    
                                        <input type="submit"  value="Simpan" class="btn btn-info">

                                        <input type="submit" name="simpan_pj" value="Cetak Struk" class="btn btn-success" onclick="window.open('page/penjualan/cetak.php?kode_pjl=<?php echo $kode; ?>&kasir=<?php echo $kasir; ?>','mywindow','width-600px, height=600px, left=300px;')">
                                    
                                    </td>

                                </tr>


                            </table>
                            
                           </div>

                        </form>



      <?php 
      
            if (isset($_POST['simpan_pj'])) {
              
                $pelanggan = $_POST['pelanggan'];
                $total_bayar = $_POST['total_bayar'];
                $diskon = $_POST['diskon'];
                $potongan = $_POST['potongan'];
                $total_b = $_POST['total_b'];
                
                $bayar = $_POST['bayar'];
                $kembali = $_POST['kembali'];

                $koneksi->query("insert into tb_penjualan_detail(kode_penjualan, bayar, kembali, diskon, potongan, total_b)values('$kode', '$bayar', '$kembali', '$diskon', '$potongan', '$total_b')");

                $koneksi->query("update tb_penjualan set id_pelanggan='$pelanggan' where kode_penjualan='$kode'");

            }
      
      ?>


  <script type="text/javascript">

    function hitung(){

    var total_bayar = document.getElementById('total_bayar').value;
  
    var diskon = document.getElementById('diskon').value;

    var diskon_pot = parseInt(total_bayar) * parseInt(diskon) / parseInt(100);

    if (  !isNaN(diskon_pot)) {
      
          var potongan = document.getElementById('potongan').value = diskon_pot;
    }

      var sub_total = parseInt(total_bayar) - parseInt(potongan);

        if (  !isNaN(sub_total)) {
        
        var total_b = document.getElementById('total_b').value = sub_total; 
    }

    var bayar = document.getElementById('bayar').value;
    
    var bayar_b = parseInt(bayar) - parseInt(total_b);

    if (  !isNaN(bayar_b)) {
      
          document.getElementById('kembali').value = bayar_b;
  }

    }
  </script>
                    