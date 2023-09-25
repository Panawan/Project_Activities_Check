<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();


		//เรียกใช้ model หรือส่วนของการจัดการฐานข้อมูล
		$this->load->model('data_model');
	}

	public function index()
	{

		//print_r($_SESSION);
		$data['rs']=$this->data_model->queryListSubject();
		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;
		$this->load->view('template/header');
		$this->load->view('home_subject_list_view',$data);
		$this->load->view('template/footer');
	}

	public function detail($s_id)
	{

		$data['rsStd2']=$this->data_model->queryListStd($s_id);
		
		$countStd = count($data['rsStd2']);
		if($countStd < 1){
			redirect('');
		}

		$data['rssubject']=$this->data_model->querySubjectDetail($s_id);

		if($data['rssubject']->s_id ==''){
			redirect('');
		}
		
		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;


		$this->load->view('template/header');
		$this->load->view('class_nonuser_view',$data);
		$this->load->view('template/footer');
 
	}

	public function checkInHistory($s_id)
	{

		$data['rssubject']=$this->data_model->querySubjectDetail($s_id);

		$data['rsdate']=$this->data_model->queryListDate($s_id);

		//summary
		$data['rs']=$this->data_model->querySummary($s_id);

		//จัดการข้อมูลหน้าแสดงรายการสรุป

		$data_date = [];
		$data_array = [];
  	

		  foreach($data['rs'] as $key => $row) {
		    $data_array[$row->std_id.' '.$row->std_prefix.' '.$row->std_firstname.' '.$row->std_lastname][$row->check_in_date][] = $row->check_in_status;
		    if(!empty($data_date)){      
		        if(!in_array($row->check_in_date, $data_date)){
		            $data_date[] = $row->check_in_date;
		        }else{
		            continue;
		        }
		    }else{
		        $data_date[] = $row->check_in_date;
		    }
		    }

		    //ส่ง data ไปใช้ใน view
		    $data['data_date'] = $data_date;
		  	$data['data_array'] = $data_array;



    // print_r($data_date);
    // exit;

		$this->load->view('template/header');
		$this->load->view('history_checkIn_view_nonuser', $data);
		$this->load->view('template/footer');
	}

	public function checkDetailByDateFornonUser($check_in_date, $ref_s_id)
	{
		// $data['rsteacher']=$this->data_model->queryTeacherDetail();
		
		$data['rssubject']=$this->data_model->querySubjectDetail($ref_s_id);

		if($data['rssubject']->s_id ==''){
			redirect('');
		}

		$data['rsStd']=$this->data_model->queryHistoryCheckInDetail($check_in_date, $ref_s_id);
		
		// echo '<pre>';
		// print_r($data['rsStd']);
		// echo '</pre>';
		// exit();

		$countStd = count($data['rsStd']);
		if($countStd < 1){
			redirect('');
		}

		$data['rsDate']=$this->data_model->queryDateCheckIn($check_in_date, $ref_s_id);
		
		// echo '<pre>';
		// print_r($data['rsDate']);
		// echo '</pre>';
		// exit();

		$this->load->view('template/header');
		$this->load->view('history_check_in_list_view',$data);
		$this->load->view('template/footer');
	}
} // class