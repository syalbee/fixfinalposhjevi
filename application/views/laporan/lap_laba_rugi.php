<html lang="en" moznomarginboxes mozdisallowselectionprint>

<head>
    <title>Laporan Laba/rugi</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/laporan.css') ?>" />
</head>

<body >
    <div id="laporan">

        <table border="0" align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:0px;">
            <tr>
                <td colspan="2" style="width:800px;paddin-left:20px;">
                    <center>
                        <h4>LAPORAN LABA / RUGI </h4>
                    </center><br />
                </td>
            </tr>

        </table>

        <table border="0" align="center" style="width:900px;border:none;">
            <tr>
                <th style="text-align:left"></th>
            </tr>
        </table>
        <?php
        $b = $jml->row_array();
        ?>
        <table border="1" align="center" style="width:900px;margin-bottom:20px;">
            <thead>
                <tr>
                    <th colspan="11" style="text-align:left;">Bulan : <?php echo $b['bulan']; ?></th>
                </tr>
                <tr>
                    <th style="width:50px;">No</th>
                    <th>Tanggal</th>
                    <th>Nama Barang</th>
                    <th>Satuan</th>
                    <th>Harga Pokok</th>
                    <th>Harga Jual</th>
                    <th>Keuntungan Per Unit</th>
                    <th>Item Terjual</th>
                    <th>Diskon</th>
                    <th>Untung Bersih</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 0;
                $sum = 0;
                foreach ($data->result_array() as $i) {
                    $no++;
                    $tgl = $i['jual_tanggal'];
                    $nabar = $i['d_jual_barang_nama'];
                    $satuan = $i['d_jual_barang_satuan'];
                    $harpok = $i['d_jual_barang_harpok'];
                    $harjul = $i['d_jual_barang_harjul'];
                    $untung_perunit = $i['keunt'];
                    $qty = $i['d_jual_qty'];
                    $diskon = $i['d_jual_diskon'];
                    $untung_bersih = $i['untung_bersih'];
                    $sum +=  $i['untung_bersih'];
                ?>
                    <tr>
                        <td style="text-align:center;"><?php echo $no; ?></td>
                        <td style="text-align:center;"><?php echo $tgl; ?></td>
                        <td style="text-align:left;"><?php echo $nabar; ?></td>
                        <td style="text-align:left;"><?php echo $satuan; ?></td>
                        <td style="text-align:right;"><?php echo 'Rp ' . number_format($harpok); ?></td>
                        <td style="text-align:right;"><?php echo 'Rp ' . number_format($harjul); ?></td>
                        <td style="text-align:right;"><?php echo 'Rp ' . number_format($untung_perunit); ?></td>
                        <td style="text-align:center;"><?php echo $qty; ?></td>
                        <td style="text-align:right;"><?php echo 'Rp ' . number_format($diskon); ?></td>
                        <td style="text-align:right;"><?php echo 'Rp ' . number_format($untung_bersih); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>

                <tr>
                    <td colspan="9" style="text-align:center;"><b>Total Keuntungan</b></td>
                    <td style="text-align:right;"><b><?php echo 'Rp ' . number_format($b['total']); ?></b></td>
                </tr>
            </tfoot>
        </table>
        <table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
            <tr>
                <td></td>
        </table>
        
        <table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
            <tr>
                <th><br /><br /></th>
            </tr>
            <tr>
                <th align="left"></th>
            </tr>
        </table>
    </div>
</body>

</html>