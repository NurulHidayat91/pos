<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Users</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Pengguna</a></li>
          <li class="breadcrumb-item active">Users</li>
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
            <a href="<?= site_url('user/add') ?>" class="btn btn-primary float-right btn-sm"><i class="fa fa-user-plus"></i>Create</a>

          </div>

          <div class="card-body table-responsive">
            <table class="table table-bordered table-striped>" id="example1">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Username</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>Level</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($user->result() as $key => $value) { ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $value->username ?></td>
                    <td><?= $value->name ?></td>
                    <td><?= $value->address ?></td>
                    <td><?= $value->level == 1 ? "Admin" : "Kasir" ?></td>
                    <td class="text-center" width=120px>
                      <form action="<?= site_url('user/delete_user') ?>" method="post">

                        <a href="<?= site_url('user/edit/' . $value->user_id) ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>Edit</a>
                        <input type="hidden" name="user_id" value="<?= $value->user_id ?>">
                        <button onclick="return confirm('Apakah anda yakin??')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>Delete</button>
                      </form>

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