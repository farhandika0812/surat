<?php
class Suratmasuk_model extends CI_Model {

    public function get_all(){
        return $this->db->get('tb_suratmasuk')->result();
    }

    public function insert($data){
        return $this->db->insert('tb_suratmasuk', $data);
    }

    public function get_by_id($id){
        return $this->db->get_where('tb_suratmasuk', ['id' => $id])->row();
    }

    public function update($id, $data){
        $this->db->where('id', $id);
        return $this->db->update('tb_suratmasuk', $data);
    }

    public function delete($id){
        $this->db->where('id', $id);
        return $this->db->delete('tb_suratmasuk');
    }
}