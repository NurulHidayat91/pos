<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h5>Form <?= ucfirst($page) ?> category</h5>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Kategori Barang</a></li>
                    <li class="breadcrumb-item active">Category</li>
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
                    <a href="<?= site_url('category') ?>" class="btn btn-primary float-right btn-sm"><i class="fa fa-undo"></i>Back</a>
                </div>



                <div class="row h-100 justify-content-center align-items-center">
                    <div class="col-md-6">
                        <div class="card-body">
                            <!-- <?= validation_errors() ?> -->
                            <form method="post" action="<?= site_url('category/proses') ?>">
                                <div class="form-group">
                                    <label>Nama category *</label>
                                    <input type="hidden" class="form-control" name="id" value="<?= $row->category_id ?>">
                                    <input type="text" class="form-control" name="category_name" value="<?= $row->name ?>" required>

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