<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Penjualan</h1>
            </div>
            <div class="row">
                <div id="my_camera"></div>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Transaction</a></li>
                    <li class="breadcrumb-item active">Penjualan</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">

    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <table>
                        <tr>
                            <td style="vertical-align:top">
                                <label for="date">Date</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="date" id="date" value="<?= date('Y-m-d') ?>" class="form-control">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td style="vertical-align:top; width:30%">
                                <label for="user">Kasir</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="user" value="<?= $this->fungsi->user_login()->name ?>" readonly>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td style="vertical-align: top">
                                <label for="user">Customer</label>
                            </td>
                            <td>
                                <div>
                                    <select id="customer" class="form-control">
                                        <option value="">Umum</option>
                                        <?php foreach ($customer as $key => $value) {
                                            echo '<option value="' . $value->customer_id . '">' . $value->name . '</option>';
                                        } ?>
                                    </select>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align:top; width:30%">
                                <label for="barcode">Barcode</label>
                            </td>

                            <td>
                                <div class="form-group input-group">
                                    <input type="hidden" id="item_id">
                                    <input type="hidden" id="price">
                                    <input type="hidden" id="stock">
                                    <input type="hidden" id="qty_cart">
                                    <input type="text" id="barcode" class="form-control" autofocus>
                                    <input type="button" value="Scan" onclick="setup()">

                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>

                            </td>
                        </tr>

                        <tr>
                            <td style="vertical-align:top;">
                                <label for="qty">QTY</label>
                            </td>
                            <td>
                                <div>
                                    <input type="number" id="qty" value="1" min="1" class="form-control">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td></td>
                            <td>
                                <div class="mt-2">
                                    <button type="button" id="add_cart" class="btn btn-primary">
                                        <i class="fa fa-cart-plus"></i> Add

                                    </button>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card ">
                <div class="card-body">
                    <div>
                        <h4>Invoice <b><span id="invoice"><?= $invoice ?></span></b></h4>
                        <h1><b><span id="grand_total2" style="front-size:50pt">0</span></b></h1>
                    </div>
                </div>
            </div>
        </div>

    </div>




    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Barcode</th>
                                <th>Product Item</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th width="20%">Discount Item</th>
                                <th width="15%">Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody id="cart_table">

                            <?php $this->view('transaction/sale/cart_data') ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <table>
                        <tr>
                            <td style="vertical-align:top">
                                <label for="sub_total">Sub Total</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="sub_total" value="" class="form-control" readonly>

                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td style="vertical-align:top">
                                <label for="discount">Discount</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="discount" value="0" min="0" class="form-control">

                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top">
                                <label for="grand_total">Grand Total</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="grand_total" class="form-control" readonly>

                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <table>
                        <tr>
                            <td style="vertical-align:top; width:30%">
                                <label for="cash">Cash</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="cash" value="0" min="0" class="form-control">

                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td style="vertical-align:top; width:30%">
                                <label for="change">Change</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="change" class="form-control" readonly>

                                </div>
                            </td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <table>
                        <tr>
                            <td style="vertical-align:top">
                                <label for="note">Note</label>

                            </td>
                            <td>
                                <div class="form-group">
                                    <textarea id="note" rows="3" class="form-control"></textarea>

                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div>
                <button id="cancel_payment" class="btn btn-flat btn-warning">
                    <i class="icon-refresh"></i> Cancel
                </button><br><br>
                <button id="process_payment" class="btn btn-flat btn-lg btn-success">
                    <i class="fas fa-paper-plane-o"></i> Process Payment
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Modal Add produk item -->
<div class="modal fade" id="modal-item">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Product Item</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped" id="example1">
                    <thead>
                        <tr>
                            <th>Barcode</th>
                            <th>Name</th>
                            <th>Unit</th>
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
                                    <button class="btn btn-info btn-xs" id="select" data-id="<?= $value->item_id ?>" data-barcode="<?= $value->barcode ?>" data-price="<?= $value->price ?>" data-stock="<?= $value->stock ?>">
                                        <i class="fa fa-check">Select</i>
                                    </button>
                                </td>
                            <?php } ?>
                    </tbody>
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

<!-- Modal Edit produk item -->
<div class="modal fade" id="modal-item-edit">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Product Item</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <input type="hidden" id="cartid_item">
                <div class="form-group">
                    <label for="product_item">Product Item</label>
                    <div class="row">
                        <div class="col-md-5">
                            <input type="text" id="barcode_item" class="form-control" readonly>
                        </div>
                        <div class="col-md-7">
                            <input type="text" id="product_item" class="form-control" readonly>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="price_item">Price</label>
                    <input type="number" id="price_item" min="0" class="form-control">
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-7">
                            <label for="qty_item">Qty</label>
                            <input type="number" id="qty_item" min="1" class="form-control">
                        </div>
                        <div class="col-5">
                            <label for="qty_item">Stock Item</label>
                            <input type="number" id="stock_item" class="form-control" readonly>
                        </div>
                    </div>

                </div>

                <div class="form-group">
                    <label for="total_before">Total before discount</label>
                    <input type="number" id="total_before" class="form-control" readonly>
                </div>

                <div class="form-group">
                    <label for="discount_item">Discount per item</label>
                    <input type="number" id="discount_item" class="form-control">
                </div>

                <div class="form-group">
                    <label for="total_item">Total after discount</label>
                    <input type="number" id="total_item" class="form-control" readonly>
                </div>



            </div>
            <div class="modal-footer justify-content-between">
                <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                <button type="button" id="edit_cart" class="btn btn-success btn-flat"><i class="fa fa-paper-plane"></i>Save</button>
            </div>
        </div>

    </div>



    <script>
        $(document).ready(function() {
            $(document).on('click', '#select', function() {
                $('#item_id').val($(this).data('id'));
                $('#barcode').val($(this).data('barcode'));
                $('#price').val($(this).data('price'));
                $('#stock').val($(this).data('stock'));
                $('#modal-item').modal('hide');

                get_cart_qty($(this).data('barcode'))

            })

            // untuk mendapatkan qty dari cart
            function get_cart_qty(barcode) {
                $('#cart_table tr').each(function() {
                    // var qty_cart = $(this).find("td").eq(4).html(); 
                    var qty_cart = $("#cart_table td.barcode:contains('" + barcode + "')").parent().find("td").eq(4).html();
                    if (qty_cart != null) {
                        $('#qty_cart').val(qty_cart)
                    } else {
                        $('#qty_cart').val(0)

                    }
                });
            }

            $(document).on('click', '#add_cart', function() {
                var item_id = $('#item_id').val()
                // var barcode = $('#barcode').val()
                var price = $('#price').val()
                var stock = $('#stock').val()
                var qty = $('#qty').val()
                var qtyc_cart = $('#qty_cart').val()

                if (item_id == '') {
                    alert('produk belom dipilih')
                    $('#barcode').focus()
                } else if (stock < 1 || parseInt(stock) < (parseInt(qtyc_cart) + parseInt(qty))) {
                    alert('stock tidak mencukupi')
                    // $('#item_id').val('')
                    // $('#barcode').val('')
                    $('#qty').focus()

                } else {
                    $.ajax({
                        type: 'POST',
                        url: '<?= site_url() ?>sale/process',
                        data: {
                            'add_cart': true,
                            'item_id': item_id,
                            // 'barcode': barcode,
                            'price': price,
                            'qty': qty
                        },
                        dataType: 'json',

                        success: function(result) {
                            if (result.success == true) {
                                $('#cart_table').load('<?= site_url('sale/cart_data') ?>', function() {
                                    calculate()
                                })

                                $('#item_id').val('')
                                $('#barcode').val('')
                                $('#qty').val(1)
                                $('#barcode').focus()
                            } else {
                                alert('Gagal tambah item cart')
                            }
                        }
                    })
                }

            })

        })

        $(document).on('click', '#del_cart', function() {
            if (confirm('Apakah anda yakin??')) {
                var cart_id = $(this).data('cartid')
                $.ajax({
                    type: 'POST',
                    url: '<?= site_url('sale/cart_del') ?>',
                    data: {
                        'cart_id': cart_id,
                    },
                    dataType: 'json',

                    success: function(result) {
                        if (result.success == true) {
                            $('#cart_table').load('<?= site_url('sale/cart_data') ?>', function() {
                                calculate()
                            })
                        } else {
                            alert('GAGAL HAPUS CART');
                        }
                    }
                })
            }
        })

        //  EDIT PrODUCT ITEM
        $(document).on('click', '#update_cart', function() {
            $('#cartid_item').val($(this).data('cartid'));
            $('#barcode_item').val($(this).data('barcode'));
            $('#product_item').val($(this).data('price'));
            $('#stock_item').val($(this).data('stock'));
            $('#price_item').val($(this).data('price'));
            $('#qty_item').val($(this).data('qty'));
            $('#total_before').val($(this).data('price') * $(this).data('qty'));
            $('#discount_item').val($(this).data('discount'));
            $('#total_item').val($(this).data('total'));


        })

        function count_edit_modal() {
            var price = $('#price_item').val();
            var qty = $('#qty_item').val();
            var discount = $('#discount_item').val();

            total_before = price * qty
            $('#total_before').val(total_before)

            total = (price - discount) * qty
            $('#total_item').val(total)

            // if(discount == '') {
            //     $('#discount_item').val(0)
            // }
        }

        $(document).on('keyup mouseup', '#price_item, #qty_item, #discount_item', function() {
            count_edit_modal()
            // calculate()
        })



        // EDIT CART
        $(document).on('click', '#edit_cart', function() {
            var cart_id = $('#cartid_item').val()
            var price = $('#price_item').val()
            var discount = $('#discount_item').val()
            var qty = $('#qty_item').val()
            var total = $('#total_item').val()
            var stock = $('#stock_item').val()

            if (price == '' || price < 1) {
                alert('Harga tidak boleh kosong')
                $('#price_item').focus()
            } else if (qty == '' || qty < 1) {
                alert('Qty tidak boleh kosong')
                $('#qty_item').focus('')

            } else if (parseInt(qty) > parseInt(stock)) {
                alert('Stock tidak mencukupi')
                $('#qty_item').focus('')

            } else if (discount == '') {
                $('#discount_item').val(0)
            } else {
                $.ajax({
                    type: 'POST',
                    url: '<?= site_url() ?>sale/process',
                    data: {
                        'edit_cart': true,
                        'cart_id': cart_id,
                        'price': price,
                        'qty': qty,
                        'discount': discount,
                        'total': total
                    },
                    dataType: 'json',

                    success: function(result) {
                        if (result.success == true) {
                            $('#cart_table').load('<?= site_url('sale/cart_data') ?>', function() {
                                calculate()
                            })
                            alert('Data berhasil diupdate')
                            $('#modal-item-edit').modal('hide');
                        } else {
                            alert('Data gagal terupdate')
                            $('#modal-item-edit').modal('hide');

                        }
                    }
                })

            }

        })


        // MENGHITUNG DISKON DAN TOTAL BIAYA
        function calculate() {
            var subtotal = 0;
            $('#cart_table tr').each(function() {
                subtotal += parseInt($(this).find('#total').text())
            })

            isNaN(subtotal) ? $('#sub_total').val(0) : $('#sub_total').val(subtotal)

            var discount = $('#discount').val()
            var grand_total = subtotal - discount
            if (isNaN(grand_total)) {
                $('#grand_total').val(0)
                $('#grand_total2').text(0)
            } else {
                $('#grand_total').val(grand_total)
                $('#grand_total2').text(grand_total)
            }

            var cash = $('#cash').val();
            cash != 0 ? $('#change').val(cash - grand_total) : $('#change').val(0)

        }

        $(document).on('keyup mouseup', '#discount, #cash', function() {
            calculate()
        })

        $(document).ready(function() {
            calculate()
        })


        //PROSES PAYMENT

        $(document).on('click', '#process_payment', function() {
            var customer_id = $('#customer').val()
            var subtotal = $('#sub_total').val()
            var discount = $('#discount').val()
            var grandtotal = $('#grand_total').val()
            var cash = $('#cash').val()
            var change = $('#change').val()
            var note = $('#note').val()
            var date = $('#date').val()
            if (subtotal < 1) {
                alert('Belum ada product item yang dipilih')
                $('#barcode').focus()
            } else if (cash < 1) {
                alert('Jumlah uang cash belum diinput')
                $('#cash').focus()
            } else {
                if (confirm('Yakin proses transaksi ini?')) {
                    $.ajax({
                        type: 'POST',
                        url: '<?= site_url('sale/process') ?>',
                        data: {
                            'process_payment': true,
                            'customer_id': customer_id,
                            'subtotal': subtotal,
                            'discount': discount,
                            'grandtotal': grandtotal,
                            'cash': cash,
                            'change': change,
                            'note': note,
                            'date': date
                        },
                        dataType: 'json',
                        success: function(result) {
                            if (result.success) {
                                alert('Transaksi berhasil');
                                window.open('<?= site_url('sale/cetak/') ?>' + result.sale_id, '_blank');

                            } else {
                                alert('Transaksi gagal');
                            }
                            location.href = '<?= site_url('sale') ?>'
                        }
                    })
                }
            }
        })

        //CANCEL TRANSACTION

        $(document).on('click', '#cancel_payment', function() {
            if (confirm('Apakah anda yakin?')) {
                $.ajax({
                    type: 'POST',
                    url: '<?= site_url() ?>sale/cart_del',
                    data: {
                        'cancel_payment': true
                    },
                    dataType: 'json',
                    success: function(result) {
                        if (result.success == true) {
                            $('#cart_table').load('<?= site_url('sale/cart_data') ?>', function() {
                                calculate()
                            })
                        }
                    }
                })
                $('#discount').val(0)
                $('#cash').val(0)
                $('#customer').val('').change()
                $('#barcode').val('')
                $('#barcode').focus()

            }
        })


        $('#barcode').keypress(function(e) {
            var key = e.which;
            var barcode = $(this).val();
            if (key == 13) {
                $.ajax({
                    type: 'POST',
                    url: '<?= site_url() ?>sale/get_item',
                    data: {
                        'barcode': barcode
                    },
                    dataType: 'json',

                    success: function(result) {
                        if (result.success == true) {
                            $('#item_id').val(result.item.item_id);
                            $('#barcode').val('barcode');
                            $('#price').val(result.item.price);
                            $('#stock').val(result.item.stock);

                            $('#add_cart').click();
                        } else {
                            alert('produk tidak ditemukan');
                            $('#barcode').val()
                        }
                    }
                })
            }
        })


        // $(document).on('click', '#add_cart', function() {
        //     var item_id = $('#item_id').val()
        //     var barcode = $('#barcode').val()
        //     var price = $('#price').val()
        //     var stock = $('#stock').val()
        //     var qty = $('#qty').val()
        //     var qtyc_cart = $('#qty_cart').val()

        //     if (barcode == '') {
        //         alert('produk belom dipilih')
        //             $('#barcode').focus()
        //     }else { 
        //             $.ajax({
        //                 type: 'POST',
        //                 url: '<?= site_url() ?>sale/get_item',
        //                 data: {
        //                     'barcode': barcode
        //                 },
        //                 dataType: 'json',
        //                 success: function(result) {
        //                     if (result.success == true) {
        //                         $('#item_id').val(result.item.item_id);
        //                         $('#barcode').val('barcode');
        //                         $('#price').val(result.item.price);
        //                         $('#stock').val(result.item.stock);

        //                         $('#add_cart').click();
        //                     } else {
        //                         alert('produk tidak ditemukan');
        //                         $('#barcode').val()
        //                     }
        //                 }
        //             })
        //         }
            

        // })


        function setup() {
            function onScanSuccess(qrCodeMessage) {
                console.log(qrCodeMessage);
                document.getElementById('barcode').value = qrCodeMessage;


            }

            function onScanError(errorMessage) {
                //handle scan error
            }

            var html5QrcodeScanner = new Html5QrcodeScanner(
                "my_camera", {
                    fps: 10,
                    qrbox: 450
                });
            html5QrcodeScanner.render(onScanSuccess, onScanError);

        }
    </script>
    <!-- webcam -->
    <script src="<?= base_url() ?>assets/js/webcam/webcam.js"></script>
    <script src="<?= base_url() ?>assets/js/webcam/webcam.min.js"></script>

    <!-- webcam -->
    <script src="https://reeteshghimire.com.np/wp-content/uploads/2021/05/html5-qrcode.min_.js"></script>
    <!-- <script type="text/javascript">
        // camera
        function setup() {
            function onScanSuccess(qrCodeMessage) {
                console.log(qrCodeMessage);
                document.getElementById('barcode').value = qrCodeMessage;


            }

            function onScanError(errorMessage) {
                //handle scan error
            }

            var html5QrcodeScanner = new Html5QrcodeScanner(
                "my_camera", {
                    fps: 10,
                    qrbox: 450
                });
            html5QrcodeScanner.render(onScanSuccess, onScanError);

        }
    </script> -->