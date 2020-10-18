<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('zend');
        $this->zend->load('zend/barcode');
        
         if ($this->session->userdata('logged_in')) {
            $session_data=$this->session->userdata('logged_in');
            $data['username']=$session_data['username'];
            $data['level']=$session_data['level'];
            $data['id']=$session_data['id'];
        }else{
            echo "<script>alert('You Must Login First'); </script>";
            redirect('Login','refresh');
        }
    }

	public function home($idPrice)
	{
		$session_data=$this->session->userdata('count');
        $data['numberTicket'] = $session_data['qty'] ;  

        $session_data=$this->session->userdata('logged_in');
        $data['username']=$session_data['username'];
        $data['level']=$session_data['level'];
        $data['id']=$session_data['id'];

        $this->load->model('user');
        $id = $data['id'];
        $data['name'] = $this->user->selectAll($id);

        $this->load->model('SearchModel');
        $this->load->model('EventScheduleModel');
        $data["artist_list"] = $this->EventScheduleModel->getArtistOption();
        $data["cat_list"]    = $this->EventScheduleModel->getCatOption();
        $data['detail']      = $this->SearchModel->detailTickets($idPrice);
        $data['search']      = $this->SearchModel->detailAll($id);

        $this->load->view('user/headerAllEvent', $data);
        $this->load->view('user/payment', $data);
        $this->load->view('user/footer'); 
		
	}

    public function input(){ 
        $session_data=$this->session->userdata('logged_in');
        $data['username']=$session_data['username'];
        $data['level']=$session_data['level'];
        $data['id']=$session_data['id'];
        $session_data=$this->session->userdata('count'); 
        $data['numberTicket'] = $session_data['qty'] ;
        $qty = $data['numberTicket']; 
        

        $this->load->model('Order');
        $this->Order->inputOrder($qty);
        $this->Order->inputInvoice();

        
        $data['kodeunik'] = $this->Order->code_otomatis();
        
        $query = $this->db->query("SELECT codeTicket FROM order_detail ORDER BY idDetail desc limit $qty;");
          foreach ($query->result() as $key) {
            $code = $key->codeTicket;
            $this->barcode($code);
           } 


        $invo= $this->db->query("SELECT invoice FROM `invoice` ORDER BY idOrder desc limit 1");
            foreach ($invo->result() as $key) {
            $code = $key->invoice;
           }            

            //masrud.com/post/kirim-email-dengan-smtp-gmail
             // Konfigurasi email
        $config = [
               'useragent' => 'CodeIgniter',
               'protocol'  => 'smtp',
               'mailpath'  => '/usr/sbin/sendmail',
               'smtp_host' => 'ssl://smtp.gmail.com',
               'smtp_user' => 'officialmeetup@gmail.com', // Ganti dengan email gmail Anda
               'smtp_pass' => '1234admin', // Password gmail Anda
               'smtp_port' => 465,
               'smtp_keepalive' => TRUE,
               'smtp_crypto' => 'SSL',
               'wordwrap'  => TRUE,
               'wrapchars' => 80,
               'mailtype'  => 'html',
               'charset'   => 'utf-8',
               'validate'  => TRUE,
               'crlf'      => "\r\n",
               'newline'   => "\r\n",
           ];
 
        // Load library email dan konfigurasinya
        $this->load->library('email', $config);
 
        // Email dan nama pengirim
        $this->email->from('officialmeetup@gmail.com', 'Meetup Official');
 
        // Email penerima
        $mail=$this->input->post('email');
        $this->email->to("$mail"); // Ganti dengan email tujuan Anda
 
        // Lampiran email, isi dengan url/path file
        // $this->email->attach('https://masrud.com/themes/masrud/img/default.png');
 
        // Subject email
        $this->email->subject('Konfirmasi Tagihan Pembayaran | Meetup.com');
        $user=$this->session->userdata('logged_in');
        // Isi email
// print_r($code);
// die();
        $this->email->message("Hello " .$user['username']. ". Terimakasih telah membeli tiket di Meetup.com. <br><br> Nomor invoice anda : " .$code. ". Silahkan melakukan Pembayaran melalui :  <br><br> BCA : 89937492387492 <br> BRI : 4372394738928 <br> BNI : 7437494982379 <br><br><br>Lakukan konfirmasi pembayaran dengan upload bukti pembayaran di menu invoice. Terimakasih atas kepercayaan anda.");
 
        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
            echo "<script>alert('Email sukses dikirim'); </script>";
        } else {
            echo "<script>alert('Email gagal dikirim'); </script>";
        }

        $this->session->unset_userdata('count');
        echo "<script>alert('Data Sedang diproses tunggu beberapa saat'); </script>";
        redirect('Payment/confirmation','refresh');

    }

    public function sendEmail()
    {
        $session_data=$this->session->userdata('logged_in');
        $data['username']=$session_data['username'];
        $data['level']=$session_data['level'];
        $data['id']=$session_data['id'];
        $id = $this->input->post('id'); 

        $htmlContent = '<h1>Mengirim email HTML dengan Codeigniter</h1>';
        $htmlContent .= '<div>Contoh pengiriman email yang memiliki tag HTML dengan menggunakan Codeigniter</div>';

        $config['mailtype'] = 'html';
        $this->load->library('email');
        
        $this->email->from('admin@meetup.com', 'Meetup');
        $this->email->to($session_data['email']);
        // $this->email->cc('another@example.com');
        // $this->email->bcc('and@another.com');
        
        $this->email->subject('Konfirmasi Pembayaran Tagihan');
        $this->email->message($htmlContent);
        
        $this->email->send();
        
        // echo $this->email->print_debugger();
    }

    public function barcode($code){

        $file = Zend_Barcode::draw('code128', 'image', array('text'=>$code),array());
        $store_image = imagejpeg($file,"assets/imgEvent/barcode/{$code}.jpg");
         return $code.'.jpg';
    }

    public function confirmation(){

        $session_data=$this->session->userdata('logged_in');
        $data['username']=$session_data['username'];
        $data['level']=$session_data['level'];
        $data['id']=$session_data['id'];

        $this->load->model('User');
        $this->load->model('Order');
        $id = $data['id'];
        $data['name'] = $this->User->selectAll($id);
        $data['kodeunik'] = $this->Order->code_otomatis();

        $this->load->view('user/headerAllEvent', $data);
        $this->load->view('user/confirmation');
        $this->load->view('user/footer'); 

    }
}

    

/* End of file Payment.php */
/* Location: ./application/views/admin/Payment.php */