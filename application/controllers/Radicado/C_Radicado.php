<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_Radicado extends Controller {

    public function __construct() {
        parent::__construct();
        $this->ValidateSession();
        $this->load->model('Radicado/M_Radicado');
    }

    public function GetList() {
        $array['menus'] = $this->M_Main->ListMenu();

        $Header['menu'] = $this->load->view('Template/Menu/V_Menu', $array, true);
        $Header['array_css'] = array(DATATABLES_CSS, DATATABLES_CSS_B, SWEETALERT_CSS);
        $this->load->view('Template/V_Header', $Header);
        
        foreach ($this->M_Radicado->LoadButtonPermissions("RADICADO") as $btn) {
            $data[$btn->name] = $btn->name;
        }
        
        $data['radicados'] = $this->M_Radicado->GetPptoCompleteInfo(false, false, 'all', date('Y') . '-01-01', date('Y-m-d'));
        $this->load->view('Radicado/V_Panel', $data);

        $Footer['array_js'] = array(SWEETALERT_JS);
        $Footer["datatable"] = DATATABLE_JS;
        $this->load->view('Template/V_Footer', $Footer);
    }

    function GetListTable($id_radicado, $fecha_ini, $fecha_fin) {
        $rows = $this->M_Radicado->GetPptoCompleteInfo($this->input->get('start'), $this->input->get("length"), $id_radicado, $fecha_ini, $fecha_fin);
        $rows2 = $this->M_Radicado->GetPptoCompleteInfo(false, false, $id_radicado, $fecha_ini, $fecha_fin);

        
        $btns = $this->M_Radicado->LoadButtonPermissions("RADICADO");

        foreach ($btns as $btn) {
            $button = $btn->name;
            $$button = $button;
        }

        $array = array();
        foreach ($rows['result'] as $v) {

            $btn = '<div class="btn-group btnI' . $v->id_radicado . '" >
                        <button  type="button" class="btn1-' . $v->id_radicado . ' btn btn-' . $v->color . ' btn-xs btn-left">' . $v->estado . '</button>
                            <button type="button" class="btn2-' . $v->id_radicado . ' btn btn-' . $v->color . ' btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>';

            $btn .= '<ul class="dropdown-menu u-' . $v->id_radicado . '" role="menu">';
            $btn .= (isset($BtnEditRadicado)) ? '<li onclick="EditPpto(' . $v->id_radicado . ')"><a href="#"><i class="fa fa-fw fa-edit"></i> Editar</a></li>' : '';
            $btn .= (isset($BtnAnuleRadicado)) ? '<li onclick="Anule(' . $v->id_radicado . ',' . $v->id_estado . ')"><a style="color: red;" href="#"><i class="fa fa-fw fa-trash-o"></i> Anular</a></li>' : '';
            $btn .= '</ul></div>';

            $array[] = array($v->id_radicado, $v->fecha, $v->dependencia, $v->tipo_radicado, $v->tipo_documento, $v->canal, explode(' ', $v->usuario)[0], $btn);
        }

        echo json_encode(array('draw' => $this->input->get("draw"), 'recordsFiltered' => $rows2['num'], 'datos' => $array));
    }

    public function NewP() {
        $array['menus'] = $this->M_Main->ListMenu(); 
        $Header['menu'] = $this->load->view('Template/Menu/V_Menu',$array,true);
        $Header['array_css'] = array(DATATABLES_CSS, DATATABLES_CSS_B, SWEETALERT_CSS, WIZARD_CSS, WIZARD_CSS_B);
        
        $this->load->view('Template/V_Header',$Header);
        $data = array();
        foreach ($this->M_Radicado->LoadButtonPermissions("RADICADO") as $btn) {
            $data[$btn->name] = $btn->name;
        }
        $data['info_s'] = $this->load->view('Radicado/V_Info_Solicitante',array(),true);
        
        $info['dependencias'] = $this->M_Radicado->select('sys_dependencia', 'description');
        $info['canales'] = $this->M_Radicado->select('sys_canal', 'description');
        $info['tipos_radicado'] = $this->M_Radicado->select('sys_tipo_radicado', 'description');
        $info['tipos_documento'] = $this->M_Radicado->select('sys_tipo_documento', 'description');
        
        $data['info_g'] = $this->load->view('Radicado/V_Info_General',$info,true);
        $data['form_file'] = $this->load->view('Radicado/V_Files',array(),true);
        
        $this->load->view('Radicado/V_Form_New',$data);
        
        $Footer['array_js'] = array(SWEETALERT_JS, WIZARD_JS);
        $this->load->view('Template/V_Footer',$Footer);
    }
    
    function SaveRadicado(){
        $_POST['id_usuario'] = $this->session->IdUser;
        $result = $this->M_Radicado->SaveData('sys_radicado', $_POST);
        echo json_encode(array('res'=>$result));
    }
    
    function UploadFile() {

        require dirname(__FILE__) . '/../../libraries/UploadHandler.php';

        $date = explode('-', date('Y-m-d H:i:s'));
        $folder = 'files/' . $date[0] . '/' . $date[1];
//        $this->input->post('path')$this->input->post('path')
        $UploadHandler = new UploadHandler(null, true, null, 'path', $folder);
        $nombre = $UploadHandler->get_response();
        
        if(count($nombre['files']) > 0){
           
            $path = $folder . '/' . $this->input->post('path');

            $data = array(
                "id_radicado" => $this->input->post('id_radicado'),
                "id_user" => $this->session->IdUser,
                "archivo" => $nombre['files'][0]->name,
                "path" => $path
            );
            $result = $this->M_Radicado->NewFile($data);
        }
    }

    
    
}
