<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model
{
	private $_table = "produk";

	public $id_p;
	public $nama;
	public $harga;
	public $gambar;
	public $deskripsi;

	public function rules()
	{
		return[
			['field' => 'nama', 
			'label' => 'Nama', 
			'rules' => 'required'],

			['field' => 'harga', 
			'label' => 'harga', 
			'rules' => 'required'],			

			['field' => 'deskripsi', 
			'label' => 'Deskripsi', 
			'rules' => 'required']
		];
	}

	public function getAll()
	{
		return $this->db->get($this->_table)->result();
	}

	public function save()
	{
		$post = $this->input->post();
		$this->id_p = uniqid();
		$this->nama = $post["nama"];
		$this->harga = $post["harga"];
		$this->deskripsi = $post["deskripsi"];
		return $this->db->insert($this->_table, $this);
	}
	public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_p" => $id])->row();
    }
	public function update()
	{
		$post = $this->input->post();
		$this->id_p = $post["id_p"];
		$this->nama = $post["nama"];
		$this->harga = $post["harga"];
		$this->deskripsi = $post["deskripsi"];
		return $this->db->update($this->_table, $this, array('id_p' => $post['id_p']));
	}

	public function delete($id_p)
	{

		return $this->db->delete($this->_table, array("id_p" =>$id_p));
	}

}


?>