<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class VS_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function Params() {
        $result = $this->db->select("*")
                ->from("sys_parameter")
                ->get();
        return $result->row();
    }

    function ListStatusAll($id = null) {
        if (!empty($id)) {
            $this->db->where("id_status", $id);
        }
        $result = $this->db->select("*")
                ->from("sys_status")
                ->order_by("description")
                ->get();

        if (!empty($id)) {
            return $result->row();
        } else {
            return $result->result();
        }
    }

    function LoadIcons() {
        $result = $this->db->select("*")
                ->from("sys_icon")
                ->order_by("icon")
                ->get();
        return $result->result();
    }

    function ListarUsuarios($id_user = false, $id_area = false, $array = false, $rol = false) {

        if ($id_user)
            $this->db->where("id_users", $id_user);

        if ($id_area)
            $this->db->where("id_area", $id_area);

        if ($rol)
            $this->db->where("rol", $rol);

        if ($array)
            $this->db->where_in("id_area", $array);

        $result = $this->db->select("*")
                ->from("sys_users")
                ->where("status", 1)
                ->order_by("name")
                ->get();

        if ($id_user) {
            return $result->row();
        } else {
            return $result->result();
        }
    }

    function LoadButtonPermissions($application) {
        $result = $this->db->select("*")
                ->from("sys_roles_button r")
                ->join("sys_button b", "b.id_button = r.id_button")
                ->where("b.application", $application)
                ->where("r.id_rol", $this->session->IdRol)
                ->get();

        return $result->result();
    }

    function CreateNotification($arrayUser, $sms, $url) {

        $array = array();
        foreach ($arrayUser as $v) {
            $array[] = array("texto" => $sms, "id_users" => $v, "url" => $url);
        }
        $rs = $this->db->insert_batch('sys_notificacion', $array);
    }

    function SaveData($table, $data) {
        $result = $this->db->insert($table, $data);
        $res = 0;
        if ($result) {
            $res = $this->db->insert_id();
        }
        return $res;
    }

    function RemoveData($table, $field, $id) {
        $this->db->where($field, $id);
        $result = $this->db->delete($table);
        $res = 0;
        if ($result) {
            $res = 1;
        }
        return $res;
    }

    function UpdateData($table, $field, $id, $data) {
        $this->db->where($field, $id);
        $result = $this->db->update($table, $data);
        $res = 0;
        if ($result) {
            $res = 1;
        }
        return $res;
    }
    
    function selecTable($tabla, $whereField = false, $whereId = false, $row = false){
        
        if($whereField)
            $this->db->where($whereField,$whereId);
        
        $result = $this->db->select('*')
                ->from($tabla)
                ->get();
        
        if($row){
            return $result->row();
        }else{
            return $result->result();
        }
        
    }
    
    function select($table, $order) {
        $res = $this->db->select('*')
                ->from($table)
                ->order_by($order)
                ->get();

        return $res->result();
    }
} 