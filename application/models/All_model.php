<?php
defined('BASEPATH') or exit('No direct script access allowed');
class All_model extends CI_Model
{

    public function getidrole($id)
    {
        return $this->db->get_where('role', ['idrole' => $id])->row();
    }
    public function getrole()
    {
        return $this->db->get_where('role')->result();
    }
    public function getmenu()
    {
        return  $this->db->get('menu')->result();
    }
    public function inserthakakses($data)
    {
        return  $this->db->insert('aksesmenu', $data);
    }
    public function deleteakses($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('aksesmenu');
    }
}
