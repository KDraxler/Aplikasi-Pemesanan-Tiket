<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventCategoryModel extends CI_Model {
	public function getAllCat(){
		$query = $this->db->get('eventcategory');
        if($query->num_rows()>0){
            return $query->result();
        }
	}
	public function saveCat()
    {
        $data = array(
            'category'          => $this->input->post('category'),
            'description'   => $this->input->post('description')
        );
        $this->db->insert('eventcategory',$data);
    } 


    public function deleteCat($id)
    {
        $this->db->where('idCat', $id);
        $this->db->delete('eventcategory');
    }

    public function updateCat($id)
    {
        $data = array(
            'category'          => $this->input->post('category'),
            'description'   => $this->input->post('description')
        );
         $this->db->where('idCat', $id);
        $this->db->update('eventcategory', $data);
    }

	

}

/* End of file EventCategoryModel.php */
/* Location: ./application/models/EventCategoryModel.php */