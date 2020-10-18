<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserDetail extends CI_Controller {

	public function index()
	{
		$session_data=$this->session->userdata('logged_in');
        $data['username']=$session_data['username'];
        $data['level']=$session_data['level'];
        $data['id']=$session_data['id'];

        $this->load->model('user');
        $id = $data['id'];
        $data['name'] = $this->user->selectAll($id);

        $this->load->model('EventScheduleModel');
        $data["artist_list"] = $this->EventScheduleModel->getArtistOption();
        $data["cat_list"] = $this->EventScheduleModel->getCatOption();

        $this->load->view('user/headerAllEvent', $data);
        $this->load->view('user/profile', $data);
        $this->load->view('user/footer'); 
	}

	public function updatePhoto(){
        $this->load->helper('url','form');
        $this->load->library('form_validation');
        $this->load->model('User');

        $session_data=$this->session->userdata('logged_in');
        $data['username']=$session_data['username'];
        $data['level']=$session_data['level'];
        $data['id']=$session_data['id'];
        $id = $data['id'];
        
            $config['upload_path']='./assets/imgEvent/';
            $config['allowed_types']='gif|jpg|png|jpeg';
            $config['max_size']=1000000000;
            $config['max_width']=10240;
            $config['max_height']=7680;

            $this->load->library('upload', $config);
            if (! $this->upload->do_upload('pic')) {
                redirect('UserDetail','refresh');
                
            }else{
                $this->User->updatePic($id);
                echo "<script>alert('Successfully Updated'); </script>";
                redirect('UserDetail','refresh');
        	}
    	}

		public function update()
	    {
        $session_data=$this->session->userdata('logged_in');
        $data['username']=$session_data['username'];
        $data['level']=$session_data['level'];
        $data['id']=$session_data['id'];

        $id = $data['id'];

		$this->load->model('User');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Full Name', 'trim|required');
        $this->form_validation->set_rules('add', 'Address', 'trim|required');
        $this->form_validation->set_rules('phone', 'Phone Number', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $session_data=$this->session->userdata('logged_in');
        $data['username']=$session_data['username'];
        $data['level']=$session_data['level'];
        $data['id']=$session_data['id'];

        $this->load->model('user');
        $id = $data['id'];
        $data['name'] = $this->user->selectAll($id);

        $this->load->view('user/headerAllEvent', $data);
        $this->load->view('user/profile', $data);
        $this->load->view('user/footer');     
        } else {
        	    $this->User->updateNoPass($id);
                $session_data['username'] = $this->input->post('username');
                $data['username']=$session_data['username'];
                  echo "<script>alert('Successfully Updated'); </script>";
                  redirect('UserDetail','refresh');
	   }
    }

    public function updatePass()
        {
        $session_data=$this->session->userdata('logged_in');
        $data['username']=$session_data['username'];
        $data['level']=$session_data['level'];
        $data['id']=$session_data['id'];

        $id = $data['id'];

        $this->load->model('User');
        $this->load->library('form_validation');


        $this->form_validation->set_rules('old', 'Old Password', 'trim|required|callback_cekDb');
        $this->form_validation->set_rules('password', 'New Password', 'trim|required');
        $this->form_validation->set_rules('confirm', 'Confirm Password', 'trim|required|matches[password]');


        if ($this->form_validation->run() == FALSE) {
        $data['name'] = $this->User->selectAll($id);

        $this->load->view('user/headerAllEvent', $data);
        $this->load->view('user/profile', $data);
        $this->load->view('user/footer');     
        } else {
            $old = $this->input->post('old');
            $new = $this->input->post('password');
            $confirm = $this->input->post('confirm');
            
            if ($new == $confirm){
            $this->User->updatePass($id);
            $session_data['username'] = $this->input->post('username');
            $session_data['password'] = MD5($this->input->post('password'));
            $data['username']=$session_data['username'];
            $data['password']=$session_data['password'];
            echo "<script>alert('Successfully Updated'); </script>";
            redirect('UserDetail','refresh');
            }
       }
    }

            public function cekDb($password)
        {
            $session_data=$this->session->userdata('logged_in');
            $this->load->model('User');
            $username = $session_data['username'];
            $result = $this->User->login($username,$password);
            if($result){
                return true;
            }else{
                $this->form_validation->set_message('cekDb',"Old Password Wrong");
                return false;
            }
        }
}

/* End of file AdminDetail.php */
/* Location: ./application/controllers/AdminDetail.php */