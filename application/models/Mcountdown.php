<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mcountdown extends CI_Model {

 		public function select_time(){
 				$query = $this->db->query("SELECT date, startTime from eventschedule where CONCAT(date, ' ', startTime) >= now() order by date,startTime asc;");
 				if($query->num_rows()>0){
 						return $query->row();
 				}else{
 					$ha = 'tidak ada event';
 					return $ha;
 				}
 		}

 		public function select_name(){
 			$query = $this->db->query("SELECT * from eventschedule inner join eventname on eventschedule.event_id = eventname.id inner join artist on eventschedule.artist_id = artist.idArtist  where CONCAT(date, ' ', startTime) >= now() order by date,startTime asc limit 1;");
 				if($query->num_rows()>0){
 						return $query->result();
 				}else{
         			 return "empty";
   						exit;
       			}  
		}

 		public function count_time(){
 				$query = $this->db->query("SELECT COUNT(date) from eventschedule where CONCAT(date, ' ', startTime) >= now() order by date,startTime asc");
 				return $query->num_rows();
 		}

 		public function getAllSche(){
			$query = $this->db->query("SELECT * from eventschedule inner join eventname on eventschedule.event_id = eventname.id inner join eventcategory on eventschedule.cat_id = eventcategory.idCat inner join eventvenue on eventschedule.venue_id = eventvenue.idVenue inner join artist on eventschedule.artist_id = artist.idArtist where MONTH(eventschedule.date) = month(now()) and CONCAT(date, ' ', startTime) >= now()");
				if($query->num_rows()>0){
 						return $query->result();
 				}else{
        				return "empty";
   						exit;
   				}
		}

    public function getTicket(){
      $query = $this->db->query("SELECT * from eventprice as p right join eventseat as s on p.seat_id = s.idSeat right join eventschedule as d on p.schedule_id = d.idSchedule and s.venue_id = d.venue_id where schedule_id = (SELECT idSchedule from eventschedule where CONCAT(date, ' ', startTime) >= now() order by date,startTime asc limit 1)");
        if($query->num_rows()>0){
            return $query->result();
        }
    }
}

/* End of file Mcountdown.php */
/* Location: ./application/models/Mcountdown.php */