<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Tipo_Documento extends VS_Model {

    public function __construct() {
        parent::__construct();
        
        foreach ($_POST as $clave => $valor):
            $this->$clave = $valor;
        endforeach;
    }

    function ListTipoAll($id = null) {

        if (!empty($id)) {
            $this->db->where("id_tipo", $id);
        }

        $result = $this->db->select("r.id_tipo, r.description as tipo, r.status, s.* ")
                ->from("sys_tipo_documento r")
                ->join("sys_status s", "r.status = s.id_status")
                ->order_by("r.description")
                ->get();

        return $result->result();
    }

    public function UpdateTipo() {

        $data = array("description" => strtoupper($this->descripcion), "status" => $this->status);
        $this->db->where("id_tipo", $this->id_tipo);
        $result = $this->db->update("sys_tipo_documento", $data);

        if ($result) {
            return "OK";
        } else {
            return $this->db->last_query();
        }
    }

    function CreateTipo() {
        $data = array("description" => strtoupper($this->descripcion), "status" => $this->status);
        $result = $this->db->insert("sys_tipo_documento", $data);

        if ($result) {
            return "OK";
        } else {
            return $this->db->last_query();
        }
    }

    function DeleteTipo() {
        $this->db->where("id_tipo",$this->id_tipo);
        $res = $this->db->update("sys_tipo_documento",array("status"=>3));
        
        return ($res)?"OK":"ERROR : ".$this->db->last_query();
    }

}
