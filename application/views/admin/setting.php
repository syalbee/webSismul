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
        <form method="POST" action="<?= base_url('setting/setting'); ?>">
            <div class="card-body">
                <div class="form-group">
                    <div class="col-6">
                        <label for="datang">Jam Datang</label>
                        <input type="text" value="<?= $datang; ?>" class="form-control" id="datang" name="datang" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-6">
                        <label for="pulang">Jam Pulang</label>
                        <input type="text" value="<?= $pulang; ?>" class="form-control" id="pulang" name="pulang" required>
                    </div>
                </div>

                <div class="form-row">
                    <button type="submit" class="btn btn-primary">Submit</button>
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
</body>

</html>