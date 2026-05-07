<?php
class Suratkeluar_model extends CI_Model {

    public function get_all(){
        return $this->db->get('tb_suratkeluar')->result();
    }

    public function insert($data){
        $this->db->insert('tb_suratkeluar', $data);
    }

    public function get_by_id($id){
        return $this->db->get_where('tb_suratkeluar', ['id' => $id])->row();
    }

    public function update($id, $data){
        $this->db->where('id', $id);
        $this->db->update('tb_suratkeluar', $data);
    }

    public function delete($id){
        $this->db->where('id', $id);
        $this->db->delete('tb_suratkeluar');
    }
}