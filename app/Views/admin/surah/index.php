<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Surah Page &mdash; Simon</title>
<?= $this->endSection(); ?>

<?= $this->section('content') ?>


<section class="section">
    <div class="section-header">
        <h1>Master Data</h1>
        <div class="section-header-button">
            <a href="/HafalanSurah/new" class="btn btn-primary"> <i class="fa fa-user-plus" aria-hidden="true"></i> <span>Add Hafalan</span>
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
                <div class="alert alert-info alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismis="alert">
                            x
                        </button>
                        <code><b>Show data</b></code>
                        <br>
                        Data yang ditampilkan merupakan data hafalan berdasarkan <code>Nama santri</code>, untuk melihat daftar hafalan santri <code>silahkan klik lihat detail hafalan anak</code>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" class="float-right">
                        <h4> Groups data hafalan anak santri
                        </h4>
                        <div class="card-header-action">
                            <a href="/HafalanSurah" class="btn btn-info"> <i class="fas fa-spinner"> Refresh</i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Anak</th>
                                        <th>Jumlah surah yang sudah di hafalkan</th>
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
                                    foreach ($surah as $s) :
                                    ?>
                                        <tr>
                                            <td><?= $no++; ?>.</td>
                                            <td><?= ucwords($s['name_santri']) ?></td>
                                            <td><code> <?= $s['count(*)']; ?> Surah</code></td>
                                            <td>
                                                <center>

                                                    <a href="/santri/groups/<?= $s['santri_id']; ?>" class="btn btn-info btn-sm"> <i class="fas fa-info"></i> Lihat detail hafalan anak</a>

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