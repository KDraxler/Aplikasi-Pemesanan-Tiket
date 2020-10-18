<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class EventSeatModel extends CI_Model
	{
		public function getDataSeat()
		{
			$query = $this->db->get("eventseat");
			return $query->result();
		}
		public function getSeatById($id)
		{
			$query = $this->db->query("select * from eventseat where venue_id='$id'");
			return $query->result();
		}
		public function insertSeat()
		{
			
			$object = array(
				'seatZone' => $this->input->post('seat'),
				'Capacity' => $this->input->post('cap'),
				'venue_id' => $this->input->post('venue')
			);
			$this->db->insert('eventseat', $object);
		}

		public function getSeat($id)
		{
			$this->db->where('idSeat', $id);
			$query = $this->db->get('eventseat');
			return $query->result();
		}

		public function updateById($id)
		{
			$data = array(
				'seatZone' => $this->input->post('seat'),
				'Capacity' => $this->input->post('cap')
			);
			$this->db->where('idSeat', $id);
			$this->db->update('eventseat', $data);
		}

		public function delete($id)
		{ 
        	$this->db->where('idSeat',$id);
		$query = $this->db->delete('eventseat'); 
        }
      
	}
