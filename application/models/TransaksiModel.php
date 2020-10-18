<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EventNameModel extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function getTransaksi()
    {
        $query = $this->db->get('order');
        if($query->num_rows()>0){
            return $query->result();
        }
    }
 

    //public function save()
    //{
        //$data = array(
            //'name'          => $this->input->post('name'),
            //'description'   => $this->input->post('desc'),
            //'pict'          => $this->upload->data('file_name')
        );
        //$this->db->insert('eventname',$data);
    //} 
    public function getTransaksi($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->get('order');
        return $query->result();
    }

    //public function deleteName($id)
    //{
        //$this->db->where('id', $id);
        //$this->db->delete('eventname');
    //}

    //public function updateName($id)
    //{
        //$data = array(
            //'name'          => $this->input->post('name'),
            //'description'   => $this->input->post('desc'),
            //'pict'          => $this->upload->data('file_name')
        //);
         //$this->db->where('id', $id);
        //$this->db->update('eventname', $data);
    //}

    //public function updateno($id)
    //{
        //$data = array(
            //'name'          => $this->input->post('name'),
            //'description'   => $this->input->post('desc')
        //);
         //$this->db->where('id', $id);
        //$this->db->update('eventname', $data);
    //}
}

/* End of file PegawaiModel.php */

?>