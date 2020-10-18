<?php defined('BASEPATH') or exit('No direct script access allowed');

class OrderModel extends CI_Model{
		public function order(){
			$query = $this->db->query("SELECT * FROM `order` as o INNER join invoice as i ON o.idOrder=i.idOrder WHERE status='pending'");
			return $query->result();
		}

		public function updateStatus($idOrder){
			$data = array('status' => 'Confirmed', );
			$this->db->where('idOrder', $idOrder);
			$this->db->update('order', $data);

		}

		public function getOrderUser($idUser){
			$query = $this->db->query("SELECT * FROM `order` as o inner join eventschedule as s on o.schedule_id = s.idSchedule inner join eventname as n on s.event_id = n.id inner join eventvenue as v on s.venue_id = v.idVenue where status = 'confirmed' and o.user_id = $idUser");
			if($query->num_rows()>0){
            return $query->result();
        	}
		}

		public function getTicket($idUser, $idOr){
			$query = $this->db->query("SELECT * FROM `order` as o inner join order_detail as d on d.order_code = o.idOrder inner join eventschedule as s on o.schedule_id = s.idSchedule inner join eventname as n on s.event_id = n.id inner join eventvenue as v on s.venue_id = v.idVenue inner join artist as a on s.artist_id = a.idArtist inner join eventseat as x on v.idVenue = x.venue_id where status = 'confirmed' and o.user_id = $idUser and d.order_code = $idOr group by codeTicket");
			if($query->num_rows()>0){
            return $query->result();
        }
		}

		public function getInvoice($idUser)
		{
			$query = $this->db->query("SELECT * FROM `invoice` as i inner join `order` as o on i.idOrder=o.idOrder inner join eventschedule as s on o.schedule_id = s.idSchedule inner join eventname as n on s.event_id = n.id inner join eventvenue as v on s.venue_id = v.idVenue where status = 'pending' and o.user_id = $idUser");
			if($query->num_rows()>0){
            return $query->result();
        	}
		}

		public function updatePic($id)
    	{

        $data = array(
            'gambar'          => $this->upload->data('file_name')
        );
        // print_r($id);
        // print_r($data);
        // die();
        
        $this->db->where('invoice', $id);
        $this->db->update('invoice', $data);
    	}


}