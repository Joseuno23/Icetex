<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Dependencia extends VS_Model {

    public function __construct() {
        parent::__construct();
        
        foreach ($_POST as $clave => $valor):
            $this->$clave = $valor;
        endforeach;
    }

    function ListDependenciaAll($id = null) {

        if (!empty($id)) {
            $this->db->where("id_dependencia", $id);
        }

        $result = $this->db->select("r.id_dependencia, r.codigo,r.emails,r.description as dependencia, r.status, s.* ")
                ->from("sys_dependencia r")
                ->join("sys_status s", "r.status = s.id_status")
                ->order_by("r.description")
                ->get();

        return $result->result();
    }

    public function UpdateDependencia() {

        $data = array("description" => strtoupper($this->descripcion), "status" => $this->status, "codigo" => $this->codigo, "emails" => $this->emails);
        $this->db->where("id_dependencia", $this->id_dependencia);
        $result = $this->db->update("sys_dependencia", $data);

        if ($result) {
            return "OK";
        } else {
            return $this->db->last_query();
        }
    }

    function CreateDependencia() {
        $data = array("description" => strtoupper($this->descripcion), "codigo" => $this->codigo, "emails" => $this->emails, "status" => $this->status);
        $result = $this->db->insert("sys_dependencia", $data);

        if ($result) {
            return "OK";
        } else {
            return $this->db->last_query();
        }
    }

    function DeleteDependencia() {
        $this->db->where("id_dependencia",$this->id_dependencia);
        $res = $this->db->update("sys_dependencia",array("status"=>3));
        
        return ($res)?"OK":"ERROR : ".$this->db->last_query();
    }

}
