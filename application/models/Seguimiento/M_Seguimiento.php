<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Seguimiento extends VS_Model {

    public function __construct() {
        parent::__construct();
    }

    function validateId($id,$codigo){
        $result = $this->db->select('*')
                ->from('sys_radicado')
                ->where('id_radicado',$id)
                ->where('codigo',$codigo)
                ->get();
        
        return $result->row();
    }
    
    function GetInfo($id_seguimiento){
        $result = $this->db->select('r.*,u.name as usuario,s.description as tipo_seguimiento')
                ->from('sys_seguimiento r')
                ->join('sys_users u', 'r.id_usuario = u.id_users')
                ->join('sys_tipo_seguimiento s', 'r.id_tipo_seguimiento = s.id_tipo')
                ->where('r.id_seguimiento', $id_seguimiento)
                ->get();
        
        return $result->row();
    }
    
    function NewFile($data) {
        $result = $this->db->insert("sys_adjuntos_seguimiento", $data);
        if ($result) {
            return "OK";
        } else {
            return "Error: " . $this->db->last_query();
        }
    }
    
    function DeleteFile($path, $archivo) {
        $this->db->where("path", $path);
        $this->db->where("archivo", $archivo);

        $this->db->delete("sys_adjuntos_seguimiento");
    }
    
    function ListaAdjuntos($id_seguimiento){
        $result = $this->db->select('*')
                ->from('sys_adjuntos_seguimiento')
                ->where('id_seguimiento', $id_seguimiento)
                ->get();
        return $result->result();
    }
    
}
