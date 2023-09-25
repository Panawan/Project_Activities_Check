<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Data_model extends CI_Model {

        public function queryListSubject()
        {
                $this->db->select('s.*, COUNT(ref_std_id) AS totalstd');
                $this->db->from('tbl_class  as s');
                $this->db->join('tbl_enroll as e', 's.s_id=e.ref_s_id','left');
                $this->db->group_by('s.s_id');
                $query = $this->db->get();
                return $query->result();
        }

        public function queryListStd($s_id)
        {
                $this->db->select('s.*');
                $this->db->from('tbl_std  as s');
                $this->db->join('tbl_enroll as e', 's.std_id=e.ref_std_id');
                $this->db->where('e.ref_s_id', $s_id);
                $query = $this->db->get();
                return $query->result();
        }

        public function querySubjectDetail($s_id)
        {
                $this->db->select('s.*, t.teacher_prefix, t.teacher_firstname, teacher_lastname');
                $this->db->from('tbl_class AS s');
                $this->db->join('tbl_teacher AS t', 't.teacher_id=s.ref_teacher_id');
                $this->db->where('s.s_id',$s_id);
                $rs = $this->db->get();
                if($rs->num_rows() > 0){
                        $data = $rs->row();
                        return $data;
                }
                return FALSE;
        }

        public function queryTeacherDetail($teacher_id)
        {
                $this->db->where('teacher_id',$teacher_id);
                $rs = $this->db->get('tbl_teacher');
                if($rs->num_rows() > 0){
                        $data = $rs->row();
                        return $data;
                }
                return FALSE;
        }


        public function checkDuplicate($s_id, $teacher_id, $currentDate)
                {
                        $this->db->where('ref_s_id',$s_id);
                        $this->db->where('ref_teacher_id',$teacher_id);
                        $this->db->where('check_in_date',$currentDate);
                        $query = $this->db->get('tbl_checkin');
                        return $query->row();
                }

         

        public function saveCheckInToDB()
        {
                //multiple insert
                $std_id = $this->input->post('std_id'); //ไอดี นศ และ มา/ขาด แยก key & value

                foreach($std_id as $ref_std_id=> $check_in_status){
                        
                        $ref_teacher_id = $this->input->post('teacher_id');
                        $ref_s_id = $this->input->post('s_id');

                        $data = array(
                            array(
                            'ref_std_id' => $ref_std_id, //ไอดี นศ.
                            'check_in_status' => $check_in_status, // มา/ขาด
                            'ref_s_id' => $ref_s_id, //ไอดี ห้อง
                            'ref_teacher_id' => $ref_teacher_id,  //ไอดีอาจารย์
                            'check_in_date' => date('Y-m-d') //วันที่เช็คชื่อ
                            )
                        );
                         $this->db->insert_batch('tbl_checkin',$data);
             }//close forearch
        } //func


        public function queryCheckInStd($s_id, $teacher_id, $currentDate)
        {
                $this->db->select('s.*, i.check_in_status, i.no');
                $this->db->from('tbl_std  as s');
                // $this->db->join('tbl_enroll as e', 's.std_id=e.ref_std_id');
                $this->db->join('tbl_checkin as i', 's.std_id=i.ref_std_id');
                $this->db->where('i.ref_s_id', $s_id); //ใช้อันนี้
                $this->db->where('i.ref_teacher_id', $teacher_id);
                $this->db->where('i.check_in_date', $currentDate);
                $this->db->group_by('i.ref_std_id');
                $query = $this->db->get();
                return $query->result();
        }
        
        public function queryHistoryCheckInDetail($check_in_date, $ref_s_id)
        {
                $this->db->select('s.*, i.check_in_status, i.no');
                $this->db->from('tbl_std  as s');
                // $this->db->join('tbl_enroll as e', 's.std_id=e.ref_std_id');
                $this->db->join('tbl_checkin as i', 's.std_id=i.ref_std_id');
                $this->db->where('i.ref_s_id', $ref_s_id); //ใช้อันนี้
                // $this->db->where('i.ref_teacher_id', $teacher_id);
                $this->db->where('i.check_in_date', $check_in_date);
                $this->db->group_by('i.ref_std_id');
                $query = $this->db->get();
                return $query->result();
        }

        public function checkClassDuplicate($s_name)
        {
                $this->db->where('s_name',$s_name);
                $query = $this->db->get('tbl_class');
                return $query->row();
        }
        
        public function updateCheckInToDB()
        {
                //multiple update
                $no = $this->input->post('no'); //ลำดับ นศ และ มา/ขาด แยก key & value

                foreach($no as $no=> $check_in_status){
                        $data = array(
                            array(
                            'no' => $no, //ลำดับ นศ.
                            'check_in_status' => $check_in_status
                            )
                        );
                $this->db->update_batch('tbl_checkin',$data,'no');
             }//close forearch
        } //func

        public function queryListDate($s_id)
        {
                $this->db->select('check_in_date, ref_s_id');
                $this->db->where('ref_s_id', $s_id);
                $this->db->group_by('check_in_date');
                $query = $this->db->get('tbl_checkin');
                return $query->result();
        }

        public function queryDateCheckIn($check_in_date, $ref_s_id)
        {
                $this->db->select('check_in_date');
                $this->db->where('check_in_date', $check_in_date);
                $this->db->where('ref_s_id', $ref_s_id);
                $rs = $this->db->get('tbl_checkin');
                if($rs->num_rows() > 0){
                        $data = $rs->row();
                        return $data;
                }
                return FALSE;
        }

        public function update_subject()
        {
            $data = array(
                's_name' => $this->input->post('s_name'),
                'ref_teacher_id' => $this->input->post('ref_teacher_id')
            );
            $this->db->where('s_id', $this->input->post('s_id'));
            $this->db->update('tbl_class', $data);
        }

        public function del_class($s_id)
        {
            $this->db->delete('tbl_class', array('s_id'=>$s_id));
        }
        public function fetch_user_login($username, $password)
        {
            $this->db->where('username', $username);
            $this->db->where('password', $password);
            $query = $this->db->get('tbl_teacher');
            return $query->row();
        }

        public function update_teacher()
        {
            $data = array(
                'teacher_prefix' => $this->input->post('teacher_prefix'),
                'teacher_firstname' => $this->input->post('teacher_firstname'),
                'teacher_lastname' => $this->input->post('teacher_lastname'),
                'username' => $this->input->post('username')
            );
            $this->db->where('teacher_id', $this->input->post('teacher_id'));
            $this->db->update('tbl_teacher', $data);
        }

        public function update_password()
        {
            $data = array(
                'password' => sha1($this->input->post('password'))
            );
            $this->db->where('teacher_id', $this->input->post('teacher_id'));
            $this->db->update('tbl_teacher', $data);
        }

        /* dashboard */

        public function countSTD()
        {
                $this->db->select('COUNT(*) AS totalSTD');
                $rs = $this->db->get('tbl_std');
                if($rs->num_rows() > 0){
                        $data = $rs->row();
                        return $data;
                }
                return FALSE;
        }

        public function countCLASS()
        {
                $this->db->select('COUNT(*) AS totalCLASS');
                $rs = $this->db->get('tbl_class');
                if($rs->num_rows() > 0){
                        $data = $rs->row();
                        return $data;
                }
                return FALSE;
        }

        public function countCHECKIN()
        {
                $this->db->select('COUNT(*) AS totalCHK');
                $rs = $this->db->get('tbl_checkin');
                if($rs->num_rows() > 0){
                        $data = $rs->row();
                        return $data;
                }
                return FALSE;
        }

        public function countENROLL()
        {
                $this->db->select('COUNT(*) AS totalENROLL');
                $rs = $this->db->get('tbl_enroll');
                if($rs->num_rows() > 0){
                        $data = $rs->row();
                        return $data;
                }
                return FALSE;
        }

        public function countCHECKINBYDATE()
        {
                $this->db->select('check_in_date, COUNT(*) AS totalcheckINByDate');
                $this->db->from('tbl_checkin');
                $this->db->group_by('check_in_date');
                $this->db->order_by('check_in_date','DESC');
                $query = $this->db->get();
                return $query->result();
        }

                public function querySummary($ref_s_id)
        {
                $this->db->select('c.*,s.*');
                $this->db->from('tbl_checkin  as c ');
                $this->db->join('tbl_std as s','c.ref_std_id=s.std_id');
                $this->db->where('c.ref_s_id', $ref_s_id); 
                $this->db->group_by('c.ref_std_id, c.check_in_date');
                $this->db->order_by('c.ref_std_id, c.check_in_date', 'ASC');
                $query = $this->db->get();
                return $query->result();
        }

}