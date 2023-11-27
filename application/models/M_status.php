<?php

class M_status extends CI_Model {

    public function getStatus() {
        $query = $this->db->get('status');
        return $query->result();
    }
    
    public function insertStatus($status) {
        if (!$this->cekStatus($status)) {
            $this->db->insert('status', ['nama_status' => $status]);
            return $this->db->insert_id();
        } else {
            return null;
        }
    }

    public function getIDStatus($status) {
        $query = $this->db->get_where('status', ['nama_status' => $status]);
        $result = $query->row();

        if ($result !== null) {
            return $result->id_status;
        } else {
            return null;
        }
    }

    private function cekStatus($status) {
        $query = $this->db->get_where('status', ['nama_status' => $status]);
        return $query->num_rows() > 0;
    }
}

?>