<?php

class Buku_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_all_data()
	{
		$query = $this->db->get('buku');
		return $query->result();
		
	}

	Public function get_data()
    {
        $this->db->select('*');
        $this->db->from('buku');
        $this->db->join('kategoribuku', 'buku.kategoribuku = kategoribuku.kdkategori');
        $this->db->order_by('judul ASC');
        $query = $this->db->get();
        return $query;
     }

	public function tambah_buku()
	{
		$data = [
					'idbuku' => $this->input->post('idbuku'),
					'judul' => $this->input->post('judul'),
					'penerbit' => $this->input->post('penerbit'),
					'pengarang' => $this->input->post('pengarang'),
					'bahasa' => $this->input->post('bahasa'),
					'tahunterbit' => $this->input->post('tahunterbit'),
					'kategoribuku' => $this->input->post('kategoribuku'),
					'deskripsi' => $this->input->post('deskripsi'),
				];

		$this->db->insert('buku', $data);
	}

	public function edit_buku($id)
	{
		$query = $this->db->get_where('buku', ['idbuku' => $id]);
		return $query->row();
	}

	public function update_buku()
	{
		$kondisi = ['idbuku' => $this->input->post('idbuku')];
		
		$data = [
					'judul' => $this->input->post('judul'),
					'penerbit' => $this->input->post('penerbit'),
					'pengarang' => $this->input->post('pengarang'),
					'bahasa' => $this->input->post('bahasa'),
					'tahunterbit' => $this->input->post('tahunterbit'),
					'kategoribuku' => $this->input->post('kategoribuku'),
					'deskripsi' => $this->input->post('deskripsi'),
				];

		$this->db->update('buku', $data, $kondisi);
	}

	public function hapus_buku($id)
	{
		$this->db->delete('buku', ['idbuku' => $id]);
	}
}

?>