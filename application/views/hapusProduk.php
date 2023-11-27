<h2>Konfirmasi Hapus</h2>

<p>Anda yakin ingin menghapus produk <?php echo $produk->nama_produk; ?>?</p>

<form action="<?php echo base_url('tesprogrammer/hapus/' . $produk->id_produk); ?>" method="POST">
    <button type="submit">Ya, Hapus</button>
    <a href="<?php echo base_url(''); ?>">Batal</a>
</form>