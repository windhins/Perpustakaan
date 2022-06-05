<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('buku_model');
		$this->load->model('ModelKategori');
		$this->load->helper(['url_helper', 'form']);
    	$this->load->library(['form_validation', 'session']);
	}

	/*public function index($page = 'home_view')
	{
		if(! file_exists(APPPATH.'views/'.$page.'.php'))
		{
			show_404();
		}

		$data['title'] = 'Beranda';
		$data['jembut'] = 'LOL';

		$this->load->view($page, $data);
	}

	public function about($page = 'about')
	{
		if(! file_exists(APPPATH.'views/'.$page.'.php'))
		{
			show_404();
		}

		$data['title'] = 'About';

		$this->load->view($page, $data);
	}*/

	public function index()
    {
          
    }

	public function lihatdata()
	{
		$data['database'] = $this->buku_model->get_all_data();
		$data['query']=$this->buku_model->get_data();
		$data['title'] = "Test tampil Database";

		$this->load->view('templates/header', $data);
		$this->load->view('tampildata', $data);
		$this->load->view('templates/footer');
	}

	public function formtambah()
	{
		$data['title'] = "Tambah Data | Test tampil Database";
		$data['query']=$this->ModelKategori->get_kategori();
		$this->load->view('templates/header', $data);
		$this->load->view('formtambah', $data);
		$this->load->view('templates/footer');
	}

	public function tambahbuku()
	{
		$this->form_validation->set_message('is_unique', '{field} sudah terpakai');

		$this->form_validation->set_rules('idbuku', 'ID Buku', ['required', 'is_unique[buku.idbuku]']);

		$this->validasi();

		if($this->form_validation->run() === FALSE)
		{
			$this->formtambah();
		}
		else
		{
			$this->buku_model->tambah_buku();
			$this->session->set_flashdata('input_sukses','Data buku berhasil di input');
			redirect(current_url());
		}
	}

	public function hapusdata($id)
	{
		$this->buku_model->hapus_buku($id);
		$this->session->set_flashdata('hapus_sukses','Data buku berhasil di hapus');
		redirect('/home/lihatdata');
	}

	public function formedit($id)
	{
		$data['title'] = 'Edit Data | Test tampil Database';
		$data['query']=$this->ModelKategori->get_kategori();
		$data['db'] = $this->buku_model->edit_buku($id);

		$this->load->view('templates/header', $data);
		$this->load->view('formedit', $data);
		$this->load->view('templates/footer');
	}

	public function updatebuku($id)
	{
		$this->validasi();

		if($this->form_validation->run() === FALSE)
		{
			$this->formedit($id);
		}
		else
		{
			$this->buku_model->update_buku();
			$this->session->set_flashdata('update_sukses', 'Data buku berhasil diperbaharui');
			redirect('/home/lihatdata');
		}
	}

	public function validasi()
	{
		$this->form_validation->set_message('required', '{field} tidak boleh kosong');

		$config = [[
					'field' => 'judul',
					'label' => 'Judul',
					'rules' => 'required'
				],
				[
					'field' => 'penerbit',
					'label' => 'Penerbit',
					'rules' => 'required'
				],
				[
					'field' => 'pengarang',
					'label' => 'Pengarang',
					'rules' => 'required'
				],
				[
					'field' => 'bahasa',
					'label' => 'Bahasa',
					'rules' => 'required'
				],
				[
					'field' => 'tahunterbit',
					'label' => 'Tahun Terbit',
					'rules' => 'required'
				],
				[
					'field' => 'kategoribuku',
					'label' => 'Kategori Buku',
					'rules' => 'required'
				],
				[
					'field' => 'deskripsi',
					'label' => 'Deskripsi',
					'rules' => 'required'
				]];

		$this->form_validation->set_rules($config);
	}
}
?>