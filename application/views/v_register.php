<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="tylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    
    <style>
        .bg-gradient-primary {
            background: url('assets/img/bluekiss.gif') no-repeat center center fixed;
            background-size: cover;
        }
    </style>
</head>
<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5" style="background-image: url('assets/img/vector.jpeg');
                    background-size: cover; background-position: center;">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-login">
                        <video width="100%" height="100%" controls autoplay muted loop id="video-bg">
                            <source src="assets\img\donny.mp4" type="video/mp4">
                        </video>
                    </div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Buat Akun Dulu Abangkuh🙏!</h1>
                            </div>
                            <form class="user" action="<?=base_url('register/add'); ?>"method="post">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="nama_lengkap" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Nama Lengkap">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="username" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Username">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email"  name="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Alamat Email">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password">
                                    </div>
                                 
                                </div>
                                <button type="submit"  class="btn btn-primary btn-user btn-block">Daftar</button>
                                <div class="text-center">
                                <a class="small" href="<?php echo base_url('login')?>">Sudah Punya Akun? Login!</a> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?php if ($this->session->flashdata('succes')): ?>

        <script>
        Swal.fire({
  title: "Berhasil",
  text: "<?= $this->session->flashdata('succes'); ?>",
  icon: "Succes"
    });
    </script>
    <?php endif; ?>

    <?php if ($this->session->flashdata('error')): ?>
    <script>
        Swal.fire({
  title: "Gagal",
  text: "<?= $this->session->flashdata('error'); ?>",
  icon: "error"
    });
    </script>
    <?php endif; ?>

</body>

</html>