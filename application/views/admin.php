<?php $this->load->view('templates/header') ?>

<body class="fixed-left">

    <!-- Begin page -->
    <div id="wrapper">
        <?php $this->load->view('templates/sidebar') ?>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container">

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Humanika Psychology Center </h4>
                                <ol class="breadcrumb p-0">
                                    <li>
                                        <a href="<?php echo site_url(); ?>">Dashboard</a>
                                    </li>
                                    <li class="active">
                                        User
                                    </li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="card-box">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h4 class="header-title m-t-0">Data User</h4>
                                        <?php if ($level == 'administrator'): ?>
                                         <button type="button" name="button" class="btn btn-info btn-rounded waves-effect waves-light" data-toggle="modal" data-target="#tambahdata">Tambah Data User</button>                                       
                                        <?php endif; ?>

                                        <?php if ($level == 'pengawas'): ?>
                                         <button type="button" name="button" class="btn btn-warning btn-rounded waves-effect waves-light" data-toggle="modal" data-target="#koreksidata">Buat Memo Koreksi</button>                                       
                                        <?php endif; ?>
                                        <div class="p-20">
                                            <table class="table table-striped" id="datatable">
                                                <thead>
                                                    <th>No</th>
                                                    <th>Username</th>
                                                    <th>Password</th>
                                                    <th>Level</th>
                                                    <?php if ($level == 'administrator'): ?>
                                                    <th>Opsi</th>
                                                    <?php endif; ?>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1;
                                                    foreach ($admin as $a): ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $i++; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $a->username; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $a->password; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $a->level; ?>
                                                        </td>
                                                        <?php if ($level == 'administrator'): ?>
                                                        <td>
                                                            <a href="" data-toggle="modal" data-target="#editdata<?= $a->idadmin; ?>" disabled><img name="edit" width="20" height="20" src="<?php echo base_url('img/edit.png'); ?>" data-toggle="tooltip" data-placement="bottom" data-original-title="Edit Data Admin" disabled /></a>
                                                            <a href="<?php echo site_url('admin/hapusadmin/' . $a->idadmin); ?>" class="sa-params"><img width="20" height="20" src="<?php echo base_url('img/hapus.png'); ?>" data-toggle="tooltip" data-placement="bottom" data-original-title="Hapus Data Admin" /></a>
                                                        </td>
                                                        <?php endif; ?>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Tambah -->
                    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="tambahdata">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" aria-hidden="true" data-dismiss="modal" class="close">x</button>
                                    <h4 class="modal-title">Tambah Data User</h4>
                                </div>
                                <form class="form-horizontal" action="<?php echo base_url('admin/tambahadmin'); ?>" method="post" enctype="multipart/form-data" role="form">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="col-lg-3 col-sm-2 control-label">Username</label>
                                            <div class="col-lg-9">
                                                <input type="text" name="username" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 col-sm-2 control-label">Password</label>
                                            <div class="col-lg-9">
                                                <input type="text" name="password" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 col-sm-2 control-label">Level</label>
                                            <div class="col-lg-9">
                                                <select name="level" class="form-control">
                                                    <option value="administrator">ADMINISTRATOR</option>
                                                    <option value="psikolog">PSIKOLOG</option>
                                                    <option value="pengawas">PENGAWAS</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-info">Simpan</button>
                                        <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                    <!-- Modal Edit -->
                    <?php foreach ($admin as $a): ?>
                    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="editdata<?= $a->idadmin; ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" aria-hidden="true" data-dismiss="modal" class="close">x</button>
                                    <h4 class="modal-title">Edit Data User</h4>
                                </div>
                                <form class="form-horizontal" action="<?php echo site_url('admin/editadmin'); ?>" method="post" enctype="multipart/form-data" role="form">
                                    <div class="modal-body">
                                        <input type="hidden" name="idadmin" value="<?= $a->idadmin; ?>" id="">
                                        <div class="form-group">
                                            <label class="col-lg-3 col-sm-2 control-label">Username</label>
                                            <div class="col-lg-9">
                                                <input type="text" name="username" class="form-control" value="<?= $a->username; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 col-sm-2 control-label">Password</label>
                                            <div class="col-lg-9">
                                                <input type="text" name="password" class="form-control" value="<?= $a->password; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 col-sm-2 control-label">Level Akses</label>
                                            <div class="col-lg-9">
                                                <input type="text" name="level" class="form-control" value="<?= $a->level; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-info">Simpan</button>
                                        <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                    <?php endforeach; ?>

                    <!-- Modal Memo Koreksi -->
                    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="koreksidata">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" aria-hidden="true" data-dismiss="modal" class="close">x</button>
                                    <h4 class="modal-title">Memo Koreksi Kinerja Administrator</h4>
                                </div>
                                <form class="form-horizontal" action="<?php echo base_url('monitoring/koreksi'); ?>" method="post" enctype="multipart/form-data" role="form">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="col-lg-3 col-sm-2 control-label">User</label>
                                            <div class="col-lg-9">
                                                <input type="text" name="user" class="form-control" value="<?= $this->input->get('user'); ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 col-sm-2 control-label">Perihal</label>
                                            <div class="col-lg-9">
                                                <input value="Data User" readonly type="text" name="perihal" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 col-sm-2 control-label">Catatan</label>
                                            <div class="col-lg-9">
                                                <textarea name="catatan" id="" cols="66" class="form-control" rows="4" placeholder="Masukkan Catatan"></textarea>
                                            </div>
                                        </div>
                                        <input type="hidden" name="url" value="<?= base_url('admin?user='.$this->input->get('user')); ?>">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-info">Simpan</button>
                                        <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div> <!-- container -->

            </div> <!-- content -->



        </div>
        <!-- End content-page -->


        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->



        <footer class="footer text-right">
            2019 © Uplon.
        </footer>


    </div>
    <!-- END wrapper -->


</body>
<!-- Sweet Alert js -->
<script src="<?php echo base_url('assets/'); ?>plugins/bootstrap-sweetalert/sweet-alert.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>pages/jquery.sweet-alert.init.js"></script>

<script src="<?php echo base_url('assets/'); ?>js/jquery.min.js"></script>

<!-- Required datatable js -->
 <script src="<?php echo base_url('assets/'); ?>plugins/datatables/jquery.dataTables.min.js"></script>
 <script src="<?php echo base_url('assets/'); ?>plugins/datatables/dataTables.bootstrap4.min.js"></script>


  <script type="text/javascript">
     $(document).ready(function() {
         $('#datatable').DataTable();

     });

 </script>

 <script>
     var resizefunc = [];
 </script>



<?php $this->load->view('templates/footer') ?>

</html> 