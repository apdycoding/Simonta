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
            <a href="/teacher" class="btn btn-info btn-sm"> <i class="fas fa-arrow-circle-left"></i> Back to guru</a>
        </div>
        <h1>Detail Guru</h1>
    </div>
    <div class="section-body">

        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 ">
                <div class="card profile-widget">
                    <div class="profile-widget-header">
                        <img alt="image" src="<?= site_url('img/guru/' . $guru['foto']) ?>" class="rounded-circle profile-widget-picture">
                        <div class="profile-widget-items">
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Nik Guru</div>
                                <div class="profile-widget-item-label"><b><?= $guru['nik_teacher'] ?></b></div>
                            </div>
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Nama Guru</div>
                                <div class="profile-widget-item-label"><b><?= $guru['name']; ?></b></div>
                            </div>
                        </div>
                    </div>
                    <div class="profile-widget-description">

                        <div class="profile-widget-name">Data guru <div class="text-muted d-inline font-weight-normal">
                                <div class="slash"></div> Ra Taman Tahfidz
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>Nik guru</label>
                                    <input type="text" class="form-control" readonly value="<?= $guru['nik_teacher']; ?>" required="">
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>Nama guru</label>
                                    <input type="text" readonly class="form-control" value="<?= $guru['name']; ?>" required="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>Gender</label>
                                    <input type="text" class="form-control" readonly value="<?= ($guru['gender'] == "man" ? "Laki-laki" : "Perempuan") ?>" required="">
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>Agama</label>
                                    <input type="text" class="form-control" readonly value="<?= $guru['agama']; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>Alamat</label>
                                    <textarea name="" id="" readonly class="form-control"><?= $guru['alamat']; ?></textarea>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>Tanggal lahir</label>
                                    <input type="text" class="form-control" readonly value="<?= $guru['tgl_lahir']; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>Tempat lahir</label>
                                    <textarea name="" id="" readonly class="form-control"><?= $guru['tempat_lhr']; ?></textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</section>

<?= $this->endSection() ?>