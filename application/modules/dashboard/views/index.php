<!-- sweetalert2 -->
<link rel="stylesheet" href="<?= base_url()?>assets/admin/sweetalert/sweetalert2.min.css">

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
        <li><a href="<?= base_url('dashboard')?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    </ol>
</section>

<div id="flashSuccess" data-success="<?= $this->session->flashdata('success');?>"></div>
<div id="flashWarning" data-warning="<?= $this->session->flashdata('warning');?>"></div>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                <h3>150</h3>

                <p>New Orders</p>
                </div>
                <div class="icon">
                <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Bounce Rate</p>
                </div>
                <div class="icon">
                <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
                </div>
                <div class="icon">
                <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
                </div>
                <div class="icon">
                <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
</section>
<!-- /.content -->

<script>
    var flashSuccess = $('#flashSuccess').data('success');
    var flashWarning = $('#flashWarning').data('warning');
    if(flashSuccess){
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: flashSuccess,
        });
    }
    if(flashWarning){
        Swal.fire({
            icon: 'warning',
            title: 'Warning',
            text: flashWarning,
        });
    }
</script>