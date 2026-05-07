<?php
class User_model extends CI_Model {

    public function cek_login($username, $password){
        return $this->db->get_where('user', [
            'username' => $username,
            'paswd'    => md5($password)
        ])->row();
    }
}