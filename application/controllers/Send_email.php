<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Send_email extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
    }    
    
    public function index(){
      // Konfigurasi email
        $config = [
               'mailtype'  => 'html',
               'charset'   => 'utf-8',
               'protocol'  => 'smtp',
               'smtp_host' => 'ssl://smtp.gmail.com',
               'smtp_user' => 'email_anda@gmail.com',    // Ganti dengan email gmail anda
               'smtp_pass' => 'password_email_gmail_anda',      // Ganti dengan Password gmail anda
               'smtp_port' => 465,
               'crlf'      => "\r\n",
               'newline'   => "\r\n"
           ];

        // Load library email dan konfigurasinya
        $this->load->library('email', $config);

        // Email dan nama pengirim
        $this->email->from('email_anda@gmail.com', 'BLOG cacan.id');

        // Email penerima
        $this->email->to('emai_tujuaan_anda@gmail.com'); // Ganti dengan email tujuan anda

        // Lampiran email, isi dengan url/path file
        $this->email->attach('https://i.imgur.com/AJbZINa.jpg');

        // Subject email
        $this->email->subject('Send Email Dengan SMTP Gmail CodeIgniter 3');

        // Isi email
        $this->email->message("Ini adalah contoh email CodeIgniter yang dikirim menggunakan SMTP email Google (Gmail).<br>"
                . "<br> Klik <strong><a href='https://blog.cacan.id/post/send-email-dengan-smtp-gmail-codeigniter-3' target='_blank' rel='noopener'>disini</a></strong> untuk melihat tutorialnya.");

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
            echo 'Sukses! email berhasil dikirim.';
        } else {
            echo 'Error! email tidak dapat dikirim.';
        }
    }

}    