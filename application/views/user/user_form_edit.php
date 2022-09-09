<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h5>Form Edit Users</h5>
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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="<?= site_url('user') ?>" class="btn btn-primary float-right btn-sm"><i class="fa fa-undo"></i>Back</a>
                    </div>

                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <!-- <?= validation_errors() ?> -->
                                    <form method="post" action="">
                                        <div class="form-group <?= form_error('fullname') ? 'has-error' : null ?>">
                                            <label>Nama *</label>
                                            <input type="hidden" name="user_id" value="<?=$user->user_id?>">
                                            <input type="text" class="form-control" name="fullname" value="<?= $this->input->post('fullname') ?? $user->name
                                            ?>">
                                            <?= form_error('fullname') ?>
                                        </div>
                                        <div class="form-group <?= form_error('username') ? 'has-error' : null ?>">
                                            <label>Username *</label>
                                            <input type="text" class="form-control" name="username" value="<?= $this->input->post('username') ?? $user->username
                                            ?>">
                                            <?= form_error('username') ?>

                                        </div>
                                        <div class="form-group <?= form_error('password') ? 'has-error' : null ?>">
                                            <label>Password</label><small> (Biarkan kosong jika tidak diganti)</small>
                                            <input type="password" class="form-control" name="password" value="<?= $this->input->post('password')
                                            ?>">
                                            <?= form_error('password') ?>

                                        </div>
                                        <div class="form-group <?= form_error('passconf') ? 'has-error' : null ?>">
                                            <label>Password Confirmation</label>
                                            <input type="password" class="form-control" name="passconf" value="<?= $this->input->post('passconf')
                                            ?>">
                                            <?= form_error('passconf') ?>

                                        </div>
                                        <div class="form-group <?= form_error('alamat') ? 'has-error' : null ?>">
                                            <label>Alamat *</label>
                                            <textarea class="form-control" name="alamat"><?= $this->input->post('alamat') ?? $user->address
                                            ?></textarea>
                                            <?= form_error('alamat') ?>

                                        </div>
                                        <div class="form-group <?= form_error('level') ? 'has-error' : null ?>">
                                            <label>Level</label>
                                            <select class="form-control" name="level">
                                                <?php $level = $this->input->post('level') ? $this->input->post('level') : $user->level ?>
                                                <option value="1">Admin</option>
                                                <option value="2" <?= $level == 2 ? 'selected' : null ?>>kasir</option>
                                            </select>
                                            <?= form_error('level') ?>

                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-paper-plane"> Simpan</i></button>
                                            <button type="reset" class="btn btn-danger btn-flat">Reset</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>

        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>