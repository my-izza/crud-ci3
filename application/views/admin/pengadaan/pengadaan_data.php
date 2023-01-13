<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Pengadaan
                    <small>Data Buku</small>
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Pengadaan</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main Content -->
<section class="content">


    <div class="card">
        <div class="card-header">

            <div class="box">

                <div class="box-header">
                    <h3 class="box-title"> Data buku </h3>
                </div>


                <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th> NO </th>
                                <th> ID BUKU </th>
                                <th> NAMA BUKU </th>
                                <th> PENERBIT </th>
                                <th> STOK </th>
                                <th> TAHUN </th>
                                <th> GAMBAR </th>
                                <th> ACTION </th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            $no = 1;

                            foreach ($buku as $rows) : ?>

                                <tr>
                                    <td><?= $no++ ?>.</td>
                                    <td><?= $rows->id_buku ?></td>
                                    <td><?= $rows->nama_buku ?></td>
                                    <td><?= $rows->nama_penerbit ?></td>
                                    <td><?= $rows->stok ?></td>
                                    <td><?= $rows->tahun ?></td>
                                    <td>
                                        <?php if ($rows->gambar != null) { ?>
                                            <img src="<?= base_url() . '/images/uploads/' . $rows->gambar ?>" style="width: 100px;" alt="">
                                        <?php } ?>

                                    </td>
                                    <td class="text-center" width="160px">
                                        <a href="<?= site_url('administrator/buku/detailBuku/' . $rows->id_buku) ?>" class="btn btn-success btn-xs"><i class="fa fa-search"> </i> Detail Buku </a>

                                        <?php if ($rows->stok < 20) { ?>
                                            <a href="<?= site_url('administrator/pengadaan/edit/') . $rows->id_buku ?>" class="btn btn-warning btn-xs"><i class="fa fa-plus"> </i> Tambah Stok Buku </a>
                                        <?php } ?>
                                    </td>
                                </tr>

                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</section>


<!-- Menampilkan Modal -->
<!-- <div class="modal fade" id="modal-item">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Detail Buku</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body">
                Default box -->
<!-- <div class="card card-solid">
                    <div class="card-body">

                        <?php foreach ($buku as $rows) : ?>

                            <div class="row">
                                <div class="col-8 col-sm-2">
                                    <h3 class="d-inline-block d-sm-none"><?= $rows->nama_buku ?></h3>
                                    <div class="col-12">
                                        <img src="<?= base_url() . '/images/uploads/' . $rows->gambar ?>" class="product-image" alt="Product Image">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <h3 class="my-3"><?= $rows->nama_buku ?></h3>
                                    <div class="row mt-4">
                                        <nav class="w-100">
                                            <div class="nav nav-tabs" id="product-tab" role="tablist">
                                                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Harga</a>
                                                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Stok</a>
                                                <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Detail</a>
                                            </div>
                                        </nav>
                                        <div class="tab-content p-3" id="nav-tabContent">
                                            <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">Rp <?= number_format($rows->harga, 0, ',' . ',00')  ?></div>
                                            <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"><?= $rows->stok ?></div>
                                            <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab"><?= $rows->detail ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        <?php endforeach; ?>
                    </div> -->
<!-- /.card-body -->
<!-- </div> -->
<!-- /.card -->
<!-- </div>
        </div>
    </div>
</div> -->