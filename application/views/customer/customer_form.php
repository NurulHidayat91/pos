<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Form <?=ucfirst($page)?> Customers</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Pelanggan</a></li>
                    <li class="breadcrumb-item active">Customers</li>
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
                    <a href="<?= site_url('customer') ?>" class="btn btn-primary float-right btn-sm"><i class="fa fa-undo"></i>Back</a>
                </div>



                <div class="row h-100 justify-content-center align-items-center">
                    <div class="col-md-6">
                        <div class="card-body">
                            <!-- <?= validation_errors() ?> -->
                            <form method="post" action="<?= site_url('customer/proses') ?>">
                                <div class="form-group">
                                    <label>Nama customer *</label>
                                    <input type="hidden" class="form-control" name="id" value="<?= $row->customer_id ?>">
                                    <input type="text" class="form-control" name="customer_name" value="<?= $row->name ?>" required>
                                </div>

                                <div class="form-group">
                                    <label>Jenis Kelamin *</label>
                                    <select class="form-control" name="gender">
                                        <option value="">--Pilih--</option>
                                        <option value="L"<?= $row->gender == 'L' ? 'selected' : ''?>">Laki-Laki</option>
                                        <option value="P"<?= $row->gender == 'P' ? 'selected' : ''?> ">Perempuan</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>No.Telp *</label>
                                    <input type="text" class="form-control" name="phone" value="<?= $row->phone ?>" required>

                                </div>
                                <div class="form-group">
                                    <label>Alamat *</label>
                                    <textarea class="form-control" name="alamat" required><?= $row->address ?></textarea>

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