<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h5>Form <?= ucfirst($page) ?> Supplier</h5>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Pengguna</a></li>
                    <li class="breadcrumb-item active">Supplier</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="<?= site_url('supplier') ?>" class="btn btn-primary float-right btn-sm"><i class="fa fa-undo"></i>Back</a>
                </div>



                <div class="row h-100 justify-content-center align-items-center">
                    <div class="col-md-6">
                        <div class="card-body">
                            <!-- <?= validation_errors() ?> -->
                            <form method="post" action="<?= site_url('supplier/proses') ?>">
                                <div class="form-group">
                                    <label>Nama Supplier *</label>
                                    <input type="hidden" class="form-control" name="id" value="<?= $row->supplier_id ?>">
                                    <input type="text" class="form-control" name="supplier_name" value="<?= $row->name ?>" required>

                                </div>
                                <div class="form-group">
                                    <label>No.Telp *</label>
                                    <input type="text" class="form-control" name="phone" value="<?= $row->phone ?>" required>

                                </div>
                                <div class="form-group">
                                    <label>Nama Supplier *</label>
                                    <textarea class="form-control" name="alamat" required><?= $row->address ?></textarea>

                                </div>

                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea class="form-control" name="desc"><?= $row->description ?></textarea>

                                </div>

                                <div class="form-group">
                                    <button type="submit" name="<?= $page ?>" class="btn btn-primary btn-flat"><i class="fa fa-paper-plane"> Simpan</i></button>
                                    <button type="reset" class="btn btn-danger btn-flat">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>




            </div>
        </div>
    </div>

    <!-- /.row -->
    <!-- /.container-fluid -->
</section>