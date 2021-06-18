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
        $Header['array_css'] = array(DATATABLES_CSS, DATATABLES_CSS_B, SWEETALERT_CSS, ALERTIFY_CSS, ALERTIFY_CSS2);
        $this->load->view('Template/V_Header', $Header);
        
        foreach ($this->M_Radicado->LoadButtonPermissions("RADICADO") as $btn) {
            $data[$btn->name] = $btn->name;
        }
        
        $data['radicados'] = $this->M_Radicado->GetPptoCompleteInfo(false, false, 'all', date('Y') . '-01-01', date('Y-m-d'));
        $this->load->view('Radicado/V_Panel', $data);

        $Footer['array_js'] = array(SWEETALERT_JS, ALERTIFY_JS);
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
            
          
            $idEncrip = base64_encode($this->crip($v->id_radicado, $v->iv_key));
    

            $btn = '<div class="btn-group btnI' . $v->id_radicado . '" >
                        <button style="min-width:86px"  type="button" class="btn1-' . $v->id_radicado . ' btn btn-' . $v->color . ' btn-sm btn-left">' . $v->estado . '</button>
                            <button type="button" class="btn2-' . $v->id_radicado . ' btn btn-' . $v->color . ' btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>';

            $btn .= '<ul class="dropdown-menu u-' . $v->id_radicado . '" role="menu">';
            $btn .= '<li onclick="previewRadicado(\''.$idEncrip.'\',\'' . $v->iv_key .'\')"><a href="#"><i class="fa fa-fw fa-edit"></i> Preview</a></li>';
            $btn .= (isset($BtnEditRadicado) && !in_array($v->id_estado, array('4','5'))) ? '<li onclick="EditRadicado(\''.$idEncrip.'\',\'' . $v->iv_key .'\')"><a href="#"><i class="fa fa-fw fa-edit"></i> Editar</a></li>' : '';
            $btn .= (isset($BtnAnuleRadicado) && !in_array($v->id_estado, array('4','5'))) ? '<li onclick="Anule(' . $v->id_radicado . ',' . $v->id_estado . ',\'' . $v->codigo . '\')"><a style="color: red;" href="#"><i class="fa fa-fw fa-trash-o"></i> Anular</a></li>' : '';
            $btn .= '</ul></div>';
            $fecha = strtotime($v->fecha);
            $fecha = date('Y-m-d', $fecha);
            
            if($v->id_estado == 5){
                $icon = '<img style="width:30px;margin-left:5px" data-toggle="tooltip" data-placement="top" title="Radicado Cerrado" src="' . base_url() . 'assets/images/icons/verde.png" />';
            }else if($v->id_estado == 4){
                $icon = '<img style="width:30px;margin-left:5px" data-toggle="tooltip" data-placement="top" title="Radicado Anulado" src="' . base_url() . 'assets/images/icons/invalid.png" />';
            }else{
                if ($v->dias <= ($v->dias_respuesta - ($v->dias_respuesta * 2))) {
                    $icon = '<img style="width:30px;margin-left:5px" data-toggle="tooltip" data-placement="top" title="" src="' . base_url() . 'assets/images/icons/rojo.png" />';
                }else{
                    $icon = '<img style="width:30px;margin-left:5px" data-toggle="tooltip" data-placement="top" title="" src="' . base_url() . 'assets/images/icons/amarillo.png" />';
                }
            }
            
            $array[] = array($icon, $v->codigo.'.'.$v->id_radicado.'<br />'.$fecha, $v->dependencia, $v->serie, $v->subserie, $v->canal, explode(' ', $v->usuario)[0], $btn);
        }

        echo json_encode(array('draw' => $this->input->get("draw"), 'recordsFiltered' => $rows2['num'], 'datos' => $array));
    }

    public function NewP() {
        $array['menus'] = $this->M_Main->ListMenu(); 
        $Header['menu'] = $this->load->view('Template/Menu/V_Menu',$array,true);
        $Header['array_css'] = array(SWEETALERT_CSS, WIZARD_CSS, WIZARD_CSS_B);
        
        $this->load->view('Template/V_Header',$Header);
        $data = array();
        foreach ($this->M_Radicado->LoadButtonPermissions("RADICADO") as $btn) {
            $data[$btn->name] = $btn->name;
        }
        $data['info_s'] = $this->load->view('Radicado/V_Info_Solicitante',array(),true);
        
        $info['dependencias'] = $this->M_Radicado->select('sys_dependencia', 'description');
        $info['canales'] = $this->M_Radicado->select('sys_canal', 'description');
        $info['series'] = $this->M_Radicado->select('sys_serie', 'descripcion');
        $info['subseries'] = $this->M_Radicado->select('sys_sub_serie', 'descripcion');
        
        $data['info_g'] = $this->load->view('Radicado/V_Info_General',$info,true);
        $data['form_file'] = $this->load->view('Radicado/V_Files',array('adjuntos'=>array()),true);
        
        $this->load->view('Radicado/V_Form_New',$data);
        
        $Footer['array_js'] = array(SWEETALERT_JS, WIZARD_JS);
        $this->load->view('Template/V_Footer',$Footer);
    }

    public function Edit($idEncript,$tokenId) {
        $array['menus'] = $this->M_Main->ListMenu(); 
        $Header['menu'] = $this->load->view('Template/Menu/V_Menu',$array,true);
        $Header['array_css'] = array(SWEETALERT_CSS, WIZARD_CSS, WIZARD_CSS_B,  ALERTIFY_CSS,ALERTIFY_CSS2);
        
        $this->load->view('Template/V_Header',$Header);
        
        $id_radicado = $this->decryp(base64_decode($idEncript), $tokenId);
        
        $data = array();
        foreach ($this->M_Radicado->LoadButtonPermissions("RADICADO") as $btn) {
            $data[$btn->name] = $btn->name;
        }
        $data['info'] = $this->M_Radicado->GetInfo($id_radicado);
        
        $data['info_s'] = $this->load->view('Radicado/V_Info_Solicitante',array('info'=>$data['info']),true);
        
        $info['dependencias'] = $this->M_Radicado->select('sys_dependencia', 'description');
        $info['canales'] = $this->M_Radicado->select('sys_canal', 'description');
        $info['tipos_radicado'] = $this->M_Radicado->select('sys_tipo_radicado', 'description');
        $info['tipos_documento'] = $this->M_Radicado->select('sys_tipo_documento', 'description');
        $info['series'] = $this->M_Radicado->selecTable('sys_serie', 'id_dependencia', $data['info']->id_dependencia);
        $info['subseries'] = $this->M_Radicado->selecTable('sys_sub_serie', 'id_serie', $data['info']->id_serie);
        $info['info'] = $data['info'];
        
        $data['info_g'] = $this->load->view('Radicado/V_Info_General',$info,true);
        
        $adjuntos = $this->M_Radicado->ListaAdjuntos($id_radicado);
        $data['form_file'] = $this->load->view('Radicado/V_Files',array('adjuntos'=>$adjuntos,'id_radicado'=>$id_radicado),true);
        
        $data['idEncript'] = $idEncript;
        $data['tokenId'] = $tokenId;
        $this->load->view('Radicado/V_Form_Update',$data);
        
        $Footer['array_js'] = array(SWEETALERT_JS, WIZARD_JS, ALERTIFY_JS);
        $this->load->view('Template/V_Footer',$Footer);
    }
    
    function Preview($idEncript,$tokenId){
        $array['menus'] = $this->M_Main->ListMenu(); 
        $Header['menu'] = $this->load->view('Template/Menu/V_Menu',$array,true);
        $Header['array_css'] = array();
        
        $this->load->view('Template/V_Header',$Header);
        
        $id_radicado = $this->decryp(base64_decode($idEncript), $tokenId);
        $data['adjuntos'] = $this->M_Radicado->ListaAdjuntos($id_radicado);
        
        $data['info'] = $this->M_Radicado->GetInfo($id_radicado);
        $data['seguimiento'] = $this->M_Radicado->GetSeguimiento($id_radicado);
        
        $data['dependencia'] = $this->M_Radicado->selecTable('sys_dependencia', 'id_dependencia', $data['info']->id_dependencia, true);
        $data['canal'] = $this->M_Radicado->selecTable('sys_canal', 'id_canal', $data['info']->id_canal, true);
        $data['serie'] = $this->M_Radicado->selecTable('sys_serie', 'id_serie', $data['info']->id_serie, true);
        $data['subserie'] = $this->M_Radicado->selecTable('sys_sub_serie', 'id_sub_serie', $data['info']->id_subserie, true);
        
        foreach ($this->M_Radicado->LoadButtonPermissions("RADICADO") as $btn) {
            $data[$btn->name] = $btn->name;
        }
        $data['idEncript'] = $idEncript;
        $data['tokenId'] = $tokenId;
        
        $this->load->view('Radicado/V_Preview',$data);
        
        $Footer['array_js'] = array();
        $this->load->view('Template/V_Footer',$Footer);
    }
    
    function SaveRadicado(){
        $iv = $this->getIV(METHOD_ENCRYP);
        $_POST['id_usuario'] = $this->session->IdUser;
        $_POST['iv_key'] = $iv;
        
        $result = $this->M_Radicado->SaveData('sys_radicado', $_POST);
        
        $return = array('res'=>$result);
        
        if($result > 0){
            $return['idEncrip'] = base64_encode($this->crip($result, $iv));
            $return['idToken'] = $iv;
        }
        
        echo json_encode($return);
    }
    
    function UpdateRadicado(){
        $data = array(
            $this->input->post('field')=>$this->input->post('valor'),
            'codigo'=>$this->input->post('codigo'),
        );
        $result = $this->M_Radicado->UpdateData('sys_radicado', 'id_radicado', $this->input->post('id_radicado'), $data);
        
        echo json_encode(array('res'=>$result));
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
                "id_radicado" => $this->input->post('id_radicado'),
                "id_user" => $this->session->IdUser,
                "archivo" => $nombre['files'][0]->name,
                "tipo" => $nombre['files'][0]->type,
                "path" => $path,
                "name" => $_FILES["files"]["name"][0]
            );
            $result = $this->M_Radicado->NewFile($data);
        }
    }

    function Delete($folder, $ano, $mes, $archivo) {

        $folder .= '/' . $ano . '/' . $mes;

        require dirname(__FILE__) . '/../../libraries/UploadHandler.php';
        $UploadHandler = new UploadHandler(null, true, null, 'path', $folder);

        $UploadHandler->delete(false, array($archivo));
        $this->M_Radicado->DeleteFile($folder.'/', $archivo);
        
        
    }
    
    function Anule(){
        $id_radicado = $this->input->post('id_radicado');
      
        $res = 'OK';

        $this->M_Radicado->UpdateData('sys_radicado', 'id_radicado', $id_radicado, array(
            'id_estado'=> 4,
        ));
      
        echo json_encode(array('res'=>$res));
    }
    
    function loadSeries(){
        $result = $this->M_Radicado->selecTable('sys_serie', 'id_dependencia', $this->input->post('id_dependencia'));
        
        echo json_encode(array('series'=>$result));
    }
    
    function loadSubSeries(){
        $result = $this->M_Radicado->selecTable('sys_sub_serie', 'id_serie', $this->input->post('id_serie'));
        
        echo json_encode(array('subseries'=>$result));
    }
    
    function Reporte(){
        $array['menus'] = $this->M_Main->ListMenu(); 
        $Header['menu'] = $this->load->view('Template/Menu/V_Menu',$array,true);
        $Header['array_css'] = array(RANGO_PICKER_CSS,ALERTIFY_CSS,ALERTIFY_CSS2);
        
        $this->load->view('Template/V_Header',$Header);
        
        $info['dependencias'] = $this->M_Radicado->select('sys_dependencia', 'description');
        $info['canales'] = $this->M_Radicado->select('sys_canal', 'description');
        $info['series'] = $this->M_Radicado->select('sys_serie', 'descripcion');
        $info['subseries'] = $this->M_Radicado->select('sys_sub_serie', 'descripcion');
        $this->load->view('Radicado/V_Reporte', $info);
        
        $Footer['array_js'] = array(MOMENT_JS,RANGO_PICKER_JS,ALERTIFY_JS);
        $this->load->view('Template/V_Footer',$Footer);
    }
        
    function Radicador($archivo = 0) {
        require_once(dirname(__FILE__) . '/../../includes/phpexcel/Classes/PHPExcel.php');
        require_once dirname(__FILE__) . '/../../includes/phpexcel/Classes/PHPExcel/IOFactory.php';
        include dirname(__FILE__) . '/../../includes/phpexcel/Classes/PHPExcel/Writer/Excel2007.php';
        
        
        if ($archivo) {
            $archivo .= '.xls';

            header('Content-Type: application/vnd.ms-excel');
            header("Content-Disposition: attachment; filename=$archivo");
            header("Expires: 0");
            header('Content-Transfer-Encoding: binary');
            header("Cache-Control: private", false);


            $ruta = dirname(__FILE__) . "/../../includes/phpexcel/temp/" . $archivo;
            $archivo = file_get_contents($ruta);
            echo $archivo;

            exit;
        } else {
            if (file_exists(dirname(__FILE__) . "/../../includes/phpexcel/temp/Radicador.xls")) {
                unlink(dirname(__FILE__) . "/../../includes/phpexcel/temp/Radicador.xls");
            }
        }
        
        $archivo = dirname(__FILE__) . "/../../includes/phpexcel/temp/Radicador.xls";

        copy(dirname(__FILE__) . "/../../includes/phpexcel/plantillas/Radicador.xlsx", $archivo);

        try {
            $objPHPExcel = PHPExcel_IOFactory::load($archivo);
        } catch (Exception $e) {
            die('Error loading file "' . pathinfo(PATHINFO_BASENAME) . '": ' . $e->getMessage());
        }
        
        
        $A = $objPHPExcel->getActiveSheet(0);

        $y = 2;
        
        $result = $this->M_Radicado->getRadicadosAll();
        
        foreach ($result as $v) {
            $A->setCellValue("A$y", $v->codigo.'.'.$v->id_radicado);
            $A->setCellValue("B$y", $v->fecha);
            $A->setCellValue("C$y", $v->name);
            $A->setCellValue("D$y", $v->dependencia);
            $A->setCellValue("E$y", $v->serie);
            $A->setCellValue("F$y", $v->subserie);
            $A->setCellValue("G$y", $v->canal);
            $A->setCellValue("H$y", $v->estado);
            $A->setCellValue("I$y", $v->asunto);
            $A->setCellValue("J$y", $v->descripcion);
            $A->setCellValue("K$y", $v->nombre_solicitante);
            $A->setCellValue("L$y", $v->documento_solicitante);
            $A->setCellValue("M$y", $v->telefono_solicitante);
            
            $y++;
        }
        
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save($archivo, __FILE__);
        $returnArray = Array('result' => "ok", 'archivo' => 'Radicador');
        $myjson = json_encode($returnArray);
        echo $myjson;
        
    }
    
}
