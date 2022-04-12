<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	use GuzzleHttp\Client;
	class Pembayaran_model extends CI_Model {
 


	private $_client;
	public function __construct(){
	$this->_client = new Client([
		'base_uri'=> 'http://localhost/pkpi/prototype_faspay/api/',
		'auth'=>['admin','1234']
	]);
}


        public function get_tarif(){
			$this->db->order_by('id_tarif', 'ASC');
        $this->db->select('*');
        return $this->db->from('tbl_tarif')
          ->get()
          ->result();
		}

		public function find($id){

			$result=$this->db->where('id_tarif',$id)
									->limit(1)
									->get('tbl_tarif');
		if ($result->num_rows()>0) {
			# code...
			return $result->row();

		}else {
			return array();
		}
		}
	
		function input_data($data,$table){
			$this->db->insert($table,$data);
		}


		public function get_pembayaran(){
			$nis=$this->session->userdata('nis');
			$this->db->order_by('id_pembayaran', 'ASC');
        $this->db->select('*');
        return $this->db->from("tbl_pembayaran where nis='$nis'")
          ->get()
          ->result();
		}

		public function get_profile(){

			$nis=$this->session->userdata('nis');
			return $this->db->query("select * from tbl_siswa where nis='$nis'")->result();
		}



		public function bayar_proses(){


			// $nis= $this->input->post('nis');
			// $id_tarif=$this->input->post('id_tarif');
			// $nominal=$this->input->post('nominal');
			$tarif_id=$this->input->post('id_tarif', true);
			$hasil= implode(",",(array)$this->input->post('id_tarif',true));
			$nis=$this->input->post('nis', true);
			$nominal=$this->input->post('nominal',true);
	

			$data= [
				"nis" => $nis,
				"id_tarif" => $hasil,
				'nominal'=>$nominal
				// ''=>$id_tarif,
				// 'nominal'=>$nominal
			];
			//masuk data tabel tagihan
			// $tagihan=$this->db->query("INSERT INTO tbl_tagihan ('nis,id_tarif,nominal') value ('171051043','1','a')");
			$tagihan=$this->db->insert('tbl_tagihan',$data);

			$id_tagihan=$this->db->insert_id();
			$data= [
					'id_tagihan'=>$id_tagihan,
					'nominal'=>$this->input->post('nominal',true),
			];
			$detail_pembayaran=$this->db->insert('tbl_detail_pembayaran',$data);
	
			if ($detail_pembayaran=null) {
				redirect('siswa/pembayaran');	
				
			}else {
				$this->load->helper('string');
				$trx_id=random_string('numeric',5);
			
				$data= [
					'tanggal'=> date("Y-m-d H:i:s"),
					"nis" => $this->input->post('nis', true),
					'time_post'=>date("H:i:s"),
					'batas_bayar'=>0,
					'time_respon'=>0,
					'trx_id'=>0,
					'va'=>0,
					"nominal" => $this->input->post('nominal', true),
					'status'=>'a'
				];
				//masuk data tabel pembayaran
				$this->db->insert('tbl_pembayaran',$data);
				
				//masuk data ke database faspay
			
				$data= [
					'tanggal'=> date("Y-m-d H:i:s"),
					"nis" => $this->input->post('nis', true),
					'time_post'=>date("H:i:s"),
					'trx_id'=>0,
					"nominal" => $this->input->post('nominal', true),
					'wpu-key'=>'rahasia'
				];
				
				$response = $this->_client->request('POST','pembayaran',[
					'form_params'=>$data
		
				]);
				//echo print_r(json_encode($response));
				//cek status repone true atau flase
				//true update mahasiswa
				//flase respon error
		
				$result = json_decode($response->getBody()->getContents(),true);//type data object memanggil data di ci2
				//$result = json_decode($response,true);
				// $status= json_encode(
				//     $result['status']
				// );
				
				
			 //   echo json_encode($result);//json
		
				// $isirespon=  json_encode(
				//     $result['data']);
					// echo $isirespon;
					// echo $status;
				$status=$result['status'];    //memanggil response pada status
				$message=$result['message'];    //memanggil response pada message
				$koderespon=$result['data']['va']; //memanggil response pada data berisi kode respon
				$nrp=$result['data']['nis']; //memanggil response pada data bersisi nrp
				$time_respon=$result['data']['time_respon']; 
				$batas_bayar=$result['data']['batas_bayar']; 
				$trx_id=$result['data']['trx_id']; 
				

				
				// echo print_r( $status);
				// echo print_r( $message);
				// echo print_r($koderespon);
				// echo print_r($nrp);
				// die;
		
				// echo $status;
				// echo $message;
		
					if ($status) {
						# code...
		
						$query=$this->db->query("update tbl_pembayaran set va='".$koderespon."',trx_id='".$trx_id."',time_respon='".$time_respon."',batas_bayar='".$batas_bayar."' where nis='".$nrp."'");
						redirect('siswa/tagihan');
						
						// if ($query=null) {
						
						//     echo "gagal";
						// }return $query;
						// echo $respon;
						// echo $nrp;
					}else {
						# code...
						"gagal";
					}
				
	
				
	
			}
			
		 
	
	}
	
	}