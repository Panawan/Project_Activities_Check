<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InsertClass extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//เรียกใช้ model หรือส่วนของการจัดการฐานข้อมูล
		$this->load->model('data_model');
	}

	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('regisInsertClass_view');
		$this->load->view('template/footer');
	}

	public function addclass()
	{

		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit;
		$s_name = $this->input->post('s_name');
		$ref_teacher_id = $this->input->post('ref_teacher_id');
		$data = array(
			's_name' => $this->input->post('s_name'),
			'ref_teacher_id' => $this->input->post('ref_teacher_id')
		);
		$result = $this->data_model->checkClassDuplicate($s_name);
		if(!empty($result)){
					//ข้อมูลซ้ำ
					// Display an error Toastr notification
					$this->session->set_flashdata('check_duplicate', 'ข้อมูลซ้ำ');
					redirect('teacher', 'refresh');

		}else{
					//inserting	
					$query = $this->db->insert('tbl_class',$data);
					// Display a success Toastr notification
					$this->session->set_flashdata('save_success', 'บันทึกข้อมูลเรียบร้อยแล้ว');
					redirect('teacher', 'refresh');
		}
	}

}

