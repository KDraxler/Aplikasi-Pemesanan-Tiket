<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class HomeVenue extends CI_Controller {

    public function venueEvent()
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

        $this->load->view('admin/header' ,$data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/venueEvent');
    }

    public function getAllVenueGrid()
    {
        $this->load->model('EventVenueModel');
        
        $result = $this->EventVenueModel->getAllVenue(); 
        header("Content-Type: application/json");
        echo json_encode($result);
    }

    public function addVenueGrid(){
        
        $this->load->model('EventVenueModel');

        
            $this->EventVenueModel->saveVenue();
            
    }

    public function deleteVenueGrid()
    {
        $this->load->model('EventVenueModel');
        $id = $this->input->post('idVenue'); 
        $this->EventVenueModel->deleteVenue($id);
    }

    public function updateVenueGrid()
    {
        $this->load->model('EventVenueModel');
        $id = $this->input->post('idVenue'); 
        $this->EventVenueModel->updateVenue($id);
    }

    public function updatePhoto(){
        $this->load->helper('url','form');
        $this->load->library('form_validation');
        $this->load->model('EventVenueModel');

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
                redirect('EventVenue','refresh');
                
        }else{
                $this->EventVenueModel->updatePic($id);
                echo "<script>alert('Successfully Updated'); </script>";
                redirect('EventVenue','refresh');
        }
    }



}

/* End of file Home.php */

?>