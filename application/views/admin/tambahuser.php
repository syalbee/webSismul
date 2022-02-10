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
        <form id="USaddform">
            <div class="card-body">

                <div class="form-group">
                    <div class="col-6">
                        <label for="USnama">Nama</label>
                        <input type="text" class="form-control" id="USnama" name="USnama" placeholder="Nama" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-6">
                        <label for="USusername">Username</label>
                        <input type="text" class="form-control" id="USusername" name="USusername" placeholder="Username" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-6">
                        <label for="USpassword">Password</label>
                        <input type="text" class="form-control" id="USpassword" name="USpassword" placeholder="Password" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-6">
                        <label for="USrole">Role</label>
                        <select id="USrole" name="USrole" class="form-control">
                            <option value="2">Dosen</option>
                            <option value="3">Mahasiswa</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <button type="button" onclick="addData()" class="btn btn-primary">Submit</button>
                </div>
            </div>

            <!-- /.card-body -->
        </form>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; <?= date('Y'); ?> <a href="https://robotika.unikom.ac.id/">Divisi Robotika Unikom-</a></strong> Sistem Absensi.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>assets/dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url('assets/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>

<script>
    var USreadUrl = '<?php echo base_url('user/read') ?>';
    var USlisturl = '<?php echo base_url('user/listuser') ?>';
    var USaddUrl = '<?php echo base_url('user/add') ?>';
    var USremoveUrl = '<?php echo base_url('user/delete') ?>';
    var USeditUrl = '<?php echo base_url('user/edit') ?>';
    var USget_userUrl = '<?php echo base_url('user/get_user') ?>';
</script>
<script src="<?php echo base_url('assets/js/user.js') ?>"></script>
</body>

</html>