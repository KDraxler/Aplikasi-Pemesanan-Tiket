<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{	
		$session_data = $this->session->userdata('logged_in');
		$data['username']=$session_data['username'];
		$data['level']=$session_data['level'];
		$data['id']=$session_data['id'];

		$this->load->model('Notif');
		$this->load->model('user');
		$this->load->model('HomeAdmin');

		$id = $data['id'];
		$user = $data['username'];
		$data['name'] = $this->user->selectAll($id,$user);
		$data['notif'] = $this->Notif->notifikasi();
		$data['countNotif'] = $this->Notif->count();
		$data['countUser'] = $this->HomeAdmin->getCountUser();
		$data['countTicket'] = $this->HomeAdmin->getCountTicket();
		$data['allTicket'] = $this->HomeAdmin->getAllTicket();
		$data['recent'] = $this->HomeAdmin->recent();
		$data['revenue'] = $this->HomeAdmin->revenue();
		$data['sales'] = $this->HomeAdmin->revenue();



		$this->load->view('admin/header',$data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/index',$data);
		$this->load->view('admin/footer2'); 
	}

	public function update($id){
		$this->load->model('Notif');
		$this->Notif->updateNotif($id);
		redirect('Welcome','refresh');
	}

	public function refresh(){
	$this->load->model('Notif');
    $data['notif'] = $this->Notif->notifikasi();
	$data['countNotif'] = $this->Notif->count();
	$this->load->view('admin/index',$data);
  	}

  	public function recentOrder(){
	$this->load->model('HomeAdmin');
    
	$this->load->view('admin/index',$data);
  	}

}
