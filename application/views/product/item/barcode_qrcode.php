<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h5>Items</h5>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Barcode Generator</a></li>
                    <li class="breadcrumb-item active">Item</li>
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
                    <h3 class="card-title">Barcode Generator</h3>
                    <a href="<?= site_url('item') ?>" class="btn btn-primary float-right btn-sm"><i class="fa fa-undo"></i>Back</a>
                </div>

                <div class="row h-100 justify-content-center align-items-center">
                    <div class="col-md-6">
                        <div class="card-body">
                            <?php

                            $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
                            echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($item->barcode, $generator::TYPE_CODE_128)) . '"  style="width:200px">';
                            ?>
                            <br>
                            <?= $item->barcode?>
                            <br><br>
                            <a href="<?= site_url('item/barcode_print/' . $item->item_id) ?>" class="btn btn-default btn-sm" target="_blank"><i class="fa fa-print"></i>Print</a>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">QR-Code Generator</h3>
                </div>

                <div class="row h-100 justify-content-center align-items-center">
                    <div class="col-md-6">
                        <div class="card-body">
                            <?php
                            $qrCode = new Endroid\QrCode\QrCode($item->barcode);

                            $qrCode->writeFile('uploads/qr-code/item-'. $item->barcode.'.png');
                            ?>
                           <img src="<?=base_url('uploads/qr-code/item-'.$item->barcode.'.png')?>" style="width:200px">
                           <br>
                            <?= $item->barcode?>
                            <br><br>
                            <a href="<?= site_url('item/qrcode_print/' . $item->item_id) ?>" class="btn btn-default btn-sm" target="_blank"><i class="fa fa-print"></i>Print</a>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /.row -->
    <!-- /.container-fluid -->
</section>