<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');
class ModelKategori extends CI_Model {

    public $kdkategori;
    public $namakategori;
    public $lokasirak;
  
    public function get_kategori()
    {
        $query = $this->db->get('kategoribuku');
        return $query->result_array();
     }

     public function insert_entry($data)
     {
             $this->db->insert('kategoribuku', $data);
     }

}
?>