<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in')) {
            $session_data=$this->session->userdata('logged_in');
            $data['username']=$session_data['username'];
            $data['level']=$session_data['level'];
            $current_controller = $this->router->fetch_class();
            $this->load->library('Acl');
            if (! $this->acl->is_public($current_controller)){
                if (! $this->acl->is_allowed($current_controller, $data['level'])){
                    echo "<script>alert('You Do not Have Permission to Access This'); </script>";
                    redirect($_SERVER['HTTP_REFERER'],'refresh');
                }
            }
        }else{

            redirect('Login','refresh');
        }
    }
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

		$this->load->model('InputAdminModel');
        $data["admin_list"] = $this->InputAdminModel->getAdmin();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar'); 
        $this->load->view('admin/inputAdmin', $data);
        $this->load->view('admin/footer'); 
	}

	public function create()
    {
        $this->load->helper('url','form');
        $this->load->library('form_validation');
        $this->load->model('InputAdminModel');

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('add', 'Address', 'trim|required');
        $this->form_validation->set_rules('phone', 'Phone Number', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        if ($this->form_validation->run()==FALSE){
            echo validation_errors();
        }else{
                $this->InputAdminModel->save();
                echo "<script>alert('Successfully Created'); </script>";
                redirect('Admin','refresh');
        }
    }

    public function delete($id)
    {
        $this->load->model('InputAdminModel');
        //$id = $this->uri->segment(3);
        $this->InputAdminModel->deleteAdmin($id);
        redirect('Admin','refresh');

    }

}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */