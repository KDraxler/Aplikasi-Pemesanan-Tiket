<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  Search extends CI_Controller {

	public function searchAll()
	{
    	$session_data=$this->session->userdata('logged_in');
		$data['username']=$session_data['username'];
		$data['level']=$session_data['level'];
    	$this->load->model('SearchModel');
    	$this->load->model('EventScheduleModel');
        $data["artist_list"] = $this->EventScheduleModel->getArtistOption();
        $data["cat_list"] = $this->EventScheduleModel->getCatOption();
        $keyword    =   $this->input->post('keyword');
        $data['search']    =   $this->SearchModel->search($keyword);
        $data['detail'] = 'Search By Word : '.$keyword;
        $data['keyword']= $keyword;
        $this->load->view('user/headerAllEvent',$data);
        $this->load->view('user/allEvent',$data);
        $this->load->view('user/footer');
	}

	public function byCat($id)
	{
    	$session_data=$this->session->userdata('logged_in');
		$data['username']=$session_data['username'];
		$data['level']=$session_data['level'];
    	$this->load->model('SearchModel');
    	$this->load->model('EventScheduleModel');
        $data["artist_list"] = $this->EventScheduleModel->getArtistOption();
        $data["cat_list"] = $this->EventScheduleModel->getCatOption();

        $data['search']    =   $this->SearchModel->cat($id);
        $data['detail'] = 'Search By Category : ';
        $this->load->view('user/headerAllEvent',$data);
        $this->load->view('user/allEvent',$data);
        $this->load->view('user/footer');
	}
	public function byArtist($id)
	{
    	$session_data=$this->session->userdata('logged_in');
		$data['username']=$session_data['username'];
		$data['level']=$session_data['level'];
    	$this->load->model('SearchModel');
    	$this->load->model('EventScheduleModel');
        $data["artist_list"] = $this->EventScheduleModel->getArtistOption();
        $data["cat_list"] = $this->EventScheduleModel->getCatOption();
        $data['search']    =   $this->SearchModel->artist($id);
        $data['detail'] = 'Search By Artist : ';
        $this->load->view('user/headerAllEvent',$data);
        $this->load->view('user/allEvent',$data);
        $this->load->view('user/footer');
	}

    public function result($id)
    {
        $session_data=$this->session->userdata('logged_in');
        $data['username']=$session_data['username'];
        $data['level']=$session_data['level'];
        $this->load->model('SearchModel');
        $this->load->model('EventScheduleModel');
        $data["artist_list"] = $this->EventScheduleModel->getArtistOption();
        $data["cat_list"] = $this->EventScheduleModel->getCatOption();
        $data['search']    =   $this->SearchModel->resultAll($id);
        $this->load->view('user/headerAllEvent',$data);
        $this->load->view('user/eventSorting',$data);
        $this->load->view('user/footer');
    }

    public function detailEvent($id)
    {
        $session_data=$this->session->userdata('logged_in');
        $data['username']=$session_data['username'];
        $data['level']=$session_data['level'];
        $this->load->model('SearchModel');
        $this->load->model('EventScheduleModel');

        $tickets = $this->input->post('subject');
        if(!empty($tickets)){
                $data['ticket'] = $this->SearchModel->getTicket($id,$tickets);
                $data['numberTicket'] = $tickets;
                $session_array = array('qty'=>$tickets);
               $this->session->set_userdata('count', $session_array);
        
        }
        $data["artist_list"] = $this->EventScheduleModel->getArtistOption();
        $data["cat_list"] = $this->EventScheduleModel->getCatOption();
        $data['search']    =   $this->SearchModel->detailAll($id);
        $this->load->view('user/headerAllEvent',$data);
        $this->load->view('user/detailTicket',$data);
    }

    public function detailTicket($id,$idPrice)
    {
         $tickets = $this->input->post('subject');
        if(!empty($tickets)){
                $data['numberTicket'] = $tickets;
                $session_array = array('qty'=>$tickets);
               $this->session->set_userdata('count', $session_array);
        
        }

        $session_data=$this->session->userdata('count');
        $data['numberTicket'] = $session_data['qty'] ;  

        $session_data=$this->session->userdata('logged_in');
        $data['username']=$session_data['username'];
        $data['level']=$session_data['level'];
        $this->load->model('SearchModel');
        $this->load->model('EventScheduleModel');
        $data["artist_list"] = $this->EventScheduleModel->getArtistOption();
        $data["cat_list"] = $this->EventScheduleModel->getCatOption();
        $data['detail']    =   $this->SearchModel->detailTickets($idPrice);
        $data['search']    =   $this->SearchModel->detailAll($id);

        $this->load->view('user/headerAllEvent',$data);
        $this->load->view('user/detailTicket',$data);


    }

    

}

/* End of file Search.php */
/* Location: ./application/controllers/Search.php */