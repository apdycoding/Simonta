<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>User Page &mdash; Simon</title>
<?= $this->endSection(); ?>

<?= $this->section('content') ?>

<?php
// dd($santri);
?>

<style>
    /* img {
        border-radius: 50%;
    } */
</style>

<section class="section">
    <div class="section-header">
        <h1>Master Data</h1>
        <div class="section-header-button">
            <a href="/users/new" class="btn btn-primary"> <i class="fa fa-user-plus" aria-hidden="true"></i> <span>Add User</span>
            </a>
        </div>
    </div>

    <?php if (session()->getFlashdata('succes')) : ?>

        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismis="alert">
                    x
                </button>
                <b>Success !</b>
                <?= session()->getFlashdata('succes') ?>
            </div>
        </div>

    <?php endif; ?>

    <?php if (session()->getFlashdata('error')) : ?>

        <div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismis="alert">
                    x
                </button>
                <b>Trash !</b>
                <?= session()->getFlashdata('error') ?>
            </div>
        </div>

    <?php endif; ?>

    <?php if (session()->getFlashdata('warning')) : ?>

        <div class="alert alert-warning alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismis="alert">
                    x
                </button>
                <b>Trash !</b>
                <?= session()->getFlashdata('warning') ?>
            </div>
        </div>

    <?php endif; ?>

    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4> Data user si-monta</h4>
                        <div class="card-header-action">
                            <a href="/users" class="btn btn-info"><i class="fa fa-spinner"> Refresh</i></a>
                        </div>
                    </div>

                    <div class="card-header">
                        <!-- action kosong berarti diarahkan ke url yang sekarang -->
                        <form action="" method="GET" autocomplete="off">
                            <?php $request = \Config\Services::request(); ?>
                            <div class="float-left">
                                <input type="text" name="keyword" value="<?= $request->getGet('keyword') ?>" class="form-control" width="155pt;" placeholder="keyword pencarian" id="">
                            </div>
                            <div class="float-right ml-2">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> </button>
                            </div>

                        </form>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-md" id="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name user</th>
                                        <th>Email user</th>
                                        <th>Role users</th>
                                        <th>isActive</th>
                                        <th>Phone user</th>
                                        <th>
                                            <center>
                                                Action
                                            </center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                    // dd($page);
                                    $no = 1 + (5 * ($page - 1));

                                    foreach ($user as $u) {
                                    ?>

                                        <tr>
                                            <td><?= $no++; ?>.</td>
                                            <td><?= ucwords($u['nameUser']) ?></td>
                                            <td><?= ucwords($u['emailUser']) ?></td>
                                            <td><?= ucwords($u['roleUser']) ?></td>
                                            <td>
                                                <form action="/users/status/<?= $u['user_id']; ?>" method="POST" class="d-inline" onsubmit="return confirm('Apakan status santri akan di ubah?')">
                                                    <?= csrf_field(); ?>

                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <?php if ($u['isactive'] == 'actived') {
                                                        echo '<button class="btn btn-success btn-sm">' . "Active";
                                                    } else {
                                                        echo '<button class="btn btn-danger btn-sm">' . "Non Active";
                                                    } ?>

                                                </form>
                                            </td>
                                            <td><?= ucwords($u['phoneUser']) ?></td>
                                            <td>
                                                <center>
                                                    <a href="/users/change/<?= $u['user_id'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-key"></i><span> Change Pass</span></a>

                                                    <a href="/users/edit/<?= $u['user_id'] ?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil-alt"></i><span> Edit</span></a>

                                                    <form action="/users/delete/<?= $u['user_id']; ?>" method="POST" class="d-inline" id="del-<?= $u['user_id']; ?>">
                                                        <?= csrf_field(); ?>
                                                        <button class="btn btn-danger btn-sm" data-confirm="Hapus data?|apakah data akan dihapus?" data-confirm-yes="submitDel(<?= $u['user_id']; ?>)"><i class="fa fa-trash"></i>
                                                            Delete
                                                        </button>
                                                    </form>

                                                </center>
                                            </td>
                                        </tr>
                                    <?php  } ?>
                                </tbody>
                            </table>

                            <div class="float-left">
                                <i>Showing <?= 1 + (5 * ($page - 1)) ?> to <?= $no - 1 ?> of <?= $pager->getTotal()  ?> entries</i>
                            </div>
                            <div class="float-right">
                                <?= $pager->links('default', 'pagination') ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<?= $this->endSection() ?>