<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Suppliers</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Pemasok Barang</a></li>
          <li class="breadcrumb-item active">Suppliers</li>
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
            <a href="<?= site_url('supplier/add') ?>" class="btn btn-primary float-right btn-sm"><i class="fa fa-supplier-plus"></i>Create</a>

          </div>

          <div class="card-body table-responsive">
            <table class="table table-bordered table-striped>" id="example1">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama</th>
                  <th>No.Telp</th>
                  <th>Alamat</th>
                  <th>Deskripsi</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($supplier as $key => $value) { ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $value->name ?></td>
                    <td><?= $value->phone ?></td>
                    <td><?= $value->address ?></td>
                    <td><?= $value->description ?></td>
                    <td class="text-center" width=120px>
                      <a href="<?= site_url('supplier/edit/' . $value->supplier_id) ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>Edit</a>
                      <!-- <a onclick="return confirm('Apakah anda yakin??')" href="<?= site_url('supplier/delete/' . $value->supplier_id) ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>Delete</a> -->
                      <a onclick="$('#modalDelete #formDelete').attr('action', '<?=site_url('supplier/delete/' . $value->supplier_id)?>')" href="#modalDelete" data-toggle="modal" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>Delete</a>

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

<div class="modal fade" id="modalDelete">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Yakin mau menghapus data ini??</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer table-responsive">
                <form id="formDelete" action="" method="POST">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
            <!-- <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>