<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita_model extends CI_Model {

	// Load database
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

  //Listing
  public function listing() {
    $this->db->select('*');
    $this->db->from('berita');
    $this->db->order_by('id_berita','ASC');
    $query = $this->db->get();
    return $query->result();
  }

	//Slider
  public function slide() {
    $this->db->select('*');
    $this->db->from('berita');
		$this->db->where(array(	'jenis_berita'  => 'Slide',
														'status_berita' => 'Publish'
													));
    $this->db->order_by('id_berita','ASC');
		$this->db->limit(5);
    $query = $this->db->get();
    return $query->result();
  }

	//Slider
  public function berita() {
    $this->db->select('*');
    $this->db->from('berita');
		$this->db->where(array(	'jenis_berita'  => 'Berita',
														'status_berita' => 'Publish'
													));
    $this->db->order_by('id_berita','DESC');
		$this->db->limit(6);
    $query = $this->db->get();
    return $query->result();
  }

	public function detail($id_berita) {
	    $this->db->select('*');
	    $this->db->from('berita');
	    $this->db->where('id_berita',$id_berita);
	    $this->db->order_by('id_berita','ASC');
	    $query = $this->db->get();
	    return $query->row();
	  }

	// Tambah
	public function tambah ($data) {
		$this->db->insert('berita',$data);
	}

  // Edit
  public function edit ($data) {
    $this->db->where('id_berita',$data['id_berita']);
    $this->db->update('berita',$data);
  }

  // Delete
	public function delete ($data){
		$this->db->where('id_berita',$data['id_berita']);
		$this->db->delete('berita',$data);
	}

}
