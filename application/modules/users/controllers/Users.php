<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MX_Controller 
{
	public function __construct()
	{
		parent::__construct();
		belum_login();
		adminitrasi();
		// superadmin();
		$this->load->model('Users_model', 'users_m');
	}

	public function index()
	{
		$data['title'] = 'Users';
		$data['judul'] = 'Users';
		$this->template->load('template','index', $data);
	}

	function get_ajax() {
        $list = $this->users_m->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $user) {
            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $user->nama_lengkap;
            $row[] = $user->username;
            $row[] = $user->level;
            $row[] = $user->jenis_kelamin;
            // add html for action
            $row[] = '<button type="button" name="detail" id="detail" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modaldetail"
						data-nama_lengkap="'. $user->nama_lengkap.'"
						data-username="'.$user->username.'"
						data-level="'.$user->level.'"
						data-jenis_kelamin="'.$user->jenis_kelamin.'"
						data-alamat="'.$user->alamat.'"
						data-log="'.$user->log.'">
							<i class="fa fa-eye"></i>
					</button>	|
					<a href="'.base_url('users/update/'.$user->id_users).'" class="btn btn-xs btn-primary">
						<i class="fa fa-edit"></i>
					</a>    |
					<form action="'.base_url('users/del').'" method="post" class="inline">
						<input type="hidden" name="id_users" value="'.$user->id_users.'">
							<button class="btn btn-xs btn-danger" id="form-delete">
							<i class="fa fa-trash"></i>
						</button>
					</form>';

			$data[] = $row;
        }
        $output = array(
			"draw" => @$_POST['draw'],
			"recordsTotal" => $this->users_m->count_all(),
			"recordsFiltered" => $this->users_m->count_filtered(),
			"data" => $data,
		);
        // output to json format
        echo json_encode($output);
    }

	public function add()
	{
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required',
			array('required' => '%s Tidak Boleh Kosong')
		);
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]',
			array
			(
				'required' => '%s Tidak Boleh Kosong',
				'is_unique' => '%s Sudah Terpakai Oleh Users Lain, Silahkan Cari Username Baru'
			)
		);
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]',
			array
			(
				'required' => '%s Tidak Boleh Kosong',
				'min_length' => '%s Minimal 5 Karakter'
			)
		);
		$this->form_validation->set_rules('password2', 'Konfirmasi Password', 'required|matches[password]',
			array
			(
				'required' => '%s Tidak Boleh Kosong',
				'matches' => '%s Tidak Sama Dengan Password'
			)
		);
		$this->form_validation->set_rules('level', 'Level', 'required',
			array
			(
				'required' => '%s Tidak Boleh Kosong',
			)
		);
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required',
			array
			(
				'required' => '%s Tidak Boleh Kosong',
			)
		);
		$this->form_validation->set_rules('alamat', 'Alamat', 'required',
			array
			(
				'required' => '%s Tidak Boleh Kosong',
			)
		);

		
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Add Users';
			$data['judul'] = 'Add Users';
			$this->template->load('template', 'add', $data);
		} else {
			$pos = $this->input->post(null, true);

			$config['upload_path']	=	'./assets/upload/users/';
			$config['allowed_types']	=	'jpg|jpeg|png';
			$config['max_size']		=	1048;
			$config['file_name']	=	'photo_users-'.date('Y-m-d,H-i-s');
			$this->load->library('upload', $config);

			if($_FILES['photo']['name'] != null){
				if($this->upload->do_upload('photo')){
					$pos['photo'] = $this->upload->data('file_name');
					$this->users_m->add($pos);
					if($this->db->affected_rows() > 0)
					{
						$this->session->set_flashdata('success', 'Selamat, Anda Berhasil Menambahkan Users Baru');
						redirect('users');
					}else{
						$this->session->set_flashdata('error', 'Data Gagal Di Tambahkan');
						redirect('users');
					}
				}else{
					// $error = $this->upload->display_errors();
					$this->session->set_flashdata('photoError',
						'<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<h4><i class="icon fa fa-ban"></i> Alert!</h4>
							<span>Upload Photo Gagal, Format Wajib PNG,JPG,JEPG. Maksimal Size 1 MB</span>
						</div>'
					);
					redirect('users/add');
				}
			}else{
				$pos['photo'] = null;
				$this->users_m->add($pos);
				if($this->db->affected_rows() > 0)
				{
					$this->session->set_flashdata('success', 'Selamat, Anda Berhasil Menambahkan Users Baru');
					redirect('users');
				}else{
					$this->session->set_flashdata('error', 'Data Gagal Di Tambahkan');
					redirect('users');
				}
			}
		}
	}

	public function update($id)
	{
		// untuk fungsi validation callback HMVC
		$this->form_validation->CI =& $this;

		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|callback_username_check');

		if($this->input->post('password')){
			$this->form_validation->set_rules('password', 'Password', 'min_length[5]',
				array
				(
					'min_length' => '%s Minimal 5 Karakter'
				)
			);
			$this->form_validation->set_rules('password2', 'Konfirmasi Password', 'required|matches[password]',
				array
				(
					'matches' => '%s Tidak Sama Dengan Password'
				)
			);
		}

		if($this->input->post('password2')){
			$this->form_validation->set_rules('password2', 'Konfirmasi Password', 'matches[password]',
				array
				(
					'matches' => '%s Tidak Sama Dengan Password'
				)
			);
		}

		$this->form_validation->set_rules('level', 'Level', 'required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');

		$this->form_validation->set_message('required', '{field} Tidak Boleh Kosong');

		if ($this->form_validation->run() == FALSE) {
			$id = $this->users_m->get_where($id);
			if($id->num_rows() > 0){
				$data['title'] = 'Update Users';
				$data['judul'] = 'Update Users';
				$data['user'] = $id->row();
				$this->template->load('template', 'update', $data);
			}else{
				$this->session->set_flashdata('warning', 'Data Tidak Ditemukan Silahkan Cari Data Yang Sudah Tersedia');
				redirect('users');
			}
		} else {
			$pos = $this->input->post(null, true);
			$this->users_m->update($pos);
			if($this->db->affected_rows() > 0 )
			{
				$this->session->set_flashdata('success', 'Selamat, Anda Berhasil Mengupdate User');
				redirect('users');
			}else{
				$this->session->set_flashdata('error', 'Data Gagal Di Update');
				redirect('users');
			}
		}
	}

	function username_check()
	{
		$pos = $this->input->post(null, true);
		$query = $this->db->query("SELECT * FROM USERS WHERE username = '$pos[username]' AND id_users != '$pos[id_users]'");
		if($query->num_rows() > 0){
			$this->form_validation->set_message('username_check', '{field} sudah ada, silahkan cari username lain');
			return false;
		}else{
			return true;
		}
	}

	public function delPhoto($id)
	{
		$this->users_m->delPhoto($id);
		if($this->db->affected_rows() > 0)
		{
			$this->session->set_flashdata('success', 'Berhasil Menghapus Photo');
			redirect('users/update/'.$id);
		}else{
			$this->session->set_flashdata('error', 'Tidak Bisa Menghapus Photo Default');
			redirect('users/update/'.$id);
		}
	}

	public function del()
	{
		$id = $this->input->post(null, true);
		$this->users_m->delete($id);
		if($this->db->affected_rows() > 0)
		{
			$this->session->set_flashdata('success', 'Selamat, Anda Berhasil Menghapus Data Ini');
			redirect('users');
		}else{
			$this->session->set_flashdata('error', 'Data Gagal Di Hapus');
			redirect('users');
		}
	}
}
