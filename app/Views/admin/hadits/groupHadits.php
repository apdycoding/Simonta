<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Surah Page &mdash; Simon</title>
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
            <a href="/hadits/new" class="btn btn-primary"> <i class="fa fa-user-plus" aria-hidden="true"></i> <span>Add Hafalan</span>
            </a>
        </div>
    </div>

    <?php if (session()->getFlashdata('success')) : ?>

        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismis="alert">
                    x
                </button>
                <b>Success !</b>
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
                        <h4> Data hafalan hadits anak || Cetak E-Sertifikat
                        </h4>
                        <div class="card-header-action">
                            </a>
                            <a href="/hadits" class="btn btn-info"> <i class="fas fa-spinner"> Refresh</i>
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-md" id="table-1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Anak</th>
                                        <th>Predikat</th>
                                        <th>Tanggal Ujian</th>
                                        <th>
                                            <center>
                                                Action
                                            </center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($hadits as $s) :
                                    ?>
                                        <tr>
                                            <td><?= $no++; ?>.</td>
                                            <td><?= ucwords($s['name_santri']) ?></td>
                                            <td><code> <?= ucwords($s['predikat']) ?> </code></td>
                                            <td><code> <?= date($s['tglLulus']) ?> </code></td>
                                            <td>
                                                <center>

                                                    <form action="/hadits/hafalanHadits/<?= $s['santri_id']; ?>" method="GET" class="d-inline">
                                                        <?= csrf_field(); ?>
                                                        <button class=" btn btn-info btn-sm">
                                                            <i class="fas fa-eye"></i>
                                                            Lihat hafalan
                                                        </button>
                                                    </form>

                                                    <form action="/hadits/print/<?= $s['hadits_id']; ?>" target="_blank" method="GET" class="d-inline">
                                                        <?= csrf_field(); ?>
                                                        <button class=" btn btn-warning btn-sm">
                                                            <i class="fa fa-folder-open"></i>
                                                            E-Sertifikat
                                                        </button>
                                                    </form>

                                                    <a href="/Hadits/edit/<?= $s['hadits_id'] ?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil-alt"></i><span> Edit</span></a>

                                                    <form action="/Hadits/delete/<?= $s['hadits_id']; ?>" method="POST" class="d-inline" id="del-<?= $s['hadits_id']; ?>">
                                                        <?= csrf_field(); ?>
                                                        <button class="btn btn-danger btn-sm" data-confirm="Hapus data?|apakah data akan dihapus?" data-confirm-yes="submitDel(<?= $s['hadits_id']; ?>)"><i class="fa fa-trash"></i>
                                                            Delete
                                                        </button>
                                                    </form>

                                                </center>
                                            </td>
                                            </td>
                                        </tr>

                                    <?php endforeach; ?>
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