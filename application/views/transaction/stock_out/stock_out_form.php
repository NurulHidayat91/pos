<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h5>Form Barang Keluar</h5>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Transaction</a></li>
                    <li class="breadcrumb-item active">Stock Out</li>
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
                    <a href="<?= site_url('stock/out') ?>" class="btn btn-primary float-right btn-sm"><i class="fa fa-undo"></i>Back</a>
                </div>



                <div class="row h-100 justify-content-center align-items-center">
                    <div class="col-md-6">
                        <div class="card-body">
                            <!-- <?= validation_errors() ?> -->
                            <form method="post" action="<?= site_url('stock/proses') ?>">
                                <div class="form-group">
                                    <label>Tanggal *</label>
                                    <input type="date" class="form-control" name="date" value="<?= date('Y-m-d') ?>" required>

                                </div>

                                <div class="form-group">
                                    <label for="barcode">Barcode *</label>
                                </div>

                                <div class="form-group input-group">
                                    <input type="hidden" class="form-control" name="item_id" id="item_id">
                                    <input type="text" class="form-control" name="barcode" id="barcode" required autofocus>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>

                                <div class="form-group">
                                    <label>Nama Item *</label>
                                    <input type="text" class="form-control" name="item_name" id="item_name" readonly>

                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <label for="unit_name">Satuan/Unit</label>
                                            <input type="text" class="form-control" name="unit_name" id="unit_name" value="-" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="stock">Initial Stock</label>
                                            <input type="text" class="form-control" name="stock" id="stock" value="-" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Keterangan *</label>
                                    <input type="text" class="form-control" name="detail" placeholder="Tambahan/ etc" required>

                                </div>

                                <div class="form-group">
                                    <label>QTY *</label>
                                    <input type="number" class="form-control" name="qty" placeholder="QTY" required>

                                </div>

                                <div class="form-group">
                                    <button type="submit" name="out_add" class="btn btn-primary btn-flat"><i class="fa fa-paper-plane"> Simpan</i></button>
                                    <button type="reset" class="btn btn-danger btn-flat">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="modal-item">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Select Product Item</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped>" id="example1">
                    <thead>
                        <tr class="text-center">
                            <th>Barcode</th>
                            <th>Nama</th>
                            <th>Satuan/Unit</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($item as $key => $value) { ?>
                            <tr class="text-center">
                                <td><?= $value->barcode ?></td>
                                <td><?= $value->name ?></td>
                                <td><?= $value->unit_name ?></td>
                                <td><?= indo_currency($value->price) ?></td>
                                <td><?= $value->stock ?></td>
                                <td>
                                    <button class="btn btn-info btn-xs" id="select" data-id="<?= $value->item_id ?>" data-barcode="<?= $value->barcode ?>" data-name="<?= $value->name ?>" data-unit="<?= $value->unit_name ?>" data-stock="<?= $value->stock ?>">
                                        <i class="fa fa-check">Select</i>
                                    </button>
                                </td>
                            <?php } ?>
                    </tbody>

                </table>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script>
    $(document).ready(function() {
        $(document).on('click', '#select', function() {
            var item_id = $(this).data('id');
            var barcode = $(this).data('barcode');
            var name = $(this).data('name');
            var unit_name = $(this).data('unit');
            var stock = $(this).data('stock');

            $('#item_id').val(item_id);
            $('#barcode').val(barcode);
            $('#item_name').val(name);
            $('#unit_name').val(unit_name);
            $('#stock').val(stock);
            $('#modal-item').modal('hide');


        })

    })
</script>