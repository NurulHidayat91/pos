<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Product <?= $item->barcode ?></title>
</head>

<body>
    
    <img src="uploads/qr-code/item-<?= $item->barcode ?>.png" style="width:300px">
    <br>
    <?= $item->barcode ?>
</body>

</html>