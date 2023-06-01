<!doctype html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="<?= base_url()?>assets/logo/logo.png" type="image/x-icon">
    <title><?= $title ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?= base_url()?>assets/admin/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/admin/login/css/A.style.css.pagespeed.cf.Qh1-GdQdyh.css">
    <!-- sweetalert2 -->
    <link rel="stylesheet" href="<?= base_url()?>assets/admin/sweetalert/sweetalert2.min.css">

    <style>
        body{
            background: url(<?= base_url('assets/admin/login/images/pattern4.png')?>);
        }
    </style>
</head>
<body>
    <section>
        <div id="flashWarning" data-warning="<?= $this->session->flashdata('warning')?>"></div>
        <div id="flashSuccess" data-success="<?= $this->session->flashdata('success')?>"></div>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                    <!-- <div class="img" style="background-image:url(<?= base_url()?>assets/admin/login/images/xbg-1.jpg.pagespeed.ic.3sxOU72AaL.jpg)"></div> -->
                        <div class="img p-5">
                            <img src="<?= base_url()?>assets/logo/logo.png" alt="logo" width="100%">
                        </div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h2 class="mb-4"><?= $judul?></h2>
                                </div>
                            </div>
                            <form action="" method="POST" class="signin-form">
                                <div class="form-group mb-3">
                                    <label class="username" for="name">Username</label>
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Your Username" value="<?= $this->input->post('username');?>">
                                    <span class="text-danger"><?= form_error('username')?></span>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="password" for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Your Password" value="<?= $this->input->post('password')?>">
                                    <span class="text-danger"><?= form_error('password')?></span>
                                    <input type="checkbox" onclick="myFunction()"> Show Password
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="submit" class="form-control rounded submit px-3" style="background-color:#3c8dbc; color:#ffff; font-weight:bold;">
                                        <i class="fa fa-rocket"></i> Sign In
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<script src="<?= base_url()?>assets/admin/login/js/jquery.min.js"></script>
<!-- sweetalert -->
<script src="<?= base_url()?>assets/admin/sweetalert/sweetalert2.min.js"></script>

<script>
    function myFunction() {
        var password = document.getElementById("password");
        if (password.type === "password") {
            password.type = "text";
        } else {
            password.type = "password";
        }
    }

    var flashWarning = $('#flashWarning').data('warning');
    var flashSuccess = $('#flashSuccess').data('success');
    if(flashWarning){
        Swal.fire({
            icon: 'warning',
            title: 'Warning',
            text: flashWarning,
        })
    }

    if(flashSuccess){
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: flashSuccess,
        })
    }
</script>
</body>
</html>
