<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_Canal extends Controller {

    public function __construct() {
    parent::__construct();
        $this->ValidateSession();
        $this->load->model("Parameters/Canal/M_Canal");
    }

    public function index() {
        $array['menus'] = $this->M_Main->ListMenu();

        $Header['menu'] = $this->load->view('Template/Menu/V_Menu', $array, true);
        $Header['array_css'] = array(DATATABLES_CSS, DATATABLES_CSS_B, SWEETALERT_CSS);
        $this->load->view('Template/V_Header', $Header);
        
        $data['roles'] = $this->M_Canal->ListCanalAll();
        $data['status'] = $this->M_Canal->ListStatusAll();
        $data['table'] = $this->load->view('Parameters/Canal/V_Table_Canal',$data,true);
        $this->load->view('Parameters/Canal/V_List_Canal',$data);

        $Footer['array_js'] = array(SWEETALERT_JS);
        $Footer["datatable"] = DATATABLE_JS;
        $this->load->view('Template/V_Footer', $Footer);
    }
    
    function UpdateCanal(){
        $result = $this->M_Canal->UpdateCanal();
        $table ="";
        if($result == "OK"){
            $data['roles'] = $this->M_Canal->ListCanalAll();
            $table = $this->load->view('Parameters/Canal/V_Table_Canal',$data,true);
        }
        echo json_encode(array("res"=>$result,"tabla"=>$table));
    }
    
    function CreateCanal(){
        $result = $this->M_Canal->CreateCanal();
        $table ="";
        if($result == "OK"){
            $data['roles'] = $this->M_Canal->ListCanalAll();
            $table = $this->load->view('Parameters/Canal/V_Table_Canal',$data,true);
        }
        echo json_encode(array("res"=>$result,"tabla"=>$table));
    }
    
    function DeleteCanal(){
        $result = $this->M_Canal->DeleteCanal();
        $table ="";
        if($result == "OK"){
            $data['roles'] = $this->M_Canal->ListCanalAll();
            $table = $this->load->view('Parameters/Canal/V_Table_Canal',$data,true);
        }
        echo json_encode(array("res"=>$result,"tabla"=>$table));
    }

}
