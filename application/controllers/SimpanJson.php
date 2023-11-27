<?php

class Simpanjson extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('M_simpan');
    }

    public function simpan_json() {
        $url = 'https://recruitment.fastprint.co.id/tes/api_tes_programmer';
        $username = 'tesprogrammer281123C03';
        $password = '4fa37776381c62c7ef8f896d54efc8ca';

        $allData = $this->M_simpan->ambil_data($url, $username, $password);

        if(!empty($allData)) {
            $jsonfile = 'data.json';
            file_put_contents($jsonfile, json_encode($allData));
            echo 'Data berhasil disimpan ke dalam bentuk json <br>';
            echo '<a href="../">Kembali</a>';
        } else {
            echo 'Gagal ambil data dari API';
        }

    }
}

?>