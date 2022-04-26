<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Master Page &mdash; Simon</title>
<?= $this->endSection(); ?>

<?= $this->section('content') ?>


<section class="section">
    <div class="section-header">
        <h1>Master Data</h1>

        <div class="section-header-button">
            <!-- <a href="/admin/Datahadits/new" class="btn btn-primary"> <i class="fa fa-user-plus" aria-hidden="true"></i> <span>Add master data</span>
            </a> -->
        </div>
    </div>

    <?php

    use App\Models\MhaditsModel;

    if (session()->getFlashdata('succes')) : ?>

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
                        <h4> Data si-monta</h4>
                        <div class="card-header-action">

                            <form action="/staff/Laphadits/" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <button class=" btn btn-primary btn-sm">
                                    <i class="fas fa-file-download"></i>
                                    Export data
                                </button>
                            </form>

                            <a href="/staff/Laphadits" class="btn btn-info"><i class="fa fa-spinner"> Refresh</i>
                            </a>
                        </div>
                    </div>

                    <div class="card-header">
                        <!-- action kosong berarti diarahkan ke url yang sekarang -->
                        <form action="" method="GET" autocomplete="off">
                            <?php $request = \Config\Services::request(); ?>
                            <div class="float-left">
                                <input type="text" name="keyword" value="<?= $request->getGet('keyword') ?>" class="form-control" width="155pt" placeholder="Cari nama santri" id="">
                            </div>
                            <div class="float-right ml-2">
                                <button type="submit" class="btn btn-info"><i class="fas fa-search"></i> </button>

                            </div>

                        </form>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-md" id="table-1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama santri</th>
                                        <th>Nama hafalan hadits</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // $no = 0;
                                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                    // var_dump($page);
                                    $no = 0 + (3 * ($page - 1));

                                    foreach ($data as $key => $value) {
                                        // dd($value);
                                        $no++;
                                        $id = $value['santri_id'];
                                        // load model di view
                                        $this->MhaditsModel = new MhaditsModel();
                                        // tampung santri id dalam variabel & lempar data santri id ke model Datasama
                                        $data = $this->MhaditsModel->dataSama($id);
                                        // hitung berapa baris data di model dataSama
                                        $jml = $data->resultID->num_rows;
                                    ?>
                                        <tr>
                                            <?php

                                            if ($jml >= 1) { ?>
                                                <td rowspan="<?= $jml ?>"><?= $no ?>.</td>
                                                <td rowspan="<?= $jml ?>"><?= $value['name_santri'] ?></td>

                                                <?php

                                                foreach ($data->getResultObject() as $dt) { ?>
                                                    <td>
                                                        <code>
                                                            <?= $dt->nama_hadits ?>
                                                        </code>
                                                    </td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                                </tr>

                            <?php }  ?>

                                </tbody>
                            </table>

                            <div class="float-left">
                                <i>Showing <?= 1 + (3 * ($page - 1)) ?> to <?= $no - 0 ?> of <?= $pager->getTotal()  ?> entries</i>
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