<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeAdmin extends CI_Model {

	public function getCountUser(){
		$query = $this->db->query("SELECT COUNT(idUser) as id from user where level ='user'");
		return $query->result();

	}

	public function getCountTicket(){
		$query = $this->db->query("SELECT remainTicket from eventprice");
		return $query->result();

	}

	public function getAllTicket(){
			$query = $this->db->query("SELECT *,(SUM(p.remainTicket)/SUM(p.availableTicket))*100 as persen from eventschedule inner join eventname on eventschedule.event_id = eventname.id inner join eventcategory on eventschedule.cat_id = eventcategory.idCat inner join eventvenue on eventschedule.venue_id = eventvenue.idVenue inner join artist on eventschedule.artist_id = artist.idArtist inner join eventprice as p on eventschedule.idSchedule = p.schedule_id group by idSchedule having MONTH(eventschedule.date) = month(now()) and CONCAT(date, ' ', startTime) >= now()");
				if($query->num_rows()>0){
 						return $query->result();
 				}else{
        				return "empty";
   						exit;
   				}
	}


	public function recent(){
		$query = $this->db->query("SELECT * FROM `order_detail` as d inner join `order` as o on d.order_code = o.idOrder inner join user as u on o.user_id = u.idUser group by idOrder order by idOrder desc");
			return $query->result();
	}

	public function revenue(){
		$query = $this->db->query("SELECT * FROM `order`");
			return $query->result();

	}



}

/* End of file HomeAdmin.php */
/* Location: ./application/models/HomeAdmin.php */