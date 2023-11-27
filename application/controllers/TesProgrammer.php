<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tesprogrammer extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('M_produk');
		$this->load->model('M_status');
		$this->load->model('M_kategori');
		$this->load->library('form_validation');
	}
	
	public function index() {
		$query = $this->M_produk->getProduk();
		$data = array('queryProduk' => $query);
		$this->load->view('tes_programmer', $data);
	}

	public function input() {
		$data['kategori'] = $this->M_kategori->getKategori();
		$data['status'] = $this->M_status->getStatus();
		$this->load->view('inputProduk', $data);
	}

	public function edit($id_produk) {
		$data['produk'] = $this->M_produk->cekProduk($id_produk);
		$data['kategori'] = $this->M_kategori->getKategori();
		$data['status'] = $this->M_status->getStatus();
		$this->load->view('editProduk', $data);
	}

	public function hapus($id_produk){
		$this->M_produk->hapusProduk($id_produk);
		redirect(base_url(''));
	}
}
