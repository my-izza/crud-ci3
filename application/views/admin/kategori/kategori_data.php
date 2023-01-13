<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Kategori
                    <small>Data Kategori</small>
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Kategori</li>
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
                    <h3 class="box-title"> Data Kategori </h3>
                    <div class="pull-right">
                        <a href="<?= site_url('administrator/kategori/add') ?>" class="btn btn-primary btn-flat mb-3" style="float: right;"><i class="fa fa-plus"></i> Tambah Kategori</a>
                    </div>
                </div>

                <form action="<?= site_url('administrator/kategori/search') ?>" class="search-form" method="post">
                    <div class="input-group input-group-md col-md-8">
                        <input type="text" class="form-control" id="search-box" name="keyword" placeholder="masukkan kategori">
                        <span class="input-group-append">
                            <button type="submit" name="submit" class="btn btn-secondary btn-flat"> Cari </button>
                        </span>
                    </div>
                </form>

                <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th> NO </th>
                                <th> NAMA </th>
                                <th> ACTION </th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            $no = 1;

                            foreach ($row->result() as $key => $data) { ?>

                                <tr>
                                    <td><?= $no++ ?>.</td>
                                    <td><?= $data->nama ?></td>
                                    <td class="text-center" width="160px">
                                        <a href="<?= site_url('administrator/kategori/edit/' . $data->id_kategori) ?>" onclick="return confirm('Yakin ubah Produk')" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Ubah </a>
                                        <a href="<?= site_url('administrator/kategori/del/' . $data->id_kategori) ?>" onclick="return confirm('Yakin hapus Produk')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus </a>
                                    </td>
                                </tr>

                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</section>