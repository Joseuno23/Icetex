<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Serie extends VS_Model {

    public function __construct() {
        parent::__construct();
        
        foreach ($_POST as $clave => $valor):
            $this->$clave = $valor;
        endforeach;
    }

    function ListSerieAll($id = null) {

        if (!empty($id)) {
            $this->db->where("id_serie", $id);
        }

        $result = $this->db->select("r.id_serie, r.codigo,r.descripcion as serie,r.id_dependencia, d.description as dependencia,r.status, s.* ")
                ->from("sys_serie r")
                ->join("sys_status s", "r.status = s.id_status")
                ->join("sys_dependencia d", "r.id_dependencia = d.id_dependencia")
                ->order_by("r.descripcion")
                ->get();

        return $result->result();
    }

    public function UpdateSerie() {

        $data = array(
            "descripcion" => strtoupper($this->descripcion), 
            "id_dependencia" => $this->id_dependencia, 
            "status" => $this->status, 
            "codigo" => $this->codigo
        );
        $this->db->where("id_serie", $this->id_serie);
        $result = $this->db->update("sys_serie", $data);

        if ($result) {
            return "OK";
        } else {
            return $this->db->last_query();
        }
    }

    function CreateSerie() {
        $data = array(
            "descripcion" => strtoupper($this->descripcion),
            "id_dependencia" => $this->id_dependencia, 
            "codigo" => $this->codigo, 
            "status" => $this->status
        );
        $result = $this->db->insert("sys_serie", $data);

        if ($result) {
            return "OK";
        } else {
            return $this->db->last_query();
        }
    }

    function DeleteSerie() {
        $this->db->where("id_serie",$this->id_serie);
        $res = $this->db->update("sys_serie",array("status"=>3));
        
        return ($res)?"OK":"ERROR : ".$this->db->last_query();
    }

}
