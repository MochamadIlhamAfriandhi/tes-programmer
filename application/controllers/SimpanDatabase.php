<?php

class SimpanDatabase extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('M_produk');
        $this->load->model('M_kategori');
        $this->load->model('M_status');
        $this->load->library('form_validation');
    }
    
    public function simpandata_json() {
        $jsonFile = 'data.json';
        $jsonString = file_get_contents($jsonFile);
        $data = json_decode($jsonString, true);

        foreach ($data['data'] as $record) {
            $kategori_id = $this->M_kategori->insertKategori($record['kategori']);

            if ($kategori_id !== null) {
                echo 'Kategori "' . $record['kategori'] . '" berhasil disimpan dengan ID ' . $kategori_id . '<br>';
            } else {
                echo 'Kategori "' . $record['kategori'] . '" sudah ada, tidak perlu disimpan lagi.<br>';
            }

            $status_id = $this->M_status->insertStatus($record['status']);

            if ($status_id !== null) {
                echo 'Status "' . $record['status'] . '" berhasil disimpan dengan ID ' . $status_id . '<br>';
            } else {
                echo 'Status "' . $record['status'] . '" sudah ada, tidak perlu disimpan lagi.<br>';
            }

            $this->M_produk->insertDB([
                'id_produk' => $record['id_produk'],
                'nama_produk' => $record['nama_produk'],
                'harga' => $record['harga'],
                'kategori' => $record['kategori'],
                'status' => $record['status'],
            ]);

            echo 'Data produk berhasil disimpan ke dalam tabel. <br>';
        }
        echo '<a href="../">Kembali</a>';
    }

    public function tambahProduk() {
        $this->form_validation->set_rules('idproduk', 'Id Produk', 'required|numeric');
        $this->form_validation->set_rules('namaproduk', 'Nama Produk', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');

        $id_produk = $this->input->post('idproduk');
        $nama_produk = $this->input->post('namaproduk');
        $harga = $this->input->post('harga');
        $nama_kategori = $this->input->post('kategori');
        $nama_status = $this->input->post('status');

        $id_kategori = $this->M_kategori->getIDKategori($nama_kategori);
        $id_status = $this->M_status->getIDStatus($nama_status);

        if ($this->form_validation->run() == FALSE) {
            $data['kategori'] = $this->M_kategori->getKategori();
		    $data['status'] = $this->M_status->getStatus();
		    $this->load->view('inputProduk', $data);
        } else {
            if ($id_kategori !== null && $id_status !== null) {
                $data = array(
                    'id_produk' => $id_produk,
                    'nama_produk' => $nama_produk,
                    'harga' => $harga,
                    'kategori_id' => $id_kategori,
                    'status_id' => $id_status
                );
    
                $this->M_produk->insertProduk($data);
    
                echo "Data produk berhasil diinsert.";
                echo '<a href="../"> Kembali</a>';
            } else {
                echo "Gagal insert produk";
                echo '<a href="../"> Kembali</a>';
            }
        }
    }

    public function editProduk() {
        $this->form_validation->set_rules('namaproduk', 'Nama Produk', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');

        $id_produk = $this->input->post('idproduk');
        $nama_produk = $this->input->post('namaproduk');
        $harga = $this->input->post('harga');
        $nama_kategori = $this->input->post('kategori');
        $nama_status = $this->input->post('status');

        $id_kategori = $this->M_kategori->getIDKategori($nama_kategori);
        $id_status = $this->M_status->getIDStatus($nama_status);

        if ($this->form_validation->run() == FALSE) {
            $data['produk'] = $this->M_produk->cekProduk($id_produk);
		    $data['kategori'] = $this->M_kategori->getKategori();
		    $data['status'] = $this->M_status->getStatus();
		    $this->load->view('editProduk', $data);
        } else {
            if ($id_kategori !== null && $id_status !== null) {
                $data = array(
                    'nama_produk' => $nama_produk,
                    'harga' => $harga,
                    'kategori_id' => $id_kategori,
                    'status_id' => $id_status
                );
    
                $this->M_produk->updateProduk($id_produk, $data);
                echo "Data produk berhasil diupdate.";
                echo '<a href="../"> Kembali</a>';
            } else {
                echo "Gagal update produk";
                echo '<a href="../"> Kembali</a>';
            }
        }
    }
}

?>