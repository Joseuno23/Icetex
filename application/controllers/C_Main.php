<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_Main extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        if ($this->session->has_userdata('IdUser')) {
            header('Location: ' . base_url() . "Home");
        } else {
            $this->load->view('Login/V_Login');
        }
    }

    function ChangePassword() {
        echo json_encode(array("res" => $this->M_Main->ChangePassword()));
    }

    function Login() {
        echo json_encode(array("res" => $this->Validar_User()));
    }
    
    function Validar_User($data = null) {

        $this->psw = $this->input->post("psw");

        if (!empty($this->input->post('pswnew'))):
            $this->M_Main->updateUser($this->input->post("usr"), $this->input->post("psw"), 
                array(
                    "password" => md5($this->input->post("pswnew")), 
                    "last_date" => date('Y-m-d')
                )
            );
        $this->psw = $this->input->post("pswnew");
        endif;

        $result = $this->M_Main->getUserRol($data,$this->input->post("usr"),$this->psw);

        if ($result->num_rows() > 0) {

            $reg = $result->row();

            if ($reg->activ == 1) {

                $datetime1 = new DateTime($reg->last_date);
                $datetime2 = new DateTime(date("Y-m-d"));
                $interval = $datetime1->diff($datetime2);

                if ((int) $interval->format('%a') > 60) {
                    $res = "CHANGE";
                } else {
                    $this->M_Main->UpdateData("sys_users", "id_users", $reg->id_users, array("last_entry" => date("Y-m-d H:i:s")));

                    $newdata = array(
                        'IdUser' => $reg->id_users,
                        'NameUser' => $reg->name,
                        'IdRol' => $reg->rol,
                        'Rol' => $reg->description,
                        'Email' => $reg->email,
                        'Avatar' => $reg->avatar
                    );

                    $this->session->set_userdata($newdata);

                    $res = "OK";
                }
            } else {
                $res = "LOCKED";
            }
        } else {
            $res = "ERROR";
        }

        return $res;
    }

    function Logout() {
        $this->session->sess_destroy();
        header('Location: ' . base_url());
    }
    
    function ForgotPass() {
        $this->load->view('Login/V_Forgot');
    }

    function ValidaForgotEmail() {
        $this->load->model("Parameters/User/M_User");
        $result = $this->M_User->ValidaCorreo();
        echo json_encode(array("res" => $result));
    }

    function RecoverPass(){
        $this->load->model("Parameters/User/M_User");

        //Insertar Registro de Recuperación
        $result = $this->M_Main->RecoverPass();

        if($result["result"]){
            
            //Enviar Correo de Recuperación
            $this->load->library('Emails');
            $this->emails->recover_account($result["token"], $result["email"]);

        }

        echo json_encode(array("res" => $result["message"]));

    }  
    
    public function NewPassword($token) {

        $_SESSION["token"]=$token;           

        if($this->M_Main->ValidateRecoverPass($token)=="OK"){
            $this->load->view('Login/V_New_Password');
        }else{
            echo "Acceso no autorizado";
        }
 
    }

}
