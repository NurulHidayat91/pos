<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Sale Report</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Laporan Penjualan</a></li>
                    <li class="breadcrumb-item active">Sales</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">

    <div class="card">
        <div class="card-header with-border">
            <h3 class="card-title"> Filter Data</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="">
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-6 control-label">Date</label>
                                <div class="col-sm-9">
                                    <input type="date" name="date1" value="<?=@$post['date1']?>" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">s/d</label>
                                <div class="col-sm-9">
                                    <input type="date" name="date2" class="form-control" value="<?=@$post['date2']?>">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Customer</label>
                                <div class="col-sm-9">
                                    <select name="customer" class="form-control">
                                        <option value="">--All--</option>
                                        <option value="null" <?=$post['customer'] == 'null' ? 'selected' : '' ?>>Umum</option>
                                        <?php foreach ($customer as $key => $value) { ?>
                                            <option value="<?= $value->customer_id ?>" <?=@$post['customer'] == $value->customer_id ? 'selected' : '' ?>><?= $value->name ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                        <div class="col-md-4">
                                <div class="form-horizontal">
                                    <div class="form-group">
                                        <label class="col-sm-6 control-label">Invoice</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="invoice" value="<?=@$post['invoice']?>" class="form-control">
                                        </div>
                                    </div>
                                </div>
                        </div>
                </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="float-right">
                        <button type="submit" name="reset" class="btn btn-flat">Reset</button>
                        <button type="submit" name="filter" class="btn btn-info btn-flat"><i class="fa fa-search"></i>Filter</button>
                    </div>
                </div>
            </div>
        </form>   
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                    </div>

                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-striped>">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Invoice</th>
                                    <th>Tanggal</th>
                                    <th>Customer</th>
                                    <th>Total</th>
                                    <th>Discount</th>
                                    <th>Grand Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = $this->uri->segment(3) ? $this->uri->segment(3) + 1 : 1;
                                foreach ($row->result() as $key => $value) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $value->invoice ?></td>
                                        <td><?= indo_date($value->date) ?></td>
                                        <td><?= $value->customer_id == null ? "Umum" : $value->customer_name ?></td>
                                        <td><?= indo_currency($value->total_price) ?></td>
                                        <td><?= indo_currency($value->discount) ?></td>
                                        <td><?= indo_currency($value->final_price) ?></td>
                                        <td class="text-center" width=190px>
                                            <button class="btn btn-info btn-xs" id="detail" data-target="#modal-detail" data-toggle="modal" data-invoice="<?= $value->invoice ?>" data-date="<?= indo_date($value->date) ?>" data-time="<?= substr($value->sale_created, 11, 5) ?>" data-customer="<?= $value->customer_id == null ? "Umum" : $value->customer_name ?>" data-total="<?= indo_currency($value->total_price) ?>" data-discount="<?= indo_currency($value->discount) ?>" data-grandtotal="<?= indo_currency($value->final_price) ?>" data-cash="<?= indo_currency($value->cash) ?>" data-remaining="<?= indo_currency($value->remaining) ?>" data-note="<?= $value->note ?>" data-cashier="<?= ucfirst($value->user_name) ?>" data-saleid="<?= $value->sale_id ?>">Detail</button>
                                            <a href="<?= site_url('sale/cetak/' . $value->sale_id) ?>" class="btn btn-primary btn-xs" target="_blank"><i class="fa fa-print"></i>Print</a>
                                            <a onclick="return confirm('Apakah anda yakin??')" href="<?= site_url('sale/del/' . $value->sale_id) ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>Delete</a>

                                        </td>

                                    </tr>
                                <?php  } ?>

                            </tbody>
                        </table>

                    </div>

                    <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm no-margin pull-right">
                            <?= $pagination ?>
                        </ul>
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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Sales Report Detail</h4>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered no-margin">
                    <tbody>
                        <tr>
                            <th style="width:20%">Invoice</th>
                            <td style="width:30%"><span id="invoice"></span></td>
                            <th style="width:20%">Customer</th>
                            <td style="width:30%"><span id="cust"></span></td>
                        </tr>
                        <tr>
                            <th>Date Time</th>
                            <td><span id="datetime"></span></td>
                            <th>Cashier</th>
                            <td><span id="cashier"></span></td>
                        </tr>
                        <tr>
                            <th>Total</th>
                            <td><span id="total"></alspan>
                            </td>
                            <th>Cash</th>
                            <td><span id="cash"></span></td>
                        </tr>
                        <tr>
                            <th>Discount</th>
                            <td><span id="discount"></span></td>
                            <th>Change</th>
                            <td><span id="change"></span></td>
                        </tr>
                        <tr>
                            <th>Grand Total</th>
                            <td><span id="grandtotal"></span></td>
                            <th>Note</th>
                            <td><span id="note"></span></td>
                        </tr>
                        <tr>
                            <th>Product</th>
                            <td colspan="3"><span id="product"></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).on('click', '#detail', function() {
        $('#invoice').text($(this).data('invoice'))
        $('#cust').text($(this).data('customer'))
        $('#datetime').text($(this).data('date') + ' ' + $(this).data('time'))
        $('#total').text($(this).data('total'))
        $('#discount').text($(this).data('discount'))
        $('#change').text($(this).data('remaining'))
        $('#grandtotal').text($(this).data('grandtotal'))
        $('#note').text($(this).data('note'))
        $('#cashier').text($(this).data('cashier'))
        $('#cash').text($(this).data('cash'))

        var product = '<table class="table no-margin">'
        product += '<tr><th>Item</th><th>Price</th><th>Qty</th><th>Disc</th><th>Total</th></tr>'
        $.getJSON('<?= site_url('report/sale_product/') ?>' + $(this).data('saleid'), function(data) {
            $.each(data, function(key, val) {
                product += '<tr><td>' + val.name + '</td><td>' + val.detail_price + '</td><td>' + val.qty + '</td><td>' + val.discount_item + '</td><td>' + val.total + '</td></tr>'
            })
            product += '</table>'
            $('#product').html(product)
        })


    })
</script>