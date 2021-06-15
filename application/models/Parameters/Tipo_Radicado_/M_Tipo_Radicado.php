<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Tipo_Radicado extends VS_Model {

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
                ->from("sys_tipo_radicado r")
                ->join("sys_status s", "r.status = s.id_status")
                ->order_by("r.description")
                ->get();

        return $result->result();
    }

    public function UpdateTipo() {

        $data = array("description" => strtoupper($this->descripcion), "status" => $this->status, "last_update"=> date("Y-m-d H:i:s"), "modified_by" => $this->session->IdUser);
        $this->db->where("id_tipo", $this->id_tipo);
        $result = $this->db->update("sys_tipo_radicado", $data);

        if ($result) {
            return "OK";
        } else {
            return $this->db->last_query();
        }
    }

    function CreateTipo() {
        $data = array("description" => strtoupper($this->descripcion), "status" => $this->status, "last_update"=> date("Y-m-d H:i:s"), "modified_by" => $this->session->IdUser);
        $result = $this->db->insert("sys_tipo_radicado", $data);

        if ($result) {
            return "OK";
        } else {
            return $this->db->last_query();
        }
    }

    function DeleteTipo() {
        $this->db->where("id_tipo",$this->id_tipo);
        $res = $this->db->update("sys_tipo_radicado",array("status"=>3,"last_update"=>date("Y-m-d H:i:s"), "modified_by"=>$this->session->IdUser));
        
        return ($res)?"OK":"ERROR : ".$this->db->last_query();
    }

}
