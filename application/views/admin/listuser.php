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
            <div class="card">
                <div class="card-header">
                    <!-- <button class="btn btn-success" data-toggle="modal" data-target="#modal" onclick="add()">Tambah</button> -->
                    <a class="btn btn-success" href="<?= base_url('user/tambahuser'); ?>" role="button">
                        Tambah
                    </a>
                </div>
                <div class="card-body">
                    <table class="table w-100 table-bordered table-hover" id="user">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div><!-- /.container-fluid -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->



<div class="modal fade" id="SPmodaledit">
<div class="modal-dialog">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title">Add Data</h5>
    <button class="close" data-dismiss="modal">
      <span>&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <form id="USformedit">
      <input type="hidden" name="id">
      <div class="form-group">
        <label>Nama</label>
        <input type="text" class="form-control" placeholder="Nama" name="nama" required>
      </div>
      <div class="form-group">
        <label>Username</label>
        <input type="text" class="form-control" placeholder="Username" name="username" required>
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="text" class="form-control" placeholder="Password" name="password" required>
      </div>
      <button class="btn btn-success" name="USEdtbtn" type="button" onclick="editData()">Edit</button>
    </form>
  </div>
</div>
</div>
</div>


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
<script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>

<script src="<?php echo base_url('assets/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
<script>
    var USreadUrl = '<?php echo base_url('user/read') ?>';
    var USaddUrl = '<?php echo base_url('user/add') ?>';
    var USremoveUrl = '<?php echo base_url('user/delete') ?>';
    var USeditUrl = '<?php echo base_url('user/edit') ?>';
    var USget_userUrl = '<?php echo base_url('user/get_user') ?>';
</script>
<script src="<?php echo base_url('assets/js/user.js') ?>"></script>
</body>

</html>