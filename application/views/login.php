<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistem Pembayaran Sekolah </title>

    <!-- Bootstrap -->
    <link href="<?= base_url('assets/backand/') ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url('assets/backand/') ?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url('assets/backand/') ?>vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?= base_url('assets/backand/') ?>vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= base_url('assets/backand/') ?>build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
    <div>
        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form action="<?= base_url('') ?>auth/login" method="POST">
                        <h1>Login</h1>
                        <div>
                            <input type="text" class="form-control" placeholder="Username" required="" name="username" autocomplete="off" />
                        </div>
                        <div>
                            <input type="password" class="form-control" placeholder="Password" required="" name="password" autocomplete="off" />
                        </div>
                        <div>
                            <button class="btn btn-default submit" type="submit">Log in</button>
                            <a class="reset_pass" href="#">Anda lupa password?</a>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1>Sistem Penjualan Songket </h1>
                                <p>© <?= date('Y'); ?> All Rights Reserved. </p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</body>

</html>