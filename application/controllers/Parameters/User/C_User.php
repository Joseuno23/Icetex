<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_User extends Controller {

    public function __construct() {
        parent::__construct();
        $this->ValidateSession();
        $this->load->model("Parameters/User/M_User");
    }

    public function index() {
        $array['menus'] = $this->M_Main->ListMenu();
        $Header['menu'] = $this->load->view('Template/Menu/V_Menu', $array, true);
        $Header['array_css'] = array(DATATABLES_CSS, DATATABLES_CSS_B, SWEETALERT_CSS, ALERTIFY_CSS);
        $this->load->view('Template/V_Header', $Header);

        $data['user'] = $this->M_User->ListUser();
        $data['rol'] = $this->M_User->ListRolAll();
        $data['areas'] = $this->M_User->ListAreasAll();

        $data['table'] = $this->load->view('Parameters/User/V_Table_User', $data, true);
        $this->load->view('Parameters/User/V_List_User', $data);

        $Footer['array_js'] = array(SWEETALERT_JS, ALERTIFY_JS);
        $Footer["datatable"] = DATATABLE_JS;
        $this->load->view('Template/V_Footer', $Footer);
    }

    function CreateUser() {
        $result = $this->M_User->CreateUser();
        $table = "";
        if ($result == "OK") {
            $data['user'] = $this->M_User->ListUser();
            $table = $this->load->view('Parameters/User/V_Table_User', $data, true);
        }
        echo json_encode(array("res" => $result, "tabla" => $table));
    }

    function ValidaCorreo() {
        $result = $this->M_User->ValidaCorreo();
        echo json_encode(array("res" => $result));
    }

    function Changestatus() {
        $result = $this->M_User->Changestatus();
        $table = "";
        if ($result == "OK") {
            $data['user'] = $this->M_User->ListUser();
            $table = $this->load->view('Parameters/User/V_Table_User', $data, true);
        }
        echo json_encode(array("res" => $result, "tabla" => $table));
    }

    function InfoUser($id) {
        $array['menus'] = $this->M_Main->ListMenu();
        $Header['menu'] = $this->load->view('Template/Menu/V_Menu', $array, true);
        $Header['array_css'] = array(SWEETALERT_CSS);
        $this->load->view('Template/V_Header', $Header);


        $data['user'] = $this->M_User->ListUser($id);
        $data['rol'] = $this->M_User->ListRolAll();
        $data['areas'] = $this->M_User->ListAreasAll();
        $this->load->view('Parameters/User/InfoUser', $data);

        $Footer['array_js'] = array(SWEETALERT_JS);
        $this->load->view('Template/V_Footer', $Footer);
    }

    function ResetPass() {
        $result = $this->M_User->ResetPass();
        echo json_encode(array("res" => $result));
    }

    function updateInfo() {
        $result = $this->M_User->UpdateData('sys_users', 'id_users', $this->input->post('id_user'), array(
            $this->input->post('field') => $this->input->post('valor'))
        );
        echo json_encode(array("res" => ($result > 0)?'OK':'Error'));
    }

}
