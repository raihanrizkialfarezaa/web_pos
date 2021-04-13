<?php 

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));


$koneksi = new mysqli("localhost", "root", "", "db_web");


?>


<style>

    @media print{
        input.noPrint{
            display: none;
        }
    }

</style>

<table border="1" width="100%" style="border-collapse: collapse;">
    <caption>Laporan penjualan</caption>
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Kode Barcode</th>
            <th>Nama Pelanggan</th>
            <th>Nama Barang</th>
            <th>Harga Jual</th>
            <th>Jumlah</th>
            <th>Total</th>
            <th>Profit</th>
        </tr>
    </thead>
    <tbody>
        <?php 


                $tgl_awal = $_POST['tgl_awal'];
                $tgl_akhir = $_POST['tgl_akhir'];

                $no= 1;

                $sql = $koneksi->query("select * from tb_penjualan, tb_barang, tb_pelanggan where tb_penjualan.kode_barcode=tb_barang.kode_barcode and tgl_penjualan between '$tgl_awal' and '$tgl_akhir' ");

                while ($data = $sql->fetch_assoc()) {

                    $profit = $data['keuntungan'] * $data['jumlah'];
                

                ?>

        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo date('d F Y', strtotime($data['tgl_penjualan'])) ?></td>
            <td><?php echo $data['kode_barcode'] ?></td>
            <td><?php echo $data['nama'] ?></td>
            <td><?php echo $data['nama_barang'] ?></td>
            <td><?php echo number_format ($data['harga_jual']) ?></td>

            <td><?php echo $data['jumlah'] ?></td>
            <td><?php echo number_format ($data['total']) ?></td>
            
            <td><?php echo number_format ($profit) ?></td>

        </tr>


        <?php 


            $total_pj = $total_pj+$data['total'];
            $jumlah = $no * $data['jumlah'] - 1;
            $total_profit = $total_profit + $profit;
    
    
        } 
        
        ?>
    </tbody>

    <tr>
        <th colspan="6">Total penjualan,jumlah dan profit</th>
        <td><?php echo $jumlah ?></td>
        <td><?php echo number_format ($total_pj) ?></td>
        <td><?php echo number_format ($total_profit) ?></td>
    </tr>
</table>

<br>
<input type="button" class="noPrint" value="Print" onclick="window.print()">