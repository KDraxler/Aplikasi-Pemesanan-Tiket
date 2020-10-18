<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventSeat extends CI_Controller {

	public function byID($idVenue)
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

		$this->load->helper('url');
		$data['idVenue'] = $idVenue;
		$this->load->model('EventVenueModel');
		$data['venue'] = $this->EventVenueModel->getVenue($idVenue);
		$this->load->model('EventSeatModel');
		$data["seat_list"] = $this->EventSeatModel->getSeatById($idVenue);
		$this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
		$this->load->view('admin/seatEvent', $data);
		$this->load->view('admin/footer'); 
	}

	public function create($idVenue)
	{
		$this->load->helper('url','form');
		$this->load->model('EventVenueModel');
		$data['idVenue'] = $idVenue;
		$data['venue'] = $this->EventVenueModel->getVenue($idVenue);
		$this->load->model('EventSeatModel');
		$this->EventSeatModel->insertSeat($idVenue);
		echo "<script>alert('Successfully Created'); </script>";
		$this->byID($idVenue);
		
	}

	public function update($idVenue)
	{

		$this->load->model('EventSeatModel');
		$this->load->model('EventVenueModel');
		$data['idVenue'] = $idVenue;
		$idSeat = $this->input->post('id');
		$data["seat_list"] = $this->EventSeatModel->getSeatById($idVenue);
		$this->EventSeatModel->updateById($idSeat);
		$data['venue'] = $this->EventVenueModel->getVenue($idVenue);
		echo "<script>alert('Successfully Updated'); </script>";
		$this->byID($idVenue);
	}

	public function deleteData($idVenue,$idSeat)
	{
		$this->load->helper("url");
		$this->load->model("EventSeatModel");
		$this->EventSeatModel->delete($idSeat);
		echo "<script>alert('Successfully Deleted'); </script>";
		$data['idVenue'] = $idVenue;
		$this->byID($idVenue);
	}

}

/* End of file Jabatan.php */
/* Location: ./application/controllers/Jabatan.php */
 ?>