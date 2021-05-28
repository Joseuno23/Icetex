<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nombre extends Controller {
        
    public function __construct() {
        parent::__construct();
        $this->ValidateSession();
    }

    public function index(){
        $array['menus'] = $this->M_Main->ListMenu(); 
        
        $Header['menu'] = $this->load->view('Template/Menu/V_Menu',$array,true);
        $Header['array_css'] = array(SWEETALERT_CSS);
        $this->load->view('Template/V_Header',$Header);
        
        
        $this->load->view('Template/V_Panel');
        
        $Footer['array_js'] = array(SWEETALERT_JS);
        $this->load->view('Template/V_Footer',$Footer);
    }
    
}