<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Canal extends VS_Model {

    public function __construct() {
        parent::__construct();
        
        foreach ($_POST as $clave => $valor):
            $this->$clave = $valor;
        endforeach;
    }

    function ListCanalAll($id = null) {

        if (!empty($id)) {
            $this->db->where("id_canal", $id);
        }

        $result = $this->db->select("r.id_canal, r.description as canal, r.status, s.* ")
                ->from("sys_canal r")
                ->join("sys_status s", "r.status = s.id_status")
                ->order_by("r.description")
                ->get();

        return $result->result();
    }

    public function UpdateCanal() {

        $data = array("description" => strtoupper($this->descripcion), "status" => $this->status);
        $this->db->where("id_canal", $this->id_canal);
        $result = $this->db->update("sys_canal", $data);

        if ($result) {
            return "OK";
        } else {
            return $this->db->last_query();
        }
    }

    function CreateCanal() {
        $data = array("description" => strtoupper($this->descripcion), "status" => $this->status);
        $result = $this->db->insert("sys_canal", $data);

        if ($result) {
            return "OK";
        } else {
            return $this->db->last_query();
        }
    }

    function DeleteCanal() {
        $this->db->where("id_canal",$this->id_canal);
        $res = $this->db->update("sys_canal",array("status"=>3));
        
        return ($res)?"OK":"ERROR : ".$this->db->last_query();
    }

}
