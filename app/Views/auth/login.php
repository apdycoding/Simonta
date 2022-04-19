<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login &mdash; Si-Monta</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/bootstrap/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/@fortawesome/fontawesome-free/css/all.min.css">


    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/bootstrap-social/bootstrap-social.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/components.css">
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="d-flex flex-wrap align-items-stretch">
                <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
                    <div class="p-4 m-3">
                        <img src="<?= base_url() ?>/template/assets/img/logo.png" alt="logo" width="80" class="shadow-light rounded-circle mb-5 mt-2">
                        <h1 class="text-success font-weight-normal"> <span class="font-weight-bold">Assalamu'alaikum</span></h1>
                        <h4 class="text-dark font-weight-normal">Welcome to <span class="font-weight-bold">Si-Monta</span></h4>
                        <p class="text-muted">Si-Monta merupakan singkatan dari Sistem Informasi Monitoring Taman Tahfidz. Sistem ini merupakan sistem yang digunakan untuk
                            memotoring hafalan santri Pondok Pesantren Daarul Kutub El-Gontori
                        </p>

                        <?php if (session()->getFlashdata('success')) : ?>

                            <div class="alert alert-success alert-dismissible show fade">
                                <div class="alert-body">
                                    <button class="close" data-dismis="alert">
                                        x
                                    </button>
                                    <b>Maaf !</b>
                                    <?= session()->getFlashdata('success') ?>
                                </div>
                            </div>

                        <?php endif; ?>

                        <?php if (session()->getFlashdata('error')) : ?>

                            <div class="alert alert-danger alert-dismissible show fade">
                                <div class="alert-body">
                                    <button class="close" data-dismis="alert">
                                        x
                                    </button>
                                    <b>Maaf !</b>
                                    <?= session()->getFlashdata('error') ?>
                                </div>
                            </div>

                        <?php endif; ?>

                        <form action="<?= site_url('auth/loginproses') ?>" method="post" class="needs-validation" autocomplete="off">
                            <?= csrf_field() ?>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                                <div class="invalid-feedback">
                                    Please fill in your email
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="d-block">
                                    <label for="password" class="control-label">Password</label>
                                </div>
                                <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                                <div class="invalid-feedback">
                                    please fill in your password
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                                    <label class="custom-control-label" for="remember-me">Remember Me</label>
                                </div>
                            </div>

                            <div class="form-group text-right">
                                <div class="float-left mt-3">
                                    <code>
                                        <?= $googleButton ?>
                                    </code>
                                </div>


                                <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                                    Login
                                </button>
                            </div>

                            <div class="mt-5 text-center">
                                Don't have an account? <code>
                                    <?= $googleButton ?>
                                </code> </a>
                            </div>
                        </form>

                        <div class="text-center mt-5 text-small">
                            Copyright &copy; El-Gontori. <a href="https://www.instagram.com/apdy0997/" target="_blank" rel="noopener noreferrer"> <b>Apdy</b></a>
                            <div class="mt-2">
                                <a href="https://daarulkutubel-gontori.com/">Daarul Kutub</a>
                                <div class="bullet"></div>
                                <a href="https://earsip.daarulkutubel-gontori.com/login">E-Arsip El-Gontori</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="<?= base_url() ?>/template/assets/img/unsplash/login.jpg">
                    <div class="absolute-bottom-left index-2">
                        <div class="text-light p-5 pb-2">
                            <div class="mb-5 pb-3">
                                <h1 class="mb-2 display-4 font-weight-bold">Assalamu'alaikum</h1>
                                <h5 class="font-weight-normal text-muted-transparent">Pagar Alam, Sumatera Selatan, Indonesia</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="<?= base_url() ?>/template/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url() ?>/template/node_modules/bootstrap/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="<?= base_url() ?>/template/node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
    <script src="<?= base_url() ?>/template/assets/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Template JS File -->
    <script src="<?= base_url() ?>/template/assets/js/scripts.js"></script>
    <script src="<?= base_url() ?>/template/assets/js/custom.js"></script>

    <!-- Page Specific JS File -->
</body>

</html>