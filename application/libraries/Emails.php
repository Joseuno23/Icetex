<?php

class Emails {

	var $config;

	public function __construct(){

		$CI= & get_instance();
		$CI->load->library('email');

        //SMTP & mail configuration
        $config = Array(
          'protocol' => 'smtp',
          'smtp_host' => 'smtp.mailtrap.io',
          'smtp_port' => 2525,
          'charset' => 'utf-8',
          'mailtype' => 'html',
          'smtp_user' => '3ecb81b67f80b3',
          'smtp_pass' => '33cdd2cc880482'
        );
        $CI->email->initialize($config);
        $CI->email->set_newline("\r\n");


	}

	public function recover_account($token, $email){

		$CI= & get_instance();
		$subject='Recuperación de Cuenta';
		$data["token"]=$token;
		$html= $CI->load->view('Email/V_Recover_Account', $data, TRUE); 

		$this->send_email($email, $subject, $html);

	}

	private function send_email($email, $subject, $html){

		$CI= & get_instance();
		$CI->email->from("software@sabanagrande-atlantico.gov.co", "Software Documental");
		$CI->email->to($email);

		$CI->email->subject($subject);
		$CI->email->message($html);

		$CI->email->send();

	}

}


?>