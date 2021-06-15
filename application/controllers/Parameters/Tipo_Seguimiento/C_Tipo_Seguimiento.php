<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_Tipo_Seguimiento extends Controller {

    public function __construct() {
    parent::__construct();
        $this->ValidateSession();
        $this->load->model("Parameters/Tipo_Seguimiento/M_Tipo_Seguimiento");
    }

    public function index() {
        $array['menus'] = $this->M_Main->ListMenu();

        $Header['menu'] = $this->load->view('Template/Menu/V_Menu', $array, true);
        $Header['array_css'] = array(DATATABLES_CSS, DATATABLES_CSS_B, SWEETALERT_CSS);
        $this->load->view('Template/V_Header', $Header);
        
        $data['tipos'] = $this->M_Tipo_Seguimiento->ListTipoAll();
        $data['status'] = $this->M_Tipo_Seguimiento->ListStatusAll();
        $data['table'] = $this->load->view('Parameters/Tipo_Seguimiento/V_Table_Tipo',$data,true);
        $this->load->view('Parameters/Tipo_Seguimiento/V_List_Tipo',$data);

        $Footer['array_js'] = array(SWEETALERT_JS);
        $Footer["datatable"] = DATATABLE_JS;
        $this->load->view('Template/V_Footer', $Footer);
    }
    
    function UpdateTipo(){
        $result = $this->M_Tipo_Seguimiento->UpdateTipo();
        $table ="";
        if($result == "OK"){
            $data['tipos'] = $this->M_Tipo_Seguimiento->ListTipoAll();
            $table = $this->load->view('Parameters/Tipo_Seguimiento/V_Table_Tipo',$data,true);
        }
        echo json_encode(array("res"=>$result,"tabla"=>$table));
    }
    
    function CreateTipo(){
        $result = $this->M_Tipo_Seguimiento->CreateTipo();
        $table ="";
        if($result == "OK"){
            $data['tipos'] = $this->M_Tipo_Seguimiento->ListTipoAll();
            $table = $this->load->view('Parameters/Tipo_Seguimiento/V_Table_Tipo',$data,true);
        }
        echo json_encode(array("res"=>$result,"tabla"=>$table));
    }
    
    function DeleteTipo(){
        $result = $this->M_Tipo_Seguimiento->DeleteTipo();
        $table ="";
        if($result == "OK"){
            $data['tipos'] = $this->M_Tipo_Seguimiento->ListTipoAll();
            $table = $this->load->view('Parameters/Tipo_Seguimiento/V_Table_Tipo',$data,true);
        }
        echo json_encode(array("res"=>$result,"tabla"=>$table));
    }

}
