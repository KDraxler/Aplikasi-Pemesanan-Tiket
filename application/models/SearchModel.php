<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchModel extends CI_Model {

	public function search($keyword)
    {
    	$this->db->select('*');
        $this->db->from('eventschedule');
        $this->db->join('eventname', 'eventschedule.event_id = eventname.id');
        $this->db->join('eventcategory', 'eventschedule.cat_id = eventcategory.idCat');
        $this->db->join('eventvenue', 'eventschedule.venue_id = eventvenue.idVenue');
        $this->db->join('artist', 'eventschedule.artist_id = artist.idArtist');
        $this->db->like('eventname.name',$keyword);
        $this->db->group_by('eventname.name');
        $query  =   $this->db->get();
        return $query->result();
    }

    public function allEvents()
    {
    	 $query = $this->db->query("SELECT * from eventname inner join eventschedule as d on eventname.id = d.event_id where CONCAT(d.date, ' ', d.startTime) >= now() group by eventname.name");
        if($query->num_rows()>0){
            return $query->result();
        }
     }

    public function cat($id)
    {
    	 $query = $this->db->query("SELECT * from eventname inner join eventschedule as d on eventname.id = d.event_id inner join eventcategory as c on d.cat_id = c.idCat where d.cat_id = $id and CONCAT(d.date, ' ', d.startTime) >= now() group by eventname.name");
        if($query->num_rows()>0){
            return $query->result();
        }
     }
    public function artist($id)
    {
    	$query = $this->db->query("SELECT * from eventname inner join eventschedule as d on eventname.id = d.event_id inner join artist on d.artist_id = artist.idArtist  where d.artist_id = $id and CONCAT(d.date, ' ', d.startTime) >= now() group by eventname.name");
        if($query->num_rows()>0){
            return $query->result();
        }
     }

    public function resultAll($id){
        $query = $this->db->query("SELECT * from eventschedule as s inner join eventname as n on s.event_id = n.id inner join artist as a on s.artist_id = a.idArtist inner join eventvenue as v on s.venue_id = v.idVenue where s.event_id = $id and CONCAT(s.date, ' ', s.startTime) >= now() order by s.date,s.startTime asc");
         if($query->num_rows()>0){
            return $query->result();
        }
    }

    public function detailAll($id){
        $query = $this->db->query("SELECT * from eventschedule as s inner join eventname as n on s.event_id = n.id inner join artist as a on s.artist_id = a.idArtist inner join eventvenue as v on s.venue_id = v.idVenue inner join eventcategory as c on s.cat_id = c.idCat where s.idSchedule = '$id' ");
         if($query->num_rows()>0){
            return $query->result();
        }
    }

    public function getTicket($id,$ticket){
      $query = $this->db->query("SELECT * from eventprice as p inner join eventseat as s on p.seat_id = s.idSeat inner join eventschedule as d on p.schedule_id = d.idSchedule and s.venue_id = d.venue_id where schedule_id = $id and p.remainTicket >= $ticket ");
        if($query->num_rows()>0){
            return $query->result();
        }
    }

    public function detailTickets($id){
        $query = $this->db->query("SELECT * from eventprice as p inner join eventseat as s on p.seat_id = s.idSeat inner join eventschedule as d on p.schedule_id = d.idSchedule and s.venue_id = d.venue_id inner join artist as a on d.artist_id = a.idArtist inner join eventvenue as v on s.venue_id = v.idVenue inner join eventname as n on d.event_id = n.id where idPrice = $id");
        if($query->num_rows()>0){
            return $query->result();
        }
    }
	

}

/* End of file SearchModel.php */
/* Location: ./application/models/SearchModel.php */