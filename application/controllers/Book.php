<?php
class Book extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('book_model');
	}

	public function index(){
		$data['buku']=$this->book_model->get_all_books();
		$this->load->view('book_view', $data);
	}

	public function tambah_data()
	{
		$data = array (
			'no_isbn'=>$this->input->post('no_isbn'),
			'judul_buku'=>$this->input->post('judul_buku'),
			'penulis'=>$this->input->post('penulis'),
			'kategori'=>$this->input->post('kategori')
		);
		$insert = $this->book_model->tambah_data($data);
		echo json_encode(array("status"=>true));
	}

	public function ajax_edit($id)
	{
		$data =$this->book_model->get_by_id($id);
		echo json_encode($data);
	}

	public function update_data()
	{
		$data = array(
			'no_isbn'=>$this->input->post('no_isbn'),
			'judul_buku'=>$this->input->post('judul_buku'),
			'penulis'=>$this->input->post('penulis'),
			'kategori'=>$this->input->post('kategori')
		);
		$this->book_model->update_data(array('id_buku'=> $this->input->post('id_buku')),$data);
		echo json_encode(array("status"=>true));
	}

	public function hapus_data($id)
	{
		$this->book_model->delete_by_id($id);
		echo json_encode(array("status"=>true));
	}
}
?>