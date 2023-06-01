<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model', 'auth_m');
    }

    public function index()
    {
        sudah_login();
        $this->form_validation->set_rules('username', 'Username', 'required', [
            'required' => '{field} Tidak Boleh Kosong',
        ]);

        $this->form_validation->set_rules('password', 'Password', 'required', [
            'required' => '{field} Tidak Boleh Kosong',
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "Amali's Shoes | Sign In";
            $data['judul'] = 'Sign In';
            $this->load->view('login', $data);
        } else {
            $pos = $this->input->post(null, true);
            $query = $this->auth_m->cek_data($pos);
            if($query->num_rows() > 0)
            {
                $data = $query->row();
                $this->auth_m->update_log($data);
                if($this->db->affected_rows() > 0 ){
                    $session = [
                        'id_users'  => $data->id_users,
                        'level'     => $data->level,
                    ];
                    $this->session->set_userdata($session);
                    $this->session->set_flashdata('success', 'Selamat Datang Kembali '.$data->nama_lengkap.', Selamat Bekerja. Semangaat!!');
                    redirect('dashboard');
                }else{
                    $this->session->set_flashdata('warning', 'Server Sedang Bermasalah, Silahkan Login Kembali Nanti!');
                    redirect('auth');
                }
            }else{
                $this->session->set_flashdata('warning', 'Username Atau Password Anda Salah, Silahkan Login Kembali!');
                redirect('auth');
            }
        }
        
    }

    public function logout()
    {
        $session = [
            'id_users',
            'level',
        ];
        $this->session->unset_userdata($session);
        $this->session->set_flashdata('success', 'Selamat! Anda Berhasil Logout!');
        redirect('auth');
    }
}
?>