<?php
    require_once('controller/koneksi.php');
    if(isset($_GET['logout'])){
        $_SESSION[md5('admin')] = '';
        unset($_SESSION[md5('admin')]);
        pesan('index.php', '');
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <title>Data Nilai Hasil Interview Peserta Beasiswa Desa Sarjana</title>

        <!-- Custom fonts for this template -->
        <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

        <!-- Custom styles for this template -->
        <link href="assets/css/sb-admin-2.min.css" rel="stylesheet" />
    </head>

    <body class="bg-gradient-info">
        <nav class="navbar navbar-expand-lg navbar-dark bg-white shadow-lg pb-3 pt-3 font-weight-bold">
            <div class="container">
                <a class="navbar-brand text-info" style="font-weight:900;" href="index.php"> <i class="fa fa-database mr-2 rotate-n-15"></i> Desa Sarjana</a>
            </div>
        </nav>

        <div class="container">
            <!-- Outer Row -->
            <div class="row d-plex justify-content-between mt-5">
                <div class="col-xl-5 col-lg-5 col-md-5 mt-5">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Login Account</h1>
                                        </div>
                                        <?php
                                            if(isset($_POST['btnlogin'])){
                                                $username = mysql_real_escape_string(htmlspecialchars($_POST['username']));
                                                $password = mysql_real_escape_string(htmlspecialchars($_POST['password']));

                                                $q = mysql_query("SELECT * FROM pengguna WHERE username = '$username' AND password = '$password' ");
                                                if(mysql_num_rows($q)>0){
                                                    $row = mysql_fetch_array($q);
                                                    $_SESSION[md5('admin')] = $row['username'];
                                        ?>
                                                <script type="text/javascript">
                                                    document.location = 'index.php?p=home';
                                                </script>
                                        <?php
                                                }else{
                                        ?>
                                                <div class="alert alert-danger alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
                                                    Username atau Password Salah!
                                                </div>
                                        <?php
                                                }
                                            }
                                        ?>
                                        <from class="user" action="" name="flogin" method="post">
                                            <div class="form-group">
                                                <input required autocomplete="off" type="text" class="form-control form-control-user" id="exampleInputUsername" placeholder="Username" name="username" />
                                            </div>
                                            <div class="form-group">
                                                <input required autocomplete="off" type="password" class="form-control form-control-user" id="exampleInputUsername" name="password" placeholder="Password" />
                                            </div>
                                            <button name="btnlogin" type="submit" class="btn btn-info btn-user btn-block"><i class="fas fa-fw fa-sign-in-alt mr-1"></i> Masuk</button>
                                        </from>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 mt-5">
                    <div class="card bg-none o-hidden border-0 my-5 text-white" style="background: none;">
                        <div class="card-body p-0">
                            <h4 style="font-weight: 800;">DPMD Malinau</h4>
                            <p class="text-justify pt-4">
                                LOREM IPSUMM
                            </p>
                            <p class="text-justify">
                                Copyright Sthefen Renardi 2024
                            </p>
                        </div>
                    </div>
                </div>
            </div>    
        </div>    
        
        <!-- Bootstrap care JavaScript -->
        <script src="assets/vendor/jquery/jquery.min.js"></script>
        <script src="assets/vendor/bootstrap/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript -->
        <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages -->
        <script src="assets/js/sb-admin-2.min.js"></script>
    </body>
</html>