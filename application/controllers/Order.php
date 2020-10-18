<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

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

		$this->load->model('OrderModel');
		$data["OrderView"] = $this->OrderModel->order();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/sidebar'); 
		$this->load->view('admin/orderView', $data);
	}

	public function update($idOrder){
		$this->load->model('OrderModel');
		$this->OrderModel->updateStatus($idOrder);
		redirect('Order','refresh');


	}

	public function orderUserTable(){
		if ($this->session->userdata('logged_in')) {
            $session_data=$this->session->userdata('logged_in');
            $data['username']=$session_data['username'];
            $data['level']=$session_data['level'];
            $data['id']=$session_data['id'];

            $this->load->model('EventScheduleModel');
            $data["artist_list"] = $this->EventScheduleModel->getArtistOption();
            $data["cat_list"] = $this->EventScheduleModel->getCatOption();
            
            $this->load->model('user');
			$id = $data['id'];
			$user = $data['username'];
			$data['name'] = $this->user->selectAll($id,$user);

			$this->load->model('OrderModel');
			$data["ticket"] = $this->OrderModel->getOrderUser($id);
			$this->load->view('user/headerAllEvent',$data);
			$this->load->view('user/ticketHistory',$data); 
			$this->load->view('user/footer', $data);
        }else{
            echo "<script>alert('You Must Login First'); </script>";
            redirect('Login','refresh');
        }

	}

	public function invoice()
	{
		if ($this->session->userdata('logged_in')) {
            $session_data=$this->session->userdata('logged_in');
            $data['username']=$session_data['username'];
            $data['level']=$session_data['level'];
            $data['id']=$session_data['id'];

            $this->load->model('EventScheduleModel');
            $data["artist_list"] = $this->EventScheduleModel->getArtistOption();
            $data["cat_list"] = $this->EventScheduleModel->getCatOption();
            
            $this->load->model('user');
			$id = $data['id'];
			$user = $data['username'];
			$data['name'] = $this->user->selectAll($id,$user);

			$this->load->model('OrderModel');
			$data["invoice"] = $this->OrderModel->getInvoice($id);
			
			$this->load->view('user/headerAllEvent',$data);
			$this->load->view('user/invoice',$data); 
			$this->load->view('user/footer', $data);
        }else{
            echo "<script>alert('You Must Login First'); </script>";
            redirect('Login','refresh');
        }		
	}

	public function updatePhoto(){
        $this->load->helper('url','form');
        $this->load->library('form_validation');
        $this->load->model('OrderModel');

        $session_data=$this->session->userdata('logged_in');
        $data['username']=$session_data['username'];
        $data['level']=$session_data['level'];
        $data['id']=$session_data['id'];
        $id = $this->input->post('id'); 
        
        $config['upload_path']='./assets/imgEvent/';
        $config['allowed_types']='gif|jpg|png';
        $config['max_size']=1000000000;
        $config['max_width']=10240;
        $config['max_height']=7680;

        $this->load->library('upload', $config);
        
        if (! $this->upload->do_upload('pict')) {
                redirect('Order/invoice','refresh');
                
        }else{
                $this->OrderModel->updatePic($id);
                echo "<script>alert('Successfully Updated'); </script>";
                redirect('Order/invoice','refresh');
        }
    }

    

	public function createPdf($idOrder){
		$session_data=$this->session->userdata('logged_in');
		$this->load->model('OrderModel');
		$data['id']=$session_data['id'];
		$id = $data['id'];

		$data["list"] = $this->OrderModel->getTicket($id,$idOrder);
		$this->load->library('pdf');
        $this->pdf->load_view('report/ticket',$data);
	}
}

/* End of file EventName.php */
/* Location: ./application/controllers/EventName.php */