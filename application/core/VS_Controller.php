<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function ValidateSession() {
        if (!$this->session->has_userdata('IdUser')) {
            header('Location: ' . base_url());
            return false;
        }
    }

    function getIV($method){
        $iv = base64_encode(openssl_random_pseudo_bytes(openssl_cipher_iv_length($method)));
        return substr(hash('sha256', $iv), 0, 16);
    }

    function crip($value,$iv) {
        return openssl_encrypt($value, METHOD_ENCRYP, KEY_ENCRYP, false, $iv);
    }

    function decryp($value,$iv) {
        $encrypted_data = base64_decode($value);
        return openssl_decrypt($value, METHOD_ENCRYP, KEY_ENCRYP, false, $iv);
    }
    
}