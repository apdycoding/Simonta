<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Doa Page &mdash; Simon</title>
<?= $this->endSection(); ?>

<?= $this->section('content') ?>


<section class="section">
    <div class="section-header">
        <h1>Master Data</h1>
        <div class="section-header-button">
            <a href="/doa/new" class="btn btn-primary"> <i class="fa fa-user-plus" aria-hidden="true"></i> <span>Add Hafalan</span>
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
                        <h4> Data hafalan doa anak || Cetak E-Sertifikat

                        </h4>
                        <div class="card-header-action">
                            </a>
                            <a href="/doa" class="btn btn-info"> <i class="fas fa-spinner"> Refresh</i>
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
                                        <th>Predikat</th>
                                        <th>Tanggal Ujian</th>
                                        <!-- <th>Penguji</th> -->
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
                                    foreach ($doa as $d) :
                                    ?>
                                        <tr>
                                            <td><?= $no++; ?>.</td>
                                            <td><?= ucwords($d['name_santri']) ?></td>
                                            <td><code> <?= $d['predikat'] ?> </code></td>
                                            <td><code> <?= date($d['tglLulus']) ?> </code></td>
                                            <td>
                                                <center>
                                                    <form action="/doa/hafalanDoa/<?= $d['santri_id']; ?>" method="GET" class="d-inline">
                                                        <?= csrf_field(); ?>
                                                        <button class=" btn btn-info btn-sm">
                                                            <i class="fas fa-eye"></i>
                                                            Lihat hafalan
                                                        </button>
                                                    </form>

                                                    <form action="/doa/serti/<?= $d['doa_id']; ?>" target="_blank" method="GET" class="d-inline">
                                                        <?= csrf_field(); ?>
                                                        <button class=" btn btn-warning btn-sm">
                                                            <i class="fa fa-folder-open"></i>
                                                            E-Sertifikat
                                                        </button>
                                                    </form>


                                                    <a href="/doa/edit/<?= $d['doa_id'] ?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil-alt"></i><span> Edit</span></a>

                                                    <form action="/doa/delete/<?= $d['doa_id']; ?>" method="POST" class="d-inline" id="del-<?= $d['doa_id']; ?>">
                                                        <?= csrf_field(); ?>
                                                        <button class="btn btn-danger btn-sm" data-confirm="Hapus data?|apakah data akan dihapus?" data-confirm-yes="submitDel(<?= $d['doa_id']; ?>)"><i class="fa fa-trash"></i>
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