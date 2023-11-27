<?php

class M_simpan extends CI_Model {

    public function ambil_data($url, $username, $password) {
        $allData = [];

        $page = 1;
        do {
            $data = $this->ambil_halaman_data($url, $username, $password, $page);
            
            if ($data !== false) {
                $allData = array_merge($allData, $data);
                $page++;
            } else {
                break;
            }
        } while (!empty($data));

        return $allData;
    }

    private function ambil_halaman_data($url, $username, $password, $page) {
        $data = array(
            'username' => $username,
            'password' => $password,
            'page' => $page
        );
        
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        if ($httpCode == 200) {
            return json_decode($response, true);
        } else {
            return false;
        }
    }
}

?>