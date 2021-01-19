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
                    Orang Tua
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
                    <h4 class="header-title m-t-0">Data Orang Tua</h4>
                    <?php if ($level == 'administrator') : ?>
                      <button type="button" name="button" class="btn btn-info btn-rounded waves-effect waves-light" data-toggle="modal" data-target="#tambahdata">Tambah Data Orang Tua</button>
                    <?php endif; ?>
                    <?php if ($level == 'pengawas') : ?>
                      <button type="button" name="button" class="btn btn-warning btn-rounded waves-effect waves-light" data-toggle="modal" data-target="#koreksidata">Buat Memo Koreksi</button>
                    <?php endif; ?>
                    <div class="p-20">
                      <table class="table table-striped" id="datatable">
                        <thead>
                          <th>No</th>
                          <th>ID Orang Tua</th>
                          <th>Nama Orang Tua</th>
                          <th>Umur</th>
                          <th>Pendidikan</th>
                          <th>Pekerjaan</th>
                          <th>Suku Bangsa</th>
                          <?php if ($level == 'administrator') : ?>
                            <th>Opsi</th>
                          <?php endif; ?>
                        </thead>
                        <tbody>
                          <?php $i = 1;
                          foreach ($ortu as $a) : ?>
                            <tr>
                              <td><?php echo $i++; ?></td>
                              <td><?php echo $a->idorangtua; ?></td>
                              <td><?php echo $a->namaorangtua; ?></td>
                              <td><?php echo $a->umurortu . ' Tahun'; ?></td>
                              <td><?php echo $a->pendidikan; ?></td>
                              <td><?php echo $a->pekerjaan; ?></td>
                              <td><?php echo $a->sukubangsa; ?></td>
                              <?php if ($level == 'administrator') : ?>
                                <td>
                                  <a href="" data-toggle="modal" data-target="#editdata<?= $a->idorangtua; ?>" disabled><img name="edit" width="20" height="20" src="<?php echo base_url('img/edit.png'); ?>" data-toggle="tooltip" data-placement="bottom" data-original-title="Edit Data Orang Tua" disabled /></a>
                                  <a href="<?php echo site_url('orangtua/hapusortu/' . $a->idorangtua); ?>" class="sa-params"><img width="20" height="20" src="<?php echo base_url('img/hapus.png'); ?>" data-toggle="tooltip" data-placement="bottom" data-original-title="Hapus Data Orang Tua" /></a>
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
                  <h4 class="modal-title">Tambah Data Orang Tua</h4>
                </div>
                <form class="form-horizontal" action="<?php echo base_url('orangtua/tambahortu'); ?>" method="post" enctype="multipart/form-data" role="form">
                  <div class="modal-body">
                    <div class="form-group">
                      <label class="col-lg-3 col-sm-2 control-label">ID Orang Tua</label>
                      <div class="col-lg-9">
                        <input type="text" name="idorangtua" class="form-control" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-3 col-sm-2 control-label">Nama Orang Tua</label>
                      <div class="col-lg-9">
                        <input type="text" name="namaorangtua" class="form-control" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-3 col-sm-2 control-label">Umur</label>
                      <div class="col-lg-9">
                        <input type="text" name="umurortu" class="form-control" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-3 col-sm-2 control-label">Pendidikan</label>
                      <div class="col-lg-9">
                        <select class="form-control" name="pendidikan">
                          <?php foreach ($pendidikan as $b) : ?>
                            <option value="<?php echo $b->pendidikan; ?>"><?php echo $b->pendidikan; ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-3 col-sm-2 control-label">Pekerjaan</label>
                      <div class="col-lg-9">
                        <select class="form-control" name="pekerjaan">
                          <?php foreach ($pekerjaan as $c) : ?>
                            <option value="<?php echo $c->pekerjaan; ?>"><?php echo $c->pekerjaan; ?></option>
                          <?php endforeach; ?>
                          <option value="Belum/Tidak Bekerja">Belum/Tidak Bekerja</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-3 col-sm-2 control-label">Suku Bangsa</label>
                      <div class="col-lg-9">
                        <input type="text" name="sukubangsa" class="form-control" required>
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
          <?php foreach ($ortu as $a) : ?>
            <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="editdata<?= $a->idorangtua; ?>">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" aria-hidden="true" data-dismiss="modal" class="close">x</button>
                    <h4 class="modal-title">Edit Data Orang Tua</h4>
                  </div>
                  <form class="form-horizontal" action="<?php echo site_url('orangtua/editortu'); ?>" method="post" enctype="multipart/form-data" role="form">
                    <div class="modal-body">
                      <div class="form-group">
                        <label class="col-lg-3 col-sm-2 control-label">ID Orang Tua</label>
                        <div class="col-lg-9">
                          <input type="text" name="idorangtua" class="form-control" value="<?= $a->idorangtua; ?>" readonly="readonly">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-3 col-sm-2 control-label">Nama Orang Tua</label>
                        <div class="col-lg-9">
                          <input type="text" name="namaorangtua" class="form-control" value="<?= $a->namaorangtua; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-3 col-sm-2 control-label">Umur</label>
                        <div class="col-lg-9">
                          <input type="text" name="umurortu" class="form-control" value="<?= $a->umurortu; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-3 col-sm-2 control-label">Pendidikan</label>
                        <div class="col-lg-9">
                          <select class="form-control" name="pendidikan">
                            <?php foreach ($pendidikan as $b) : ?>
                              <option value="<?php echo $b->pendidikan; ?>" <?php if ($b->pendidikan == $a->pendidikan) {
                                                                                  echo "selected='selected;'";
                                                                                } ?>><?php echo $b->pendidikan; ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-3 col-sm-2 control-label">Pekerjaan</label>
                        <div class="col-lg-9">
                          <select class="form-control" name="pekerjaan">
                            <?php foreach ($pekerjaan as $c) : ?>
                              <option value="<?php echo $c->pekerjaan; ?>" <?php if ($c->pekerjaan == $a->pekerjaan) {
                                                                                  echo "selected='selected;'";
                                                                                } ?>><?php echo $c->pekerjaan; ?></option>
                            <?php endforeach; ?>
                            <option value="Belum/Tidak Bekerja" <?php if ("Belum/Tidak Bekerja" == $a->pekerjaan) {
                                                                    echo "selected='selected'";
                                                                  } ?>>Belum/Tidak Bekerja</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-3 col-sm-2 control-label">Suku Bangsa</label>
                        <div class="col-lg-9">
                          <input type="text" name="sukubangsa" class="form-control" value="<?= $a->sukubangsa; ?>">
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

        </div> <!-- container -->

      </div> <!-- content -->



    </div>
    <!-- End content-page -->


    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->

    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="koreksidata">
      <div class="modal-dialog ">
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
                  <input value="Data Orang Tua" readonly type="text" name="perihal" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-3 col-sm-2 control-label">Catatan</label>
                <div class="col-lg-9">
                  <textarea name="catatan" id="" cols="66" class="form-control" rows="4" placeholder="Masukkan Catatan"></textarea>
                </div>
              </div>
              <input type="hidden" name="url" value="<?= base_url('orangtua?user='.$this->input->get('user')); ?>">
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-info">Simpan</button>
              <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
            </div>
          </form>
        </div>
      </div>
    </div>

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