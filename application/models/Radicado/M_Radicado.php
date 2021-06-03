<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Radicado extends VS_Model {

    public function __construct() {
        parent::__construct();
    }

    function GetPptoCompleteInfo($ini = false, $fin = false, $radicado, $fecha_ini, $fecha_fin) {

        if ($fin)
            $this->db->limit($fin, $ini);

        if (!empty($this->input->get('search[value]'))) {
            $this->db->like('id_radicado', $this->input->get('search[value]'));
            $this->db->or_like('e.description', trim($this->input->get('search[value]')));
            $this->db->or_like('td.description', trim($this->input->get('search[value]')));
            $this->db->or_like('tr.description', trim($this->input->get('search[value]')));
            $this->db->or_like('d.description', trim($this->input->get('search[value]')));
            $this->db->or_like('c.description', trim($this->input->get('search[value]')));
        }

        if ($radicado != 'all')
            $this->db->where('id_radicado', $radicado);

        if ($fecha_ini != "all")
            $this->db->where("r.fecha between '$fecha_ini' AND DATE_ADD('$fecha_fin', INTERVAL 1 DAY) ");
        
        $result = $this->db->select('r.*,e.description as estado,e.color,td.description as tipo_documento,tr.description as tipo_radicado,d.description as dependencia,c.description as canal,u.name as usuario')
                ->from('sys_radicado r')
                ->join('sys_users u', 'r.id_usuario = u.id_users')
                ->join('sys_status e', 'r.id_estado = e.id_status')
                ->join('sys_tipo_documento td ', 'r.id_tipo_documento = td.id_tipo')
                ->join('sys_tipo_radicado tr ', 'r.id_tipo_radicado = tr.id_tipo')
                ->join('sys_dependencia d', 'r.id_dependencia = d.id_dependencia')
                ->join('sys_canal c', 'r.id_canal = c.id_canal')
                ->order_by('r.id_radicado', 'desc')
                ->get();
        
        return array("result" => $result->result(), "num" => $result->num_rows());
        
    }
    
    function GetInfo($id_radicado){
        $result = $this->db->select('r.*,e.description as estado,e.color,td.description as tipo_documento,tr.description as tipo_radicado,d.description as dependencia,c.description as canal,u.name as usuario')
                ->from('sys_radicado r')
                ->join('sys_users u', 'r.id_usuario = u.id_users')
                ->join('sys_status e', 'r.id_estado = e.id_status')
                ->join('sys_tipo_documento td ', 'r.id_tipo_documento = td.id_tipo')
                ->join('sys_tipo_radicado tr ', 'r.id_tipo_radicado = tr.id_tipo')
                ->join('sys_dependencia d', 'r.id_dependencia = d.id_dependencia')
                ->join('sys_canal c', 'r.id_canal = c.id_canal')
                ->where('r.id_radicado', $id_radicado)
                ->get();
        
        return $result->row();
    }
    
    function GetSeguimiento($id_radicado){
        $result = $this->db->select('s.*,t.description as tipo,u.name')
                ->from('sys_seguimiento s')
                ->join('sys_users u', 's.id_usuario = u.id_users')
                ->join('sys_tipo_seguimiento t', 's.id_tipo_seguimiento = t.id_tipo')
                ->where('s.id_radicado', $id_radicado)
                ->get();
        
        return $result->result();
    }

    function NewFile($data) {
        $result = $this->db->insert("sys_adjuntos", $data);
        if ($result) {
            return "OK";
        } else {
            return "Error: " . $this->db->last_query();
        }
    }
    
    function DeleteFile($path, $archivo) {
        $this->db->where("path", $path);
        $this->db->where("archivo", $archivo);

        $this->db->delete("sys_adjuntos");
    }
    
    function ListaAdjuntos($id_radicado){
        $result = $this->db->select('*')
                ->from('sys_adjuntos')
                ->where('id_radicado', $id_radicado)
                ->get();
        return $result->result();
    }
    
    
}
