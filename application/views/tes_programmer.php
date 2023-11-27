<html>
<head>
	<title>Tes Junior Programmer</title>
</head>
<body>
	<h1>Tes Junior Programmer</h1>
	<a href="<?php echo base_url('/tesprogrammer/input') ?>">Tambah Produk</a>
	<hr>
	<table border="1">
		<tr>
			<td>No</td>
			<td>Nama Produk</td>
			<td>Harga</td>
			<td>Kategori</td>
			<td>Status</td>
			<td>Aksi</td>
		</tr>
		<?php
			$count = 0;
			foreach ($queryProduk as $row) {
				$count = $count + 1;
		?>
		<tr>
			<td><?php echo $count ?></td>
			<td><?php echo $row->nama_produk ?></td>
			<td><?php echo $row->harga ?></td>
			<td><?php echo $row->nama_kategori ?></td>
			<td><?php echo $row->nama_status ?></td>
			<td><a href="<?php echo base_url('tesprogrammer/edit') ?>/<?php echo $row->id_produk ?>">Edit</a> | <a href="javascript:void(0);" onclick="konfirmasiHapus('<?php echo $row->id_produk; ?>')">Hapus</a></td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>
<script>
    function konfirmasiHapus(id_produk) {
        var konfirmasi = confirm("Apakah Anda yakin ingin menghapus data?");
        if (konfirmasi) {
			window.location.href = "<?php echo base_url('tesprogrammer/hapus/'); ?>" + id_produk;
        } else {
        }
    }
</script>