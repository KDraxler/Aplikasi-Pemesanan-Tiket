<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class ApproveModel extends CI_Model
	{
		public function approve()
		{
			$query = $this->db->query("SELECT * FROM `order_detail` as d inner join `order` as o on d.order_code = o.idOrder inner join user on o.user_id = user.idUser where status = 'confirmed'");
			return $query->result();
		}

	}