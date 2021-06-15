<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Subserie extends VS_Model {

    public function __construct() {
        parent::__construct();
        
        foreach ($_POST as $clave => $valor):
            $this->$clave = $valor;
        endforeach;
    }

    function ListSubserieAll($id = null) {

        if (!empty($id)) {
            $this->db->where("id_sub_serie", $id);
        }

        $result = $this->db->select("r.id_sub_serie, r.codigo,r.descripcion as subserie,d.descripcion as serie,r.id_serie, r.status, s.* ")
                ->from("sys_sub_serie r")
                ->join("sys_status s", "r.status = s.id_status")
                ->join("sys_serie d", "r.id_serie = d.id_serie")
                ->order_by("r.descripcion")
                ->get();

        return $result->result();
    }

    public function UpdateSubserie() {

        $data = array(
            "descripcion" => strtoupper($this->descripcion), 
            "id_serie" => $this->id_serie, 
            "status" => $this->status, 
            "codigo" => $this->codigo);
        $this->db->where("id_sub_serie", $this->id_sub_serie);
        $result = $this->db->update("sys_sub_serie", $data);

        if ($result) {
            return "OK";
        } else {
            return $this->db->last_query();
        }
    }

    function CreateSubserie() {
        $data = array(
            "descripcion" => strtoupper($this->descripcion),
            "id_serie" => $this->id_serie, 
            "codigo" => $this->codigo, 
            "status" => $this->status);
        $result = $this->db->insert("sys_sub_serie", $data);

        if ($result) {
            return "OK";
        } else {
            return $this->db->last_query();
        }
    }

    function DeleteSubserie() {
        $this->db->where("id_sub_serie",$this->id_sub_serie);
        $res = $this->db->update("sys_sub_serie",array("status"=>3));
        
        return ($res)?"OK":"ERROR : ".$this->db->last_query();
    }

}
