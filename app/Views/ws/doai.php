<?= $this->extend('layout/default') ?>

<?= $this->section('title'); ?>
<title>Home Page &mdash; Simon</title>
<?= $this->endSection(); ?>


<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <h1>Blank Page</h1>
    </div>

    <div class="section-body">

        <div class="alert alert-primary alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismis="alert">
                    x
                </button>
                <code><b>Search santri</b></code>
                <br>
                Silahkan cari doa berdasarkan nama santri
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4> Data doa </h4>
                        <div class="card-header-action">
                            <a href="/ws/Doa" class="btn btn-info"><i class="fa fa-spinner"> Refresh</i></a>
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
                                        <th>Name Santri </th>
                                        <th>Jumlah Hafalan Hadits</th>
                                        <th>
                                            <center>
                                                Action
                                            </center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php

                                    use App\Models\MdoaModel;

                                    $this->MdoaModel = new MdoaModel();

                                    if (isset($_GET['keyword'])) {
                                        $cari = $_GET['keyword'];
                                        $data = $this->MdoaModel->search(10, $cari);
                                        $page = isset($_GET['page']) ?  $_GET['page'] :  1;

                                        $no = 1 + (3 * ($page - 1));
                                        foreach ($data['mhadits'] as $value) {
                                    ?>

                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $value['name_santri']; ?></td>
                                                <td>
                                                    <code>
                                                        <?= $value['count(*)']; ?>
                                                        hadits
                                                    </code>
                                                </td>
                                                <td>
                                                    <center>
                                                        <a href="/ws/Doa/<?= $value['santri_id'] ?>" class="btn btn-warning btn-sm"> <i class="fas fa-eye"></i> Read</a>
                                                    </center>
                                                </td>
                                            </tr>

                                    <?php }
                                    } ?>
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