<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Detail profile &mdash; Simon</title>
<?= $this->endSection(); ?>

<?= $this->section('content') ?>

<?php
// dd($santri);
?>

<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <h1>Detail Santri</h1>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Assalamu'alaikum,<code> <?= ucwords(session()->nameUser) ?></code> </h2>
        <p class="section-lead">
            Informasi profile pengguna
        </p>

        <div class="col-12 col-md-12 col-lg-7">
            <div class="card">
                <form method="post" class="needs-validation" novalidate="">
                    <div class="card-header">
                        <a href="/profilesAdmin">
                            <h4>Profiles</h4>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label> Name user</label>
                                <input type="text" class="form-control" readonly value="<?= session()->get('nameUser') ?>" required="">
                                <div class="invalid-feedback">
                                    Please fill in the first name
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label>Email user</label>
                                <input type="text" class="form-control" readonly value="<?= session()->emailUser ?>" required="">
                                <div class="invalid-feedback">
                                    Please fill in the last name
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label> Phone user</label>
                                <input type="text" class="form-control" readonly value="<?= session()->get('phoneUser') ?>" required="">
                                <div class="invalid-feedback">
                                    Please fill in the first name
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label>Email user</label>
                                <input type="text" class="form-control" readonly value="<?= session()->roleUser ?>" required="">
                                <div class="invalid-feedback">
                                    Please fill in the last name
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <a href="/users" class="btn btn-warning"><i class="fas fa-chevron-circle-left"></i> Back to user</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>

</section>

<?= $this->endSection() ?>