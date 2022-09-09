<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h5>Form <?= ucfirst($page) ?> Item</h5>
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
    
    <div class="row">
        <div class="col-md-12">
        <?php $this->load->view('message');?>

            <div class="card">
                <div class="card-header">
                    <a href="<?= site_url('item') ?>" class="btn btn-primary float-right btn-sm"><i class="fa fa-undo"></i>Back</a>
                </div>

                <div class="row h-100 justify-content-center align-items-center">
                    <div class="col-md-6">
                        <div class="card-body">
                        
                            <!-- <?= validation_errors() ?> -->
                            <?php echo form_open_multipart('item/proses') ?>
                                <div class="form-group">
                                    <label>Barcode *</label>
                                    <input type="hidden" class="form-control" name="id" value="<?= $row->item_id ?>">
                                    <input type="text" class="form-control" name="barcode" value="<?= $row->barcode ?>" required>

                                </div>

                                <div class="form-group">
                                    <label for="product_name">Nama Produk *</label>
                                    <input type="text" class="form-control" name="product_name" id="product_name" value="<?= $row->name ?>" required>

                                </div>

                                <div class="form-group">
                                    <label for="product_name">kategori *</label>
                                    <select name="category" class="form-control" required>
                                        <option value="">--Pilih--</option>
                                        <?php foreach ($category->result() as $key => $value) {?>
                                            <option value="<?= $value->category_id?>" <?=$value->category_id == $row->category_id ? 'selected' : null?>><?= $value->name?></option>

                                        <?php }?>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="product_name">Unit *</label>
                                    <?= form_dropdown('unit', $unit, $selectedunit, ['class' => 'form-control', 'required' => 'required'])?>
                                </div>

                                <div class="form-group">
                                    <label>Price *</label>
                                    <input type="text" class="form-control" name="price" value="<?= $row->price ?>" required>

                                </div>

                                <div class="form-group">
                                    <label>Gambar</label>
                                    <?php if ($page == 'edit') {
                                        if ($row->image != null) {?>
                                            <div style="margin-bottom:4px">
                                                <img src="<?= base_url('uploads/product/' .$row->image)?>" style="width:100px"  >

                                            </div>
                                      <?php  }
                                     } ?>
                                    <input type="file" class="form-control" name="image" >
                                    <small>( Biarkan kosong Jika tidak <?= $page == 'edit' ? 'ganti' : 'ada gambar' ?>)</small>

                                </div>

                                <div class="form-group">
                                    <button type="submit" name="<?= $page ?>" class="btn btn-primary btn-flat"><i class="fa fa-paper-plane"> Simpan</i></button>
                                    <button type="reset" class="btn btn-danger btn-flat">Reset</button>
                                </div>
                            <?= form_close()?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- /.row -->
    <!-- /.container-fluid -->
</section>