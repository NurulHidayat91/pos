<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Stock Out</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Stock Barang</a></li>
                    <li class="breadcrumb-item active">stock</li>
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
                        <a href="<?= site_url('stock/out/add') ?>" class="btn btn-primary float-right btn-sm"><i class="fa fa-category-plus"></i>Create</a>

                    </div>

                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-striped>" id="example1">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Barcode</th>
                                    <th>Produk Item</th>
                                    <th>Qty</th>
                                    <th>Keterangan</th>
                                    <th>Tanggal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($row as $key => $value) { ?>
                                    <tr class="text-center">
                                        <td style="width : 5%"><?= $no++ ?></td>
                                        <td><?= $value->barcode ?></td>
                                        <td><?= $value->item_name ?></td>
                                        <td><?= $value->qty ?></td>
                                        <td><?= $value->detail ?></td>
                                        <td><?= indo_date($value->date) ?></td>
                                        <td class="text-center" width=120px>
                                            <a id="set_dtl" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal-detail" 
                                            data-barcode="<?= $value->barcode ?>"
                                            data-itemname="<?= $value->item_name ?>" 
                                            data-suppliername="<?= $value->supplier_name ?>" 
                                            data-qty="<?= $value->qty ?>" 
                                            data-date="<?= indo_date($value->date) ?>" 
                                            data-detail="<?= $value->detail ?>">

                                                <i class="fa fa-eye"></i> Detail</a>
                                            <a onclick="return confirm('Apakah anda yakin??')" href="<?= site_url('stock/out/delete/' . $value->stock_id . '/' . $value->item_id) ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>

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

<div class="modal fade" id="modal-detail">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Stock In Detail</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered no-margin">
                    <thead>
                        <tr>
                            <th style="width: 40%">Barcode</th>
                            <td><span id="barcode"></span></td>
                        </tr>
                        <tr>
                            <th style="width: 40%">Nama Item</th>
                            <td><span id="item_name"></span></td>
                        </tr>
                        <tr>
                            <th style="width: 40%">Detail</th>
                            <td><span id="detail"></span></td>
                        </tr>
                        <tr>
                            <th style="width: 40%">Supplier</th>
                            <td><span id="supplier_name"></span></td>
                        </tr>
                        <tr>
                            <th style="width: 40%">QTY</th>
                            <td><span id="qty"></span></td>
                        </tr>
                        <tr>
                            <th style="width: 40%">Date</th>
                            <td><span id="date"></span></td>
                        </tr>

                    </thead>
                </table>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>
    $(document).ready(function() {
        $(document).on('click', '#set_dtl', function() {
            var itemname = $(this).data('itemname');
            var barcode = $(this).data('barcode');
            var suppliername = $(this).data('suppliername');
            var qty = $(this).data('qty');
            var date = $(this).data('date');
            var detail = $(this).data('detail');

            $('#item_name').text(itemname);
            $('#barcode').text(barcode);
            $('#supplier_name').text(suppliername);
            $('#qty').text(qty);
            $('#date').text(date);
            $('#detail').text(detail);

        })

    })
</script>