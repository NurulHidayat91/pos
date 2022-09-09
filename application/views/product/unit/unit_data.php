<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Unit Barang</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Unit Barang</a></li>
                    <li class="breadcrumb-item active">Unit</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <?php $this->load->view('message');
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="<?= site_url('unit/add') ?>" class="btn btn-primary float-right btn-sm"><i class="fa fa-unit-plus"></i>Create</a>

                    </div>

                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-striped>" id="example1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($unit as $key => $value) { ?>
                                    <tr>
                                        <td style="width : 5%"><?= $no++ ?></td>
                                        <td><?= $value->name ?></td>
                                        <td class="text-center" width=120px>
                                            <a href="<?= site_url('unit/edit/' . $value->unit_id) ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>Edit</a>
                                            <a onclick="return confirm('Apakah anda yakin??')" href="<?= site_url('unit/delete/' . $value->unit_id) ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>Delete</a>

                                        </td>

                                    </tr>
                                <?php  } ?>

                            </tbody>
                        </table>

                    </div>



                </div>
            </div>
        </div>

        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>