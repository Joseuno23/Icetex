<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Main extends VS_Model {

    public function __construct() {
        parent::__construct();
    }

    function ListMenu() {
        $rol = $this->session->IdRol;

        $result = $this->db->select("m.*")
                ->from("sys_roles_menu t")
                ->join("sys_menu m", "t.id_menu = m.id_menu")
                ->where("t.id_roles", $rol)
                ->where("m.status", 1)
                ->where("type in (1,3)")
                ->order_by("order,title")
                ->get();

        $arrayRoot = array();
        foreach ($result->result() as $m) {

            $arrayChilds = array();
            if ($m->type == 3) {
                $arrayChilds = $this->LoadChild($m->id_menu, $rol);
            }

            $arrayRoot[$m->id_menu] = array("title" => $m->title, "url" => $m->url, "icon" => $m->icon, "type" => $m->type, "childs" => $arrayChilds, "id" => $m->id_menu);
        }

        return $arrayRoot;
    }

    function LoadChild($father, $rol) {
        $array = array();

        $result_hijo = $this->db->select("m.*")
                ->from("sys_roles_menu t")
                ->join("sys_menu m", "t.id_menu = m.id_menu")
                ->where("t.id_roles", $rol)
                ->where("m.root", $father)
                ->where("m.status", 1)
                ->where("type in (2,4)")
                ->order_by("title")
                ->get();

        foreach ($result_hijo->result() as $h) {
            $arrayChilds = array();
            if ($h->type == 4 || $h->type == 2) {
                $arrayChilds = $this->LoadChild($h->id_menu, $rol);
            }
            $array[$h->id_menu] = array("title" => $h->title, "url" => $h->url, "icon" => $h->icon, "type" => $h->type, "childs" => $arrayChilds, "id" => $h->id_menu);
        }
        return $array;
    }

    function ValidateForgot($email) {

        $this->db;

        $result = $this->db->select("*")
                ->from("sys_users u")
                ->join("sys_roles r", "u.rol = r.id_roles")
                ->join("sys_preferences_html p", "u.id_users = p.id_users", "left")
                ->where("u.email", $email)
                ->where("u.status", 1)
                ->get();

        if ($result->num_rows() > 0) {
            $reg = $result->row();

            return $reg->id_users;
        } else {
            return 0;
        }
    }

    function ChangePassword() {
        $this->db->trans_begin();

        $data = array("password" => md5($this->input->post("psw")), "last_date" => date('Y-m-d'), "last_entry" => date("Y-m-d H:i:s"));
        $this->db->where("id_users", $this->input->post("id"));
        $this->db->update("sys_users", $data);

        $result = $this->db->select("*")
                ->from("sys_users u")
                ->join("sys_roles r", "u.rol = r.id_roles")
                ->join("sys_preferences_html p", "u.id_users = p.id_users", "left")
                ->where("u.id_users", $this->input->post("id"))
                ->where("u.status", 1)
                ->get();

        if ($result->num_rows() > 0) {
            $reg = $result->row();

            $newdata = array(
                'IdUser' => $reg->id_users,
                'UserMedios' => $reg->id_users_medios,
                'NameUser' => $reg->name,
                'IdRol' => $reg->rol,
                'Rol' => $reg->description,
                'Email' => $reg->email,
                'Avatar' => $reg->avatar,
                'Skin' => $reg->skin,
                'Layout' => $reg->layout,
                'Sidebar' => $reg->sidebar,
                'ip' => $reg->ip,
                'mac' => $reg->mac_address,
                'Google' => ($data) ? true : false
            );

            $this->session->set_userdata($newdata);
            $res = "OK";
        } else {
            $res = "ERROR";
        }

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
        } else {
            $this->db->trans_commit();
        }

        return $res;
    }

    function updateUser($id_user, $psw, $data) {
        $this->db->where("user", $id_user);
        $this->db->where("password", md5($psw));
        $this->db->update("sys_users", $data);
    }
    
    function getUserRol($data, $usuario, $psw){
        
        if ($data):
            $this->db->where("u.email", $data['email']);
        else:
            $this->db->where("u.user", $usuario);
            $this->db->where("u.password", md5($psw));
        endif;

        $result = $this->db->select("*,u.status as activ")
                ->from("sys_users u")
                ->join("sys_roles r", "u.rol = r.id_roles")
                ->get();
        
        return $result;
    }

}
