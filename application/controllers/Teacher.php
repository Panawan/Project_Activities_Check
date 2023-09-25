<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher extends CI_Controller {

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
		$teacher_id = $_SESSION['teacher_id'];
		$data['rsteacher']=$this->data_model->queryTeacherDetail($teacher_id);
		$data['rs']=$this->data_model->queryListSubject();
		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;
		$this->load->view('template/header');
		$this->load->view('subject_list_view',$data);
		$this->load->view('template/footer');
	}

	public function checkInForm($s_id)
	{

		$teacher_id = $_SESSION['teacher_id'];

		$data['rsteacher']=$this->data_model->queryTeacherDetail($teacher_id);
		
		$data['rssubject']=$this->data_model->querySubjectDetail($s_id);

		if($data['rssubject']->s_id ==''){
			redirect('');
		}
		
		$data['rsStd']=$this->data_model->queryListStd($s_id);
		
		$countStd = count($data['rsStd']);
		if($countStd < 1){
			redirect('');
		}
		
		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;


		$this->load->view('template/header');
		$this->load->view('std_list_view',$data);
		$this->load->view('template/footer');
 
	}

	public function saveCheckIn()
	{
		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit();


		//check duplicate
		$s_id = $this->input->post('s_id');
		$teacher_id = $this->input->post('teacher_id');
		$currentDate = date('Y-m-d');
		$result = $this->data_model->checkDuplicate($s_id, $teacher_id, $currentDate);

		if(!empty($result)){
					//ข้อมูลซ้ำ
				    // $this->session->set_flashdata('warning_duplicate', TRUE);
                	// redirect('teacher', 'refresh');
                	echo '<script>alert("You Are Already Check This Record!");</script>';
                	redirect('teacher/checkInDetail/'.$s_id.'/'.$teacher_id.'/'.$currentDate, 'refresh');

		}else{
					//inserting	 
					$this->data_model->saveCheckInToDB();
					// $this->session->set_flashdata('save_success', TRUE);
					redirect('teacher/checkInDetail/'.$s_id.'/'.$teacher_id.'/'.$currentDate, 'refresh');
		}
		
	} //func


	public function checkInDetail($s_id, $teacher_id, $currentDate)
	{
		//echo $s_id;
		//echo '<hr>';
		//echo $teacher_id;
		//echo '<hr>';
		//echo $currentDate;

		$teacher_id = $_SESSION['teacher_id'];

		$data['rsteacher']=$this->data_model->queryTeacherDetail($teacher_id);
		
		$data['rssubject']=$this->data_model->querySubjectDetail($s_id);

		if($data['rssubject']->s_id ==''){
			redirect('');
		}

		$data['rsStd']=$this->data_model->queryCheckInStd($s_id, $teacher_id, $currentDate);
		
		//echo '<pre>';
		//print_r($data['rsStd']);
		//echo '</pre>';
		//exit();

		$countStd = count($data['rsStd']);
		if($countStd < 1){
			redirect('');
		}

		$this->load->view('template/header');
		$this->load->view('std_check_in_list_view',$data);
		$this->load->view('template/footer');
	}

	public function updateCheckIn()
	{
		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit();

		$s_id = $this->input->post('s_id');
		$teacher_id = $this->input->post('teacher_id');
		$currentDate = date('Y-m-d');

		//updateCheckIn	 
		$this->data_model->updateCheckInToDB();
		$this->session->set_flashdata('save_success', TRUE);
		redirect('teacher/checkInDetail/'.$s_id.'/'.$teacher_id.'/'.$currentDate, 'refresh');
	}
	
	public function checkInHistory($s_id)
	{

		$teacher_id = $_SESSION['teacher_id'];
		
		$data['rsteacher']=$this->data_model->queryTeacherDetail($teacher_id);

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
		$this->load->view('history_checkIn_view', $data);
		$this->load->view('template/footer');
	}

    public function checkDetailByDate($check_in_date, $ref_s_id)
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

	public function EditSubjectForm($s_id){
		$data['rsedit'] = $this->data_model->querySubjectDetail($s_id);

		$this->load->view('template/header');
		$this->load->view('subject_form_edit', $data);
		$this->load->view('template/footer');

		// echo '<pre>';
		// print_r($data['rsedit']);
		// echo '</pre>';
		// exit();
	}

	public function updateSubject(){
		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit();

		$this->form_validation->set_rules('s_id', 's_id', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('s_name', 's_name', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('ref_teacher_id', 'teacher ID', 'trim|required|min_length[1]');

		if($this->form_validation->run() == FALSE){
			$s_id = $this->input->post('s_id');
			$data['rsedit'] = $this->data_model->querySubjectDetail($s_id);
			$this->load->view('template/header');
			$this->load->view('subject_form_edit', $data);
			$this->load->view('template/footer');

		}else{
			//exit;
			$this->data_model->update_subject();
			$this->session->set_flashdata('save_success', TRUE);
			redirect('teacher','refresh');
		}
	}

	public function del($s_id){
		$this->data_model->del_class($s_id);
		$this->session->set_flashdata('del_success', TRUE);
		redirect('teacher','refresh');

	}

	public function updateprofile()
	{
		//print_r($_SESSION);
		$teacher_id = $_SESSION['teacher_id'];
		// echo $teacher_id;
		// exit();

	    $data['rseditProfile'] = $this->data_model->queryTeacherDetail($teacher_id);

		$this->load->view('template/header');
		$this->load->view('teacher_form_edit', $data);
		$this->load->view('template/footer');

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit();
	}

	public function updateTeacher()
	{
	 	// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit();

		$this->form_validation->set_rules('teacher_id', 'teacher_id', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('teacher_prefix', 'teacher_prefix', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('teacher_firstname', 'teacher_firstname', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('teacher_lastname', 'teacher_lastname', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('username', 'username', 'trim|required|min_length[1]');

		if($this->form_validation->run() == FALSE){
			$teacher_id = $this->input->post('teacher_id');
			$data['rseditProfile'] = $this->data_model->queryTeacherDetail($teacher_id);
			$this->load->view('template/header');
			$this->load->view('teacher_form_edit', $data);
			$this->load->view('template/footer');

		}else{
			//exit;
			$this->data_model->update_teacher();
			$this->session->set_flashdata('save_success', TRUE);
			redirect('teacher','refresh');
		}
	}

	public function updatepassword()
	{
	    //print_r($_SESSION);
		$teacher_id = $_SESSION['teacher_id'];
		// echo $teacher_id;
		// exit();

	    $data['rseditProfile'] = $this->data_model->queryTeacherDetail($teacher_id);

		$this->load->view('template/header');
		$this->load->view('password_form_edit', $data);
		$this->load->view('template/footer');

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit();
	}

	public function updatePasswordToDB()
	{

		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit();

	    $this->form_validation->set_rules('teacher_id', 'teacher_id', 'trim|required|min_length[1]');
	    $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[1]');
	    $this->form_validation->set_rules('password2', 'password2', 'trim|required|matches[password]');

	    if ($this->form_validation->run() == FALSE) {
	    	$teacher_id = $this->input->post('teacher_id');
	    	$data['rseditProfile'] = $this->data_model->queryTeacherDetail($teacher_id);
			$this->load->view('template/header');
			$this->load->view('password_form_edit', $data);
			$this->load->view('template/footer');
	    }
	    else {
	    	$this->data_model->update_password();
	    	redirect('teacher','refresh');
	    }
	}


} //class
