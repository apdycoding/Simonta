<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Santri Page &mdash; Simon</title>
<?= $this->endSection(); ?>

<?= $this->section('content') ?>


<section class="section">
    <div class="section-header">
        <h1>Master Data</h1>
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
                        <h4> Data santri tidak aktif <code><?= session()->roleUser ?></code></h4>
                        <div class="card-header-action">
                            <a href="/kepsek/SantriA" class="btn btn-warning"><i class="fas fa-chevron-left"> Back to santri active</i>
                            </a>
                            <a href="/kepsek/SantriA/inactive" class="btn btn-info"><i class="fas fa-spinner"> Refresh</i> </a>
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
                                    foreach ($inactive as $s) {
                                    ?>

                                        <tr>
                                            <td><?= $no++; ?>.</td>
                                            <td><?= $s['nik_santri']; ?></td>
                                            <td><?= ucwords($s['name_santri']); ?></td>
                                            <td>
                                                <?php if ($s['gender'] == "man") {
                                                    echo '<div class="badge badge-info">' . ucwords($s['gender']);
                                                } else {
                                                    echo '<div class="badge badge-warning">' . ucwords($s['gender']);
                                                } ?>
                                            </td>
                                            <td><?= ucwords($s['agama']); ?></td>
                                            <td>

                                                <?= csrf_field(); ?>

                                                <!-- <input type="hidden" name="_method" value="DELETE"> -->
                                                <?php if ($s['statusSantri'] == "1") {
                                                    echo '<button class="btn btn-success btn-sm">' . 'Active';
                                                } else {
                                                    echo '<button class="btn btn-danger btn-sm">' . 'Non active';
                                                } ?>

                                            </td>
                                            <td>
                                                <img src="<?= site_url('img/' . $s['photos']) ?>" width="50px" alt="" srcset="">
                                            </td>
                                            <td>
                                                <center>
                                                    <a href="/kepsek/SantriA/show/<?= $s['santri_id']; ?>" class="btn btn-info btn-sm"><i class="fa fa-check-square"></i><span> Detail</span></a>
                                                </center>
                                            </td>
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