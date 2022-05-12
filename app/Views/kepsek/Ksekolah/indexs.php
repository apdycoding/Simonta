<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Kepsek Page &mdash; Simon</title>
<?= $this->endSection(); ?>

<?= $this->section('content') ?>


<section class="section">
    <div class="section-header">
        <h1>Master Data</h1>
        <div class="section-header-button">
            <!-- <a href="/kepsek/HeadSchool/new" class="btn btn-primary"> <i class="fa fa-user-plus" aria-hidden="true"></i> <span>Add data</span> -->
            </a>
        </div>
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
                        <h4> Data kepala sekolah <code><?= session()->roleUser; ?> </code> </h4>
                        <div class="card-header-action">
                            <a href="/kepsek/HeadSchool" class="btn btn-info"><i class="fa fa-spinner"> Refresh</i></a>
                        </div>
                    </div>

                    <div class="card-header">
                        <!-- jika kosong maka dikembalikan ke halaman index -->
                        <form action="" method="GET" autocomplete="off">
                            <?php $request = \Config\Services::request(); ?>
                            <div class="float-left">
                                <input type="text" name="keyword" value="<?= $request->getGet('keyword') ?>" class="form-control" width="155pt;" placeholder="keyword pencarian" id="">
                            </div>
                            <div class="float-right ml-2">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> </button>
                            </div>

                        </form>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-md" id="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nik kepsek</th>
                                        <th>Name kepsek</th>
                                        <th>Gelar</th>
                                        <th>Gender</th>
                                        <th>Alamat</th>
                                        <th>Status</th>
                                        <th>No. Hp</th>
                                        <!-- <th>
                                            <center>
                                                Action
                                            </center>
                                        </th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                    // dd($page);
                                    $no = 1 + (5 * ($page - 1));
                                    // $no = 1;
                                    foreach ($kepsek as $s) {
                                    ?>

                                        <tr>
                                            <td><?= $no++; ?>.</td>
                                            <td><?= ucwords($s['nik_kepsek']) ?></td>
                                            <td><?= ucwords($s['name_kepsek']) ?></td>
                                            <td>
                                                <code>
                                                    <?= ucwords($s['gelar']) ?>
                                                </code>
                                            </td>
                                            <td><?= ucwords($s['gender']) ?></td>
                                            <td><?= ucwords($s['alamat']) ?></td>
                                            <td>
                                                <code>
                                                    <?= ucwords($s['status_kepsek']) ?>
                                                </code>
                                            </td>
                                            <td><?= ucwords($s['phone_kepsek']) ?></td>
                                            <!-- <td>
                                                <center>

                                                    <a href="/kepsek/HeadSchool/edit/<?= $s['kepsek_id'] ?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil-alt"></i><span> Edit</span></a>

                                                    <form action="/kepsek/HeadSchool/delete/<?= $s['kepsek_id']; ?>" method="POST" class="d-inline" id="del-<?= $s['kepsek_id']; ?>">
                                                        <?= csrf_field(); ?>
                                                        <button class="btn btn-danger btn-sm" data-confirm="Hapus data?|apakah data akan dihapus?" data-confirm-yes="submitDel(<?= $s['kepsek_id']; ?>)"><i class="fa fa-trash"></i>
                                                            Delete
                                                        </button>
                                                    </form>

                                                </center>
                                            </td> -->
                                        </tr>
                                    <?php  } ?>
                                </tbody>
                            </table>

                            <div class="float-left">
                                <i>Showing <?= 1 + (5 * ($page - 1)) ?> to <?= $no - 1 ?> of <?= $pager->getTotal()  ?> entries</i>
                            </div>
                            <div class="float-right">
                                <?= $pager->links('default', 'pagination') ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<?= $this->endSection() ?>