<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function cek_data($pos)
    {
        $this->db->from('users');
        $this->db->where('username', $pos['username']);
        $this->db->where('password', sha1($pos['password']));
        $data = $this->db->get();
        return $data;
    }

    public function update_log($data)
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = array(
            'log' => date('Y-m-d H-i-s'),
        );
        $this->db->where('id_users', $data->id_users);
        $this->db->update('users', $date);
    }

    public function get($id = null)
    {
        $this->db->from('users');
        if($id)
        {
            $this->db->where('id_users', $id);
        }
        $data = $this->db->get();
        return $data;
    }
}

?>