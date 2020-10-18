<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventSchedule extends CI_Controller {

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

		$this->load->model('EventScheduleModel');
		$data["sche_list"] = $this->EventScheduleModel->getAllSche();
		$this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
		$this->load->view('admin/scheduleEvent', $data);
		$this->load->view('admin/footer'); 
	}

	public function allData(){

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

		$this->load->model('EventScheduleModel');
		$data["sche_list"] = $this->EventScheduleModel->getAllSche();
		$data["cat_list"] = $this->EventScheduleModel->getCatOption();
		$data["venue_list"] = $this->EventScheduleModel->getVenueOption();
		$data["name_list"] = $this->EventScheduleModel->getNameOption();
		$data["artist_list"] = $this->EventScheduleModel->getArtistOption();

		$this->load->view('admin/header',$data);
        $this->load->view('admin/sidebar');
		$this->load->view('admin/addSchedule', $data);
		$this->load->view('admin/footer'); 
	}

	public function getDataID($ids){
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

		$this->load->model('EventScheduleModel');
		$data["list"] = $this->EventScheduleModel->getSchedule($ids);
		$data["cat_list"] = $this->EventScheduleModel->getCatOption();
		$data["venue_list"] = $this->EventScheduleModel->getVenueOption();
		$data["name_list"] = $this->EventScheduleModel->getNameOption();
		$data["artist_list"] = $this->EventScheduleModel->getArtistOption();
		$this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
		$this->load->view('admin/scheduleDetail', $data);
		$this->load->view('admin/footer'); 

	}

	public function addData(){
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->load->model('EventScheduleModel');
		$data["sche_list"] = $this->EventScheduleModel->getAllSche();
		$data["cat_list"] = $this->EventScheduleModel->getCatOption();
		$data["venue_list"] = $this->EventScheduleModel->getVenueOption();
		$data["name_list"] = $this->EventScheduleModel->getNameOption();
		$data["artist_list"] = $this->EventScheduleModel->getArtistOption();

		$this->form_validation->set_rules('event_id', 'Name Event', 'trim|required');
		$this->form_validation->set_rules('cat_id', 'Category', 'trim|required');
		$this->form_validation->set_rules('artist_id', 'Artist', 'trim|required');
		$this->form_validation->set_rules('venue_id', 'Venue Name', 'trim|required');
		$this->form_validation->set_rules('date', 'Date', 'trim|required');
		$this->form_validation->set_rules('startTime', 'Start Time', 'trim|required');
		$this->form_validation->set_rules('endTime', 'End Time', 'trim|required');

		if ($this->form_validation->run()==FALSE){
			$this->allData();

		}else{
			$this->EventScheduleModel->saveAll();
			echo "<script>alert('Successfully Created'); </script>";
			$this->allData();
		}
		
	}

	public function updateData($id){
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->load->model('EventScheduleModel');
		$data["list"] = $this->EventScheduleModel->getSchedule($id);
		$data["cat_list"] = $this->EventScheduleModel->getCatOption();
		$data["venue_list"] = $this->EventScheduleModel->getVenueOption();
		$data["name_list"] = $this->EventScheduleModel->getNameOption();
		$data["artist_list"] = $this->EventScheduleModel->getArtistOption();

		$this->form_validation->set_rules('event_id', 'Name Event', 'trim|required');
		$this->form_validation->set_rules('cat_id', 'Category', 'trim|required');
		$this->form_validation->set_rules('artist_id', 'Artist', 'trim|required');
		$this->form_validation->set_rules('venue_id', 'Venue Name', 'trim|required');
		$this->form_validation->set_rules('date', 'Date', 'trim|required');
		$this->form_validation->set_rules('startTime', 'Start Time', 'trim|required');
		$this->form_validation->set_rules('endTime', 'End Time', 'trim|required');

		if ($this->form_validation->run()==FALSE){
			echo validation_errors();
		}else{
			$this->EventScheduleModel->update($id);
			echo "<script>alert('Successfully Updated'); </script>";
			$this->getDataID($id);
		}
	}

	public function deleteData($id)
    {
        $this->load->model('EventScheduleModel');
        $this->EventScheduleModel->delete($id);
        echo "<script>alert('Successfully Deleted'); </script>";
		redirect('EventSchedule','refresh');
		
    }

    public function createPdf()
    {
    	$this->load->model('EventScheduleModel');
		$data["sche_list"] = $this->EventScheduleModel->getAllSche();
		$this->load->library('pdf');
        $this->pdf->load_view('report/schedule',$data);
    }

}