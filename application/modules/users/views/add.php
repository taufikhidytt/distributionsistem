<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?= $judul?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('users')?>"><i class="fa fa-users"></i> Users</a></li>
        <li class="active">Add Users</li>
    </ol>
</section>

<?= $this->session->flashdata('photoError');?>

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
                            <label for="nama_lengkap">Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" placeholder="Masukan Nama Lengkap Anda" autocomplete="off" value="<?= $this->input->post('nama_lengkap')?>">
                            <span class="text-red"><?= form_error('nama_lengkap')?></span>
                        </div>
                        <div class="form-group <?= form_error('username') ? 'has-error' : null ?>">
                            <label for="username">Username <span class="text-danger">*</span></label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Masukan Username Anda" autocomplete="off" value="<?= $this->input->post('username')?>">
                            <span class="text-red"><?= form_error('username')?></span>
                        </div>
                        <div class="form-group <?= form_error('password') ? 'has-error' : null ?>">
                            <label for="password">Password <span class="text-danger">*</span></label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Masukan Password Anda" autocomplete="off" value="<?= $this->input->post('password')?>">
                            <span class="text-red"><?= form_error('password')?></span>
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
                                <option value="superadmin" <?= set_value('level') == 'superadmin' ? 'selected' : null ?> >Superadmin</option>
                                <option value="marketing" <?= set_value('level') == 'marketing' ? 'selected' : null ?> >Marketing</option>
                                <option value="produksi" <?= set_value('level') == 'produksi' ? 'selected' : null ?> >Produksi</option>
                                <option value="warehouse" <?= set_value('level') == 'warehouse' ? 'selected' : null ?> >Warehouse</option>
                                <option value="adminitrasi" <?= set_value('level') == 'adminitrasi' ? 'selected' : null ?> >Adminitrasi</option>
                                <option value="purchasing" <?= set_value('level') == 'purchasing' ? 'selected' : null ?> >Purchasing</option>
                            </select>
                            <span class="text-red"><?= form_error('level')?></span>
                        </div>
                        <div class="form-group <?= form_error('jenis_kelamin') ? 'has-error' : null ?>">
                            <label for="jenis_kelamin">Jenis Kelamin <span class="text-danger">*</span></label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                <option value="">--Pilih Jenis Kelamin--</option>
                                <option value="laki-laki" <?= set_value('jenis_kelamin') == 'laki-laki' ? 'selected' : null ?> >Laki - Laki</option>
                                <option value="perempuan" <?= set_value('jenis_kelamin') == 'perempuan' ? 'selected' : null ?> >Perempuan</option>
                            </select>
                            <span class="text-red"><?= form_error('jenis_kelamin')?></span>
                        </div>
                        <div class="form-group <?= form_error('alamat') ? 'has-error' : null ?>">
                            <label for="alamat">Alamat <span class="text-danger">*</span></label>
                            <textarea name="alamat" id="alamat" class="form-control" autocomplete="off" placeholder="Masukan Alamat Anda"><?= $this->input->post('alamat');?></textarea>
                            <span class="text-red"><?= form_error('alamat')?></span>
                        </div>
                        <div class="form-group">
                            <label for="photo">Photo</label>
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