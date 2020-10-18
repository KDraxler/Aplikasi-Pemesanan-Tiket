<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Model {

    public function inputOrder($qty){
        $data = array(
            'user_id'       => $this->input->post('id'),
            'schedule_id'   => $this->input->post('idSche'),
            'quantity'      => $this->input->post('qty'),
            'totalPrice'    => $this->input->post('total'),
            'status'        => 'pending',
            // 'creditCard'    => $this->input->post('card')
        );
        $this->db->insert('order',$data);

       $query = $this->db->query('SELECT idOrder FROM `order` ORDER BY idOrder desc limit 1;');
       $noId =0;
          foreach ($query->result() as $key) {
            $noId = $key->idOrder;
           } 
        for($i=1;$i<=$this->input->post('qty');$i++){
            $query = $this->db->query('SELECT codeTicket from order_detail order by codeTicket desc limit 1');
            $data = "T0000";
            foreach ($query->result() as $key) {
                $data = $key->codeTicket;
            }
            $lastid = (int) substr($data, -6);
            $newid = $lastid+1;
            $id = substr("000000".$newid, -6);
            $no = "OD".$id;
            $pic = $no.".jpg";

            $input = array(
            'order_code'    => $noId,
            'codeTicket'    => $no,
            'barcodePic'    => $pic
            );
    
        $this->db->insert('order_detail',$input);
        
        }

        $lala = $this->db->query("SELECT * FROM eventprice as p inner join eventschedule as s on p.schedule_id = s.idSchedule inner join `order` as o on s.idSchedule = o.schedule_id where o.idOrder = $noId limit 1");

        $remain = 0;
        $priceID = 0;

          foreach ($lala->result() as $key) {
            $remain = $key->remainTicket;
            $priceID = $key->idPrice;
           }

         $tiket = $remain-$qty;
        $data2 = array(
            'remainTicket'       => $tiket,
        );

        $this->db->where('idPrice', $priceID);
        $this->db->update('eventprice',$data2);
        //$this->db->insert('order_detail',$input);

        // $this->db->select('idOrder',false);
        //     $this->db->order_by('idOrder', 'desc');
        //     $this->db->limit(1);
        //     $query = $this->db->get('Order');
        //     if($query->num_rows()<>0){
        //         $data = $query->row();
        //         $kode = intval($data->idOrder);
        //     }else{
        //         $kode = 1;

        //     }
        //     $kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
        //     $kodejadi  = "INV".$kodemax;
        //     return $kodejadi;

        //     $gambar="default";
            
        //     $input2 = array(
        //     'invoice'    => $kodejadi,
        //     'idOrder'    => $noId,
        //     'gambar'    => $gambar
        //     );

        //     $this->db->insert('invoice',$input2);
    }

    function code_otomatis(){
            $this->db->select('idOrder',false);
            $this->db->order_by('idOrder', 'desc');
            $this->db->limit(1);
            $query = $this->db->get('Order');
            if($query->num_rows()<>0){
                $data = $query->row();
                $kode = intval($data->idOrder);
            }else{
                $kode = 1;

            }
            $kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
            $kodejadi  = "INV/".date('dmy')."/".$kodemax;
            return $kodejadi;

            // $query = $this->db->query('SELECT idOrder FROM `order` ORDER BY idOrder desc limit 1;');
            // $data = array(
            // 'invoice'       => $kodejadi,
            // 'idOrder'   => $query
        // );
        
        }

        public function inputInvoice()
        {
            $query = $this->db->query('SELECT idOrder FROM `order` ORDER BY idOrder desc limit 1;');
            $noId =0;
            foreach ($query->result() as $key) {
            $noId = $key->idOrder;
            } 
            
            $this->db->select('idOrder',false);
            $this->db->order_by('idOrder', 'desc');
            $this->db->limit(1);
            $query = $this->db->get('Order');
            if($query->num_rows()<>0){
                $data = $query->row();
                $kode = intval($data->idOrder);
            }else{
                $kode = 1;

            }
            $kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
            $kodejadi  = "INV/".date('dmy')."/".$kodemax;

            $gambar="default1.png";
            
            $input2 = array(
            'invoice'    => $kodejadi,
            // 'gambar'    => NULL,
            'idOrder'    => $noId
            );

            $this->db->insert('invoice',$input2);
        }

    
}

/* End of file Order.php */
/* Location: ./application/models/Order.php */