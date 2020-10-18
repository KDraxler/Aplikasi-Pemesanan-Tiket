<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventName extends CI_Controller {

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

		$this->load->model('EventNameModel');
		$data["eventname_list"] = $this->EventNameModel->getName();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/sidebar'); 
		$this->load->view('admin/nameEvent', $data);
		$this->load->view('admin/footer'); 
	}

	public function create()
	{
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->load->model('EventNameModel');

		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('desc', 'Description', 'trim|required');
		if ($this->form_validation->run()==FALSE){
			echo validation_errors();
		}else{

			$config['upload_path']='./assets/imgEvent/';
			$config['allowed_types']='gif|jpg|png';
			$config['max_size']=1000000000;
			$config['max_width']=10240;
			$config['max_height']=7680;

			$this->load->library('upload', $config);
			if (! $this->upload->do_upload('pict')) {
				$error = array('error' => $this->upload->display_errors());
			} else {
				$this->EventNameModel->save();
				echo "<script>alert('Successfully Created'); </script>";
				redirect('EventName','refresh');
			}
		}
	}

	public function update()
	{
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->load->model('EventNameModel');
		$this->form_validation->set_rules('name', 'Event Name', 'trim|required');
		$this->form_validation->set_rules('desc', 'Description', 'trim|required');
		$id = $this->input->post('id');
		
		

		if ($this->form_validation->run()==FALSE){

		}else{

			$config['upload_path']='./assets/imgEvent/';
			$config['allowed_types']='gif| |png';
			$config['max_size']=1000000000;
			$config['max_width']=10240;
			$config['max_height']=7680;

			$this->load->library('upload', $config);
			if (! $this->upload->do_upload('pict')) {
				$this->EventNameModel->updateno($id);
				echo "<script>alert('Successfully Updated'); </script>";
				redirect('EventName','refresh');
				
			}else{
				
				$this->EventNameModel->updateName($id);
				echo "<script>alert('Successfully Updated'); </script>";
				redirect('EventName','refresh');
		}
	}
	}

	public function delete($id)
	{
		$this->load->model('EventNameModel');
		//$id = $this->uri->segment(3);
		$this->EventNameModel->deleteName($id);
		redirect('EventName','refresh');

	}




}

/* End of file EventName.php */
/* Location: ./application/controllers/EventName.php */