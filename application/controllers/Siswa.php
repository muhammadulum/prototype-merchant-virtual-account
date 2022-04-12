<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	   
	
   
	public function index()
	{
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('siswa/dasboard');
		$this->load->view('templates/footer');
	}



	public function profile(){
		$data['hasil']=$this->pembayaran_model->get_profile();
		$this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('siswa/profile',$data);
		$this->load->view('templates/footer');

	}

	public function tambah_ke_keranjang($id){

		$tarif=$this->pembayaran_model->find($id);

		$data = array(
			'id'      => $tarif->id_tarif,
			'qty'     => 1,
			'price'   => $tarif->nominal_tarif,
			'name'    => $tarif->nama_item,
	);
	
	$this->cart->insert($data);
	redirect('siswa');
	}



	public function detail_keranjang(){

		$this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('siswa/keranjang');
		$this->load->view('templates/footer');
	}

	public function hapus_keranjang(){
		$this->cart->destroy();
		redirect('siswa');
	}

	public function bayar_keranjang(){
		
		$this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('siswa/bayar');
		$this->load->view('templates/footer');
	}

	public function pembayaran(){
		$data['hasil']=$this->pembayaran_model->get_tarif();
		$this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('siswa/pembayaran',$data);
		$this->load->view('templates/footer');

	}

	public function bayar(){
		$this->cart->destroy();
		$this->pembayaran_model->bayar_proses();
           redirect('siswa');
	}
	

	public function print(){

		$data['hasil']=$this->pembayaran_model->get_pembayaran();
		$this->load->view('siswa/cetak_tagihan',$data);

	}


	public function tagihan(){
		$data['hasil']=$this->pembayaran_model->get_pembayaran();
		$this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('siswa/samery',$data);
		$this->load->view('templates/footer');
	}
}
