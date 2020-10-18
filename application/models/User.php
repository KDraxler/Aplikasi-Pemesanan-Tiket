<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function login($username,$password)
    {
        $this->db->select('idUser,username,password,level');
        $this->db->from('user');
        $this->db->where('username', $username);
        $this->db->where('password', MD5($password));
        $query = $this->db->get();
        if($query->num_rows()==1){
            return $query->result();
        }else{
            return false;
        }                        
    }

    public function insertUser(){
        $password = $this->input->post('password');
        $pass = md5($password);
        $level = 'user';
        $pic = 'default.png';

            $object = array(
                'name' => $this->input->post('name'),
                'address' => $this->input->post('add'),
                'phoneNumber' => $this->input->post('phone'),
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'password' => $pass,
                'level'    => $level,
                'pictureUser'  => $pic,
                'statusNotif'  => 0,

            );

            $insert = $this->db->insert('user', $object);
            if (!$insert && $this->db->_error_number()==1062) {
                        echo "<script>alert('Username is already used'); </script>";
                }          
    }

    public function selectAll($id){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('idUser', $id);
        $query = $this->db->get();
        if($query->num_rows()==1){
            return $query->result();
        }else{
            return false;
        }                        
    }

    public function register($username){
        $this->db->select('username');
        $this->db->from('user');
        $this->db->where('username', $username);
        $query = $this->db->get();
        if($query->num_rows()==1){
            return $query->result();
        }else{
            return false;
        } 
    } 

        public function getUser()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('level', 'user');
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }                        
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

    public function updatePass($id)
    {   
        $password = $this->input->post('password');
        $pass = md5($password);

                $object = array(
                'password' => $pass
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
              



}

/* End of file .php */

?>