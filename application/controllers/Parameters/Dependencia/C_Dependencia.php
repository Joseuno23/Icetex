<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_Dependencia extends Controller {

    public function __construct() {
    parent::__construct();
        $this->ValidateSession();
        $this->load->model("Parameters/Dependencia/M_Dependencia");
    }

    public function index() {
        $array['menus'] = $this->M_Main->ListMenu();

        $Header['menu'] = $this->load->view('Template/Menu/V_Menu', $array, true);
        $Header['array_css'] = array(DATATABLES_CSS, DATATABLES_CSS_B, SWEETALERT_CSS);
        $this->load->view('Template/V_Header', $Header);
        
        $data['roles'] = $this->M_Dependencia->ListDependenciaAll();
        $data['status'] = $this->M_Dependencia->ListStatusAll();
        $data['table'] = $this->load->view('Parameters/Dependencia/V_Table_Dependencia',$data,true);
        $this->load->view('Parameters/Dependencia/V_List_Dependencia',$data);

        $Footer['array_js'] = array(SWEETALERT_JS);
        $Footer["datatable"] = DATATABLE_JS;
        $this->load->view('Template/V_Footer', $Footer);
    }
    
    function UpdateDependencia(){
        $result = $this->M_Dependencia->UpdateDependencia();
        $table ="";
        if($result == "OK"){
            $data['roles'] = $this->M_Dependencia->ListDependenciaAll();
            $table = $this->load->view('Parameters/Dependencia/V_Table_Dependencia',$data,true);
        }
        echo json_encode(array("res"=>$result,"tabla"=>$table));
    }
    
    function CreateDependencia(){
        $result = $this->M_Dependencia->CreateDependencia();
        $table ="";
        if($result == "OK"){
            $data['roles'] = $this->M_Dependencia->ListDependenciaAll();
            $table = $this->load->view('Parameters/Dependencia/V_Table_Dependencia',$data,true);
        }
        echo json_encode(array("res"=>$result,"tabla"=>$table));
    }
    
    function DeleteDependencia(){
        $result = $this->M_Dependencia->DeleteDependencia();
        $table ="";
        if($result == "OK"){
            $data['roles'] = $this->M_Dependencia->ListDependenciaAll();
            $table = $this->load->view('Parameters/Dependencia/V_Table_Dependencia',$data,true);
        }
        echo json_encode(array("res"=>$result,"tabla"=>$table));
    }

}
