<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Master Page &mdash; Simon</title>
<?= $this->endSection(); ?>

<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <h1>Master Data</h1>
        <!-- <div class="section-header-button">
            <a href="/admin/Datahadits/new" class="btn btn-primary"> <i class="fa fa-user-plus" aria-hidden="true"></i> <span>Add User</span>
            </a>
        </div> -->
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
                    <div class="card-header">
                        <h4> Rekap data hafalan hadits santri</h4>
                        <div class="card-header-action">

                            <a href="/staff/Cetakhadits" class="btn btn-warning btn-sm"><i class="fa fa-chevron-circle-left"> back to data hafalan</i></a>

                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-md" id="table-1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name santri</th>
                                        <th>Name hadits</th>
                                        <th>
                                            <center>
                                                <i class="fas fa-cogs"></i>
                                            </center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;

                                    foreach ($mhadits as $key => $value) :

                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $value['name_santri']; ?></td>
                                            <td><?= $value['nama_hadits']; ?></td>
                                            <td>
                                                <center>
                                                    -
                                                </center>
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