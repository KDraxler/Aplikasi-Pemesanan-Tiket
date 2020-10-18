<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function index()
	{
        $this->load->view('register');
	}

	public function create()
    {
        $this->load->helper('url','form');
        $this->load->library('form_validation');
        $this->load->model('User');

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('add', 'Address', 'trim|required');
        $this->form_validation->set_rules('phone', 'Phone Number', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[user.username]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');


        if ($this->form_validation->run()==FALSE){
            $this->load->view('register');
        }else{
                $this->User->insertUser();
                echo "<script>alert('Successfully Created'); </script>";
                redirect('Login','refresh');
        }
     }

      function cekUsername($username)
    {
    	$this->load->model('User');
        $result = $this->User->register($username);
        if($result){
                return true;
            }else{
                $this->form_validation->set_message('create',"Username is already used");
                return false;
            }
    }
}

/* End of file register.php */
/* Location: ./application/controllers/register.php */