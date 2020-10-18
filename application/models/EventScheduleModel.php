<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventScheduleModel extends CI_Model {
	public function getAllSche(){
        $this->db->select('*');
        $this->db->from('eventschedule');
        $this->db->join('eventname', 'eventschedule.event_id = eventname.id');
        $this->db->join('eventcategory', 'eventschedule.cat_id = eventcategory.idCat');
        $this->db->join('eventvenue', 'eventschedule.venue_id = eventvenue.idVenue');
        $this->db->join('artist', 'eventschedule.artist_id = artist.idArtist');
		$query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result();
        }
	}

    public function getSchedule($id)
    {
        $this->db->select('*');
        $this->db->from('eventschedule');
        $this->db->join('eventname', 'eventschedule.event_id = eventname.id');
        $this->db->join('eventcategory', 'eventschedule.cat_id = eventcategory.idCat');
        $this->db->join('eventvenue', 'eventschedule.venue_id = eventvenue.idVenue');
        $this->db->join('artist', 'eventschedule.artist_id = artist.idArtist');
        $this->db->where('idSchedule',$id);
        $query = $this->db->get();
        return $query->result();
    }

    public function getCatOption(){
        $query = $this->db->get('eventcategory');
        if($query->num_rows()>0){
            return $query->result();
        }
    }
     public function getVenueOption(){
        $query = $this->db->get('eventvenue');
        if($query->num_rows()>0){
            return $query->result();
        }
        
    }
     public function getNameOption(){
        $query = $this->db->get('eventname');
        if($query->num_rows()>0){
            return $query->result();
        }
    }
     public function getArtistOption(){
        $query = $this->db->get('artist');
        if($query->num_rows()>0){
            return $query->result();
        }
    }

    public function saveAll(){  
        $data= $this->input->post();
        $this->db->insert('eventschedule',$data);
    }

    public function delete($id)
    {
        $this->db->where('idSchedule', $id);
        $this->db->delete('eventschedule');
    }

     public function update($id)
    {
        $this->db->where('idSchedule',$id);
        $data= $this->input->post();
        $this->db->update('eventschedule', $data);
    }
	

}

/* End of file EventCategoryModel.php */
/* Location: ./application/models/EventCategoryModel.php */