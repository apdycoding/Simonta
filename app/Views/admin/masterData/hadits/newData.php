<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Surah Page &mdash; Simon</title>
<?= $this->endSection(); ?>

<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="/admin/datahadits" class="btn btn-primary btn-sm"> <i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Create data hafalan</h1>
    </div>


    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header" class="float-right">
                        <a href="/admin/Datahadits/new">
                            <h4> Input data Hadits</h4>
                        </a>
                    </div>
                    <div class="card-body">

                        <div class="alert alert-info alert-dismissible show fade">
                            <div class="alert-body">
                                <button class="close" data-dismis="alert">
                                    x
                                </button>
                                <code><b>validasi hadits</b></code>
                                Data hadits yang sudah dipilih <code> tidak bisa dipilih kembali</code>
                            </div>
                        </div>

                        <form action="/admin/Datahadits/create" method="post" autocomplete="off" enctype="multipart/form-data">

                            <?= csrf_field() ?>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Nama anak<code>*</code></label>

                                    <!-- <input type="text" name="santri_id" value="<?= old('santri_id') ?>" placeholder="nama penguji " class="form-control <?= $validation->hasError('santri_id') ? 'is-invalid' : '' ?>"> -->

                                    <select name="santri_id" id="santri_id" class="form-control select2 <?= $validation->hasError('santri_id') ? 'is-invalid' : '' ?>">
                                        <option value=""> - Cari nama anak -</option>
                                        <?php foreach ($names as $ns) : ?>
                                            <option value="<?= $ns['santri_id']; ?>"> <?= $ns['name_santri']; ?> </option>
                                        <?php endforeach; ?>
                                    </select>

                                    <div class="invalid-feedback">
                                        <?= $validation->getError('santri_id'); ?>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Nama hadits<code>*</code></label>

                                    <select id="dhadits_id" name="dhadits_id" class="form-control select2 <?= $validation->hasError('dhadits_id') ? 'is-invalid' : '' ?>">
                                        <option value="" selected>- Pilih nama hadits -</option>
                                    </select>

                                    <div class="invalid-feedback">
                                        <?= $validation->getError('dhadits_id'); ?>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Tanggal Ujian<code>*</code></label>

                                    <input type="date" name="htgl_ujian" class="form-control <?= $validation->hasError('htgl_ujian') ? 'is-invalid' : null ?>" value="<?= old('htgl_ujian') ?>" id="">

                                    <div class="invalid-feedback">
                                        <?= $validation->getError('htgl_ujian'); ?>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Predikat Ujian<code>*</code></label>

                                    <input type="text" name="predikat" class="form-control <?= $validation->hasError('predikat') ? 'is-invalid' : null ?>" value="<?= old('predikat') ?>" id="">

                                    <div class="invalid-feedback">
                                        <?= $validation->getError('predikat'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label>Penguji<code>*</code></label>

                                <select name="penguji_id" class="form-control <?= $validation->hasError('penguji_id') ? 'is-invalid' : '' ?>" id="">

                                    <option value=""> - Pilih - </option>
                                    <?php foreach ($penguji as $key => $value) : ?>

                                        <option value="<?= $value['penguji_id'] ?>"> - <?= $value['nama_penguji'] ?> - </option>

                                    <?php endforeach; ?>
                                </select>

                                <div class="invalid-feedback">
                                    <?= $validation->getError('penguji_id') ?>
                                </div>
                            </div>


                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary mr-1"><i class="fa fa-paper-plane"></i> Save</button>

                                <button type="reset" class="btn btn-secondary"> <i class="fa fa-eraser"></i> Reset</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    </div>
</section>

<script type="text/javascript">
    $(document).ready(function() {
        // // $("#santri_id").hide();
        // $("#dhadits_id").hide();

        loaddhadits_id();
    });

    // deskripsikan csrf dan hahs token
    let csrfToken = "<?= csrf_token() ?>";
    let csrfHash = "<?= csrf_hash() ?>";

    function loaddhadits_id() {
        // ambil nilai dari santri_id

        // jika santri id di change
        $("#santri_id").change(function() {
            var getSantri_id = $("#santri_id").val();

            $.ajax({
                type: "post",
                dataType: 'json',

                url: "<?= base_url() ?>/admin/Datahadits/getDataSantri",
                data: {
                    [csrfToken]: csrfHash,
                    santri_id: getSantri_id
                },

                // jika
                success: function(data) {
                    // console.log(data);

                    var html = '';
                    var i;

                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].dhadits_id + '>' + data[i].nama_hadits + '</option>';
                    }
                    $('#dhadits_id').html(html);
                }
            });
        });
    }
</script>

<?= $this->endSection() ?>