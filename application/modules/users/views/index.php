<!-- Css Datatable -->
<link rel="stylesheet" href="<?= base_url()?>assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<!-- sweetalert2 -->
<link rel="stylesheet" href="<?= base_url()?>assets/admin/sweetalert/sweetalert2.min.css">

<!-- style custom sweetalert -->
<style>
    .swal2-popup{
        font-size: 1.5rem !important;
    }
</style>

<!-- script Datatable -->
<script src="<?= base_url()?>assets/admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url()?>assets/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!-- sweetalert -->
<script src="<?= base_url()?>assets/admin/sweetalert/sweetalert2.min.js"></script>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?= $judul?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('users')?>"><i class="fa fa-users"></i> Users</a></li>
    </ol>
</section>

<div id="flashSuccess" data-success="<?= $this->session->flashdata('success');?>"></div>

<div id="flashError" data-error="<?= $this->session->flashdata('error');?>"></div>

<div id="flashWarning" data-warning="<?= $this->session->flashdata('warning');?>"></div>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Data Users</h3>
            <div class="pull-right">
                <a href="<?= base_url('users/add')?>" class="btn btn-primary btn-sm">
                    <i class="fa fa-user-plus"></i> New Users
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center" id="tableusers">
                    <thead style="background-color:#3c8dbc; color:#fff;">
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Username</th>
                            <th>Level</th>
                            <th>Jenis Kelamin</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.box -->
</section>

<div class="modal fade" id="modaldetail">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Detail Users</h4>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-striped table-responsive text-center">
                    <tr>
                        <th>Nama Lengkap</th>
                        <td id="nama_lengkap"></td>
                    </tr>
                    <tr>
                        <th>Username</th>
                        <td id="username"></td>
                    </tr>
                    <tr>
                        <th>Level</th>
                        <td id="level"></td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td id="jenis_kelamin"></td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td id="alamat"></td>
                    </tr>
                    <tr>
                        <th>Terakhir Sign In</th>
                        <td id="log"></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- /.content -->
<!-- script custom -->
<script>
    // Modal Detail
    $(document).on('click', '#detail', function(){
        var nama_lengkap = $(this).data('nama_lengkap');
        var username = $(this).data('username');
        var level = $(this).data('level');
        var jenis_kelamin = $(this).data('jenis_kelamin');
        var alamat = $(this).data('alamat');
        var photo = $(this).data('photo');
        var log = $(this).data('log');

        $('#nama_lengkap').text(nama_lengkap);
        $('#username').text(username);
        $('#level').text(level);
        $('#jenis_kelamin').text(jenis_kelamin);
        $('#alamat').text(alamat);
        $('#photo').text(photo);
        $('#log').text(log);
    });

    // Datatables
    $(document).ready(function(){
        $('#tableusers').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax":{
                "url": "<?= base_url('users/get_ajax')?>",
                "type": "POST"
            },
            "columnDefs":[
                {
                    "targets": [4,5],
                    "orderable": false
                }
            ],
            "order": []
        });
    });

    // sweetalert success, warning dan error
    var flashsuccess = $('#flashSuccess').data('success');
    var flasherror = $('#flashError').data('error');
    var flashwarning = $('#flashWarning').data('warning');
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

    if(flashwarning){
        Swal.fire({
            icon: 'warning',
            title: 'Warning',
            text: flashwarning,
        })
    }

    // sweetalert delete
    $(document).on('click', '#form-delete', function(e){
        e.preventDefault();
        var link = $(this).parent('form');
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Ingin Menghapus Data Ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yaa, Hapus Data Ini!'
        }).then((result) => {
            if (result.isConfirmed) {
                link.submit();
            }
        })
    });
</script>