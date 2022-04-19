<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <?= $this->renderSection('title') ?>

    <!-- tes summernote -->
    <script src="<?= base_url() ?>/template/node_modules/jquery/dist/jquery.slim.min.js"></script>
    <link href="<?= base_url() ?>/template/node_modules/jquery/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="<?= base_url() ?>/template/node_modules/jquery/dist/summernote-lite.min.js"></script>
    <!-- end tes -->

    <!-- CSS Libraries summernote -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/summernote/dist/summernote-bs4.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/selectric/public/selectric.css">


    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/@fortawesome/fontawesome-free/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css">


    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/components.css">
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                    </ul>
                    <div class="search-element">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
                        <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                        <!-- <div class="search-backdrop"></div> -->
                    </div>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img src="/template/assets/img/avatar/avatar-1.png" alt="image" class="rounded-circle mr-1">
                            <!-- <img src="<?= session()->picture ?>" class="rounded-circle mr-1"> -->
                            <div class="d-sm-none d-lg-inline-block">Hi, <?= session()->nameUser ?>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-title">Logged in 5 min ago</div>
                            <a href="" class="dropdown-item has-icon">
                                <i class="far fa-user"></i>
                                <code>
                                    <?= session()->emailUser ?>
                                </code>
                            </a>
                            <a href="/profilesAdmin" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="/auth/logout" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="<?= site_url() ?>"> <i class="fa fa-desktop" aria-hidden="true"></i> SI-MONTA</a>
                        <div class="container">
                            <center>
                                <span class="badge badge-primary mb-3">
                                    <?= ucwords(session('roleUser')) ?>
                                </span>
                            </center>
                        </div>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="/">Simon</a>
                    </div>
                    <ul class="sidebar-menu">

                        <?= $this->include('layout/menu'); ?>

                    </ul>
                    <!-- <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                        <a href="" class="btn btn-primary btn-lg btn-block btn-icon-split">
                            <i class="fas fa-file-export"></i> <span>Export Databases</span>
                        </a>
                    </div> -->
                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">

                <?= $this->renderSection('content') ?>

            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; <?= date('Y'); ?> <div class="bullet"></div> Develop <a href="https://www.instagram.com/apdy0997/" target="_blank">Apdy</a>
                </div>
                <div class="footer-right">
                    Si-Monta V.1
                </div>
            </footer>
        </div>
    </div>

    <script>
        $('#summernote').summernote({
            // placeholder: 'Hello stand alone ui',
            placeholder: 'Silahkan masukkan inputan',
            tabsize: 2,
            height: 120,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });

        $('#summernote_lite').summernote({
            // placeholder: 'Hello stand alone ui',
            placeholder: 'Silahkan masukkan inputan',
            tabsize: 2,
            height: 120,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    </script>

    <!-- JS Libraies summernote-->
    <script src="<?= base_url() ?>/template/node_modules/summernote/dist/summernote-bs4.js"></script>

    <!-- General JS Scripts -->
    <script src="<?= base_url() ?>/template/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url() ?>/template/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>/template/node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
    <script src="<?= base_url() ?>/template/assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="<?= base_url() ?>/template/node_modules/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>/template/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>/template/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js"></script>

    <!-- Template JS File -->
    <script src="<?= base_url() ?>/template/assets/js/scripts.js"></script>
    <script src="<?= base_url() ?>/template/assets/js/custom.js"></script>

    <!-- Page Specific JS File -->
    <script src="<?= base_url() ?>/template/assets/js/page/modules-datatables.js"></script>
    <script src="<?= base_url() ?>/template/node_modules/select2/dist/js/select2.full.min.js"></script>
    <script src="<?= base_url() ?>/template/node_modules/selectric/public/jquery.selectric.min.js"></script>

    <!-- sweetalert -->
    <script src="<?= base_url() ?>/sweetalert/dist/sweetalert2.all.js"></script>

    <!-- Page Specific JS File -->
    <script src="<?= base_url() ?>/template/assets/js/page/modules-sweetalert.js"></script>


    <script>
        function previewImg() {
            // const sampul = document.querySelector('#sampul');
            // const sampulLabel = document.getElementsByClassName('custom-file-label');
            // const imgPreview = document.querySelector('.img-preview');

            // sampulLabel.textContent = sampul.files[0].name;

            // const sampulLabel = new FileReader();


            const foto = document.querySelector('#sampul');
            const fotoLabel = document.querySelector('.custom-file-label');
            const imgPreview = document.querySelector('.img-preview');

            fotoLabel.textContent = foto.files[0].name;

            const fileFoto = new FileReader();

            fileFoto.readAsDataURL(foto.files[0]);

            fileFoto.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
        // ini bisa juga

        function showPreview(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-1-preview");
                preview.src = src;
                // preview.style.display = "block";
            }
        }
    </script>

</body>

</html>