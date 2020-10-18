<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InputAdminModel extends CI_Model {
	 public function __construct()
    {
        parent::__construct();
    }

    public function getAdmin()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('level', 'admin');
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }                        
    }

    public function save()
    {	
    	$password = $this->input->post('name');
        $pass = md5($password);
        $level = 'admin';
        $pic = 'default.png';
            $object = array(
                'name' => $this->input->post('name'),
                'address' => $this->input->post('add'),
                'phoneNumber' => $this->input->post('phone'),
                'email' => $this->input->post('email'),
                'username' => $this->input->post('name'),
                'password' => $pass,
                'level'    => $level,
                'pictureUser'  => $pic,
                'statusNotif'  => 1
            );

            $this->db->insert('user', $object);
    } 

    public function updateNoPass($id)
    {	
            	$object = array(
                'name' => $this->input->post('name'),
                'address' => $this->input->post('add'),
                'phoneNumber' => $this->input->post('phone'),
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
            );
            $this->db->where('idUser', $id);
            $this->db->update('user', $object);

    }

    public function updateProfile($id)
    {	
    	$password = $this->input->post('password');
        $pass = md5($password);

            	$object = array(
                'name' => $this->input->post('name'),
                'address' => $this->input->post('add'),
                'phoneNumber' => $this->input->post('phone'),
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'password' => $pass,
            );
            $this->db->where('idUser', $id);
            $this->db->update('user', $object);

    } 

    public function updatePic($id)
    {	
            	$object = array(
                'pictureUser' => $this->upload->data('file_name')
            );
            $this->db->where('idUser', $id);
            $this->db->update('user', $object);

    }


    public function getAdminNamebyID($id)
    {
        $this->db->where('idUser',$id);
        $query = $this->db->get('user');
        return $query->result();
    }

    public function deleteAdmin($id)
    {
        $this->db->where('idUser', $id);
        $this->db->delete('user');
    }

}
/* End of file modelName.php */
/* Location: ./application/models/modelName.php */