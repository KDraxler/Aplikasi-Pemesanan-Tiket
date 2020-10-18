<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventVenue extends CI_Controller {

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

		$this->load->model('EventVenueModel');
		$data["venue_list"] = $this->EventVenueModel->getAllVenue();
		$this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
		$this->load->view('admin/venueSeat', $data);
		$this->load->view('admin/footer'); 
	}




}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */