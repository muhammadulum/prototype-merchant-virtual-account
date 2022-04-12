<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
    {

        parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('pembayaran_model');
    }


	public function index()
	{
		// $this->_rules();

		// if ($this->form_validation->run()==FALSE) {
		// 	$this->load->view('templates/header');
		// 	$this->load->view('form_login');
		// }else {
		// 	$email= $this->input->post('email');
		// 	$password= $this->input->post('password');

		// 	$cek=$this->pembayaran_model->cek_login($email,$password);

		// 	if ($cek== FALSE) {
		// 		$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
        //             emaill atau password salah silahkan Cek lagi</div>');
		// 		redirect('welcome');
		// 	}else {
		// 		$this->session->set_userdata('hak_akses',$cek->hak_akses);
		// 		$this->session->set_userdata('email',$cek->email);
		// 		switch ($cek->hak_akses) {
		// 			case 1: redirect('welcome');
		// 				break;
		// 			case 2 : redirect('siswa');
		// 			break;
		// 			default:
		// 				break;
		// 		}

		// 	}

		// }

		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
        $this->form_validation->set_rules('password','Password','trim|required');
        
        if ($this->form_validation->run()== false) {
        
       
        $this->load->view('templates/header');
        $this->load->view('form_login');
       
        }else {
            //validasi sukses

            $this->_login();
        }
		
	}


	private function _login(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('tbl_siswa',['email'=>$email])->row_array();
         //jika ada user
        if ($user) {
            //jika user aktif

            
                //cek passowrd

                if (password_verify($password,$user['password'])) {
                    $data =[
						
						'id_siswa'=>$user['id_siswa'],
						'nis'=>$user['nis'],
						'nama_siswa'=>$user['nama_siswa'],
						'tempat_lahir'=>$user['tempat_lahir'],
						'tgl_lahir'=>$user['tgl_lahir'],
						'jenis_kelamin'=>$user['jenis_kelamin'],
						'no_hp'=>$user['no_hp'],
						'alamat'=>$user['alamat'],
						'email'=>$user['email'],
                       

                    ];
                    $this->session->set_userdata($data);
                        redirect('siswa');

            }else {
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                 emial not actived!</div>');
                redirect('welcome');
            }
          
        }else {
            //jika tidak ada
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
            Email not a registerd !</div>');
            redirect('welcome');

        }

    }

	public function _rules(){

		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('password','Password','required');
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('welcome');
	}

	public function daftar(){
		$this->load->view('templates/header');
			$this->load->view('form_daftar');

	}

	public function registrasi()

    {
       $this->form_validation->set_rules('nis','Nis','required|trim');
       $this->form_validation->set_rules('nama_siswa','Nama siswa','required|trim');
       $this->form_validation->set_rules('tempat_lahir','Tempat Lahir','required|trim');
       $this->form_validation->set_rules('tgl_lahir','Tanggal Lahir','required|trim');
       $this->form_validation->set_rules('jenis_kelamin','Jenis kelamin','required|trim');
       $this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[tbl_siswa.email]
       ',['is_unique' =>'this email has already registred']);
       $this->form_validation->set_rules('no_hp','No hp','required|trim');
       $this->form_validation->set_rules('alamat','Alamat','required|trim');
       $this->form_validation->set_rules('password1','Password','required|trim|min_length[3]|matches[password2]');
       $this->form_validation->set_rules('password2','Password','required|trim|matches[password1]');


        if( $this->form_validation->run()== false){
            
            $this->load->view('form_daftar');
            

        }else{
            $data = [
                'nis' => htmlspecialchars ($this->input->post('nis',true)),
                'nama_siswa' => htmlspecialchars ($this->input->post('nama_siswa',true)),
                'tempat_lahir' => htmlspecialchars ($this->input->post('tempat_lahir',true)),
                'tgl_lahir' => htmlspecialchars ($this->input->post('tgl_lahir',true)),
                'jenis_kelamin' => htmlspecialchars ($this->input->post('jenis_kelamin',true)),
                'email' => htmlspecialchars ($this->input->post('email',true)),
                'no_hp' => htmlspecialchars ($this->input->post('no_hp',true)),
                'alamat' => htmlspecialchars ($this->input->post('alamat',true)),
                'password' => password_hash($this->input->post('password1'),
                PASSWORD_DEFAULT),
            ];


            $this->db->insert('tbl_siswa',$data);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
            congratulation your account created. please login!
          </div>');
            redirect('welcome');


        }
        

    }
}
