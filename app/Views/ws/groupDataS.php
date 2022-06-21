<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Surah Page &mdash; Simon</title>
<?= $this->endSection(); ?>

<?= $this->section('content') ?>


<section class="section">
    <div class="section-header">
        <h1>Group data hafalan surah</h1>
        <!-- <div class="section-header-button">
            <a href="/HafalanSurah/new" class="btn btn-primary"> <i class="fa fa-user-plus" aria-hidden="true"></i> <span>Add Hafalan</span>
            </a>
        </div> -->
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
                        <h4> Data hafalan surah
                        </h4>
                        <div class="card-header-action">
                            </a>
                            <a href="/ws/Surah" class="btn btn-warning"> <i class="fas fa-chevron-circle-left"> Back to hafalan</i>
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive table-sm">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Anak</th>
                                        <th>Nama Surah</th>
                                        <th>Surah Ke</th>
                                        <th>Tgl ujian</th>
                                        <th>Predikat</th>
                                        <th>Penguji</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($groups as $s) :
                                    ?>
                                        <tr>
                                            <td><?= $no++; ?>.</td>
                                            <td><?= ucwords($s['name_santri']) ?></td>
                                            <td><?= ucwords($s['nama_surah']) ?></td>
                                            <td><code>ke- </code><?= ucwords($s['surah_ke']) ?></td>
                                            <td>
                                                <code><?= $s['tgl_ujian'] ?></code>
                                            </td>
                                            <td><?= ucwords($s['predikat']) ?></td>
                                            <td><?= ucwords($s['nama_penguji']) ?></td>
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