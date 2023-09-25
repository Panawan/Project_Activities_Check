<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$teacher_id = $_SESSION['teacher_id'];
		//chk admin status
		if ($this->session->userdata('teacher_id') != $teacher_id) {
			redirect('login','refresh');
		}

		//เรียกใช้ model หรือส่วนของการจัดการฐานข้อมูล
		$this->load->model('data_model');
	}

	public function index()
	{

		//print_r($_SESSION);
		// $teacher_id = $_SESSION['teacher_id'];
		$data['rowSTD']=$this->data_model->countSTD();
		$data['rowCls']=$this->data_model->countCLASS();
		$data['rowCHK']=$this->data_model->countCHECKIN();
		$data['rowENROLL']=$this->data_model->countENROLL();
		$data['rsCHKINBD']=$this->data_model->countCHECKINBYDATE();
		// $data['rs']=$this->data_model->queryListSubject();
		// echo '<pre>';
		// print_r($data['rsCHKINBD']);
		// echo '</pre>';
		// exit;
		$this->load->view('template/header');
		$this->load->view('dashboard_view',$data);
		$this->load->view('template/footer');
	}

	
} //class
