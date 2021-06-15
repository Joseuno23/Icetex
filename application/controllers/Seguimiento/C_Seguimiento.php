<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_Seguimiento extends Controller {

    public function __construct() {
        parent::__construct();
        $this->ValidateSession();
        $this->load->model('Seguimiento/M_Seguimiento');
    }

    public function NewP() {
        $array['menus'] = $this->M_Main->ListMenu(); 
        $Header['menu'] = $this->load->view('Template/Menu/V_Menu',$array,true);
        $Header['array_css'] = array(SWEETALERT_CSS, ALERTIFY_CSS, ALERTIFY_CSS2);
        
        $this->load->view('Template/V_Header',$Header);
        
        $tipos = $this->M_Seguimiento->select('sys_tipo_seguimiento', 'description');
        $data['form_file'] = $this->load->view('Seguimiento/V_Files',array('tipos'=>$tipos),true);
        
        $this->load->view('Seguimiento/V_Form_New',$data);
        
        $Footer['array_js'] = array(SWEETALERT_JS, ALERTIFY_JS);
        $this->load->view('Template/V_Footer',$Footer);
    }

    public function Edit($idEncript,$tokenId) {
        $array['menus'] = $this->M_Main->ListMenu(); 
        $Header['menu'] = $this->load->view('Template/Menu/V_Menu',$array,true);
        $Header['array_css'] = array(SWEETALERT_CSS, ALERTIFY_CSS, ALERTIFY_CSS2);
        
        $this->load->view('Template/V_Header',$Header);
        
        $id_seguimiento = $this->decryp(base64_decode($idEncript), $tokenId);
        
        $info = $this->M_Seguimiento->GetInfo($id_seguimiento);

        
        $data['id_seguimiento'] = $info->id_seguimiento;
        
        $adjuntos = $this->M_Seguimiento->ListaAdjuntos($id_seguimiento);
        $data['form_file'] = $this->load->view('Seguimiento/V_Files_Update',array('info'=>$info,'adjuntos'=>$adjuntos),true);
        
        $this->load->view('Seguimiento/V_Form_Update',$data);
        
        $Footer['array_js'] = array(SWEETALERT_JS, ALERTIFY_JS);
        $this->load->view('Template/V_Footer',$Footer);
    }
    
    function validateId(){
        $exp = explode('.', trim($this->input->post('id_radicado')));
        $res = array('res'=>'invalid');
        
        if(array_key_exists(3,$exp)){
            $row = $this->M_Seguimiento->validateId($exp[3], $exp[0].'.'.$exp[1].'.'.$exp[2]);
            
            if(isset($row->id_radicado)){
                
                $iv = $this->getIV(METHOD_ENCRYP);
                $data = array(
                    'id_radicado' => $row->id_radicado,
                    'codigo' => $row->codigo,
                    'id_tipo_seguimiento' => $this->input->post('id_tipo_seguimiento'),
                    'titulo' => $this->input->post('titulo'),
                    'descripcion' => $this->input->post('descripcion'),
                    'id_usuario' => $this->session->IdUser,
                    'iv_key' => $iv
                );

                $result = $this->M_Seguimiento->SaveData('sys_seguimiento', $data);

              
                
                $res = array('res'=>'OK', 'id'=>base64_encode($this->crip($result, $iv)), 'token'=>$iv);
            }
        }
        
        echo json_encode($res);
    }
    
    function UploadFile() {

            require dirname(__FILE__) . '/../../libraries/UploadHandler.php';

            $date = explode('-', date('Y-m-d H:i:s'));
            $folder = 'files/' . $date[0] . '/' . $date[1];
            $UploadHandler = new UploadHandler(null, true, null, 'path', $folder);
            $nombre = $UploadHandler->get_response();

            if(count($nombre['files']) > 0){

                $path = $folder . '/' . $this->input->post('path');

                $data = array(
                    "id_seguimiento" => $this->input->post('id_seguimiento'),
                    "id_user" => $this->session->IdUser,
                    "archivo" => $nombre['files'][0]->name,
                    "tipo" => $nombre['files'][0]->type,
                    "path" => $path,
                    "name" => $_FILES["files"]["name"][0]
                );
                $result = $this->M_Seguimiento->NewFile($data);
            }
    }
    
    function Delete($folder, $ano, $mes, $archivo) {

        $folder .= '/' . $ano . '/' . $mes;

        require dirname(__FILE__) . '/../../libraries/UploadHandler.php';
        $UploadHandler = new UploadHandler(null, true, null, 'path', $folder);

        $UploadHandler->delete(false, array($archivo));
        $this->M_Seguimiento->DeleteFile($folder.'/', $archivo);
        
    }

}
