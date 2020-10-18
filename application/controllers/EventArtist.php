<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventArtist extends CI_Controller {

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

        $this->load->model('EventArtistModel');
        $data["eventartist_list"] = $this->EventArtistModel->getArtist();
        $this->load->view('admin/header',$data);
        $this->load->view('admin/sidebar'); 
        $this->load->view('admin/artistEvent', $data);
        $this->load->view('admin/footer'); 
    }

    public function create()
    {
        $this->load->helper('url','form');
        $this->load->library('form_validation');
        $this->load->model('EventArtistModel');

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
        $this->form_validation->set_rules('birth', 'Birth Date', 'trim|required');
        if ($this->form_validation->run()==FALSE){
            echo validation_errors();
        }else{

            $config['upload_path']='./assets/imgEvent/';
            $config['allowed_types']='gif|jpg|png';
            $config['max_size']=1000000000;
            $config['max_width']=10240;
            $config['max_height']=7680;

            $this->load->library('upload', $config);
            if (! $this->upload->do_upload('pic')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $this->EventArtistModel->save();
                echo "<script>alert('Successfully Created'); </script>";
                redirect('EventArtist','refresh');
            }
        }
    }

    public function update()
    {
        $this->load->helper('url','form');
        $this->load->library('form_validation');
        $this->load->model('EventArtistModel');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
        $this->form_validation->set_rules('birth', 'Birth Date', 'trim|required');
        
        $id = $this->input->post('id');

        if ($this->form_validation->run()==FALSE){

        }else{

            $config['upload_path']='./assets/imgEvent/';
            $config['allowed_types']='gif|jpg|png';
            $config['max_size']=1000000000;
            $config['max_width']=10240;
            $config['max_height']=7680;

            $this->load->library('upload', $config);
            if (! $this->upload->do_upload('pic')) {
                $this->EventArtistModel->updateno($id);
                echo "<script>alert('Successfully Updated'); </script>";
                redirect('EventArtist','refresh');
                
            }else{
                
                $this->EventArtistModel->updateArtist($id);
                echo "<script>alert('Successfully Updated'); </script>";
                redirect('EventArtist','refresh');
        }
    }
    }

    public function delete($id)
    {
        $this->load->model('EventArtistModel');
        //$id = $this->uri->segment(3);
        $this->EventArtistModel->deleteArtist($id);
        redirect('EventArtist','refresh');

    }




}

/* End of file EventName.php */
/* Location: ./application/controllers/EventName.php */