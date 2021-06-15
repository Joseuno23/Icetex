<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_Subserie extends Controller {

    public function __construct() {
    parent::__construct();
        $this->ValidateSession();
        $this->load->model("Parameters/Subserie/M_Subserie");
    }

    public function index() {
        $array['menus'] = $this->M_Main->ListMenu();

        $Header['menu'] = $this->load->view('Template/Menu/V_Menu', $array, true);
        $Header['array_css'] = array(DATATABLES_CSS, DATATABLES_CSS_B, SWEETALERT_CSS);
        $this->load->view('Template/V_Header', $Header);
        
        $data['roles'] = $this->M_Subserie->ListSubserieAll();
        $data['status'] = $this->M_Subserie->ListStatusAll();
        $data['series'] = $this->M_Subserie->select('sys_serie','descripcion');
        
        $data['table'] = $this->load->view('Parameters/Subserie/V_Table_Subserie',$data,true);
        $this->load->view('Parameters/Subserie/V_List_Subserie',$data);

        $Footer['array_js'] = array(SWEETALERT_JS);
        $Footer["datatable"] = DATATABLE_JS;
        $this->load->view('Template/V_Footer', $Footer);
    }
    
    function UpdateSubserie(){
        $result = $this->M_Subserie->UpdateSubserie();
        $table ="";
        if($result == "OK"){
            $data['roles'] = $this->M_Subserie->ListSubserieAll();
            $table = $this->load->view('Parameters/Subserie/V_Table_Subserie',$data,true);
        }
        echo json_encode(array("res"=>$result,"tabla"=>$table));
    }
    
    function CreateSubserie(){
        $result = $this->M_Subserie->CreateSubserie();
        $table ="";
        if($result == "OK"){
            $data['roles'] = $this->M_Subserie->ListSubserieAll();
            $table = $this->load->view('Parameters/Subserie/V_Table_Subserie',$data,true);
        }
        echo json_encode(array("res"=>$result,"tabla"=>$table));
    }
    
    function DeleteSubserie(){
        $result = $this->M_Subserie->DeleteSubserie();
        $table ="";
        if($result == "OK"){
            $data['roles'] = $this->M_Subserie->ListSubserieAll();
            $table = $this->load->view('Parameters/Subserie/V_Table_Subserie',$data,true);
        }
        echo json_encode(array("res"=>$result,"tabla"=>$table));
    }

}
