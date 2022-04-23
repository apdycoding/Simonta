<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Create Santri &mdash; Simon</title>
<?= $this->endSection(); ?>

<?= $this->section('content') ?>

<?php
// dd($santri);
?>

<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="/staff/Mastersurah" class="btn btn-info btn-sm"> <i class="fas fa-arrow-circle-left"></i> Back to hafalan</a>
        </div>
        <h1>Detail hafalan</h1>
    </div>

    <div class="section-body">

        <div class="row mt-sm-4">
            <div class="col-12">
                <div class="card">
                    <form method="post" class="needs-validation" novalidate="">
                        <div class="card-header">
                            <h4>Hafalan Surah</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>Nama anak</label>
                                    <input type="text" class="form-control" readonly value="<?= $surah[0]['name_santri']; ?>">
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>Nama surah</label>
                                    <input type="text" class="form-control" readonly value="<?= $surah[0]['nama_surah']; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>Surah ke-</label>
                                    <input type="text" class="form-control" readonly value="<?= $surah[0]['surah_ke']; ?>">
                                    <div class="invalid-feedback">
                                        Please fill in the first name
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>Tanggal ujian</label>
                                    <input type="text" class="form-control" readonly value="<?= $surah[0]['tgl_ujian']; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>Predikat</label>
                                    <input type="text" class="form-control" readonly value="<?= $surah[0]['predikat']; ?>">
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>Penguji</label>
                                    <input type="text" class="form-control" readonly value="<?= $surah[0]['nama_penguji']; ?>">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>

</section>

<?= $this->endSection() ?>