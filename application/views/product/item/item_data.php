<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Items</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Item Barang</a></li>
                    <li class="breadcrumb-item active">Item</li>
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
                        <a href="<?= site_url('item/add') ?>" class="btn btn-primary float-right btn-sm"><i class="fa fa-item-plus"></i>Create</a>

                    </div>

                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-striped>" id="example">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Barcode</th>
                                    <th>Nama</th>
                                    <th>kategori</th>
                                    <th>Unit</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Image</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <?php
                                $no = 1;
                                foreach ($item as $key => $value) { ?>
                                    <tr>
                                        <td style="width : 5%"><?= $no++ ?></td>
                                        <td>
                                            <?= $value->barcode ?><br>
                                            <a href="<?= site_url('item/barcode_qrcode/' . $value->item_id) ?>" class="btn btn-default btn-xs">Generate <i class="fa fa-barcode"></i></a>

                                        </td>
                                        <td><?= $value->name ?></td>
                                        <td><?= $value->category_name ?></td>
                                        <td><?= $value->unit_name ?></td>
                                        <td><?= $value->price ?></td>
                                        <td><?= $value->stock ?></td>
                                        <td>
                                            <?php if ($value->image != null) {?>
                                                 <img src="<?= base_url('uploads/product/' .$value->image)?>" style="width:100px"  >

                                            <?php }else {?>
                                                <img src="<?= base_url('uploads/default.jpg')?>" style="width:50px"  >

                                            <?php } ?>
                                        </td>

                                        <td class="text-center" width=120px>
                                            <a href="<?= site_url('item/edit/' . $value->item_id) ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>Edit</a>
                                            <a onclick="return confirm('Apakah anda yakin??')" href="<?= site_url('item/delete/' . $value->item_id) ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>Delete</a>

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
        $(function() {
            $("#example").DataTable({
                "responsive": true,
                "autoWidth" : false,
                "processing": true,
                "serverSide": true,
                "ajax":{
                    "url"     :'<?=site_url('item/get_ajax')?>',
                    "type"    : 'POST'
                },

                "columnDefs"  : [
                    {
                        "targets"   : [5,6],
                        "className" : 'text-right'
                    },
                    {
                        "targets"   : [7,-1],
                        "className" : 'text-center'
                    },
                    {
                        "targets"   : [0,7,-1],
                        "orderable" : false
                    }
                ],

                "order" : []
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>