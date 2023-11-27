<?php

class M_produk extends CI_Model {
    
    public function getProduk() {
        $this->db->select('produk.*, kategori.nama_kategori, status.nama_status');
        $this->db->from('produk');
        $this->db->join('kategori', 'kategori.id_kategori = produk.kategori_id');
        $this->db->join('status', 'status.id_status = produk.status_id');
        $this->db->where('status.nama_status', 'bisa dijual');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function insertDB($data) {
        $kategori_id = $this->M_kategori->getIDKategori($data['kategori']);
        $status_id = $this->M_status->getIDStatus($data['status']);

        $this->db->insert('produk', [
            'id_produk' => $data['id_produk'],
            'nama_produk' => $data['nama_produk'],
            'harga' => $data['harga'],
            'kategori_id' => $kategori_id,
            'status_id' => $status_id,
        ]);
    }

    public function insertProduk($data) {
        $this->db->insert('produk', $data);
    }

    public function cekProduk($id_produk) {
        $this->db->select('produk.id_produk, produk.nama_produk, produk.harga, produk.kategori_id, produk.status_id, kategori.nama_kategori, status.nama_status');
        $this->db->from('produk');
        $this->db->join('kategori', 'kategori.id_kategori = produk.kategori_id');
        $this->db->join('status', 'status.id_status = produk.status_id');
        $this->db->where('produk.id_produk', $id_produk);
        $query = $this->db->get();
        return $query->row();
    }

    public function updateProduk($id_produk, $data) {
        $this->db->where('id_produk', $id_produk);
        $this->db->update('produk', $data);
    }

    public function hapusProduk($id_produk) {
        $this->db->where('id_produk', $id_produk);
        $this->db->delete('produk');
    }
}

?>