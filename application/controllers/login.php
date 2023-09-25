<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//เรียกใช้ model หรือส่วนของการจัดการฐานข้อมูล
		$this->load->model('data_model');
	}

	public function index()
	{
		
		// $data['rsteacher']=$this->data_model->queryTeacherDetail($teacher_id);
		// $data['rs']=$this->data_model->queryListSubject();
		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;
		$this->load->view('template/header');
		$this->load->view('form_login');
		$this->load->view('template/footer');
	}

	public function authen()
{
    // print_r($_POST);
    // exit;

    if ($this->input->post('username') == '') {
        redirect('login', 'refresh');
    } else {
        $result = $this->data_model->fetch_user_login(
            $this->input->post('username'),
            sha1($this->input->post('password'))
        );

        if (!empty($result)) {
            $sess = array(
                'teacher_id' => $result->teacher_id,
                'teacher_firstname' => $result->teacher_firstname,
                'teacher_lastname' => $result->teacher_lastname
            );

            $this->session->set_userdata($sess);
            // ตัวแปรไอดีอาจารย์
            $teacher_id = $_SESSION['teacher_id'];

            if ($teacher_id > 0) {
                // echo 'username & password correct';
                redirect('dashboard', 'refresh');
            } else {
                $this->session->unset_userdata(array('teacher_id', 'teacher_firstname', 'teacher_lastname'));
                redirect('login', 'refresh');
            }
        } else {
            $this->session->unset_userdata(array('teacher_id', 'teacher_firstname', 'teacher_lastname'));
            redirect('login', 'refresh');
        }
    }
}
public function logout()
{
    $this->session->unset_userdata(array('teacher_id','teacher_firstname','teacher_lastname'));
    redirect('','refresh');
}

} //class
