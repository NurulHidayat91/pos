<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Penjualan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Data penjualan</a></li>
                    <li class="breadcrumb-item active">Penjualan</li>
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

                    </div>

                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-striped>" id="example1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Total Harga</th>
                                    <th> Total Qty</th>
                                    <th>Total Belanja</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($sale_data as $key => $value) { ?>
                                    <tr>
                                        <td style="width : 5%"><?= $no++ ?></td>
                                        <td><?= $value->name_user ?></td>
                                        <td><?= indo_currency($value->total_price) ?></td>
                                        <td><?= $value->sold ?></td>
                                        <td><?= indo_currency($value->total_belanja) ?></td>

                                        <td class="text-center" width=120px>
                                            <a href="<?= site_url() ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>Detail</a>
                                            <a id="btn-hapus" href="<?= site_url() ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>Delete</a>

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