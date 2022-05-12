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
            <a href="/kepsek/SantriA" class="btn btn-info btn-sm"> <i class="fas fa-arrow-circle-left"></i> Back to santri</a>
        </div>
        <h1>Detail Santri <code><?= session()->roleUser ?></code></h1>
    </div>

    <div class="section-body">

        <div class="row">
            <!-- <div class="col-12 col-md-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fa fa-users"></i> Data Lengkap Santri</h4>
                    </div>
                    <div class="card-body">
                        name
                    </div>
                </div>
            </div> -->

            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-5">
                    <div class="card profile-widget">
                        <div class="profile-widget-header">
                            <img alt="image" src="<?= site_url('img/' . $santri['photos']) ?>" class="rounded-circle profile-widget-picture">
                            <!-- <img src="img/<?= $santri['photos']; ?>" class="rounded-circle profile-widget-picture"> -->
                            <div class="profile-widget-items">
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Nik Santri</div>
                                    <div class="profile-widget-item-label"><?= $santri['nik_santri'] ?></div>
                                </div>
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Nama Santri</div>
                                    <div class="profile-widget-item-label"><?= $santri['name_santri']; ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="profile-widget-description">

                            <div class="profile-widget-name">Ra Taman Tahfidz <div class="text-muted d-inline font-weight-normal">
                                    <div class="slash"></div> Pagar Alam
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-5 col-12">
                                        <label>Nik Santri</label>
                                        <input type="text" class="form-control" readonly value="<?= $santri['nik_santri']; ?>" required="">
                                    </div>
                                    <div class="form-group col-md-7 col-12">
                                        <label>Nama Santri</label>
                                        <input type="text" readonly class="form-control" value="<?= $santri['name_santri']; ?>" required="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Gender</label>
                                        <input type="text" class="form-control" readonly value="<?= ($santri['gender'] == "man" ? "Laki-laki" : "Perempuan") ?>" required="">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Agama</label>
                                        <input type="text" class="form-control" readonly value="<?= $santri['agama']; ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Alamat</label>
                                        <textarea name="" id="" readonly class="form-control"><?= $santri['alamat']; ?></textarea>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Tanggal lahir</label>
                                        <input type="text" class="form-control" readonly value="<?= $santri['tgl_lahir']; ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Tempat lahir</label>
                                        <textarea name="" id="" readonly class="form-control"><?= $santri['tempat_lhr']; ?></textarea>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Photos</label>
                                        <input type="text" class="form-control" readonly value="<?= $santri['photos']; ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Status Santri</label>
                                        <input type="text" readonly name="" class="form-control" value="<?= $santri['statusSantri']; ?>" id="">
                                    </div>
                                </div>
                                <!-- <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                    </div>
                                    <div class="form-group col-md-6 col-12 text-right">
                                        <button class="btn btn-warning btn-sm"><i class="fa fa-arrow-circle-left"></i> Back to santri</button>
                                    </div>
                                </div> -->

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                        <form method="post" class="needs-validation" novalidate="">
                            <div class="card-header">
                                <h4>Data ibu</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Nik ibu</label>
                                        <input type="text" class="form-control" readonly value="<?= $santri['nik_ibu']; ?>" required="">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Name ibu</label>
                                        <input type="text" readonly class="form-control" value="<?= $santri['nama_ibu']; ?>" required="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Pekerjaan ibu</label>
                                        <input type="text" class="form-control" readonly value="<?= $santri['pekerjaan_ibu']; ?>" required="">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Status ibu</label>
                                        <input type="text" readonly class="form-control" value="<?= $santri['status_ibu']; ?>" required="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Phone ibu</label>
                                        <input type="text" class="form-control" readonly value="<?= $santri['phoneIbu']; ?>" required="">
                                    </div>
                                </div>

                                <div class="card-header">
                                    <h4>Data ayah</h4>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Nik ayah</label>
                                        <input type="text" class="form-control" readonly value="<?= $santri['nik_ayah']; ?>" required="">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Name ayah</label>
                                        <input type="text" readonly class="form-control" value="<?= $santri['nama_ayah']; ?>" required="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Pekerjaan ayah</label>
                                        <input type="text" class="form-control" readonly value="<?= $santri['pekerjaan_ayah']; ?>" required="">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Status ayah</label>
                                        <input type="text" readonly class="form-control" value="<?= $santri['status_ayah']; ?>" required="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Phone ayah</label>
                                        <input type="text" class="form-control" readonly value="<?= $santri['phoneAyah']; ?>" required="">
                                    </div>
                                </div>
                                <!-- <div class="row float-right">
                                    <div class="form-group col-md-12">
                                        <a href="" class="btn btn-primary"> <i class="fa fa-pencil-alt"></i> Edit Data</a>
                                    </div>
                                </div> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

</section>

<?= $this->endSection() ?>