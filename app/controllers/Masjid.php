<?php 

class Masjid extends Controller {
	public function index()
	{
		$data['judul'] = 'Data Masjid';
		$data['pnr'] = $this->model('Masjid_model')->getAllMasjid();
		$this->view('home_index/header', $data);
		$this->view('Masjid/index', $data);
		$this->view('home_index/footer');
	}

	public function detail($id)
	{
		$data['judul'] = 'Detail Masjid';
		$data['pnr'] = $this->model('Masjid_model')->getMasjidById($id);
		$this->view('home_index/header', $data);
		$this->view('Masjid/detail', $data);
		$this->view('home_index/footer');
	}

	public function cari()
	{
		$data['judul'] = 'Data Masjid';
		$data['pnr'] = $this->model('Masjid_model')->cariMasjid();
		$this->view('home_index/header', $data);
		$this->view('Masjid/index', $data);
		$this->view('home_index/footer');
	}
	
	
	public function tambah()
	{
		$data['judul'] = 'Tambah Masjid';

		$this->view('home_index/header', $data);
		$this->view('Masjid/tambah',$data);
		$this->view('home_index/footer');
	}

	public function aksi_tambah(){
		if($this->model('Masjid_model')->tambahDataMasjid($_POST) > 0) {
			header('Location:' . BASEURL .'/Masjid');
			exit;
		}
	}

	public function hapus($id){
		if($this->model('Masjid_model')->hapusDataMasjid($id) > 0) {
			header('Location:' . BASEURL .'/Masjid');
			exit;
		}
	}
	public function form_edit($id)
	{
		$data['judul'] = 'Detail Masjid';
		$data['pnr'] = $this->model('Masjid_model')->ambilDataMasjid($id);
		$this->view('home_index/header', $data);
		$this->view('Masjid/form_edit', $data);
		$this->view('home_index/footer');
	}

	public function edit_data(){
		if($this->model('Masjid_model')->editDataMasjid($_POST) > 0) {
			header('Location:' . BASEURL .'/Masjid');
			exit;
		}
		else{
			header('Location:' . BASEURL .'/Masjid');
			exit;
		}
	}


}