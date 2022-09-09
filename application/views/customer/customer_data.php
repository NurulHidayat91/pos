<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Customers</h1>
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="<?= site_url('customer/add') ?>" class="btn btn-primary float-right btn-sm"><i class="fa fa-customer-plus"></i>Create</a>

                    </div>

                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-striped>" id="table-customer">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>No.Telp</th>
                                    <th>Alamat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <?php
                                $no = 1;
                                foreach ($customer as $key => $value) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $value->name ?></td>
                                        <td><?= $value->gender ?></td>
                                        <td><?= $value->phone ?></td>
                                        <td><?= $value->address ?></td>
                                        <td class="text-center" width=120px>
                                            <a href="<?= site_url('customer/edit/' . $value->customer_id) ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>Edit</a>
                                            <a onclick="return confirm('Apakah anda yakin??')" href="<?= site_url('customer/delete/' . $value->customer_id) ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>Delete</a>

                                        </td>

                                    </tr>
                                <?php  } ?> -->

                            </tbody>
                        </table>

                    </div>



                </div>
            </div>
        </div>

        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

<script>
    
        $('#table-customer').DataTable({
            "processing" : true,
            "serverSide" : true,
            "order"      : [],
            "ajax"       : {
                "url"    :"<?=site_url('pelanggan/get_json')?>",
                "type"   : "POST"
            },
            "columns"    : [
                {"data"  : "no", width:40},
                {"data"  : "name", width:150},
                {"data"  : "gender", width:70},
                {"data"  : "phone", width:120},
                {"data"  : "address", width:150},
                {"data"  : "action", width:100},
            ],
            "columnsDefs" : [
                {"targets" : [0,5], "orderable" : false},
                {"targets" : [2,-1], "className" : "text-center"},
                
            ]
        })
    
</script>