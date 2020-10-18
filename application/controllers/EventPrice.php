<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventPrice extends CI_Controller {

	public function byID($idSchedule)
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
		$data['idSchedule'] = $idSchedule;
		$this->load->model('EventScheduleModel');
		$data['schedule'] = $this->EventScheduleModel->getSchedule($idSchedule);
		$this->load->model('EventPriceModel');
		$data['price_list'] = $this->EventPriceModel->getPriceById($idSchedule);
		$data['seat'] = $this->EventPriceModel->getSeat($idSchedule);
		$this->load->view('admin/header',$data);
        $this->load->view('admin/sidebar');
		$this->load->view('admin/priceEvent', $data);
		$this->load->view('admin/footer'); 
	}


	public function create($idSchedule)
	{
		$this->load->helper('url','form');
		$this->load->model('EventScheduleModel');
		$this->load->model('EventPriceModel');

		$fkid = $this->input->post('seat');
		$data['idSchedule'] = $idSchedule;		
		$this->EventPriceModel->insertPrice($fkid,$idSchedule);
		echo "<script>alert('Successfully Created'); </script>";
		$this->byID($idSchedule);
	}

	public function update($idSchedule)
	{

		$this->load->model('EventPriceModel');
		$this->load->model('EventScheduleModel');
		$data['idSchedule'] = $idSchedule;
		$idPrice = $this->input->post('id');
		$this->EventPriceModel->updateById($idPrice);
		$data['schedule'] = $this->EventScheduleModel->getSchedule($idSchedule);
			echo "<script>alert('Successfully Updated'); </script>";
			$this->byID($idSchedule);
			// redirect('EventPrice/byID/','refresh');
	}

	public function deleteData($idSchedule,$idPrice)
	{
		$this->load->helper("url");
		$this->load->model("EventPriceModel");
		$this->load->model('EventScheduleModel');
		$data['idSchedule'] = $idSchedule;
		$this->EventPriceModel->delete($idPrice);
		echo "<script>alert('Successfully Deleted'); </script>";
		$this->byID($idSchedule);
	}

}


/* End of file EventPrice.php */
/* Location: ./application/controllers/EventPrice.php */