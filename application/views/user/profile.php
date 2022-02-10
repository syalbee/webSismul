<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $title; ?></h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="<?= base_url('assets/image/' . $user[0]["img"]); ?>" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center"><?= $user[0]["nama"]; ?></h3>

                            <p class="text-muted text-center"><?= $user[0]["role"] == "1" ? 'Admin' : ($user[0]["role"] == "2" ? 'Dosen' : "Mahasiswa"); ?></p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <h4>Setting</h4>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <!-- <div class="tab-content"> -->
                            <div class="tab-pane" id="settings">
                                <?php
                                if (isset($error)) {
                                    echo $error;
                                }
                                ?>
                                <form class="form-horizontal" method="post" action="<?= base_url('user/daftar') ?>" enctype="multipart/form-data">

                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-10">
                                            <input type="text" value="<?= $user[0]["nama"]; ?>" class="form-control" name="nama" id="inputName" placeholder="Nama">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputUsername" class="col-sm-2 col-form-label">Username</label>
                                        <div class="col-sm-10">
                                            <input type="text" value="<?= $user[0]["username"]; ?>" class="form-control" name="username" id="inputUsername" placeholder="Username">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="password" id="inputPassword" placeholder="Password">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputExperience" class="col-sm-2 col-form-label">Photo</label>
                                        <div class="col-sm-10">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="profile_image" id="customFile">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>