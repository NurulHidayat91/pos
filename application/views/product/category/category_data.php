<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Categories</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Kategori Barang</a></li>
                    <li class="breadcrumb-item active">Kategori</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
         <?php
        //   $this->load->view('message');
        ?> 

        <div id="flash" data-flash= "<?= $this->session->flashdata('success'); ?>"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="<?= site_url('category/add') ?>" class="btn btn-primary float-right btn-sm"><i class="fa fa-category-plus"></i>Create</a>

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
                                foreach ($category as $key => $value) { ?>
                                    <tr>
                                        <td style="width : 5%"><?= $no++ ?></td>
                                        <td><?= $value->name ?></td>
                                        <td class="text-center" width=120px>
                                            <a href="<?= site_url('category/edit/' . $value->category_id) ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>Edit</a>
                                            <a id="btn-hapus" href="<?= site_url('category/delete/' . $value->category_id) ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>Delete</a>

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