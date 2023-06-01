<!-- sweetalert2 -->
<link rel="stylesheet" href="<?= base_url()?>assets/admin/sweetalert/sweetalert2.min.css">

<!-- style custom sweetalert -->
<style>
    .swal2-popup{
        font-size: 1.5rem !important;
    }
</style>

<!-- sweetalert -->
<script src="<?= base_url()?>assets/admin/sweetalert/sweetalert2.min.js"></script>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?= $judul?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('users')?>"><i class="fa fa-users"></i> Users</a></li>
        <li class="active">Update Users</li>
    </ol>
</section>

<?= $this->session->flashdata('photoError');?>

<div id="flashSuccess" data-success="<?= $this->session->flashdata('success');?>"></div>

<div id="flashError" data-error="<?= $this->session->flashdata('error');?>"></div>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header">
            <div class="pull-right">
                <a href="<?= base_url('users')?>" class="btn btn-github btn-sm">
                    <i class="fa fa-undo"></i> Back
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group <?= form_error('nama_lengkap') ? 'has-error' : null ?>">
                            <input type="hidden" name="id_users" id="id_users" value="<?= $user->id_users?>">
                            <label for="nama_lengkap">Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" placeholder="Masukan Nama Lengkap Anda" autocomplete="off" value="<?= set_value('nama_lengkap', $user->nama_lengkap)?>">
                            <span class="text-red"><?= form_error('nama_lengkap')?></span>
                        </div>
                        <div class="form-group <?= form_error('username') ? 'has-error' : null ?>">
                            <label for="username">Username <span class="text-danger">*</span></label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Masukan Username Anda" autocomplete="off" value="<?= set_value('username', $user->username)?>">
                            <span class="text-red"><?= form_error('username')?></span>
                        </div>
                        <div class="form-group <?= form_error('password') ? 'has-error' : null ?>">
                            <label for="password">Password <span class="text-danger">*</span></label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Masukan Password Baru Anda" autocomplete="off" value="<?= $this->input->post('password')?>">
                            <span class="text-red"><?= form_error('password')?></span>
                            <span class="text-yellow">Jika Ingin Ubah Password Bisa Isi Column Password Ini! <br> Jika Tidak Bisa Kosongkan Column Password Ini!</span>
                        </div>
                        <div class="form-group <?= form_error('password2') ? 'has-error' : null ?>">
                            <label for="password2">Konfirmasi Password <span class="text-danger">*</span></label>
                            <input type="password" name="password2" id="password2" class="form-control" placeholder="Konfirmasi Password Anda" autocomplete="off" value="<?= $this->input->post('password2')?>">
                            <span class="text-red"><?= form_error('password2')?></span>
                        </div>
                        <div class="form-group <?= form_error('level') ? 'has-error' : null ?>">
                            <label for="level">Level <span class="text-danger">*</span></label>
                            <select name="level" id="level" class="form-control">
                                <option value="">--Pilih Level--</option>
                                <option value="superadmin" <?= set_value('level', $user->level) == 'superadmin' ? 'selected' : null ?> >Superadmin</option>
                                <option value="marketing" <?= set_value('level', $user->level) == 'marketing' ? 'selected' : null ?> >Marketing</option>
                                <option value="produksi" <?= set_value('level', $user->level) == 'produksi' ? 'selected' : null ?> >Produksi</option>
                                <option value="warehouse" <?= set_value('level', $user->level) == 'warehouse' ? 'selected' : null ?> >Warehouse</option>
                                <option value="adminitrasi" <?= set_value('level', $user->level) == 'adminitrasi' ? 'selected' : null ?> >Adminitrasi</option>
                                <option value="purchasing" <?= set_value('level', $user->level) == 'purchasing' ? 'selected' : null ?> >Purchasing</option>
                            </select>
                            <span class="text-red"><?= form_error('level')?></span>
                        </div>
                        <div class="form-group <?= form_error('jenis_kelamin') ? 'has-error' : null ?>">
                            <label for="jenis_kelamin">Jenis Kelamin <span class="text-danger">*</span></label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                <option value="">--Pilih Jenis Kelamin--</option>
                                <option value="laki-laki" <?= set_value('jenis_kelamin', $user->jenis_kelamin) == 'laki-laki' ? 'selected' : null ?> >Laki - Laki</option>
                                <option value="perempuan" <?= set_value('jenis_kelamin', $user->jenis_kelamin) == 'perempuan' ? 'selected' : null ?> >Perempuan</option>
                            </select>
                            <span class="text-red"><?= form_error('jenis_kelamin')?></span>
                        </div>
                        <div class="form-group <?= form_error('alamat') ? 'has-error' : null ?>">
                            <label for="alamat">Alamat <span class="text-danger">*</span></label>
                            <textarea name="alamat" id="alamat" class="form-control" autocomplete="off" placeholder="Masukan Alamat Anda"><?= set_value('alamat', $user->alamat)?></textarea>
                            <span class="text-red"><?= form_error('alamat')?></span>
                        </div>
                        <div class="form-group">
                            <label for="photo">Photo</label><br>
                            <?php if($user->photo){?>
                                <img src="<?= base_url('assets/upload/users/'.$user->photo)?>" alt="photo user" width="20%">
                            <?php }else{?>
                                <img src="<?= base_url('assets/upload/users/nophoto.png')?>" alt="photo user" width="20%">
                            <?php }?>
                            <a href="<?= base_url('users/delPhoto/'.$user->id_users)?>" class="btn btn-danger btn-sm" id="form-delete">
                                <i class="fa fa-trash"></i>
                            </a>
                            <input type="file" name="photo" id="photo" class="form-control">
                            <span class="text-yellow">Format: jpg,png,jpeg <br>Maks: 1 MB</span>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" id="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-check"></i> Simpan
                            </button>
                            <button type="reset" class="btn btn-warning btn-sm">
                                <i class="fa fa-refresh"></i> Reset
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</section>
<!-- /.content -->
<script>
    // sweetalert success dan error
    var flashsuccess = $('#flashSuccess').data('success');
    var flasherror = $('#flashError').data('error');
    if(flashsuccess){
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: flashsuccess,
        })
    }

    if(flasherror){
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: flasherror,
        })
    }

    // sweetalert confirm delete
    $(document).on('click', '#form-delete', function(e){
        e.preventDefault();
        var link = $(this).attr('href');
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Ingin Menghapus Photo Ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yaa, Hapus Photo Ini!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link;
                // link.submit();
            }
        })
    });
</script>