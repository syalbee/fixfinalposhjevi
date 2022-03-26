<?php
error_reporting(0);

$b = $brg->row_array();
?>
<table>
    <tr>
        <th style="width:220px;"></th>
        <th>Nama Barang</th>
        <th>Satuan</th>
        <th>Stok</th>
        <th>Harga(Rp)</th>
    </tr>
    <tr>
        <td style="width:220px;">
            </th>
            <td><input type="text" name="nabar" value="<?php echo $b['barang_nama']; ?>" style="width:310px;margin-right:5px;" class="form-control input-sm" readonly></td>
        <td><input type="text" name="satuan" value="<?php echo $b['barang_satuan']; ?>" style="width:90px;margin-right:5px;" class="form-control input-sm" readonly></td>
        <td><input type="text" name="stok" value="<?php echo $b['barang_stok']; ?>" style="width:60px;margin-right:5px;" class="form-control input-sm" readonly></td>
        <td><input type="text" name="harjul" value="<?php echo number_format($b['barang_harjul_grosir']); ?>" style="width:120px;margin-right:5px;text-align:right;" class="form-control input-sm" readonly></td>
        <td><input type="hidden" name="diskon" id="diskon" value="0" min="0" class="form-control input-sm" ></td>
		<td><input type="hidden" name="qty" id="qty" value="1" min="1" max="<?php echo $b['barang_stok'];?>"></td>
        <td><button type="button" id="btnAdd"  onclick="addTochart()" class="btn btn-primary">OK</button></td>
    </tr>
</table>