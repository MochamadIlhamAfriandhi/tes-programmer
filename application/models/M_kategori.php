<?php

class M_kategori extends CI_Model {

    public function getKategori() {
        $query = $this->db->get('kategori');
        return $query->result();
    }
    
    public function insertKategori($kategori) {
        if (!$this->cekKategori($kategori)) {
            $this->db->insert('kategori', ['nama_kategori' => $kategori]);
            return $this->db->insert_id();
        } else {
            return null;
        }
    }

    public function getIDKategori($kategori) {
        $query = $this->db->get_where('kategori', ['nama_kategori' => $kategori]);
        $result = $query->row();

        if ($result !== null) {
            return $result->id_kategori;
        } else {
            return null;
        }
    }

    private function cekKategori($kategori) {
        $query = $this->db->get_where('kategori', ['nama_kategori' => $kategori]);
        return $query->num_rows() > 0;
    }
}

?>