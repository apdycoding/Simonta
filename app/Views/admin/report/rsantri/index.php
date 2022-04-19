<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Santri Page &mdash; Simon</title>
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
            <!-- <a href="/santri/create" class="btn btn-primary"> <i class="fa fa-user-plus" aria-hidden="true"></i> <span>Add Santri</span>
            </a> -->
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
                    <div class="card-header" class="float-right">
                        <h4> Data santri active</h4>
                        <div class="card-header-action">
                            <a href="/admin/ReportSantri" class="btn btn-info"><i class="fas fa-spinner"> Refresh</i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nik Santri</th>
                                        <th>Name Santri</th>
                                        <th>Gender</th>
                                        <th>Agama</th>
                                        <th>Status santri</th>
                                        <th>Photos</th>
                                        <!-- <th>
                                            <center>
                                                Action
                                            </center>
                                        </th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($santri as $s) {
                                    ?>

                                        <tr>
                                            <td><?= $no++; ?>.</td>
                                            <td><?= $s['nik_santri']; ?></td>
                                            <td><?= ucwords($s['name_santri']) ?></td>
                                            <td>
                                                <?php if ($s['gender'] == "man") {
                                                    echo '<div class="badge badge-info">' . ucwords($s['gender']);
                                                } else {
                                                    echo '<div class="badge badge-warning">' . ucwords($s['gender']);
                                                } ?>
                                            </td>
                                            <td><?= ucwords($s['agama']) ?></td>
                                            <td>
                                                <form action="/santri/status/<?= $s['santri_id']; ?>" method="POST" class="d-inline" onsubmit="return confirm('Apakan status santri akan di ubah?')">
                                                    <?= csrf_field(); ?>

                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <?php if (($s['statusSantri'] == 1)) {
                                                        echo '<button class="btn btn-success btn-sm">' . "active";
                                                    } else {
                                                        echo '<button class="btn btn-danger btn-sm">' . "non active";
                                                    } ?>

                                                </form>
                                            </td>
                                            <td>
                                                <img src="<?= site_url('img/' . $s['photos']) ?>" width="50px" alt="" srcset="">
                                            </td>
                                            <!-- <td>
                                                <center>
                                                    <a href="/santri/<?= $s['santri_id']; ?>" class="btn btn-info btn-sm"><i class="fa fa-check-square"></i><span> Detail</span></a>
                                                    <a href="/santri/edit/<?= $s['santri_id'] ?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil-alt"></i><span> Edit</span></a>

                                                    <form action="/santri/<?= $s['santri_id']; ?>" method="POST" class="d-inline" onsubmit="return confirm('Apakan data akan dihapus?')">
                                                        <?= csrf_field(); ?>

                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>
                                                            Delete
                                                        </button>
                                                    </form>

                                                </center>
                                            </td> -->
                                        </tr>
                                    <?php  } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<?= $this->endSection() ?>