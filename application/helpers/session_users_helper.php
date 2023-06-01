<?php

function sudah_login()
{
    $ci =& get_instance();
    $session = $ci->session->userdata('id_users');
    if($session){
        $ci->session->set_flashdata('warning', 'Anda Sudah Login!! Jika Ingin Logout Silahkan Cari Tombol Logout!!');
        redirect('dashboard');
    }
}

function belum_login()
{
    $ci =& get_instance();
    $session = $ci->session->userdata('id_users');
    if(!$session)
    {
        $ci->session->set_flashdata('warning', 'Anda Belum Login!! Silahkan Login Terlebih Dahulu!');
        redirect('auth');
    }
}

function superadmin()
{
    $ci =& get_instance();
    $ci->load->library('checkusers');
    if($ci->checkusers->users_login()->level != 'superadmin'){
        $ci->session->set_flashdata('warning', 'Maaf, Rules Anda Bukan Superadmin');
        redirect('dashboard');
    }
}

function marketing()
{
    $ci =& get_instance();
    $ci->load->library('checkusers');
    if($ci->checkusers->users_login()->level != 'marketing' AND $ci->checkusers->users_login()->level != 'superadmin'){
        $ci->session->set_flashdata('warning', 'Maaf, Rules Anda Bukan Tim Marketing Dan Superadmin');
        redirect('dashboard');
    }
}

function produksi()
{
    $ci =& get_instance();
    $ci->load->library('checkusers');
    if($ci->checkusers->users_login()->level != 'produksi' AND $ci->checkusers->users_login()->level != 'superadmin'){
        $ci->session->set_flashdata('warning', 'Maaf, Rules Anda Bukan Tim Produksi Dan Superadmin');
        redirect('dashboard');
    }
}

function warehouse()
{
    $ci =& get_instance();
    $ci->load->library('checkusers');
    if($ci->checkusers->users_login()->level != 'warehouse' AND $ci->checkusers->users_login()->level != 'superadmin'){
        $ci->session->set_flashdata('warning', 'Maaf, Rules Anda Bukan Tim Warehouse Dan Superadmin');
        redirect('dashboard');
    }
}

function adminitrasi()
{
    $ci =& get_instance();
    $ci->load->library('checkusers');
    if($ci->checkusers->users_login()->level != 'adminitrasi' AND $ci->checkusers->users_login()->level != 'superadmin'){
        $ci->session->set_flashdata('warning', 'Maaf, Rules Anda Bukan Tim Adminitrasi Dan Superadmin');
        redirect('dashboard');
    }
}

function purchasing()
{
    $ci =& get_instance();
    $ci->load->library('checkusers');
    if($ci->checkusers->users_login()->level != 'purchasing' AND $ci->checkusers->users_login()->level != 'superadmin'){
        $ci->session->set_flashdata('warning', 'Maaf, Rules Anda Bukan Tim Purchasing Dan Superadmin');
        redirect('dashboard');
    }
}

?>