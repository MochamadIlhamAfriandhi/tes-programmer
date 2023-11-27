<html>
<head>
    <title>Edit Produk</title>
</head>
<body>
    <h1>Edit Produk</h1>
    <?php echo validation_errors(); ?>
    <form action="<?php echo base_url('SimpanDatabase/editProduk'); ?>" method="POST">
        <table>
            <tr>
                <td>ID Produk</td>
                <td>:</td>
                <td><input type="text" name="idproduk" value="<?php echo $produk->id_produk; ?>" readonly></td>
            </tr>
            <tr>
                <td>Nama Produk</td>
                <td>:</td>
                <td><input type="text" name="namaproduk"  value="<?php echo $produk->nama_produk ?>"></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td>:</td>
                <td><input type="text" name="harga"  value="<?php echo $produk->harga ?>"></td>
            </tr>
            <tr>
                <td>Kategori</td>
                <td>:</td>
                <td><select name="kategori" id="kategori">
                        <option disabled selected>Pilih Kategori</option>
                        <?php foreach ($kategori as $row) : ?>
                            <option value="<?php echo $row->nama_kategori; ?>" <?php echo ($row->id_kategori == $produk->kategori_id) ? 'selected' : ''; ?>><?php echo $row->nama_kategori; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Status</td>
                <td>:</td>
                <td><select name="status" id="status">
                        <option disabled selected>Pilih Status</option>
                        <?php foreach ($status as $row) : ?>
                            <option value="<?php echo $row->nama_status; ?>" <?php echo ($row->id_status == $produk->status_id) ? 'selected' : ''; ?>><?php echo $row->nama_status; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="Update Produk"></td>
            </tr>
        </table>
    </form>
</body>
</html>