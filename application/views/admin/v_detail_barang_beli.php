<?php
error_reporting(0);
$b = $brg->row_array();
?>
<table>
    <tr>
        <th style="width:230px;"></th>
        <th>Nama Barang</th>
        <th>Satuan</th>
        <th>Harga Pokok</th>
        <th>Harga Jual</th>
        <th>Jumlah</th>
    </tr>
    <tr>
        <td style="width:230px;">
            </th>
        <td><input type="text" name="nabar" value="<?php echo $b['barang_nama']; ?>" style="width:310px;margin-right:5px;" class="form-control input-sm" readonly></td>
        <td><input type="text" name="satuan" value="<?php echo $b['barang_satuan']; ?>" style="width:120px;margin-right:5px;" class="form-control input-sm" readonly></td>
        <td><input type="text" name="harpok" value="<?php echo $b['barang_harpok']; ?>" style="width:90px;margin-right:5px;" class="form-control input-sm" required></td>
        <td><input type="text" name="harjul" value="<?php echo $b['barang_harjul']; ?>" style="width:120px;margin-right:5px;" class="form-control input-sm" required></td>
        <td><input type="text" name="jumlah" id="jumlah" onkeydown="setValues(this)" class="form-control input-sm" style="width:60px;margin-right:5px;" required></td>
        <td><button type="button" onclick="addTochart()" class="btn btn-primary">OK</button></td>
    </tr>
</table>