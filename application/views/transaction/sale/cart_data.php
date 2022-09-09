<?php $no = 1;
    if ($cart->num_rows() > 0) {
        foreach ($cart->result() as $key => $value) {?>
            <tr>
                <td><?=$no++?></td>
                <td class="barcode"><?=$value->barcode?></td>
                <td><?=$value->item_name?></td>
                <td class="text-right"><?=$value->cart_price?></td>
                <td class="text-center"><?=$value->qty?></td>
                <td class="text-right"><?=$value->discount_item?></td>
                <td class="text-center" id="total"><?=$value->total?></td>
                <td class="text-center" width="160px">
                <button id="update_cart" data-toggle="modal" data-target="#modal-item-edit"
                data-cartid="<?=$value->cart_id?>"
                data-barcode="<?=$value->barcode?>"
                data-product="<?=$value->item_name?>"
                data-stock="<?=$value->stock?>"
                data-price="<?=$value->cart_price?>"
                data-qty="<?=$value->qty?>"
                data-discount="<?=$value->discount_item?>"
                data-total="<?=$value->total?>"
                class="btn btn-xs btn-primary">
                    <i class="fa fa-pencil">Update</i>
                </button>
                <button id="del_cart" data-cartid="<?=$value->cart_id?>" class="btn btn-xs btn-danger"> <i class="fa fa-trash"></i>Delete</button>
                </td>
            </tr>
        <?php }
    } else {
        echo '<tr>
                <td colspan="8" class="text-center">Tidak ada item</td>
                </tr>';
    }?>
        