<html>
<head>
    <title>Tambah Produk</title>
</head>
<body>
    <h1>Tambah Produk</h1>
    <?php echo validation_errors(); ?>
    <form action="<?php echo base_url('SimpanDatabase/tambahProduk'); ?>" method="POST">
        <table>
            <tr>
                <td>ID Produk</td>
                <td>:</td>
                <td><input type="text" name="idproduk"></td>
            </tr>
            <tr>
                <td>Nama Produk</td>
                <td>:</td>
                <td><input type="text" name="namaproduk"></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td>:</td>
                <td><input type="text" name="harga"></td>
            </tr>
            <tr>
                <td>Kategori</td>
                <td>:</td>
                <td><select name="kategori" id="kategori">
                        <option disabled selected>Pilih Kategori</option>
                        <?php foreach ($kategori as $row) : ?>
                            <option value="<?php echo $row->nama_kategori; ?>"><?php echo $row->nama_kategori; ?></option>
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
                            <option value="<?php echo $row->nama_status; ?>"><?php echo $row->nama_status; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="Tambah Produk"></td>
            </tr>
        </table>
    </form>
</body>
</html>