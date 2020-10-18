<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventVenueModel extends CI_Model {
	public function getAllVenue(){
		$query = $this->db->get('eventvenue');
        if($query->num_rows()>0){
            return $query->result();
        }
	}

    public function getVenue($id)
    {
        $this->db->where('idVenue',$id);
        $query = $this->db->get('eventvenue');
        return $query->result();
    }

	public function saveVenue()
    {
        $data = array(
            'venue'          => $this->input->post('venue'),
            'city'           => $this->input->post('city'),
            'country'           => $this->input->post('country')
        );
        $this->db->insert('eventVenue',$data);
    } 


    public function deleteVenue($id)
    {
        $this->db->where('idVenue', $id);
        $this->db->delete('eventvenue');
    }

    public function updateVenue($id)
    {
        $data = array(
            'venue'          => $this->input->post('venue'),
            'city'           => $this->input->post('city'),
            'country'           => $this->input->post('country')
        );
        $this->db->where('idVenue', $id);
        $this->db->update('eventvenue', $data);
    }

    public function updatePic($id)
    {

        $data = array(
            'photo'          => $this->upload->data('file_name')
        );
         $this->db->where('idVenue', $id);
        $this->db->update('eventvenue', $data);
    }
}

/* End of file EventVenueModel.php */
/* LoVenueion: ./appliVenueion/models/EventVenueModel.php */