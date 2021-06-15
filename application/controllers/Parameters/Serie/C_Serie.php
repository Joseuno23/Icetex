<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_Serie extends Controller {

    public function __construct() {
    parent::__construct();
        $this->ValidateSession();
        $this->load->model("Parameters/Serie/M_Serie");
    }

    public function index() {
        $array['menus'] = $this->M_Main->ListMenu();

        $Header['menu'] = $this->load->view('Template/Menu/V_Menu', $array, true);
        $Header['array_css'] = array(DATATABLES_CSS, DATATABLES_CSS_B, SWEETALERT_CSS);
        $this->load->view('Template/V_Header', $Header);
        
        $data['roles'] = $this->M_Serie->ListSerieAll();
        $data['status'] = $this->M_Serie->ListStatusAll();
        $data['dependencias'] = $this->M_Serie->select('sys_dependencia','description');
        
        $data['table'] = $this->load->view('Parameters/Serie/V_Table_Serie',$data,true);
        $this->load->view('Parameters/Serie/V_List_Serie',$data);

        $Footer['array_js'] = array(SWEETALERT_JS);
        $Footer["datatable"] = DATATABLE_JS;
        $this->load->view('Template/V_Footer', $Footer);
    }
    
    function UpdateSerie(){
        $result = $this->M_Serie->UpdateSerie();
        $table ="";
        if($result == "OK"){
            $data['roles'] = $this->M_Serie->ListSerieAll();
            $table = $this->load->view('Parameters/Serie/V_Table_Serie',$data,true);
        }
        echo json_encode(array("res"=>$result,"tabla"=>$table));
    }
    
    function CreateSerie(){
        $result = $this->M_Serie->CreateSerie();
        $table ="";
        if($result == "OK"){
            $data['roles'] = $this->M_Serie->ListSerieAll();
            $table = $this->load->view('Parameters/Serie/V_Table_Serie',$data,true);
        }
        echo json_encode(array("res"=>$result,"tabla"=>$table));
    }
    
    function DeleteSerie(){
        $result = $this->M_Serie->DeleteSerie();
        $table ="";
        if($result == "OK"){
            $data['roles'] = $this->M_Serie->ListSerieAll();
            $table = $this->load->view('Parameters/Serie/V_Table_Serie',$data,true);
        }
        echo json_encode(array("res"=>$result,"tabla"=>$table));
    }

}
