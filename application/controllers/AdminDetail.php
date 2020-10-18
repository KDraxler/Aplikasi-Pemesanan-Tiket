<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminDetail extends CI_Controller {

	public function index()
	{
		$session_data=$this->session->userdata('logged_in');
        $data['username']=$session_data['username'];
        $data['level']=$session_data['level'];
        $data['id']=$session_data['id'];

        $this->load->model('user');
        $id = $data['id'];
        $user = $data['username'];
        $data['name'] = $this->user->selectAll($id,$user);

        $this->load->model('Notif');
        $data['notif'] = $this->Notif->notifikasi();
        $data['countNotif'] = $this->Notif->count();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar'); 
        $this->load->view('admin/profileAdmin', $data);
        $this->load->view('admin/footer'); 
	}

	public function updatePhoto(){
        $this->load->helper('url','form');
        $this->load->library('form_validation');
        $this->load->model('InputAdminModel');

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
                redirect('AdminDetail','refresh');
                
            }else{
                
                $this->InputAdminModel->updatePic($id);
                echo "<script>alert('Successfully Updated'); </script>";
                redirect('AdminDetail','refresh');
        	}
    	}

		public function update()
	   {

		$session_data=$this->session->userdata('logged_in');
        $data['username']=$session_data['username'];
        $data['level']=$session_data['level'];
        $data['id']=$session_data['id'];

        $id = $data['id'];

        $this->load->model('InputAdminModel');
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

        $this->load->model('Notif');
        $data['notif'] = $this->Notif->notifikasi();
        $data['countNotif'] = $this->Notif->count();

        $this->load->model('InputAdminModel');
        $data["admin_list"] = $this->InputAdminModel->getAdmin();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar'); 
        $this->load->view('admin/profileAdmin', $data);
        $this->load->view('admin/footer'); 
            
	   } else {
        $pass = $this->input->post('password');
            if(empty($pass)){
               $this->InputAdminModel->updateNoPass($id);
                $session_data['username'] = $this->input->post('username');
                $data['username']=$session_data['username'];
                 echo "<script>alert('Successfully Updated'); </script>";
                 redirect('AdminDetail','refresh');
            }else{
               $this->InputAdminModel->updateProfile($id);
                $session_data['username'] = $this->input->post('username');
                $session_data['password'] = MD5($this->input->post('password'));
                $data['username']=$session_data['username'];
                $data['password']=$session_data['password'];
                  echo "<script>alert('Successfully Updated'); </script>";
                 redirect('AdminDetail','refresh');
            }
        }
    }

}

/* End of file AdminDetail.php */
/* Location: ./application/controllers/AdminDetail.php */